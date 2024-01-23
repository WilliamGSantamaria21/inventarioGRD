<?php

namespace App\Http\Controllers;

use App\Models\Admin\User as AdminUser;
use App\Models\SubDomain;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function __construct() {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.delete')->only('delete', 'destroy');
    }
    
    protected $search;

    //Vista principal de usuarios y busqueda específica
    public function index(Request $request)
    {
        return view('user.index');
    }

    //Crea el usuario en la db
    public function store(Request $request)
    {
        // Realiza una validación más específica de los datos de entrada
        // dd($request['roles']);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'identification_number' => 'required|string|max:18'

        ]);
        // dd($request);
        // Cifra la contraseña
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData)->syncRoles($request['roles']);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente');
    }

    //Vista de crear usuario
    public function create()
    {
        $roles = Role::all();
        $user = new User();
        $states = SubDomain::where('id_domain',16)->pluck('description', 'id');
        // $states = SubDomain::all();
        // dd($states);
        return view('user.create', compact('user', 'roles','states'));
    }

    //vista de usuario
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    //Vista de editar
    public function edit(User $user)
    {
        $roles = Role::all();
        $states = SubDomain::where('id_domain',16)
        ->pluck('description','id');
        return view('user.edit', compact(
            'user',
            'roles',
            'states'
        ));
    }

    //Actualizar el usuario específicado en la base de datos
    public function update(Request $request, User $user)
    {

        request()->validate(AdminUser::$rules);
        $user->roles()->sync($request->roles);
        if ($request['password'] == null) {
            $request['password'] = $user->password;
        } else {
            $request['password'] = bcrypt($request['password']);
            // dd($request);
        }
        $user->update($request->all());
        return redirect()->route('users.index')
            ->with('warning', 'Usuario modificado exitosamente');
    }

    //Eliminar al usuario específicado en la db
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado', 'type' => 'danger'], 404);
        }elseif($user->state_id = 65){
            session()->flash('warning', 'Usuario ya está inactivo');
        }
        else{
            // $user->delete();
            $user->state_id = 65;
            $user->save();
            session()->flash('delete_success', 'Usuario inactivado correctamente');
        }

        return response()->json(['type' => 'success']);
    }

    public function profile()
    {
        return view('profile.profile');
    }
}
