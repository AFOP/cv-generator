@extends('components.app-master')

@section('content')
    <main class="container">
        @include('components.form-contact', ['contacts' => $general['contacts']])
        @include('components.form-profile', ['profiles' => $general['profiles']])
        @include('components.form-experience', ['experiences' => $general['experiences']])
        @include('components.form-education', ['educations' => $general['educations']])
        <a href="{{ route('download-pdf') }}" class="btn btn-primary mb-3" target="_blank">Descargar PDF</a>
    </main>
@endsection
