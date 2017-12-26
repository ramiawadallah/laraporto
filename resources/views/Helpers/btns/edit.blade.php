<?php 

	$href = !empty($url) ? $url : url()->current().'/'.$id.'/edit';	

?>

@if(!empty($attr))
	<div class="col-md-4 col-xs-12 btn">
		<a href="{{ $href }}" 

		@foreach($attr as $key => $value)
		{{ $key }}="{{ $value }}" &nbsp

		@endforeach

		title="{{ trans('lang.edit') }}" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-edite"></i> {{ trans('lang.edit') }}</a>
	</div>
@else
	<div class="col-md-4 col-xs-12 btn">
		<a href="{{ $href }}" title="{{ trans('lang.edit') }}" class="btn btn-default btn-sm btn-icon btn-block icon-left"><i class="entypo-pencil"></i> {{ trans('lang.edit') }}</a>
	</div>
@endif


