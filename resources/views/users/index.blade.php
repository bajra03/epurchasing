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
			Data User
			<small>Preview all user</small>
		</h1>
		<p>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-database"></i> Master Data</a></li>
			<li class="active">Data User</li>
		</ol>
	</section>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					@if(Auth::user()->isAdmin())
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> User
						</button>
					@endif
					</div>
					<div class="box-body no-padding">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Privilege</th>
									<th>Department</th>
									<th>Position</th>									
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($users as $no => $user)
								<tr>
									<td>{{ $no + 1 }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->role }}</td>
									<td>{{ $user->department }}</td>
									<td>{{ $user->position }}</td>									
									<td>
									@if(Auth::user()->isAdmin())
										{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
										<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
											<i class="fa fa-pencil"></i> 
										</a> | 
										
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
									<td>-</td>
								</tr>
								@endforelse
							</tbody>
						</table>
						{{ $users->links() }}
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
							Input User
						</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							{!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
								@include('users._form')
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			<div>
		</div>
@endsection
