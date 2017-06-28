@extends('layouts.app')

@section('htmlheader_title')
	{{ $page_title }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box">
					<div class="box-header">
						<h3>Input Quotation</h3>
						<hr>
					</div>
					<div class="box-body">
							<div class="box-body">
								{!! Form::open(['route' => 'quotations.store', 'method' => 'POST']) !!}
									@include('quotations._form')
								{!! Form::close() !!}
							</div>
					</div>	
				</div>			
			</div>
		</div>
	</div>
@endsection