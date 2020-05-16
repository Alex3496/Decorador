@extends('layout.base')
@section('content')
	<div class="container" style="height: 120%">
		@error('email')
      <small class="mt-0" style="color:red">{{ $message }}</small>
    @enderror
		<div class="card mt-4">
			<div class="card-body">
				<form action="{{route('DB.index')}}" method="GET">
					@csrf
				  <div class="row">
				    <div class="col">
				      <input type="text" class="form-control" name="description" placeholder="Description" 
				      value="{{ $description ?? '' }}">
				    </div>
				    <div class="col">
				      <input type="date" class="form-control" name="date" value="{{ $date ?? '' }}">
				    </div>
				    <div class="col-2">
				    	<button type="submit" class="btn btn-primary btn-block">Search</button>	
				    </div>
				    <div class="col-2">
				    	<a href="{{route('DB.prueba')}}" class="btn btn-secondary btn-block">Clear</a>	
				    </div>
				  </div>
				</form>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col">
				<h2>Results</h2>
			</div>
		</div>

		<div class="card mt-4">
			<div class="card-body">
				<table class="table table-hover table-striped">
		 		<thead class="thead-dark" id="list-head">
		 			<th>Id</th>
		 			<th>Description</th>
		 			<th>Cost</th>
		 			<th>Date</th>
		 		</thead>
		 		<tbody>
		 			@if(isset($orders))
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
		 	@if(isset($orders))
				{{$orders->render()}} 			
		 	@endif
			</div>
		</div>

		<div class="row">
			<div class="offset-md-8 col-4 mt-4">
				<button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#sendEmail">PDF</button>
			</div>
		</div>
	</div>


<!-- Modal -->
<div class="modal fade" id="sendEmail" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Send PDF to:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('DB.sendEmail')}}" method="POST">
      	@csrf
      	<div class="modal-body">
      		<input type="email" name="emailTo" class="form-control" placeholder="Email">
      		@error('email')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Send</button>
      	</div>
    </form>
    </div>
  </div>
</div>

@endsection