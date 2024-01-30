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
        $transfer = new Requests();
        $owners = User::pluck('name', 'id');
        $actives = Active::select('name', 'id', 'placaInt')->get();
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

    public function store()
    {
    }
}
