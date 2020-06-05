@extends('layouts.app')

@section('title','Slider')

@push('css')
@endpush

@section('content')
<div class="content">
	<div class="container-fluid">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<a href="{{route('slider.create')}}" class="btn btn-primary">Add New Slider</a>
	    		
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
					                  	Title
					                </th>
					                <th>
					                  	Sub Title
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
					            	@foreach($sliders as $key=>$slider)
					                <tr>
						                <td>
						                    {{$key+1}}
						                </td>
					                    <td>
					                    	{{$slider->title}}
					                    </td>
					                    <td>
					                    	{{$slider->sub_title}}
					                    </td>
					                    <td>
					                    	<img style="height: 90px; width: 110px" src="{{asset('uploads/slider/'.$slider->image)}}">
					                    	
					                    </td>
					                    <td>
					                    	{{ date('d-M-y h-m', strtotime($slider->created_at)) }}
					                    </td>
					                    <td>
					                    	{{ date('d-M-y h-m', strtotime($slider->updated_at)) }}
					                    </td>
					                    <td>
					                    	<a href="{{route('slider.edit',$slider->id)}}" class="btn btn-info waves-effect btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
        <form method="POST" id="delete-form-{{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" style="display: none;" >
        	@csrf
        	@method('DELETE')
        </form>
        <button type="button" class="btn btn-danger btn-sm" 
        onclick="
        if(confirm('Are you sure to delete this?')){
        	event.preventDefault();
        	document.getElementById('delete-form-{{$slider->id}}').submit();
        }else{
        	event.preventDefault();
        }"
        ><i class="material-icons">delete</i></button>

					                    </td>
					                </tr>
					                @endforeach
					            </tbody>
				            </table>
				            {{ $sliders->links() }}
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