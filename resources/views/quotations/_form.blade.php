@if(isset($model))
	{{ Form::hidden('id', $quotations->id, ['id' => 'invisible_id']) }}
@endif

{{ Form::hidden('pr_id', $pr->id, ['id' => 'invisible_id']) }}
{{ Form::hidden('user_id', Auth::user()->id, ['id' => 'invisible_id']) }}
{{ Form::hidden('k5', $pr->k5, ['id' => 'invisible_id']) }}


<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
	{!! Form::label('price','Price') !!}
	{!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Price..']) !!}
	{!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('top') ? 'has-error' : '' }}">
	{!! Form::label('top','Term of payment') !!}
	{!! Form::text('top', null, ['class' => 'form-control', 'id' => 'top', 'placeholder' => 'Term of payment..']) !!}
	{!! $errors->first('top', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
	{!! Form::label('payment_method', 'Payment method') !!}
	{!! Form::select('payment_method', [
			'cash' => 'Cash', 
			'credit' => 'Credit',
			], null, ['class' => 'form-control', 'id' => 'payment_method', 'placeholder' => '-- Payment method --' ]) !!}
	{!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('garantee') ? 'has-error' : '' }}">
	{!! Form::label('garantee', 'Garantee') !!}
	{!! Form::text('garantee', null, ['class' => 'form-control', 'id' => 'garantee', 'placeholder' => 'Garantee...' ]) !!}
	{!! $errors->first('garantee', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
	{!! Form::button(isset($model) ? 'Update' : 'Input', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>