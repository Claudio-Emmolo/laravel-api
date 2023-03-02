@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <a href="{{ route('projects.index') }}" class="btn btn-dark m-5"><i class="fa-solid fa-arrow-left"></i></a>

    <div class="card-project container">
        <div class="row">
            <div class="col-6 text-center border">
                {{-- Img Controls --}}
                @if ($project->preview_img != null)

                    @if (!$project->isImageUrl())
                        <img src="{{ asset('storage/' . $project->preview_img) }}" class="img-fluid mb-2">
                    @else
                        <img src="{{ $project->preview_img }}" alt="{{ $project->title }}" class="img-fluid mb-2">
                    @endif
                @else
                    <img src="{{ Vite::asset('resources/img/no-img-available.jpg') }}" alt{{ $project->title }}"
                        class="img-fluid w-75 mb-2">
                @endif
            </div>
            <div class="col-6 pt-3">
                {{-- Technologie Tag --}}
                @foreach ($project->technologies as $technology)
                    <span class="badge mb-2" style="background-color: {{ $technology->color_tag }}">
                        {{ $technology->name }}
                    </span>
                @endforeach

                <h2>
                    Titolo: {{ $project->title }}
                </h2>
                <a href="{{ $project->url }}" target="_blank" class="btn btn-light"><i
                        class="fs-1 fa-brands fa-github"></i></a>
                <p>
                    Data: {{ $project->date }}<br>
                    Livello difficoltà:
                    @for ($i = 0; $i < $project->difficulty; $i++)
                        <i class="text-warning fa-solid fa-star"></i>
                    @endfor
                    <span>
                        ({{ $project->difficulty }})
                    </span><br>

                    Type:
                    @if (isset($project->type->name))
                        <span class="fw-bold text-uppercase"> {{ $project->type->name }} </span> <br>
                    @else
                        <span>Nessuna tecnologia inserita </span> <br>
                    @endif
                </p>
            </div>
        </div>

    @endsection
