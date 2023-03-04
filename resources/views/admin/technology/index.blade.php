@extends('layouts.adminProject')

@section('title', 'Technology')

@section('main-app')

    @if (session('message'))
        <div id="alert_popUp" class="d-none" data-type="{{ session('type') }}" data-message="{{ session('message') }}"></div>
    @endif

    <h1 class="text-center mt-3">Technologies</h1>

    <table class="table container mt-5 table-hover table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th class="text-end">
                    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary"><i
                            class="fa-regular fa-square-plus"></i> New Project</a>
                    @error('name')
                        <div class="text-danger text-end">
                            {{ $message }}
                        </div>
                    @enderror
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tecnologyList as $tecnology)
                <tr>
                    <td>{{ $tecnology->id }}</td>
                    <td>{{ $tecnology->name }}</td>
                    <td class="d-flex align-items-center">
                        <div class="box-color me-3" class="w-25 h-25" style="background-color: {{ $tecnology->color_tag }}">
                        </div>
                        {{ $tecnology->color_tag }}
                    </td>

                    <td class="text-end">
                        <a href="{{ route('admin.technologies.edit', $tecnology->id) }}" class="btn btn-success"><i
                                class="fa-solid fa-pen-to-square"></i></a>

                        <form action="{{ route('admin.technologies.destroy', $tecnology) }}" method="POST"
                            class="form-delete d-inline" tag="{{ $tecnology->name }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                @empty
                    <td>
                        <p>No type to show</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection

@section('script')
    @vite(['resources/js/deleteConfirm.js'])
@endsection
