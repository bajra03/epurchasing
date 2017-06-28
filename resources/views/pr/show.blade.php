@extends('layouts.app')

@section('htmlheader_title')
	{{ $page_title }}
@endsection

@section('main-content')
	@if(Session::has('message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3>Detail Purchase Request</h3>
						<hr>
					</div>
					<div class="box-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>PR. No</th>
									<th>Item Requested</th>
									<th>Qty. Requested</th>
									<th>Requested By</th>
									<th>Remark</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>PR0{{ $pr->id }}</td>
									<td>{{ $pr->item->item_name }}</td>
									<td>{{ $pr->qty }}</td>
									<td>{{ $pr->user->name }}</td>
									<td>{{ $pr->remark }}</td>
								</tr>
							</tbody>
						</table>
						<hr>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3>Quotations from supplier</h3>
						<hr>
					</div>
					<div class="box-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Supplier Name</th>
									<th>Price</th>
									<th>Term of payment</th>
									<th>Payment method</th>
									<th>Garantee</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($quote_view as $quotation)
								<tr>
									<td>{{ $quotation->user->name }}</td>
									<td>{{ $quotation->price}}</td>
									<td>{{ $quotation->top}}</td>
									<td>{{ $quotation->payment_method}}</td>
									<td>{{ $quotation->garantee}}</td>
									<td>
										{!! Form::open(['route' => ['quotations.destroy', $quotation->id], 'method' => 'DELETE']) !!}

										@if(Auth::user()->role === 'administrator' || Auth::user()->id === $quotation->user_id)

												<a href="{{ route('quotations.edit', $quotation->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
										@endif

										@if(Auth::user()->isAdmin())
										 |
										{!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger click-warning', 'type' => 'submit']) !!}
										@endif
										{!! Form::close() !!}
									</td>
								</tr>
								@empty
								<tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				@if(Auth::user()->role === 'administrator' || Auth::user()->role === 'purchasing')
					<div class="form-group">
						<a href="{{ route('pr.process', ['id' => $pr->id]) }}" class="btn btn-primary">Process PR</a>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection