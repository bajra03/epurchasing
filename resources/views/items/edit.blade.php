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
						<h1>
							Edit Data Item
						</h1>
					</div>
					<div class="box-body">
						{!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'PATCH']) !!}
						@include('items._form', ['model' => $item])
					{!! Form::close() !!}
					</div>	
				</div>			
			</div>
		</div>
	</div>
@endsection