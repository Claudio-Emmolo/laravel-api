<form action="{{ route($route, $project->id) }}" method="POST" class="container" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="title" class="form-label">Project Title*</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ old('title', $project->title) }}">
        <div class="text-danger">
            @error('title')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Project Type*</label>
        <select name="type_id" id="name" class="text-uppercase">
            <option value="">---</option>
            @foreach ($typeList as $type)
                <option value="{{ $type->id }}"
                    {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
            @error('preview_img')
                {{ $message }}
            @enderror
        </select>
    </div>

    <div class="mb-3">
        <div class="section-checked d-flex">
            @foreach ($technologyList as $technology)
                <div class="form-check d-flex mx-2">
                    <input type="checkbox" class="form-check-input" id="project_technology" name="tecnologies[]"
                        value="{{ $technology->id }}"
                        @if ($errors->any()) @checked( in_array($technology->id, old('tecnologies', [])) ) > @else @checked( $project->technologies->contains($technology->id) )> @endif
                        <label for="project_technology" class="form-check-label ms-2"> {{ $technology->name }} </label>
                </div>
            @endforeach
        </div>
        <div class="text-danger">
            @error('tecnologies')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Project URL*</label>
        <input type="text" class="form-control @error('url') is-invalid @enderror" id="title" name="url"
            value="{{ old('url', $project->url) }}">
        <div class="text-danger">
            @error('url')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Project Date*</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
            value="{{ old('date', $project->date) }}">
        <div class="text-danger">
            @error('date')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="preview_img" class="form-label">Upload Preview Img</label>
        <input type="file" class="form-control @error('preview_img') is-invalid @enderror" id="preview_img"
            name="preview_img" value="{{ old('preview_img', $project->preview_img) }}">
        <div class="text-danger">
            @error('preview_img')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="difficulty" class="form-label">Project Difficulty*</label>
        <input type="number" class="form-control @error('difficulty') is-invalid @enderror" id="difficulty"
            name="difficulty" value="{{ old('difficulty', $project->difficulty) }}">
        <div class="text-danger">
            @error('difficulty')
                {{ $message }}
            @enderror
        </div>
    </div>

    {{-- <div class="mb-3">
        <label for="tecnologies" class="form-label">Tecnologies*</label>
        <input type="text" class="form-control @error('tecnologies') is-invalid @enderror" id="tecnologies"
            name="tecnologies" value="{{ old('tecnologies', $project->tecnologies) }}">
        <div class="text-danger">
            @error('tecnologies')
                {{ $message }}
            @enderror
        </div>
    </div> --}}

    <button type="submit" class="btn btn-primary">Send</button>
</form>
