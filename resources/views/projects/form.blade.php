<div class="container">
    <h1 class="text-center my-2">{{ $title }}</h1>

    <div class="row justify-content-center mt-4">
        <div class="col-12 col-sm-8 col-md-6">
            <form action="{{ $route }}" method="POST">
                @csrf
                @isset($update)
                    @method("PUT")
                @endisset
                <div class="card">
                    <div class="card-body">
                        <label for="name">{{ __("Nombre") }}</label>
                        <input name="name" value="{{ old("name") ?? $project->name }}" type="text" class="form-control" id="name">
                        <small class="form-text text-muted">{{ __("Nombre del proyecto") }}</small>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <label for="description">{{ __("Descripcion") }}</label>
                        <textarea class="form-control" name="description" rows="5" id="description">{{ old("description") ?? $project->description }}</textarea>
                        <small class="form-text text-muted">{{ __("¿De qué trata tu proyecto?") }}</small>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div class="text-center">
                            <button class="btn btn-lg btn-success" type="submit">
                                {{ $textButton }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>