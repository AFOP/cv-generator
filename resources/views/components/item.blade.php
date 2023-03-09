@extends('components.app-master')

@section('content')
    <main class="container">
        <h3>Registrar Item</h3>
        @include('components.messages')
        <form class="row g-3" method="POST" action="{{ route('item') }}">
            @csrf
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input type="text" name="title" class="form-control" id="inputPassword2" placeholder="Nombre Item">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Registar</button>
            </div>
        </form>
        <hr class="dropdown-divider">
        <h3>Lista de Items</h3>
        @foreach ($items as $item)
            <form class="row g-3" method="POST" action="{{ route('item.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Item</label>
                    <input type="text" name="title" class="form-control" id="inputPassword2" value="{{ $item->title }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Editar</button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">Eliminar</button>
                </div>
            </form>
            <!-- Modal para confirmar eliminación -->
            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Está seguro que desea eliminar el item {{ $item->title }}? 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
