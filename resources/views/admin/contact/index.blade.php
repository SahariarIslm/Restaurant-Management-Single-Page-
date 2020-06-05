@extends('layouts.app')

@section('title','Contact Messages')

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
		          	<h4 class="card-title ">All Contact Messages</h4>		          	
	        	</div>
	        		<div class="card-body">
	          			<div class="table-responsive">
	            			<table  id="table" class="table table-striped" style="width:100%">
					            <thead class=" text-primary">
					                <th>ID</th>
					                <th>Name</th>
					                <th>Email</th>
					                <th>Subject</th>
					                <th>Message</th>
					                <th>Messaged At</th>
					                <th>Action</th>
					            </thead>
					            <tbody>
					            	@foreach($contacts as $key=>$contact)
					                <tr>
						                <td>
						                    {{$key+1}}
						                </td>
					                    <td>
					                    	{{$contact->name}}
					                    </td>
					                    <td>
					                    	{{$contact->email}}
					                    </td>
					                    <td>
					                    	{{$contact->subject}}
					                    </td>
					                    <td>
					                    	{{str_limit($contact->message,40)}}
					                    </td>
					                    <td>
					                    	{{ date('d-M-y h-m', strtotime($contact->created_at)) }}
					                    </td>
										<td>
											<a href="{{route('contact.show',$contact->id)}}" class="btn btn-info waves-effect btn-sm">
                                                <i class="material-icons">source</i>
                                            </a>
											<form method="POST" id="delete-form-{{$contact->id}}" action="{{route('contact.destroy',$contact->id)}}" style="display: none;" >
												@csrf
												@method('DELETE')
											</form>
											<button type="button" class="btn btn-danger btn-sm" 
											onclick="
												if(confirm('Are you sure to delete this?')){
													event.preventDefault();
													document.getElementById('delete-form-{{$contact->id}}').submit();
												}else{
													event.preventDefault();
												}">
													<i class="material-icons">delete</i>
											</button>

										</td>

										
					                </tr>
					                @endforeach
					            </tbody>
				            </table>
				            {{ $contacts->links() }}
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