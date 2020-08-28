@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css">
@endsection

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Listado de recetas</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-8 mx-auto bg-white p-3">
        <form action="{{route('recetas.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-group">
                <label>Titulo Receta</label>
                <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror"
                       placeholder="Titulo Receta" value="{{old('titulo')}}">
                @error('titulo')
                <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control @error('titulo') is-invalid @enderror">
                    <option value="">--seleccione--</option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}" {{old('categoria') == $categoria->id? 'selected':''}}>{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                @error('categoria')
                <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="preparacion">Preparación</label>
                <input type="hidden" id="preparacion" name="preparacion" value="{{old('preparacion')}}">
                <trix-editor class="@error('preparacion') is-invalid @enderror"
                             input="preparacion"></trix-editor>
                @error('preparacion')
                <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="ingredientes">Ingredientes</label>
                <input type="hidden" id="ingredientes" name="ingredientes" value="{{old('ingredientes')}}">
                <trix-editor class=" @error('ingredientes') is-invalid @enderror"
                             input="ingredientes"></trix-editor>
                @error('ingredientes')
                <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Elige la Imagen</label>
                <input type="file" id="imagen" class="form-control @error('imagen') is-invalid @enderror" name="imagen">
                @error('imagen')
                <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar Receta" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js"></script>
@endsection
