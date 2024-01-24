<?php

namespace App\Http\Controllers;

use App\Models\Active;
use App\Models\SubDomain;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActiveController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:actives.index');
        $this->middleware('can:actives.create')->only('create', 'store');
        $this->middleware('can:actives.edit')->only('edit', 'update');
        $this->middleware('can:actives.delete')->only('delete', 'destroy');
    }

    //Función que retorna a la vista principal de los activos
    public function index()
    {

        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();

        if (in_array('poseedor', $roles)) {
            // Obtiene los registros paginados de actives
            $actives = Active::where('owner_id', $user->id)
                ->where('state_id', 1)
                ->paginate(10);
        } else {
            $actives = Active::where('state_id', 1)->paginate(10);
        }

        // Cargo los nombres de las áreas correspondientes en un array asociativo
        $areaName = SubDomain::whereIn('id', $actives->pluck('area_id'))->pluck('description', 'id');
        // $typeName = SubDomain::whereIn('id', $actives->pluck('type_id'))->pluck('description', 'id');
        $ubicationName = SubDomain::whereIn('id', $actives->pluck('ubication_id'))->pluck('description', 'id');
        $brandName = SubDomain::whereIn('id', $actives->pluck('marca_id'))->pluck('description', 'id');
        // $clasificationName = SubDomain::whereIn('id', $actives->pluck('clasification_id'))->pluck('description', 'id');
        // $confidentialityName = SubDomain::whereIn('id', $actives->pluck('confidentiality_id'))->pluck('description', 'id');
        // $integrityName = SubDomain::whereIn('id', $actives->pluck('integrity_id'))->pluck('description', 'id');
        // $disponibilityName = SubDomain::whereIn('id', $actives->pluck('disponibility_id'))->pluck('description', 'id');
        // $justificationName = SubDomain::whereIn('id', $actives->pluck('justification_id'))->pluck('description', 'id');
        $ownerName = User::whereIn('id', $actives->pluck('owner_id'))->pluck('name', 'id');
        $accessName = SubDomain::whereIn('id', $actives->pluck('access_id'))->pluck('description', 'id');
        // $statusName = SubDomain::whereIn('id', $actives->pluck('status_id'))->pluck('description', 'id');
        // $actualizationName = SubDomain::whereIn('id', $actives->pluck('actuali_id'))->pluck('description', 'id');
        $categories = SubDomain::whereIn('id', $actives->pluck('category_id'))->pluck('description', 'id');
        // dd($actives);
        // if ($actives->isEmpty()) {
        //     return view('active.index')->with('i', 0);
        // }
            return view('active.index', compact(
                'actives',
                'areaName',
                // 'typeName',
                'ubicationName',
                'brandName',
                // 'clasificationName',
                // 'confidentialityName',
                // 'integrityName',
                // 'disponibilityName',
                // 'justificationName',
                'ownerName',
                'accessName',
                // 'statusName',
                'categories'
            ))->with('i', (request()->input('page', 1) - 1) * $actives->perPage());
    }

    //Función que retorna al formulario para la creación de un activo
    public function create()
    {
        $active = new Active();
        $areas = SubDomain::where('id_domain', 1)->pluck('description', 'id');
        // $types = SubDomain::where('id_domain', 2)->pluck('description', 'id');
        $ubications = SubDomain::where('id_domain', 2)->pluck('description', 'id');
        $brands = SubDomain::where('id_domain', 6)->pluck('description', 'id');
        // $confidencialities = SubDomain::where('id_domain', 4)->pluck('description', 'id');
        // $integrities = SubDomain::where('id_domain', 5)->pluck('description', 'id');
        // $disponibilities = SubDomain::where('id_domain', 6)->pluck('description', 'id');
        $owners = User::pluck('name', 'id');
        // $justifications = SubDomain::where('id_domain', 7)->pluck('description', 'id');
        $access = SubDomain::where('id_domain', 3)->pluck('description', 'id');
        // $status = SubDomain::where('id_domain', 10)->pluck('description', 'id');
        //$actualizations = SubDomain::where('id_domain', 11)->pluck('description', 'id');
        // $clasifications = SubDomain::where('id_domain', 12)->pluck('description', 'id');
        $categories = SubDomain::where('id_domain', 4)->pluck('description', 'id');

        return view('active.create', compact(
            'active',
            'areas',
            // 'types',
            'ubications',
            'brands',
            // 'confidencialities',
            // 'integrities',
            // 'disponibilities',
            // 'justifications',
            'owners',
            'access',
            // 'status',
            // 'clasifications',
            'categories'
        ));
    }

    //Función que se encarga de almacenar los datos de los activos en la base de datos
    public function store(Request $request)
    {

        // Valida los campos obligatorios, excluyendo departureDate
        $validatedData = $request->validate([
            'area_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'marca_id' => 'required',
            // 'type_id' => 'required',
            'serial' => 'required',
            'placaInt' => 'required',
            'ubication_id' => 'required',
            // 'clasification_id' => 'required',
            // 'confidentiality_id' => 'required',
            // 'integrity_id' => 'required',
            // 'disponibility_id' => 'required',
            // 'justification_id' => 'required',
            'owner_id' => 'required',
            'access_id' => 'required',
            'dateAdmission' => 'required',
            // 'status_id' => 'required',
            'actualizacion' => 'required',
            'category_id' => 'required'
        ]);

        // Si no se proporciona departureDate en el formulario, establece su valor en null
        $departureDate = $request->input('departureDate', null);

        // Combina los datos validados con departureDate
        $data = array_merge(
            $validatedData,
            ['departureDate' => $departureDate]
        );
        
        $active = Active::create($data);
        $activeId = $active->id;

        return redirect()->route('actives.index')
            ->with('success', 'Activo creado satisfactoriamente');
    }

    //Función que permite ver los datos específicos de un activo
    public function show($id)
    {
        $active = Active::find($id);

        // Recupera los datos necesarios de las tablas relacionadas
        $areas = SubDomain::where('id_domain', 1)->where('id', $active->area_id)->where('id', $active->area_id)->where('id', $active->area_id)->pluck('description', 'id');
        // $types = SubDomain::where('id_domain', 2)->where('id', $active->type_id)->pluck('description', 'id');
        $ubications = SubDomain::where('id_domain', 2)->where('id', $active->ubication_id)->pluck('description', 'id');
        $brands = SubDomain::where('id_domain', 6)->where('id', $active->marca_id)->pluck('description', 'id');
        // $confidencialities = SubDomain::where('id_domain', 4)->where('id', $active->confidentiality_id)->pluck('description', 'id');
        // $integrities = SubDomain::where('id_domain', 5)->where('id', $active->integrity_id)->pluck('description', 'id');
        // $disponibilities = SubDomain::where('id_domain', 6)->where('id', $active->disponibility_id)->pluck('description', 'id');
        // $justifications = SubDomain::where('id_domain', 7)->where('id', $active->justification_id)->pluck('description', 'id');
        $owners = User::pluck('name', 'id');
        $access = SubDomain::where('id_domain', 3)->where('id', $active->access_id)->pluck('description', 'id');
        // $status = SubDomain::where('id_domain', 10)->where('id', $active->status_id)->pluck('description', 'id');
        // $clasifications = SubDomain::where('id_domain', 12)->where('id', $active->clasification_id)->pluck('description', 'id');
        $active->dateAdmission = new \DateTime($active->dateAdmission);
        $categories = SubDomain::where('id_domain', 4)->where('id', $active->category_id)->pluck('description', 'id');

        return view('active.show', compact(
            'active',
            'areas',
            // 'types',
            'ubications',
            'brands',
            // 'confidencialities',
            // 'integrities',
            // 'disponibilities',
            // 'justifications',
            'owners',
            'access',
            // 'status',
            // 'clasifications',
            'categories'
        ));
    }

    //Función que llama al formulario de edición y envía el complemento de data
    public function edit($id)
    {
        // Recupera el registro que deseas editar usando el modelo Active
        $active = Active::find($id);

        // Verifica si el registro existe antes de continuar
        if (!$active) {
            // Puedes manejar la lógica aquí si el registro no se encuentra, por ejemplo, redireccionar o mostrar un mensaje de error.
            return redirect()->route('tu_ruta_de_error')->with('error', 'El registro no existe.');
        }

        // Recupera los datos necesarios de las tablas relacionadas
        $areas = SubDomain::where('id_domain', 1)->pluck('description', 'id');
        // $types = SubDomain::where('id_domain', 2)->pluck('description', 'id');
        $ubications = SubDomain::where('id_domain', 2)->pluck('description', 'id');
        $brands = SubDomain::where('id_domain', 6)->pluck('description', 'id');
        // $confidencialities = SubDomain::where('id_domain', 4)->pluck('description', 'id');
        // $integrities = SubDomain::where('id_domain', 5)->pluck('description', 'id');
        // $disponibilities = SubDomain::where('id_domain', 6)->pluck('description', 'id');
        // $justifications = SubDomain::where('id_domain', 7)->pluck('description', 'id');
        $owners = User::pluck('name', 'id');
        $access = SubDomain::where('id_domain', 3)->pluck('description', 'id');
        // $status = SubDomain::where('id_domain', 10)->pluck('description', 'id');
        //$actualizations = SubDomain::where('id_domain', 11)->pluck('description', 'id');
        // $clasifications = SubDomain::where('id_domain', 12)->pluck('description', 'id');
        $categories = SubDomain::where('id_domain', 4)->pluck('description', 'id');

        // Pasa los datos recuperados a la vista 'active.edit' junto con el registro que deseas editar.
        return view('active.edit', compact(
            'active',
            'areas',
            // 'types',
            'ubications',
            'brands',
            // 'confidencialities',
            // 'integrities',
            // 'disponibilities',
            // 'justifications',
            'owners',
            'access',
            // 'status',
            // 'clasifications',
            'categories'
        ));
    }

    //Función que permite modificar los activos del sistema
    public function update(Request $request, Active $active)
    {

        $request['departureDate'] = isset($request['departureDate']) ? ($request['departureDate'] !== '' ? $request['departureDate'] : null) : null;
        request()->validate(Active::$rules);

        $active->update($request->all());

        return redirect()->route('actives.index')
            ->with('warning', 'Activo modificado satisfactoriamente');
    }

    //Función que elimina un activo por completo
    public function destroy($id)
    {
        $active = Active::find($id);
        if ($active) {
            $active->state_id = 2;
            $active->save();
        }

        return redirect()->route('actives.index')
            ->with('danger', 'Activo eliminado satisfactoriamente');
    }
}
