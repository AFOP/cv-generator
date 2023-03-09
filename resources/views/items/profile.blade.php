@extends('components.app-master')

@section('content')
<div class="mt-3">
    @include('components.messages')
    <form action="{{ route('profile') }}" method="POST">
        @csrf
        <input type="hidden" name="title" value="Perfil Profesional">
        <input type="hidden" name="user" value="{{ $contacts->first()->firts_name }}">
        <div class="mb-3">
            <label for="description" class="form-label">Descripción del perfil</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ $contacts->first()->iadesc }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Registrar</button>
    </form>
    <div class="row">
        <div class="col">
            <hr>
        </div>
        <div class="col-auto">
            <h3 class="text-center">Lista de Perfiles</h3>
        </div>
        <div class="col">
            <hr>
        </div>
    </div>
    @foreach ($profiles as $profile)
    <div class="col-4 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Usuario</label>
        <input type="text" name="user" class="form-control" id="exampleFormControlInput1" value="{{ $profile->user }}" disabled>
    </div>
    <div class="mb-3">
        <form action="{{ route('profile.update', $profile->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" name="description" id="description" rows="4">{{ $profile->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
    <div class="mb-3">
        <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
    @endforeach
</div>
@endsection