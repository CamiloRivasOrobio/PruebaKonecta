@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include ("registrarClientes")
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $clientes)
                    <tr>
                        <th scope="row">{{ $clientes->id }}</th>
                        <td>{{ $clientes->nombre }}</td>
                        <td> {{ $clientes->documento }} </td>
                        <td> {{ $clientes->email }} </td>
                        <td> {{ $clientes->direccion }} </td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$clientes->id}}">
                                Editar
                            </button></td>
                        <td><a type="button" class="btn btn-danger" href="{{route('clientesDelete', $clientes->id)}}">Eliminar</a></td>
                    </tr>

                    <div class="modal fade" id="staticBackdrop{{$clientes->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="row">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modificar {{$clientes->id}}</h5>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{route('clientesEditar', $clientes->id)}}">
                                    @csrf
                                    <br>
                                    <div class="form-group row">
                                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                        <div class="col-md-6">
                                            <input id="nombre" value="{{$clientes->nombre}}" type="nombre" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>
                                        <div class="col-md-6">
                                            <input id="documento" value="{{$clientes->documento}}" type="documento" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') }}" required autocomplete="documento" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" value="{{$clientes->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                                        <div class="col-md-6">
                                            <input id="direccion" value="{{$clientes->direccion}}" type="direccion" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Modificar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
@endsection
