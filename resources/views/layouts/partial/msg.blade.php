@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          		<i class="material-icons">close</i>
        	</button>
        	<span><b>{{ $error }}</b></span>
        </div>
    @endforeach
@endif

@if(session('successMsg'))
	<div class="alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          		<i class="material-icons">close</i>
        	</button>
        	<span><b>{{session('successMsg') }}</b></span>
        </div>
@endif