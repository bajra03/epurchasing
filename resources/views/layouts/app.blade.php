<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
	@include('layouts.partials.htmlheader')
@show

<body class="skin-blue fixed sidebar-mini">
<div id="app">
	<div class="wrapper">

	@include('layouts.partials.mainheader')

	@include('layouts.partials.sidebar')

	<div class="content-wrapper">
	
		@include('layouts.partials.contentheader')

		@if (count($errors) > 0)
        <!-- Form Error List -->
	        <div class="alert alert-danger">
	        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <strong>Whoops! Something went wrong!</strong>
	            <br>
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
    	@endif

		<!-- Main content -->
		<section class="content">
			@yield('main-content')
		</section>
	</div>

	@include('layouts.partials.footer')

</div>

@section('scripts')
	@include('layouts.partials.scripts')
@show

</body>
</html>
