<div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
	{!! Form::label('item_name', 'Item Name') !!}
	{!! Form::text('item_name', null, ['class' => 'form-control', 'id' => 'item_name', 'placeholder' => 'Item Name...' ]) !!}
	{!! $errors->first('item_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
	{!! Form::label('category', 'Category') !!}
	{!! Form::select('category', [
			'alcohol' => 'Alcohol', 
			'beverage' => 'Beverage',
			'food' => 'Food', 
			'wine' => 'Wine', 
			'other' => 'Other'
		], null, ['class' => 'form-control', 'id' => 'category', 'placeholder' => '-- Category --' ]) !!}
	{!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
	{!! Form::button(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>
