@extends('layouts.adminProject')

@section('title', 'Type')

@section('main-app')

    @if (session('message'))
        <div id="alert_popUp" class="d-none" data-type="{{ session('type') }}" data-message="{{ session('message') }}"></div>
    @endif

    <table class="table container mt-5 table-hover table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th class="text-end">
                    <form action="{{ route('admin.types.store') }}" method="POST" class="d-flex justify-content-end">
                        @csrf
                        <input type="text" name="name" class="form-control w-25 @error('name') is-invalid @enderror"
                            placeholder="Enter your type">
                        <button class="btn btn-primary">
                            <i class="fa-regular fa-square-plus"></i> Add Type
                        </button>
                    </form>
                    @error('name')
                        <div class="text-danger text-end">
                            {{ $message }}
                        </div>
                    @enderror
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($typeList as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>

                    <td class="text-end">
                        <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-success"><i
                                class="fa-solid fa-pen-to-square"></i></a>

                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="form-delete d-inline"
                            tag="{{ $type->title }}">
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
