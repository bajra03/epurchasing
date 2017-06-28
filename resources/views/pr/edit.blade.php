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
						<h3>
							Edit Purchase Request
						</h3>
						<hr>
					</div>
					<div class="box-body">
					{{-- {{ dd($pr) }} --}}
						{!! Form::model($pr, ['route' => ['pr.update', $pr->id], 'method' => 'PATCH']) !!}
							@include('pr._form', ['model' => $pr])
						{!! Form::close() !!}
					</div>	
				</div>			
			</div>
		</div>
	</div>
@endsection