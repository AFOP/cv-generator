<div class="row">
    <div class="col">
        <hr>
    </div>
    <div class="col-auto">
        <h3 class="text-center">Información de contacto</h3>
    </div>
    <div class="col">
        <hr>
    </div>
</div>
@foreach ($contacts as $contact)
    <form class="row flex-wrap g-3">
        <div class="col-sm-6 form-group">
            <label class="form-label" for="firts_name">Nombres:</label>
            <input type="text" name="firts_name" id="firts_name" class="form-control" value="{{ $contact->firts_name }}" disabled>
        </div>
        <div class="col-sm-6 form-group">
            <label class="form-label" for="last_name">Apellidos:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $contact->last_name }}" disabled>
        </div>    
        <div class="col-sm-6 form-group">
            <label class="form-label" for="address">Dirección:</label>
            <input type="text" name="address" id="address" aria-label="Address" class="form-control" value="{{ $contact->address }}" disabled>
        </div>
        <div class="col-sm-6 form-group">
            <label class="form-label" for="phone">Celular: (+57)</label>
            <input type="text" name="phone" id="phone" aria-label="Phone" class="form-control" value="{{ $contact->phone }}" disabled>
        </div>
        @if(isset($contact->url))
            <div class="col-sm-6 form-group">
                <label class="form-label" for="email">Correo electrónico:</label>
                <input type="text" name="email" id="email" aria-label="Email" class="form-control" value="{{ $contact->email }}" disabled>
            </div>
            <div class="col-sm-6 mb-3 form-group">
                <label class="form-label" for="url">URL Linkedln:</label>
                <input type="text" name="url" id="url" aria-label="Url" class="form-control" value="{{ $contact->url }}" disabled>
            </div>
        @else
            <div class="col-sm-6 mb-3 form-group">
                <label class="form-label" for="email">Correo electrónico:</label>
                <input type="text" name="email" id="email" aria-label="Email" class="form-control" value="{{ $contact->email }}" disabled>
            </div>
        @endif
    </form>
@endforeach
