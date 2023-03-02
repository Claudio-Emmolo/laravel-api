@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1 class="fw-bold text-uppercase text-center mt-5">Recent Projects</h1>

        <div class="row row-cols-3 mb-5">
            @foreach ($projectList as $project)
                <div class="col g-4 position-relative">

                    {{-- GitHub Link --}}
                    <div class="box-date position-absolute top-0 p-3 git-hover">
                        <a href="{{ $project->url }}" target="_blank">
                            <i class="fs-1 fa-brands fa-github text-dark bg-light rounded-circle"></i>
                        </a>
                    </div>

                    <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none">
                        <div class="p-2 home-card h-100">
                            {{-- Img Controls --}}
                            @if ($project->preview_img != null)
                                @if (!$project->isImageUrl())
                                <img src="{{ asset('storage/' . $project->preview_img) }}" @else <img
                                        src="{{ $project->preview_img }}" @endif
                                @else
                                    <img src="{{ Vite::asset('resources/img/no-img-available.jpg') }}" @endif
                                    alt{{ $project->title }}"
                                    class="img-fluid w-100 h-75 mb-2">

                                    <div class="row">
                                        <h3 class="text-dark">{{ $project->title }}</h3>
                                    </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="scoll-pagination d-flex align-items-center justify-content-center mb-5">
            {{-- Previus Page --}}
            <a href="{{ $projectList->previousPageUrl() }}" class="text-decoration-none">
                <i class="fs-1 fa-solid fa-chevron-left"></i>
            </a>

            <span class="fs-1 fw-bold mx-5">
                {{ $projectList->currentPage() }}
            </span>

            {{-- Next Page --}}
            <a href="{{ $projectList->nextPageUrl() }}">
                <i class="fs-1 fa-solid fa-chevron-right" class="text-decoration-none"></i>
            </a>
        </div>


    </div>
@endsection
