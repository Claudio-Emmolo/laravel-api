<form action="{{ route($route, $technology->id) }}" method="POST" class="container">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="title" class="form-label">Technology Name*</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name"
            value="{{ old('name', $technology->name) }}">
        <div class="text-danger">

            @error('name')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Technology Color Tag*</label>
        <input type="color" class="form-control @error('color_tag') is-invalid @enderror" id="title"
            name="color_tag" value="{{ old('color_tag', $technology->color_tag) }}">
        <div class="text-danger">

            @error('color_tag')
                {{ $message }}
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
</form>
