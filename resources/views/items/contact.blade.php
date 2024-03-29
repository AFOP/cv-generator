@extends('components.app-master')

@section('content')
<form action="{{ route('contact') }}" method="POST" class="row flex-wrap mt-3">
    @csrf
    @include('components.messages')
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="profession">Profesión:</label>
        <input type="text" name="profession" id="profession" class="form-control" placeholder="Ingeniero ...">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="skills">Habilidades:</label>
        <input type="text" name="skills" id="skills" class="form-control" placeholder="Habilidad 1, habilidad 2, ... etc">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label for="inputexperience" class="form-label">Experiencia:</label>
        <select class="form-select" name="experience" aria-label="Default select example" id="inputexperience" onchange="showDiv()">
            <option selected value="NO">No</option>
            <option value="SI">Sí</option>
        </select>
    </div>
    <div class="col-sm-6 mb-3 form-group" id="timeexperience" style="display:none;">
        <label class="form-label" for="time">Tiempo de experiencia:</label>
        <input type="text" name="time" id="time" class="form-control" placeholder="8 años">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="firts_name">Nombres:</label>
        <input type="text" name="firts_name" id="firts_name" class="form-control" placeholder="Ingresa tus nombres">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="last_name">Apellidos:</label>
        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Ingresa tus apellidos">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="address">Dirección:</label>
        <input type="text" name="address" id="address" aria-label="Address" class="form-control">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="phone">Celular: (+57)</label>
        <input type="text" name="phone" id="phone" aria-label="Phone" class="form-control" placeholder="000-000-0000">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" aria-label="Email" class="form-control" placeholder="example@company.com">
    </div>
    <div class="col-sm-6 mb-3 form-group">
        <label class="form-label" for="url">URL Linkedln:</label>
        <input type="text" name="url" id="url" aria-label="Url" class="form-control" placeholder="www.example.com">
    </div>
    @if ($contacts->count() <= 0) <div class="mb-3">
        <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
        @else
        <div class="alert alert-info mt-3">
            <p>Ya hay un contacto registrado. Puedes editar la información existente.</p>
        </div>
        @endif
</form>
@if ($contacts->count() > 0)
@php
$contact = $contacts->first();
@endphp
<form action="{{ route('contact.update', $contact->id) }}" method="POST" class="row flex-wrap g-3 mt-3">
    @csrf
    @method('PUT')
    <div class="col-sm-6 form-group">
        <label class="form-label" for="profession{{ $contact->id }}">Profesión:</label>
        <input type="text" name="profession" id="profession{{ $contact->id }}" class="form-control" value="{{ $contact->profession }}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="form-label" for="skills{{ $contact->id }}">Habilidades:</label>
        <input type="text" name="skills" id="skills{{ $contact->id }}" class="form-control" value="{{ $contact->skills }}">
    </div>
    @if ($contact->experience == "SI")
    <div class="col-sm-6 form-group">
        <label for="inputexperience{{ $contact->id }}" class="form-label">Experiencia:</label>
        <select class="form-select" name="experience" aria-label="Default select example" id="inputexperience{{ $contact->id }}">
            <option value="SI" selected>Sí</option>
            <option value="NO">No</option>
        </select>
    </div>
    <div class="col-sm-6 form-group">
        <label class="form-label" for="time{{ $contact->id }}">Tiempo de experiencia:</label>
        <input type="text" name="time" id="time{{ $contact->id }}" class="form-control" value="{{ $contact->time }}">
    </div>
    @else
    <div class="col-sm-6 form-group">
        <label for="inputexperience{{ $contact->id }}" class="form-label">Experiencia:</label>
        <select class="form-select" name="experience" aria-label="Default select example" id="inputexperience{{ $contact->id }}">
            <option value="NO" selected>No</option>
            <option value="SI">Sí</option>
        </select>
    </div>
    @endif
    <div class="col-sm-6 form-group">
        <label class="form-label" for="firts_name{{ $contact->id }}">Nombres:</label>
        <input type="text" name="firts_name" id="firts_name{{ $contact->id }}" class="form-control" value="{{ $contact->firts_name }}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="form-label" for="last_name{{ $contact->id }}">Apellidos:</label>
        <input type="text" name="last_name" id="last_name{{ $contact->id }}" class="form-control" value="{{ $contact->last_name }}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="form-label" for="address{{ $contact->id }}">Dirección:</label>
        <input type="text" name="address" id="address{{ $contact->id }}" aria-label="Address" class="form-control" value="{{ $contact->address }}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="form-label" for="phone{{ $contact->id }}">Celular: (+57)</label>
        <input type="text" name="phone" id="phone{{ $contact->id }}" aria-label="Phone" class="form-control" value="{{ $contact->phone }}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="form-label" for="email{{ $contact->id }}">Correo electrónico:</label>
        <input type="email" name="email" id="email{{ $contact->id }}" aria-label="Email" class="form-control" value="{{ $contact->email }}">
    </div>
    <div class="col-sm-6 form-group">
        <label class="form-label" for="url{{ $contact->id }}">URL Linkedln:</label>
        <input type="text" name="url" id="url{{ $contact->id }}" aria-label="Url" class="form-control" value="{{ $contact->url }}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $contact->id }}">Eliminar</button>
    </div>
</form>
<!-- Modal para confirmar eliminación -->
<div class="modal fade" id="deleteModal{{ $contact->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar la contacto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    function showDiv() {
        var selectValue = document.getElementById("inputexperience").value;
        var divtime = document.getElementById("timeexperience");

        divtime.style.display = selectValue == "SI" ? "block" : "none";
    }
</script>
@endsection
