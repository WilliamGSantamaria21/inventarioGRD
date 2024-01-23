<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;
use App\Models\SubDomain;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(5);

            $state_id = SubDomain::whereIn('id', $users->pluck('state_id'))->pluck('description', 'id');

        return view('livewire.admin.users-index', compact('users', 'state_id'));
    }
}
