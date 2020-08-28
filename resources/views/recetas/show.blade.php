@extends('layouts.app')
@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Listado de recetas</a>
@endsection
@section('content')

    <article class="col-md-10 mx-auto bg-white p-3">
        <h1 class="text-center mb4">{{$receta->titulo}}</h1>
        <div class="receta-meta">
            <div class="col-12">
                <img src="{{asset('storage/'.$receta->imagen)}}" class="img-fluid">
            </div>
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{$receta->categoria->nombre}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                {{$receta->user->name}}
            </p>
            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!! $receta->ingredientes !!}
            </div>
            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparacion</h2>
                {!! $receta->preparacion !!}
            </div>
        </div>
    </article>
@endsection
