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
			Data Purchase Order
			<small>Preview all purchase order</small>
		</h1>
		<p>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-database"></i> Purchase Data</a></li>
			<li class="active">Purchase order</li>
		</ol>
	</section>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body no-padding">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>PO. No</th>
									<th>Item Requested</th>
									<th>Requested By</th>
									<th>Quantity Requested</th>
									<th>Supplier Selected</th>
									<th>Price</th>
									<th>Grand Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($purchase_orders as $po)
								<tr>
									<td>PO0{{ $po->id }}</td>
									<td>{{ $po->purchase_request->item->item_name }}</td>
									<td>{{ $po->purchase_request->user->name }}</td>
									<td>{{ $po->purchase_request->qty }}</td>
									<td>{{ $po->quotation->user->name }}</td>
									<td>{{ $po->quotation->price }}</td>
									<td>{{ $po->grand_total }}</td>
									<td>
										@if(Auth::user()->isAdmin())
										{!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger click-warning', 'type' => 'submit']) !!} 
										@endif
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						{{ $purchase_orders->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
