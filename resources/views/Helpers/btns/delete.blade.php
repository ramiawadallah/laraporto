<?php 

if(!empty($name))
{
	$name = $name ;
}elseif(empty($name) && empty($options['name']))
{
	$name = trans('lang.thefield');

}elseif(!empty($options['name'])){
	$name =$options['name'];
}
	$options = !empty($options) ? $options :'';

	if (is_numeric($options))
	{
		$url = url()->current().'/'.$options;
	}elseif(is_array($options)){
		$url = isset($options['url']) ? $options['url'] : url()->current();
	}else{
		$url = url()->current();
	}

?>

@if(is_array($options))

<div class="col-md-4 col-xs-12 btn">
{{ Form::open(['url' => [$url], 'method' => 'DELETE']) }}
		<button type="submit" class="btn btn-danger btn-sm btn-icon icon-left btn-block" onclick="return confirm('{{trans('lang.delete_msg',['var'=>$name])}}')"

			@foreach($options as $key => $value)
				@if ($key != 'url')
					{{ $key }}="{{ $value }}" &nbsp
				@endif
			@endforeach
			class="btn-default"

		>
            <i class="entypo-cancel"></i>{{ trans('lang.delete') }}</button>
        </div>
{{Form::close()}}
</div>
@else
<div class="col-md-4 col-xs-12 btn">
{{ Form::open(['url' => [$url], 'method' => 'DELETE']) }}
		<button type="submit" class="btn btn-danger btn-sm btn-icon btn-block icon-left" onclick="return confirm('{{trans('lang.delete_msg',['var'=>$name])}}')">
            <i class="entypo-cancel"></i>{{ trans('lang.delete') }}</button>
        </div>
{{Form::close()}}
</div>

@endif


