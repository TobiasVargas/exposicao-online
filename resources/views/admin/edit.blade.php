@extends('layouts.template_admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="col-md-8 offset-md-2 pt-5 pb-5">
                <form action="{{url('publicacoes/'.$obra->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titulo">Titulo da Obra</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{$obra->titulo}}">
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor da Obra</label>
                        <input type="text" class="form-control" id="autor" name="autor" value="{{$obra->autor}}">
                    </div>
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input type="number" class="form-control" id="ano" name="ano" value="{{$obra->ano}}">
                    </div>
                    <div class="form-group">
                        <label for="img">Imagem Atual</label>
                        <img src="{{asset('storage/'.$obra->imagem)}}" style="height: 80px; width: 80px;" id="img">
                    </div>
                    <div class="form-group">
                        <label for="imagem">Nova Imagem</label>
                        <input type="file" class="form-control-file" id="imagem" name="imagem">
                    </div>
                    <input type="submit" value="Atualizar Publicação" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection