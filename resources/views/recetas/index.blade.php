@extends('layouts.app')
@section('botones')
    <a href="{{route('recetas.create')}}" class="btn btn-primary mr-2 text-white">Crear Receta</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Categoria</th>
                <th scole="col">Acciones</th>

            </tr>
            </thead>
            <tbody>
            @foreach($recetas as $receta)
                <tr>

                    <td>

                        {{$receta->titulo}}
                    </td>
                    <td>{{$receta->categoria->nombre}}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{route('recetas.show',$receta->id)}}" class="dropdown-item">Ver</a>
                                <a href="{{route('recetas.edit',$receta->id)}}" class="dropdown-item">Editar</a>

                                <button class="dropdown-item">Eliminar</button>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
