<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('clientes')}}">
            @csrf
            <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                <div class="col-md-6">
                    <input id="nombre" type="nombre" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>
                <div class="col-md-6">
                    <input id="documento" type="documento" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') }}" required autocomplete="documento" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                <div class="col-md-6">
                    <input id="direccion" type="direccion" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registrar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
