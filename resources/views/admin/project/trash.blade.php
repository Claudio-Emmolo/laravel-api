@extends('layouts.adminProject')

@section('title', 'Trash')

@section('main-app')

    <a href="{{ route('admin.projects.index') }}" class="btn btn-dark m-5"><i class="fa-solid fa-hand-point-left"></i></a>


    @if (session('message'))
        <div id="alert_popUp" class="d-none" data-type="{{ session('type') }}" data-message="{{ session('message') }}"></div>
    @endif

    <table class="table container mt-5">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">URL</th>
                <th scope="col">Date</th>
                <th scope="col">Difficulty</th>
                <th class="text-end">
                    Functions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projectList as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>
                        <a href=" {{ $project->url }}" class="btn btn-light">
                            <i class="fs-4 fa-brands fa-github"></i>
                        </a>
                    </td>
                    <td>{{ $project->date }}</td>
                    <td>{{ $project->difficulty }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.restore', $project->id) }}" class="btn btn-success"><i
                                class="fa-solid fa-rotate-left"></i></a>
                        <form action="{{ route('admin.forceDelete', $project->id) }}" method="POST"
                            class="form-delete d-inline" tag="{{ $project->title }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                @empty
                    <td>
                        <p>No items in trash</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- <div class="container">
    {{ $projectList->links() }}
  </div> --}}


@endsection

@section('script')
    @vite(['resources/js/deleteConfirm.js'])
@endsection
