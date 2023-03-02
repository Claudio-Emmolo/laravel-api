@extends('layouts.adminProject')

@section('title', "Edit - $project->title")

@section('main-app')
<h1 class="fw-bold my-5 text-center">Edit project</h1>


@include('admin.project.partials.formCreateEdit', ['route'=>'admin.projects.update', 'method'=>'PUT'])
@endsection