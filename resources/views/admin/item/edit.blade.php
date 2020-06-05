@extends('layouts.app')

@section('title','Slider')

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
		          	<h4 class="card-title ">Update Item</h4>     	
	        	</div>
	        		<div class="card-body">
	          			<form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data" >
	          				@csrf
	          				@method('PUT')
	          				<div class="row">
		                        <div class="col-md-12">
			                        <div class="form-group">
			                            <label class="bmd-label-floating">Name</label>
			                            <input type="text" value="{{$item->name}}" class="form-control" name="name">
			                        </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-12">
			                        <div class="form-group">
									    <label for="">Select Category</label>
									    <select class="form-control" name="category_id" >
									    	@foreach($categories as $category)
									        <option {{$category->id == $item->category_id ? 'selected' : ''}} value="{{$category->id}}" >{{$category->name}}</option>
									        @endForeach
									    </select>
									</div>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-12">
			                        <div class="form-group label-floating">
			                            <label class="control-label">Description</label>
			                            <textarea name="description" class="form-control" rows="5">{{$item->description}}</textarea>
			                        </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-12">
			                        <div class="form-group label-floating">
			                            <label class="control-label">Price</label>
			                            <input type="number" min="0" value="{{$item->price}}" class="form-control" name="price">
			                        </div>  
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-12">
			                            <label class="control-label">Image</label>
			                            <input type="file"name="image"> 
		                        </div>
		                    </div>
		                    <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
		                    <button type="submit" class="btn btn-primary" >Update</button>
	          			</form>
	        		</div>
	      		</div>
	    	</div>
	    </div>
	</div>
</div>
@endsection

@push('js')
@endpush