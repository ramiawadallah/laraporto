
<?php
	$attributes = !empty($attributes) ? $attributes : [];
	$values = isset($value) ? $value : '';
    $style = isset($attributes['style']) ? $attributes['style'] : 'inline';
?>


<div class="form-group">
    <label>{{ trans('lang.'.$name) }}</label>    
<br>

<div class="radio radio-replace neon-cb-replacement btn-group {{ $errors->has($name) ? ' has-error' : '' }}" data-toggle="buttons">
@foreach ($options as $value => $label)
<label style="margin-right: 5px;" class="btn btn-info @if($value == $values) active @endif">
    <input type="radio" name="{{ $name }}" 
                @if($value == $values) checked @endif
                value="{{ $value }}" autocomplete="off">
    {{ $label }}
    <span class="glyphicon glyphicon-ok"></span>
</label>
@endforeach  
</div>
</div>

