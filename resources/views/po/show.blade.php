@extends('layouts.app')

@section('htmlheader_title')
	{{ $page_title }}
@endsection

@section('main-content')
	<section class="content-header">
		<h1>
			Show Purchase Request
		</h1>
		<p>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-database"></i> Purchase Data</a></li>
			<li class="active">Show Purchase Request</li>
		</ol>
	</section>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box">
					<div class="box-body">
						<form role="form">
							<div class="box-body">
								<fieldset disabled>
									<div class="form-group">
										<label>Requested By</label>
										<input type="text" id="disabledTextInput" class="form-control" placeholder="Bajra">
									</div>
									<div class="form-group">
										<label>Department</label>
										<input type="text" id="disabledTextInput" class="form-control" placeholder="Accounting">
									</div>
									<div class="form-group">
										<label>Item Request</label>
										<input type="text" id="disabledTextInput" class="form-control" placeholder="Coke">
									</div>
									<div class="form-group">
										<label>Quantity</label>
										<input type="text" id="disabledTextInput" class="form-control" placeholder="50">
									</div>
									<div class="form-group">
										<label>Remark</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
								</fieldset>
								<hr>
								<h3>
									Quotation from supplier
								</h3>
								<div class="row">
									<div class="col-md-12">
										<div class="box">
											<div class="box-body">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>#</th>
															<th>Supplier Name</th>
															<th>Price</th>
															<th>Term of payment</th>
															<th>Payment type</th>
															<th>Garantee</th>
															<th colspan="2">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>Legacy</td>
															<td>16000</td>
															<td>30 day</td>
															<td>Credit</td>
															<td>7 day</td>
															<td width="5%">
																<a href="{{ url('pr-edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
															</td>
															<td width="5%">
																<a href="#" class="btn btn-danger click-warning"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>Wintech</td>
															<td>16500</td>
															<td>14 day</td>
															<td>Credit</td>
															<td>7 day</td>
															<td width="5%">
																<a href="{{ url('pr-edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
															</td>
															<td width="5%">
																<a href="#" class="btn btn-danger click-warning"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>Wahyu Utama</td>
															<td>17000</td>
															<td>7 day</td>
															<td>Credit</td>
															<td>7 day</td>
															<td width="5%">
																<a href="{{ url('pr-edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
															</td>
															<td width="5%">
																<a href="#" class="btn btn-danger click-warning"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
														<tr>
															<td>4</td>
															<td>Blitech</td>
															<td>17500</td>
															<td>30 day</td>
															<td>Credit</td>
															<td>7 day</td>
															<td width="5%">
																<a href="{{ url('pr-edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
															</td>
															<td width="5%">
																<a href="#" class="btn btn-danger click-warning"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<a href="{{ url('supplier-recommendation') }}" class="btn btn-primary">Process PO</a>
								</div>
							</div>	
						</form>
					</div>	
				</div>			
			</div>
		</div>
	</div>
@endsection