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
						<h3>Edit Quotation</h3>
					</div>
					<div class="box-body">
						<div class="box-body">
							{{-- {{ dd($pr) }} --}}
							{!! Form::model($quotations, ['route' => ['quotations.update', $quotations->id], 'method' => 'PATCH']) !!}
								@include('quotations._form', ['model' => $quotations])
							{!! Form::close() !!}
						</div>
					</div>	
				</div>			
			</div>
		</div>
	</div>
@endsection