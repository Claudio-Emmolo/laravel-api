@extends('layouts.adminProject')

@section('title', 'Projects')

@section('main-app')

    @if (session('message'))
        <div id="alert_popUp" class="d-none" data-type="{{ session('type') }}" data-message="{{ session('message') }}"></div>
    @endif

    <table class="table container mt-5 table-hover table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">URL</th>
                <th scope="col">Date</th>
                <th scope="col">Difficulty</th>
                <th class="text-end">
                    @if ($trashCount > 0)
                        <a href="{{ route('admin.trash') }}" class="btn btn-dark">
                            <span>x{{ $trashCount }}</span>
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    @endif
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i
                            class="fa-regular fa-square-plus"></i> New Project</a>

                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projectList as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td class="text-center">
                        <a href=" {{ $project->url }}" target="_blank" class="btn btn-light">
                            <i class="fs-4 fa-brands fa-github"></i>
                        </a>
                    </td>
                    <td>{{ $project->date }}</td>
                    <td>
                        @for ($i = 0; $i < $project->difficulty; $i++)
                            <i class="text-warning fa-solid fa-star"></i>
                        @endfor
                        <span>
                            ({{ $project->difficulty }})
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-success"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                            class="form-delete d-inline" tag="{{ $project->title }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                @empty
                    <td>
                        <p>No items to show</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="container">
        {{ $projectList->links() }}
    </div>


@endsection

@section('script')
    @vite(['resources/js/deleteConfirm.js'])
@endsection
