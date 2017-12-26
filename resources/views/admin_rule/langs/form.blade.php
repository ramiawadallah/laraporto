<div class="col-xs-6">
		{!!bsForm::text('name') !!}
    	{!!bsForm::text('code') !!}
	</div>
	
	<div class="col-xs-6">
	    <div class="form-group">
	    	<label>{{ trans('lang.direction') }}</label>
			<div data-toggle="buttons">
				<label class="btn btn-lg  btn-gray {{ $lang->direction == 'ltr' ? 'active' : '' }}"><input tabindex="8" class="icheck-11" type="radio" id="minimal-radio-2-11" name="direction">{{ trans('lang.ltr') }}</label>
				<label class="btn btn-lg  btn-gray {{ $lang->direction == 'rtl' ? 'active' : '' }}"><input tabindex="8" class="icheck-11" type="radio" id="minimal-radio-2-11" name="direction">{{ trans('lang.rtl') }}</label>
			
			    <label class="btn btn-lg  btn-default @if($lang->default == 1) active @endif()">
					<input type="checkbox" name="default" value="1" autocomplete="off">
					{{ trans('lang.default') }}
					<span class="glyphicon glyphicon-ok"></span>
				</label>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				  {{ trans('lang.select_flug') }}
				</button>
			</div>
		</div>
  	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{ trans('lang.select_flug') }}</h4>
	      </div>
	      <div class="modal-body ">

	      <table class="">
	        <tbody>
	            <tr>
	            	<div class="form-group">
			        <div data-toggle="buttons">
						<?php $i = 0; ?>
						@foreach (flugs() as $flug)
							<?php $i++; ?>

								<label class="btn {{ $lang->flug == $flug['file'] ? 'btn-primary' : 'btn-default' }} flug_btn btn-circle"><input type="radio"  name="flug" value="{{ $flug['file'] }}"><img src="{{ $flug['url'] }}" /></label>
							@if ($i==13)
							<?php $i = 0; ?>
							@endif
						@endforeach
					 </div>
			       </div>
		        </tr>
		     </tbody>
			</table>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('lang.continue') }}</button>
	      </div>
	    </div>
	  </div>
	</div>

    

	<div class="col-xs-12">
    	{!! bsForm::end(['submit'=>'save']) !!}
    </div>