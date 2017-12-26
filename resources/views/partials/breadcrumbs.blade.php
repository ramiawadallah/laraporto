<br>
<ol class="breadcrumb" >
	<li> 
		<a href="{{ url(Request::segment(1)) }}"> <i class="entypo-folder"></i> {{trans('lang.dashbord')}}</a>
	</li> 
	<?php $sublink = ''; ?>
	@for($i=2; $i < 10; $i++)
		@if(!empty(Request::segment($i)) and !is_numeric(Request::segment($i)))
		@if($i != 2)
			<?php $sublink .= '/'; ?>
		@endif
		<?php  $sublink .= Request::segment($i); ?>
			<li>
				<a href="{{ url( Request::segment(1).'/'.$sublink ) }}">{{ trans('lang.'.Request::segment($i)) }}</a></li> 
			</li> 
		@endif
	@endfor

</ol>