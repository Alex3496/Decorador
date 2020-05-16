@extends('layout.basepdf')
@section('content')
	<div>
		<div class="row">
			<div class="col" style="height: 20px; background-color: brown" >
			</div>
		</div>
		<div class="row">
			<div class="col-5">
			<img src="{{asset('images/logo.png')}}" style="height: 200px; " >
			</div>
			<div style="margin-left: 230px">
				<h2>Results</h2>
				<p style="margin-bottom: 0px; margin-right: 0px">Coffee Elizondo S.A. <br>
				Instituto Teconologico de Tijuana <br>
				Tel: 664-3214578 <br>
				Email: manuel@gmail.com</p>
			</div>
		</div><br>
		<table class="table table-hover table-striped">
		 		<thead class="thead-dark" id="list-head">
		 			<th>Id</th>
		 			<th>Description</th>
		 			<th>Cost</th>
		 			<th>Date</th>
		 		</thead>
		 		<tbody>
		 			@if(isset($orders))
		 			<tr></tr>
			 			@foreach($orders as $order)
			 				<tr>
			 					<td>{{$order->id}}</td>
			 					<td>{{$order->description}}</td>
			 					<td>$ {{$order->cost}}</td>
			 					<td>{{$order->created_at}}</td>
			 				</tr>
			 			@endforeach
		 			@endif
		 		</tbody>
		 	</table>
	<br>
		<footer style="display: block; text-align: center; border-style: double;">
			<p>Date: {{ date('Y-m-d H:i:s') }}
		</footer>
@endsection