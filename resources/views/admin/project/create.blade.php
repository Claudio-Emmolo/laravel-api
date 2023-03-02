@extends('layouts.adminProject')

@section('title', 'New Project')

@section('main-app')
<h1 class="fw-bold my-5 text-center">Create new project</h1>


@include('admin.project.partials.formCreateEdit', ['route'=>'admin.projects.store', 'method'=>'POST'])
@endsection