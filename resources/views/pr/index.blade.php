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
			Data Purchase Request
			<small>Preview all purchase request</small>
		</h1>
		<p>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-database"></i> Purchase Data</a></li>
			<li class="active">Purchase request</li>
		</ol>
	</section>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					@if(Auth::user()->isUser())
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalPr"><i class="fa fa-plus"></i> Purchase reuqest
						</button>
					@endif
					</div>
					<div class="box-body no-padding">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>PR. No</th>
									<th>Item Requested</th>
									<th>Qty Requested</th>
									<th>Request By</th>
									<th>Remark</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($pr_view as $no => $pr)

								<tr>
									<td><a href="{{ route('pr.show', $pr->id) }}">PR0{{ $pr->id }}</a></td>
									<td>{{ $pr->item->item_name }}</td>
									<td>{{ $pr->qty }}</td>
									<td>{{ $pr->user->name }}</td>
									<td>{{ $pr->remark }}</td>
									<td>
										{!! Form::open(['route' => ['pr.destroy', $pr->id], 'method' => 'DELETE']) !!}
										
										@if(Auth::user()->role === 'administrator' || Auth::user()->id === $pr->user_id)
										<a href="{{ route('pr.edit', $pr->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
										@endif
										
										@if(Auth::user()->isAdmin())
										{!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger click-warning', 'type' => 'submit']) !!} 
										@endif
										
										@if(Auth::user()->isSupplier())
											<a href="{{ route('quotations.add', $pr->id) }}" class="btn btn-info">
												<i class="fa fa-plus"> Quotation</i>
											</a>
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
						{{ $purchase_requests->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>

{{-- Modals Input Purchase Request--}}
		<div class="modal fade" id="ModalPr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">
												Input Purchase Request
										</h4>
								</div>
								<div class="modal-body">
										<div class="container-fluid">
												{!! Form::open(['route' => 'pr.store', 'method' => 'POST']) !!}
													@include('pr._form')
												{!! Form::close() !!}
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
