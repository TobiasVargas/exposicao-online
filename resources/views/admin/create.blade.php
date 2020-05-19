@extends('layouts.template_admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="col-md-8 offset-md-2 pt-5 pb-5">
                <form action="{{route('publicacoes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Titulo da Obra</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor da Obra</label>
                        <input type="text" class="form-control" id="autor" name="autor">
                    </div>
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input type="number" class="form-control" id="ano" name="ano">
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="file" class="form-control-file" id="imagem" name="imagem">
                    </div>
                    <input type="submit" value="Publicar Obra" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection