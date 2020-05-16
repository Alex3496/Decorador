@extends('layout.base')
@section('content')
	<div class="container d-flex align-items-center"  style="height: 80%;">
		<div class="row" >
			<div class="offset-md-1 col-md-4 pl-0 pr-0">
				<img src="{{asset('images/logo.png')}}" style="width: 100%;">
			</div>
			<div class="col-md-5 d-flex align-items-center flex-column justify-content-center" style="background-color: white">
				<h1>Cafeteria Elizondo</h1>
				<div class="d-flex flex-column">
					<a href="{{route('caja.index')}}" class="btn btn-outline-dark mt-4" style="border-radius: 20px">CAJA</a>
					<a href="{{route('DB.index')}}" class="btn btn-outline-dark mt-4" style="border-radius: 20px">BASE DE DATOS</a>	
				</div>
			</div>
		</div>
	</div>
@endsection