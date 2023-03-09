@extends('components.app-master')

@section('content')
<form action="{{ route('education') }}" method="POST" class="mt-3">
    @csrf
    @include('components.messages')
    <p>Diligenciar de la más actual a la más antigua educación</p>
    <input type="hidden" name="title" value="Education">
    <div class="col-sm-2 mb-3">
        <label for="inputeducation" class="form-label">Tipo de educación:</label>
        <select class="form-select mb-3" name="type" aria-label="Default select example" id="inputeducation">
            <option value="Primaria">Primaria</option>
            <option value="Secundaria">Secundaria</option>
            <option value="Curso">Curso</option>
            <option value="Técnico">Técnico</option>
            <option value="Tecnólogo">Tecnólogo</option>
            <option value="Universitario">Universitario</option>
            <option value="Especialización">Especialización</option>
            <option value="Maestria">Maestria</option>
            <option value="Doctorado">Doctorado</option>
            <option value="Postdoctorado">Postdoctorado</option>
        </select>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label for="inputcompany" class="form-label">Nombre de Institución Educativa:</label>
            <input type="text" name="ie" class="form-control" id="inputcompany">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="inputAddress" class="form-label">Dirección de la institución Educativa:</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="City, State - Country">
        </div>
    </div>
    <div class="mb-3">
        <label for="inputAchievements" class="form-label">Descripción de los logros:</label>
        <textarea class="form-control" name="Achievements" id="inputAchievements" rows="3" placeholder="Logro 1, logro 2, ... etc"></textarea>
    </div>
    <div class="mb-3">
        <input class="form-check-input ml-auto" name="state" type="checkbox" id="gridCheck">
        <label class="form-check-label">
            Estudianto actualmente
        </label>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label for="inputstart" class="form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" name="start" id="inputstart">
        </div>
        <div class="col-sm-6 mb-3" id="inputend">
            <label for="inputend" class="form-label">Fecha de terminación:</label>
            <input type="date" class="form-control" name="finish" value="0">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>
<div class="row">
    <div class="col">
        <hr>
    </div>
    <div class="col-auto">
        <h3 class="text-center">Listado de educación</h3>
    </div>
    <div class="col">
        <hr>
    </div>
</div>
@foreach ($educations as $education)
<hr>
<div class="col-sm-2 mb-3">
    <label for="inputeducation" class="form-label">Tipo de educación:</label>
    <input type="text" class="form-control" id="inputeducation" value="{{ $education->type }}">
</div>
<div class="row">
    <div class="col-sm-6 mb-3">
        <label for="inputcompany" class="form-label">Nombre de Institución Educativa:</label>
        <input type="text" class="form-control" id="inputcompany" value="{{ $education->ie }}">
    </div>
    <div class="col-sm-6 mb-3">
        <label for="inputAddress" class="form-label">Dirección de la institución Educativa:</label>
        <input type="text" class="form-control" id="inputAddress" value="{{ $education->address }}">
    </div>
</div>
@if ($education->Achievements === 'null')
<div class="mb-3">
    <label for="inputAchievements" class="form-label">Descripción de los logros:</label>
    <textarea class="form-control" id="inputAchievements" rows="3" value="{{ $education->Achievements }}"></textarea>
</div>
@endif
<div class="col-sm-2 mb-3">
    <label class="form-label">
        Estudiando actualmente:
    </label>
    @if ($education->state === 0)
    <input class="form-control" name="state" type="text" id="gridCheck" value="No">
    @else
    <input class="form-control" name="state" type="text" id="gridCheck" value="Si">
    @endif
</div>
<div class="row">
    <div class="col-sm-6 mb-3">
        <label for="inputstart" class="form-label">Fecha de inicio:</label>
        <input type="date" class="form-control" name="start" id="inputstart" value="{{$education->start}}">
    </div>
    @if ($education->state === 0)
    <div class="col-sm-6 mb-3" id="inputend">
        <label for="inputend" class="form-label">Fecha de terminación:</label>
        <input type="text" class="form-control" name="finish" value="{{$education->finish}}">
    </div>
    @endif
</div>
<div class="mb-3">
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $education->id }}">Eliminar</button>
</div>
<!-- Modal para confirmar eliminación -->
<div class="modal fade" id="deleteModal{{ $education->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar la education con la institución educativa {{ $education->ie }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('education.destroy', $education->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    const checkbox = document.querySelector('#gridCheck');
    const dates = document.querySelector('#inputend');
    const stateInput = document.querySelector('input[name="state"]');

    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
            dates.style.display = 'none';
        } else {
            dates.style.display = 'block';
        }
    });
</script>
@endsection