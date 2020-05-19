@extends('layouts.template_admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="col-md-8 offset-md-2 pt-5 pb-5">
                <a href="{{route('publicacoes.create')}}" class="btn btn-primary btn-block">Nova Obra</a>
                @if(count($obras) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor da Obra</th>
                            <th>Ano</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obras as $obra)
                        <tr>
                            <td>{{$obra->titulo}}</td>
                            <td>{{$obra->autor}}</td>
                            <td>{{$obra->ano}}</td>
                            <td>
                                <img src="{{asset('/storage/'.$obra->imagem)}}" style="height: 40px; width: 40px;">
                            </td>
                            <td>
                                <form action="{{url('publicacoes/'.$obra->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{url('publicacoes/'.$obra->id.'/edit')}}" class="btn btn-primary">Editar</a>
                                    <input type="submit" value="Excluir" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-center">Cadastre sua primeira obra</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection