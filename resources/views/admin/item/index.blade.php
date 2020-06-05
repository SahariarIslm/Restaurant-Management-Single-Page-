@extends('layouts.app')

@section('title','Item')

@push('css')
@endpush

@section('content')
<div class="content">
	<div class="container-fluid">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<a href="{{route('item.create')}}" class="btn btn-primary">Add New Item</a>
	    		
	    		@include('layouts.partial.msg')


	      		<div class="card">
		        <div class="card-header card-header-primary">
		          	<h4 class="card-title ">All Items</h4>
		          	
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
					                  	Category
					                </th>
					                <th>
					                	Description
					                </th>
					                <th>
					                	Price
					                </th>
					                <th>
					                 	Image
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
					            	@foreach($items as $key=>$item)
					                <tr>
						                <td>
						                    {{$key+1}}
						                </td>
					                    <td>
					                    	{{$item->name}}
					                    </td>
					                    <td>
					                    	{{$item->category->name}}
					                    </td>
					                    <td>
					                    	{{str_limit($item->description,30)}}
					                    </td>
					                    <td>
					                    	$ {{$item->price}}
					                    </td>
					                    <td>
					                    	<img style="height: 90px; width: 90px" src="{{asset('uploads/item/'.$item->image)}}">
					                    	
					                    </td>
					                    <td>
					                    	{{ date('d-M-y h-m', strtotime($item->created_at)) }}
					                    </td>
					                    <td>
					                    	{{ date('d-M-y h-m', strtotime($item->updated_at)) }}
					                    </td>
					                    <td>
					                    	<a href="{{route('item.edit',$item->id)}}" class="btn btn-info waves-effect btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
								        <form method="POST" id="delete-form-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" style="display: none;" >
								        	@csrf
								        	@method('DELETE')
								        </form>
								        <button type="button" class="btn btn-danger btn-sm" 
								        onclick="
								        if(confirm('Are you sure to delete this?')){
								        	event.preventDefault();
								        	document.getElementById('delete-form-{{$item->id}}').submit();
								        }else{
								        	event.preventDefault();
								        }"
								        ><i class="material-icons">delete</i></button>

					                    </td>
					                </tr>
					                @endforeach
					            </tbody>
				            </table>
				            {{ $items->links() }}
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