@extends('layouts.app')

@section('title','Reservations')

@push('css')
@endpush

@section('content')
<div class="content">
	<div class="container-fluid">
	  	<div class="row">
	    	<div class="col-md-12">
	    		@include('layouts.partial.msg')
	      		<div class="card">
		        <div class="card-header card-header-primary">
		          	<h4 class="card-title ">All Reservation Requests</h4>		          	
	        	</div>
	        		<div class="card-body">
	          			<div class="table-responsive">
	            			<table  id="table" class="table table-striped" style="width:100%">
					            <thead class=" text-primary">
					                <th>ID</th>
					                <th>Name</th>
					                <th>Phone</th>
					                <th>Email</th>
					                <th>Date & Time</th>
					                <th>Message</th>
					                <th>Status</th>
					                <th>Requested At</th>
					                <th>Action</th>
					            </thead>
					            <tbody>
					            	@foreach($reservations as $key=>$reservation)
					                <tr>
						                <td>
						                    {{$key+1}}
						                </td>
					                    <td>
					                    	{{$reservation->name}}
					                    </td>
					                    <td>
					                    	{{$reservation->phone}}
					                    </td>
					                    <td>
					                    	{{$reservation->email}}
					                    </td>
					                    <td>
					                    	{{$reservation->date_and_time}}
					                    </td>
					                    <td>
					                    	{{$reservation->message}}
					                    </td>
					                    <td>
					                  		@if($reservation->status == 0)
					                  			<label class="badge badge-danger">Pending</label>
					                  		@else
					                  			<label class=" badge badge-success">Confirmed</label>
					                  		@endif
					                    </td>
					                    <td>
					                    	{{ date('d-M-y h-m', strtotime($reservation->created_at)) }}
					                    </td>
										<td>
											<form method="POST" action="{{route('reservation.confirm',$reservation->id)}}" id="update-form-{{$reservation->id}}" action="" style="display: none;" >
												@csrf
												@method('Put')
											</form>
											<button type="button" class="btn btn-success btn-sm" onclick="
													if(confirm('Are you sure to Confirm this?')){
														event.preventDefault();
														document.getElementById('update-form-{{$reservation->id}}').submit();
													}else{
														event.preventDefault();
													}" {{$reservation->status == true ? 'disabled' : ''}} >
										        <i class="material-icons">done</i>
										    </button>

										<form method="POST" id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" style="display: none;" >
											@csrf
											@method('DELETE')
										</form>
										<button type="button" class="btn btn-danger btn-sm" 
										onclick="
										if(confirm('Are you sure to delete this?')){
											event.preventDefault();
											document.getElementById('delete-form-{{$reservation->id}}').submit();
										}else{
											event.preventDefault();
										}"
										><i class="material-icons">delete</i></button>

										</td>
					                </tr>
					                @endforeach
					            </tbody>
				            </table>
				            {{ $reservations->links() }}
	          			</div>
	        		</div>
	      		</div>
	    	</div>
	    </div>
	</div>
</div>
@endsection

@push('js')
@endpush