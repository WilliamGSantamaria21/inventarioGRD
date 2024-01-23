<div>
    {{-- esto es un texto de prueba --}}
    <div class="card">

        @if ($message = Session::get('success') ?? (Session::get('warning') ?? Session::get('danger')))
            <div class="alert alert-{{ Session::has('success') ? 'success' : (Session::has('warning') ? 'warning' : 'danger') }} alert-dismissible fade show"
                role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($deleteSuccess = Session::get('delete_success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>{{ $deleteSuccess }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-header">
            <input wire:model.live="search" class="form-control mr-2 float-left" style="width: 400px;" placeholder="Buscar">
            <div class="float-right">
                <a class="btn btn-primary float-right" href="{{ route('users.create') }}">Crear nuevo</a>
            </div>
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $state_id[$user->state_id]}}</td>
                                <td width="10px">
                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit', $user->id) }}"><i
                                            class="fa fa-fw fa-edit"></i></a>
                                    @if ($user->id != auth()->user()->id)
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-toggle="modal"
                                            data-target="#deleteUser" data-user-id="{{ $user->id }}">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteUserLabel">Confirmar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Está seguro que desea eliminar a este usuario?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" id="confirmDelete">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="userIdToDelete" name="userIdToDelete">

            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
