{{ Form::hidden('user_id', Auth::user()->id, array('id' => 'invisible_id')) }}

<div class="form-group">
	{!! Form::label('item_id','Item Request') !!}
	{!! Form::select('item_id', $items, null, ['class' => 'form-control', 'id' => 'item_id', 'placeholder' => '-- Items --']) !!}
</div>

<div class="form-group {{ $errors->has('qty') ? 'has-error' : '' }}">
	{!! Form::label('qty', 'Quantity Request') !!}
	{!! Form::text('qty', null, ['class' => 'form-control', 'id' => 'qty', 'placeholder' => 'Quantity requested...' ]) !!}
	{!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('remark') ? 'has-error' : '' }}">
	{!! Form::label('remark', 'Remark') !!}
	{!! Form::textarea('remark', null, ['class' => 'form-control', 'id' => 'remark']) !!}
	{!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
	{!! Form::button(isset($model) ? 'Update' : 'Input', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>