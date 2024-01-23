@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Usuarios</h1>
@stop

{{-- BLOQUE DE VISTA DE USUARIOS --}}
@section('content')

    @livewire('admin.users-index')

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/admin_custom.css') }}">
@stop

@section('js')

    {{-- <script src="{{ asset('vendor\adminlte\dist\js\admin_custom.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                var userId = $(this).data('user-id');
                $('#userIdToDelete').val(userId);
            });

            $('#confirmDelete').on('click', function() {
                var userId = $('#userIdToDelete').val();
                if (userId) {
                    // Enviar solicitud de eliminación con AJAX
                    $.ajax({
                        url: '{{ route('users.destroy', ['user' => ':userId']) }}'.replace(
                            ':userId', userId),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Verificar si la eliminación fue exitosa
                            if (response.type === 'success') {
                                // Agregar variable de sesión para mostrar mensaje después de recargar
                                sessionStorage.setItem('delete_success',
                                    'Usuario eliminado correctamente');

                                // Recargar la página después de la eliminación
                                location.reload(true);
                            } else {
                                // Mostrar mensaje de error
                                showAlert('danger', response.message);
                                // Manejar el caso en que la eliminación no fue exitosa
                                console.error('Error al eliminar usuario:', response.message);
                            }
                        },
                        error: function(error) {
                            // Mostrar mensaje de error de sesión
                            showAlert('danger',
                                'Error al eliminar usuario. Por favor, inténtelo de nuevo.');
                            console.error('Error al eliminar usuario:', error);
                        }
                    });
                }
            });

            // Función para mostrar alertas
            function showAlert(type, message) {
                var alertDiv = $('<div class="alert alert-' + type + '">' + message + '</div>');
                $('.card').prepend(alertDiv);
                // Desaparecer la alerta después de 3 segundos
                setTimeout(function() {
                    alertDiv.fadeOut('slow');
                }, 3000);
            }
        });
    </script>

@stop
