@extends('components.app-master')

@section('content')
<form action="{{ route('experience') }}" method="POST" class="row mt-3">
    @csrf
    @include('components.messages')
    <p>Diligenciar de la más actual a la más antigua experiencia profesional</p>
    <input type="hidden" name="title" value="Experiencia laboral">
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label for="inputcompany" class="form-label">Nombre de la empresa:</label>
            <input type="text" name="company" class="form-control" id="inputcompany">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="inputAddress" class="form-label">Dirección de la empresa:</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="City, State - Country">
        </div>
    </div>
    <div class="mb-3">
        <label for="descriptioncompany" class="form-label">Descripción del cargo:</label>
        <textarea class="form-control" name="Description" id="descriptioncompany" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="inputAchievements" class="form-label">Descripción de los logros:</label>
        <textarea class="form-control" name="Achievements" id="inputAchievements" rows="3" placeholder="Logro 1, logro 2, ... etc"></textarea>
    </div>
    <div class="mb-3">
        <input class="form-check-input ml-auto" name="state" type="checkbox" id="gridCheck">
        <label class="form-check-label">
            Trabajo actual
        </label>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label for="inputstart" class="form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" name="start" id="inputstart">
        </div>
        <div class="col-sm-6 mb-3" id="inputend">
            <label for="inputend" class="form-label">Fecha de terminación:</label>
            <input type="date" class="form-control" name="finish" id="inputend">
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</form>
<div class="row">
    <div class="col">
        <hr>
    </div>
    <div class="col-auto">
        <h3 class="text-center">Listado de experiencias</h3>
    </div>
    <div class="col">
        <hr>
    </div>
</div>
@foreach ($experiences as $experience)
<hr>
<div class="row">
    <div class="col-sm-6 mb-3">
        <label for="inputcompany" class="form-label">Nombre de la empresa:</label>
        <input type="text" name="company" class="form-control" id="inputcompany" value="{{$experience->company}}">
    </div>
    <div class="col-sm-6 mb-3">
        <label for="inputAddress" class="form-label">Dirección de la empresa:</label>
        <input type="text" name="address" class="form-control" id="inputAddress" value="{{$experience->address}}">
    </div>
</div>
<div class="mb-3">
    <label for="descriptioncompany" class="form-label">Descripción del cargo:</label>
    <textarea name="Description" class="form-control" id="descriptioncompany" rows="4" disabled>{{$experience->description}}</textarea>
</div>
<div class="mb-3">
    <label for="inputAchievements" class="form-label">Descripción de los logros:</label>
    <textarea name="Achievements" class="form-control" id="inputAchievements" rows="4" disabled>{{$experience->Achievements}}</textarea>
</div>
<div class="col-sm-2 mb-3">
    <label class="form-label">
        Trabajo actual
    </label>
    @if ($experience->state === 0)
        <input class="form-control" name="state" type="text" id="gridCheck" value="No">
    @else
        <input class="form-control" name="state" type="text" id="gridCheck" value="Si">
    @endif
</div>
<div class="row">
    <div class="col-sm-6 mb-3">
        <label for="inputstart" class="form-label">Fecha de inicio:</label>
        <input type="date" class="form-control" name="start" id="inputstart" value="{{$experience->start}}">
    </div>
    @if ($experience->state === 0)
    <div class="col-sm-6 mb-3" id="inputend">
        <label for="inputend" class="form-label">Fecha de terminación:</label>
        <input type="text" class="form-control" name="finish" id="inputend" value="{{$experience->finish}}">
    </div>
    @endif
</div>
<div class="mb-3">
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $experience->id }}">Eliminar</button>
</div>
<!-- Modal para confirmar eliminación -->
<div class="modal fade" id="deleteModal{{ $experience->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar la experiencia con la empresa {{ $experience->company }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('experience.destroy', $experience->id) }}" method="POST">
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