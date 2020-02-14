@extends('templates.plantilla')


@section('titulo')
    {{ $titulo }}
@endsection

@section('principal')

    {{-- Bucle para mostrar todos los coches de l'array --}}
    {{-- <div class="card-deck" > --}}
    @foreach ($coches as $coche)
        <div class="card m-4 float-left" style="width: 450px;" >
            <img class="card-img-top" src="{{ asset( 'storage/' . $coche->imagen)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $coche->nombre }}</h5>
                <p class="card-text text-center">{{  $coche->descripcion }}</p>
            </div>
            <div class="card-footer">
                <form action="{{ action('CocheController@delete', ['nombre'=> $coche->nombre ]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </div>

        </div>

    @endforeach
    {{-- </div> --}}
@endsection


