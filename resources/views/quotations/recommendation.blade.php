@extends('layouts.app')

@section('htmlheader_title')
	{{$page_title}}
@endsection

@section('main-content')
@if(Auth::user()->role === 'administrator' || Auth::user()->role === 'purchasing')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box">
					<div class="box-body">
						<h3>
							Recommended Supplier
						</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="box">
									<div class="box-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Supplier Name</th>
													<th>Price</th>
													<th>Term of payment</th>
													<th>Payment type</th>
													<th>Garantee</th>
													<th>Score</th>
												</tr>
											</thead>
											<tbody>
											@foreach($quotations as $quote)
												<tr>
													<td>{{ $quote->user->name }}</td>
													<td>{{ $quote->price }}</td>
													<td>{{ $quote->top }}</td>
													<td>{{ $quote->payment_method }}</td>
													<td>{{ $quote->garantee }}</td>
													<td>{{ $quote->score }}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

							{!! Form::open(['route' => 'po.process', 'method' => 'POST']) !!}
								
								{{ Form::hidden('user_id', $user->id, ['id' => 'invisible_id']) }}
								{{ Form::hidden('pr_id', $purchase_requests->id, ['id' => 'invisible_id']) }}
								
								<div class="form-group">
									{!! Form::label('quotation_id', 'Select Supplier') !!}
									{!! Form::select('quotation_id', $reduce
											, null, ['class' => 'form-control', 'id' => 'quotation_id', 'placeholder' => '-- Select Supplier --' ]) !!}
								</div>
								{!! Form::button('Process PO', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
								
							{!! Form::close() !!}
						</div>
					</div>	
				</div>	
			</div>			
		</div>
	</div>
@endif
@endsection