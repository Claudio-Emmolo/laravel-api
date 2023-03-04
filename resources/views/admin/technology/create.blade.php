@extends('layouts.adminProject')

@section('title', 'Type')

@section('main-app')
    <section id="form" class="d-flex pt-5">
        @include('admin.technology.partials.formCreateEdit', [
            'route' => 'admin.technologies.store',
            'method' => 'POST',
        ])
    </section>

@endsection
