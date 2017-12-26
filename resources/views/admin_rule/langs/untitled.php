<a class="btn btn-primary" data-toggle="modal" href='#modal-files-{{ $lang->id }}'>{{ trans('lang.trans_files') }}</a>		
<div class="modal fade" id="modal-files-{{ $lang->id }}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<div class="modal-body">
				<div class="lang_files_result"></div>
				<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					@foreach (langFiles($lang->code) as $key => $file)
					<li role="presentation" class="{{ $key == 0 ? 'active' : '' }}">
						<a href="#lang_files_{{ $key }}-{{ $lang->id }}" aria-controls="lang_files_{{ $key }}-{{ $lang->id }}" role="tab" data-toggle="tab">
						{{ ucfirst(explode('.', $file['name'])[0]) }}</a>
					</li>
					@endforeach
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				@foreach (langFiles($lang->code) as $key => $file)
					<div role="tabpanel" class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="lang_files_{{ $key }}-{{ $lang->id }}">
					{!! Form::open(['url'=>cp.'settings/lang/update_files']) !!}
						<div file="{{ $file['name'] }}"  dir="ltr" lang-id="{{ $lang->id }}">

						{{-- <textarea name="content[]" file="{{ $file['name'] }}" lang-id="{{ $lang->id }}" class="content form-control" id="" cols="30" rows="20"> --}}
						<?php
						// $content = file_get_contents($file['path']);
						$content = @ include $file['path'];
						?>
						{{-- </textarea> --}}
							<div class="alert" style="height:400px;overflow: auto; width: 100%; " dir="rtl">
							@foreach ($content as $k => $v)
							@if (!is_array($v))
							<div class="col-sm-3">
								<div class="form-group">
									<div class="form-control label-default">{{ $k }}</div>
								</div>
							</div>

							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name="content_{{ $file['name'] }}[]" class="form-control" value="{{ $v }}">
									<input type="hidden" name="keys_{{ $file['name'] }}[]" class="form-control" value="{{ $k }}">
								</div>
							</div>
							@endif
							@endforeach
							<div class="clearfix"></div>
							</div>
						<input type="hidden" name="fileName[]" value="{{ $file['name'] }}">
						<input type="hidden" name="lang" value="{{ $lang->id }}">
						</div>
					{!! Form::close() !!}
					</div>
				@endforeach
				</div>
				</div>
			</div>

		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('lang.close') }}</button>
		<button type="button" class="btn btn-primary lang_files_submit">{{ trans('lang.save') }}</button>
		</div>
		</div>
	</div>
</div>