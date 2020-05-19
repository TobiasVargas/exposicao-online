@extends('layouts.template_publico')

@section('content')

<div class="container">

	@if(count($obras) > 0)

	<div class="row">
		@foreach ($obras as $obra)
		<div class="col-md-3 pt-2 pb-2 pl-2 pr-2">
			<div class="card" style="width: 18rem;">
				<img src="{{asset('storage/'.$obra->imagem)}}" class="card-img-top" style="width: 100%; height: 400px;">
				<div class="card-body">
					<h5 class="card-title">{{$obra->titulo}}</h5>
					<p class="card-text">Obra de {{$obra->autor}}</p>
					<p class="card-text">Cadastrado por {{$obra->user->name}}</p>
				</div>
			</div>
		</div>
		@endforeach

	</div>

	@else
	<h3 class="text-center">Ainda não existem Obras de Arte Cadastradas, faça login ou cadastre-se e comece a expor!</h3>
	@endif

</div>

@endsection