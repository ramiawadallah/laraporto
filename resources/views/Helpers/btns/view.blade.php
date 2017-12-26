<?php 

	$href = !empty($url) ? $url : url()->current().'/'.$id;

		

?>
@if(!empty($attr))
	<div class="col-md-4 col-xs-12">
		<a href="{{ $href }}" 
			@foreach($attr as $key => $value)
			{{ $key }}="{{ $value }}" &nbsp

			@endforeach

			class="btn btn-info btn-sm btn-icon icon-left"
			>
			<i class="entypo-info"></i> 
			{{ trans('lang.view') }}
		</a>
	</div>
@else
	<div class="col-md-4 col-xs-12 btn" >
		<a href="{{ $href }}" title="{{ trans('lang.view') }}" class="btn btn-info btn-sm btn-icon icon-left btn-block">
		<i class="entypo-info"></i> 
		{{ trans('lang.view') }}</a>
	</div>
@endif


