<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	{!! Form::label('name', 'Name') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Employee Name...' ]) !!}
	{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
	{!! Form::label('email', 'Email') !!}
	{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email...' ]) !!}
	{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
	{!! Form::label('password', 'Password') !!}
	{!! Form::text('password', '', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password...' ]) !!}
	{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
	{!! Form::label('role', 'Privileges') !!}
	{!! Form::select('role', ['administrator' => 'Administrator', 'supplier' => 'Supplier', 'purchasing' => 'Purchasing', 'staff' => 'Staff'], null, ['class' => 'form-control', 'id' => 'role', 'placeholder' => '-- Privileges --' ]) !!}
	{!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
	{!! Form::label('department', 'Department') !!}
	{!! Form::select('department', ['accounting' => 'Accounting', 'engineering' => 'Engineering', 'housekeeping' => 'Housekeeping', 'FB' => 'Food and Beverage', 'FO' => 'Front Office', 'SPA' => 'SPA', 'HR' => 'Human Resource' ], null, ['class' => 'form-control', 'id' => 'department', 'placeholder' => '-- Department --']) !!}
	{!! $errors->first('department', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
	{!! Form::label('position','Position') !!}
	{!! Form::select('position', ['manager' => 'Manager', 'staff' => 'Staff', 'supervisor' => 'Supervisor'], null, ['class' => 'form-control', 'id' => 'position', 'placeholder' => '-- Position --']) !!}
	{!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
	{!! Form::button(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>