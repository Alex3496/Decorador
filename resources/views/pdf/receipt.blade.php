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
				<h2>Receipt</h2>
				<p style="margin-bottom: 0px; margin-right: 0px">Coffee Elizondo S.A. <br>
				Instituto Teconologico de Tijuana <br>
				Tel: 664-3214578 <br>
				Email: manuel@gmail.com</p>
			</div>
		</div><br>
		<table class="table">
		 	<thead class="thead-dark" id="list-head">
		 		<th>#</th>
		 		<th>Description</th>
		 		<th>Cost</th>
		 	</thead>
		 	<tbody>
		 		@if(isset($orderList))
		 			<tr></tr>
			 			@foreach($orderList as $order)
			 				<tr>
			 					<td></td>
			 					<td>{{$order->description}}</td>
			 					<td>$ {{$order->cost}}</td>
			 				</tr>
			 			@endforeach
		 			@endif
		 	</tbody>
		</table>
	<br>
		<div class="row">
			<div>
				<p style="text-align: right; padding-right: 100px">Sub-total: $ {{ number_format($subTotal, 2, '.', ',') ?? '0.00'}}</p>

		 		<p style="text-align: right; padding-right: 100px">TAX: $ {{ number_format($tax, 2, '.', ',') ?? '0.00'}}</p>
		 
		 		<p style="text-align: right; padding-right: 100px">Total: $ {{ number_format($total, 2, '.', ',') ?? '0.00'}}</p>
			</div>
		</div>
		<footer style="display: block; text-align: center; border-style: double;">
			<p>Date: {{ date('Y-m-d H:i:s') }}<br>Thanks</p>
		</footer>
@endsection