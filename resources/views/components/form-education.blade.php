<form>
    <div class="row">
            <div class="col">
                <hr>
            </div>
            <div class="col-auto">
                <h3 class="text-center">Educación</h3>
            </div>
            <div class="col">
                <hr>
            </div>
    </div>
    @foreach ($educations as $education)
        <div class="col-sm-4 mb-3">
            <label for="inputeducation" class="form-label">Tipo de educación:</label>
            <input type="text" class="form-control" id="inputeducation" value="{{ $education->type }}" disabled>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="inputcompany" class="form-label">Nombre de Institución Educativa:</label>
                <input type="text" class="form-control" id="inputcompany" value="{{ $education->ie }}" disabled>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="inputAddress" class="form-label">Dirección de la institución Educativa:</label>
                <input type="text" class="form-control" id="inputAddress" value="{{ $education->address }}" disabled>
            </div>
        </div>
        @if ($education->Achievements === 'null')
            <div class="mb-3">
                <label for="inputAchievements" class="form-label">Descripción de los logros:</label>
                <textarea class="form-control" id="inputAchievements" value="{{ $education->Achievements }}" readonly wrap="soft" style="height: auto; resize: none;"></textarea>
            </div>
        @endif
        <div class="col-sm-2 mb-3">
            @if (!$education->state === 0)
                <label class="form-label">
                    Estudiando actualmente:
                </label>
                <input class="form-control" name="state" type="text" id="gridCheck" value="Si" disabled>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="inputstart" class="form-label">Fecha de inicio:</label>
                <input type="text" class="form-control" name="start" id="inputstart" value="{{$education->start}}" disabled>
            </div>
            @if ($education->state === 0)
                <div class="col-sm-6 mb-3" id="inputend">
                    <label for="inputend" class="form-label">Fecha de terminación:</label>
                    <input type="text" class="form-control" name="finish" value="{{$education->finish}}" disabled>
                </div>
            @endif    
        </div>
        <hr>
    @endforeach
</form>
<script>
    // Obtener el elemento que contiene el texto
    var achievements = document.getElementById('inputAchievements');
    
    // Establecer la altura del contenedor según la altura del contenido
    achievements.style.height = container.scrollHeight + 3 + "px";
</script>
