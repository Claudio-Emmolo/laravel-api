@extends('layouts.adminProject')

@section('title', 'Admin Pannel')


@section('main-app')
    <div class="container mb-5">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <section id="dashboard" class="p-4">
            <h1 class="mb-5">
                <span class="text-uppercase">
                    Welcome
                </span>
                <span class="fw-bold">
                    {{ Auth::user()->name }} !
                </span>
            </h1>

            <div class="line-separator"></div>


            <div class="report">
                <h3 class="fw-bold text-uppercase text-center mb-5">Your activities:</h3>

                <div class="row justify-content-around">
                    <div class="col-4 single-repo">
                        <div class="text-center">
                            <h4 class="text-uppercase fw-bold text-primary">Projects</h4>
                            <span class="fs-2 text-success">{{ $projectCount }}</span>
                        </div>
                    </div>

                    <div class="col-4 single-repo">
                        <div class="text-center">
                            <h4 class="text-uppercase fw-bold text-primary">Projects Delete</h4>
                            <span class="fs-2 text-danger">{{ $trashCount }}</span>
                        </div>
                    </div>
                </div>

                <div class="line-separator"></div>

                <h3 class="fw-bold text-uppercase text-center mb-5">Last Project Create</h3>

                <div class="row justify-content-around">

                    <div class="col-4 single-repo">
                        <div class="text-center">
                            <h4 class="text-uppercase fw-bold text-primary">Date</h4>
                            <span class="fs-2">{{ $lastProject->date }}</span>
                        </div>
                    </div>

                    <div class="col-4 single-repo">
                        <div class="text-center">
                            <h4 class="text-uppercase fw-bold text-primary">Title</h4>
                            <span class="fs-2">{{ $lastProject->title }}</span>
                        </div>
                    </div>

                    <div class="col-4 single-repo">
                        <div class="text-center">
                            <h4 class="text-uppercase fw-bold text-primary">Difficulty</h4>
                            @for ($i = 0; $i < $lastProject->difficulty; $i++)
                                <i class="mt-2 fs-4 text-warning fa-solid fa-star"></i>
                            @endfor
                            <span>
                                ({{ $lastProject->difficulty }})
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-4 single-repo position-relative text-center">
                        <h4 class="text-uppercase fw-bold text-primary text-center">CARD</h4>

                        {{-- GitHub Link --}}
                        <div class="box-date position-absolute top-25 p-1 git-hover">
                            <a href="{{ $lastProject->url }}" target="_blank">
                                <i class="fs-4 fa-brands fa-github text-dark bg-light rounded-circle"></i>
                            </a>
                        </div>

                        <div class="text-center">

                            {{-- Img Controls --}}
                            @if ($lastProject->preview_img != null)

                                @if (!$lastProject->isImageUrl())
                                    <img src="{{ asset('storage/' . $lastProject->preview_img) }}"
                                        alt{{ $lastProject->title }}" class="img-fluid w-75 mb-2">
                                @else
                                    <img src="{{ $lastProject->preview_img }}" alt="{{ $lastProject->title }}"
                                        alt{{ $lastProject->title }}" class="img-fluid mb-2">
                                @endif
                            @else
                                <img src="{{ Vite::asset('resources/img/no-img-available.jpg') }}"
                                    alt{{ $lastProject->title }}" class="img-fluid w-75 mb-2">
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="line-separator"></div>


        </section>
    @endsection
