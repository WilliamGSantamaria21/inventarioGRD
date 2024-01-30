<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Requests;
use App\Models\Active;
use App\Models\SubDomain;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();

        if (in_array('poseedor', $roles)) {
            // Obtiene los registros paginados de actives
            $transfers = Requests::where('user_id', $user->id)  
                ->paginate(10);
        } else {
            $transfers = Requests::select()->paginate(10);
        }

        // Cargo los nombres de las áreas correspondientes en un array asociativo
        $ownerName = User::whereIn('id', $transfers->pluck('user_id'))->pluck('name', 'id');
        $newOwnerName = User::whereIn('id', $transfers->pluck('new_user_id'))->pluck('name', 'id');
        $statuses = SubDomain::whereIn('id', $transfers->pluck('status_id'))->pluck('description', 'id');

            return view('transfer.index', compact(
                'transfers',
                'ownerName',
                'newOwnerName',
                'statuses'
            ))->with('i', (request()->input('page', 1) - 1) * $transfers->perPage());
    }

    public function show()
    {
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();

        if (in_array('poseedor', $roles)) {
            // Obtiene los registros paginados de actives
            $actives = Active::select('name', 'id', 'placaInt')->where('owner_id', $user->id)->get();
        } else {
            $actives = Active::select('name', 'id', 'placaInt')->get();
        }
        $transfer = new Requests();
        $owners = User::pluck('name', 'id');
        
        // dd($actives);
        return view('transfer.create', compact(
            'transfer',
            'owners',
            'actives'
        ));
    }

    public function edit()
    {
    }

    public function destroy()
    {
    }

    //Función que se encarga de almacenar los datos de las solicitudes de transferencias en la base de datos
    public function store(Request $request)
    {

        // Valida los campos obligatorios, excluyendo departureDate
        // $validatedData = $request->validate([
        //     'owner_id' => 'required',
        //     'new_owner_id' => 'required',
        //     'actives_duallistbox' => 'required'
        // ]);
        
        $datos_transferencia=[];
        $datos_solicitud=[];

        $datos_solicitud['user_id']=$request['owner_id'];
        $datos_solicitud['new_user_id']=$request['new_owner_id'];
        $datos_solicitud['DateAdmission']=date('Y-m-d');
        $datos_solicitud['status_id']=46;
        
        $request1=Requests::create($datos_solicitud);
        $request1Id=$request1->id;

        $activos=[];
        $activos=$request['actives_duallistbox'];
        // dd($activos);

        //$datos_transferencia['active_id']=$request['actives_duallistbox'];
        foreach($activos as $datos){
            // dd($request);
            $data1['request_id']=$request1Id;
            $data1['active_id']=$datos[0];
            $request_created=Transfer::create($data1);
            // dd($request_created->id);
        }
        return redirect()->route('transfers.index')
            ->with('success', 'Solicitud creada satisfactoriamente');
    }
}
