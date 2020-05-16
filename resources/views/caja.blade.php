@extends('layout.base')
@section('content')
<div class="container">
	<a href="{{route('index')}}" class="btn btn-secondary">Inicio</a>
	<div class="row mt-4">
		<div class="col-12 align-text-center">
			<h1>Cash register</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		 	<form action="{{route('caja.add')}}" method="POST">
		 		@csrf
		 		<div class="form-group">
		 			<label class=""><h3>Beverage</h3></label>
		 			<select class="form-control" name="beverage">
		      	<option value="houseblend">House Blend <small> - $0.89</small></option>
		      	<option value="darkroast">Dark Roast <small> - $0.99</small></option>
		      	<option value="espresso">Espresso <small> - $1.99</small></option>
		      	<option value="decaf">Decaf <small> - $1.05</small></option>
	    		</select>
		 		</div>
		 		<h3 class="mb-0">Condiments</h3><small style="color: gray;">MAX: 5 for each</small>
		 		<div class="form-group row mt-4">
		 			<label for="inputPassword" class="col-sm-3 col-form-label">Milk <small>$ 0.10</small></label>
			    <div class="col-sm-9">
			      <input type="number" class="form-control" min="0" max="5" value="0" id="milk" name="milk">
			    </div>
		 		</div>
		 		<div class="form-group row">
		 			<label for="inputPassword" class="col-sm-3 col-form-label">Mocha <small>$ 0.20</small></label>
			    <div class="col-sm-9">
			      <input type="number" class="form-control" min="0" max="5" value="0" id="mocha" name="mocha">
			    </div>
		 		</div>
		 		<div class="form-group row">
		 			<label for="inputPassword" class="col-sm-3 col-form-label">Soy <small>$ 0.15</small></label>
			    <div class="col-sm-9">
			      <input type="number" class="form-control" min="0" max="5" value="0" id="soy" name="soy">
			    </div>
		 		</div>
		 		<div class="form-group row">
		 			<label for="inputPassword" class="col-sm-3 col-form-label">Whip <small>$ 0.10</small></label>
			    <div class="col-sm-9">
			      <input type="number" class="form-control" min="0" max="5" value="0" id="whip" name="whip">
			    </div>
		 		</div>
		 		<button type="submit" class="btn btn-primary mb-2 col-5">Add</button>
		 	</form>
	 </div>
	 <div class="col-md-6">
	 	<h3>Order list</h3>
	 	<div id="list-container">
		 	<table class="table">
		 		<thead class="thead-dark" id="list-head">
		 			<th>#</th>
		 			<th>Description</th>
		 			<th>Cost</th>
		 		</thead>
		 		<tbody>
		 			@if(isset($orderList))
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
	 	</div>
		 	<div class="d-flex flex-column align-items-end" id="list-total">
		 		<p>Sub-total: $ {{ number_format(Session('subTotal'), 2, '.', ',') ?? '0.00'}}</p>
		 		<p>TAX: $ {{ number_format(Session('tax'), 2, '.', ',') ?? '0.00'}}</p>
		 		<p>Total: $ {{ number_format(Session('total'), 2, '.', ',') ?? '0.00'}}</p>
		 	</div>
		 	
		 		<form action="{{route('caja.store')}}" method="POST" class="d-flex justify-content-around" >
		 			@csrf
	 				<button type="submit" class="btn btn-success mt-2 col-5">Pay</button>
	 				<a class="btn btn-secondary mt-2 col-5" href="{{route('pdf')}}"> print receipt </a>
		 		</form>

	 	</div>
	</div>
</div>

@endsection