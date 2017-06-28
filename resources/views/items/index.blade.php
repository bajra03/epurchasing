@extends('layouts.app')

@section('htmlheader_title')
	{{$page_title}}
@endsection


@section('main-content')
	@if(Session::has('message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
	<section class="content-header">	
      	<h1>
      	    Data Item
      		<small>Preview all item</small>
      	</h1>
      	<p>
      	<ol class="breadcrumb">
      	    <li><a href="#"><i class="fa fa-database"></i> Master Data</a></li>
      	    <li class="active">Data Item</li>
      	</ol>
    </section>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					@if(Auth::user()->isAdmin())
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Item
						</button>
					@endif
					</div>
					<div class="box-body no-padding">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Item Name</th>
									<th>Category</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($items as $no => $item)
								<tr>
									<td>{{ $no + 1 }}</td>
									<td>{{ $item->item_name }}</td>
									<td>{{ $item->category }}</td>
									<td>
									@if(Auth::user()->isAdmin())
										{!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'DELETE']) !!}
										<a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> | 
										
										{!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger click-warning', 'type' => 'submit']) !!}
										{!! Form::close() !!}
									@endif
									</td>
								</tr>
								@empty
								<tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>
								@endforelse
							</tbody>
						</table>
						{{ $items->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
{{-- Modals --}}
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">
												Input Item
										</h4>
								</div>
								<div class="modal-body">
										<div class="container-fluid">
												{!! Form::open(['route' => 'items.store', 'method' => 'POST']) !!}
													@include('items._form')
												{!! Form::close() !!}
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
