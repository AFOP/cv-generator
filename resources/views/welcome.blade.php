@extends('components.app-master')

@section('content')
<main class="container">
        @includeWhen($general['contacts']->isNotEmpty(), 'components.form-contact', ['contacts' => $general['contacts']])
        @includeWhen($general['profiles']->isNotEmpty(), 'components.form-profile', ['profiles' => $general['profiles']])
        @includeWhen($general['experiences']->isNotEmpty(), 'components.form-experience', ['experiences' => $general['experiences']])
        @includeWhen($general['educations']->isNotEmpty(), 'components.form-education', ['educations' => $general['educations']])

        @unless($general['contacts']->isNotEmpty() || $general['profiles']->isNotEmpty() || $general['experiences']->isNotEmpty() || $general['educations']->isNotEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No hay datos disponibles.
            </div>
        @endunless

        <a href="{{ route('download-pdf') }}" class="btn btn-primary mb-3" target="_blank">Descargar PDF</a>
    </main>
@endsection
