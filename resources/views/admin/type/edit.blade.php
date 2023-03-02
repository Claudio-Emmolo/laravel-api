@extends('layouts.adminProject')

@section('title', 'Type')

@section('main-app')
    <section id="form" class="d-flex pt-5">
        <a href="{{ route('admin.types.index') }}" class="ms-5 btn btn-dark"><i class="fa-solid fa-arrow-left"></i></a>
        <form action="{{ route('admin.types.update', $type->id) }}" method="POST" class="m-auto">
            @csrf
            @method('PUT')
            <h2 class="text-center">Edit <span class="text-primary"> {{ $type->name }}</span></h2>
            <input type="text" name="name" value="{{ old('name', $type->name) }}"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            <button class="btn btn-success d-block mx-auto mt-3">Save</button>
        </form>

    </section>

@endsection
