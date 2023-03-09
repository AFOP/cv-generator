<form>
    <div class="row">
            <div class="col">
                <hr>
            </div>
            <div class="col-auto">
                <h3 class="text-center">Experiencia Profesional</h3>
            </div>
            <div class="col">
                <hr>
            </div>
    </div>
    @foreach ($experiences as $experience)
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="inputcompany" class="form-label">Nombre de la empresa:</label>
                <input type="text" name="company" class="form-control" id="inputcompany" value="{{$experience->company}}" disabled>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="inputAddress" class="form-label">Dirección de la empresa:</label>
                <input type="text" name="address" class="form-control" id="inputAddress" value="{{$experience->address}}" disabled>
            </div>
        </div>
        <div class="mb-3">
            <label for="descriptioncompany" class="form-label">Descripción del cargo:</label>
            <textarea name="Description" class="form-control" id="descriptioncompany" readonly wrap="soft" style="height: auto; resize: none;">{{$experience->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="inputAchievements" class="form-label">Descripción de los logros:</label>
            <textarea name="Achievements" class="form-control" id="inputAchievements" readonly wrap="soft" style="height: auto; resize: none;">{{$experience->Achievements}}</textarea>
        </div>
        <div class="col-sm-4 mb-3">
            <label class="form-label">
                Trabajo actual
            </label>
            @if ($experience->state === 0)
                <input class="form-control" name="state" type="text" id="gridCheck" value="No" disabled>
            @else
                <input class="form-control" name="state" type="text" id="gridCheck" value="Si" disabled>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="inputstart" class="form-label">Fecha de inicio:</label>
                <input type="text" class="form-control" name="start" id="inputstart" value="{{$experience->start}}" disabled>
            </div>
            @if ($experience->state === 0)
                <div class="col-sm-6 mb-3" id="inputend">
                    <label for="inputend" class="form-label">Fecha de terminación:</label>
                    <input type="text" class="form-control" name="finish" value="{{$experience->finish}}" disabled>
                </div>
            @endif    
        </div>
        <hr>
    @endforeach
</form>
<script>
    // Obtener el elemento que contiene el texto
    var description = document.getElementById('descriptioncompany');
    var achievements = document.getElementById('inputAchievements');
    
    // Establecer la altura del contenedor según la altura del contenido
    description.style.height = container.scrollHeight + 3 + "px";
    achievements.style.height = container.scrollHeight + 3 + "px";
</script>
