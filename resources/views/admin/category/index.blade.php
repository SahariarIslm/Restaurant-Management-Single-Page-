@extends('layouts.app')

@section('title','Category')

@push('css')
@endpush

@section('content')
<div class="content">
	<div class="container-fluid">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<a href="{{route('category.create')}}" class="btn btn-primary">Add New Category</a>
	    		
	    		@include('layouts.partial.msg')


	      		<div class="card">
		        <div class="card-header card-header-primary">
		          	<h4 class="card-title ">All Slider</h4>
		          	
	        	</div>
	        		<div class="card-body">
	          			<div class="table-responsive">
	            			<table  id="table" class="table table-striped" style="width:100%">
					            <thead class=" text-primary">
					                <th>
					                  	ID
					                </th>
					                <th>
					                  	Name
					                </th>
					                <th>
					                  	Slug
					                </th>
					                <th>
					                  	Created At
					                </th>
					                <th>
					                  	Updated At
					                </th>
					                <th>Action</th>
					            </thead>
					            <tbody>
					            	@foreach($categories as $key=>$category)
					                <tr>
						                <td>
						                    {{$key+1}}
						                </td>
					                    <td>
					                    	{{$category->name}}
					                    </td>
					                    <td>
					                    	{{$category->slug}}
					                    </td>
					                    <td>
					                    	{{ date('d-M-y', strtotime($category->created_at)) }}
					                    </td>
					                    <td>
					                    	{{ date('d-M-y', strtotime($category->updated_at)) }}
					                    </td>
					                    <td>
					                    	<a href="{{route('category.edit',$category->id)}}" class="btn btn-info waves-effect btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
									        <form method="POST" id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" style="display: none;" >
									        	@csrf
									        	@method('DELETE')
									        </form>
									        <button type="button" class="btn btn-danger btn-sm" 
									        onclick="
									        if(confirm('Are you sure to delete this?')){
									        	event.preventDefault();
									        	document.getElementById('delete-form-{{$category->id}}').submit();
									        }else{
									        	event.preventDefault();
									        }"
									        ><i class="material-icons">delete</i></button>

					                    </td>
					                </tr>
					                @endforeach
					            </tbody>
				            </table>
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