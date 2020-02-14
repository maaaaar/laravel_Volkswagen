@extends('templates.plantilla')


@section('titulo')
    {{ $titulo }}
@endsection

@section('principal')

    <div class="card mt-2 border-seconsary">
        <div class="card-header bg-secondary text-light"> Coche </div>
        <div class="card-body">
            <form action="{{ action('CocheController@store') }}" method="post" enctype="multipart/form-data"> {{-- multipart para enviar ficheros --}}
                @csrf
                <div class="form-group row">
                    <label for="txtNombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" name="nombre" id="txtNombre" class="form-control" placeholder="Nombre de coche" aria-describedby="helpid">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtDescripcion" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-10">
                        <input type="text" name="descripcion" id="txtDescripcion" class="form-control" placeholder="Descripción del coche" aria-describedby="helpid">
                    </div>
                </div>

                {{-- ESCOGER FICHERO --}}
                <div class="form-group row">
                    <label for="txtImagen" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="file" name="imagen" id="txtImagen" class="form-control" placeholder="Imagen del coche" aria-describedby="helpid">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-2">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                        <a name="" id="" class="btn btn-secondary" href="" role="button">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
