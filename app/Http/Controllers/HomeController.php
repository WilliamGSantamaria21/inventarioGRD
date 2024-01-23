<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Active;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Obtén el usuario autenticado
        $user = Auth::user();

        // Obtiene los roles del usuario
        $roles = $user->roles->pluck('name')->toArray();
        // Verifica si el usuario tiene el rol 'poseedor'
        if (in_array('poseedor', $roles)) {
            // Redirige a una parte específica para poseedores
            return redirect()->route('actives.index');
            // return "eres poseedor";
        }

        // Verifica si el usuario tiene el rol 'admin'
        if (in_array('admin', $roles)) {
            // Redirige a otra parte para administradores
            $categories = Active::join('subdomains', 'actives.category_id', '=', 'subdomains.id')
            ->selectRaw('count(actives.category_id) as cuenta, subdomains.description')
            ->groupBy('subdomains.description')
            ->get();

            $data = [];

            foreach ($categories as $category) {
                $data[] = [$category->description, $category->cuenta];
            }

            $userCount = User::count(); // Cuenta los usuarios en la tabla 'users'
            return view('home', ['userCount' => $userCount, 'data' => json_encode($data)]);
            }

        
    }
}
