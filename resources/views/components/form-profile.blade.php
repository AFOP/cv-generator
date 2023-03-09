<div class="row">
    <div class="col">
        <hr>
    </div>
    <div class="col-auto">
        <h3 class="text-center">Perfil profesional</h3>
    </div>
    <div class="col">
        <hr>
    </div>
</div>
@foreach ($profiles as $profile)
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Descripción:</label>
    <textarea class="form-control" id="exampleFormControlInput1" readonly wrap="soft" style="height: auto; resize: none;">{{$profile->description }}</textarea>
</div>
@endforeach
<script>
    // Obtener el elemento que contiene el texto
    var container = document.getElementById('exampleFormControlInput1');
    
    // Establecer la altura del contenedor según la altura del contenido
    container.style.height = container.scrollHeight + 3 + "px";
</script>
