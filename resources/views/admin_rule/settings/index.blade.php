@extends('layouts.admin')
@section('title') {{ trans('lang.settings') }}  @endsection
@section('content')

{!! bsForm::start(['route'=>['admin.settings.update',1],'files'=>true,'method'=>'put']) !!}

	{{ $settings->trans('title') }}

	<div class="row" @if(app()->getLocale() == 'ar') style="text-align: right; padding-right: 30px;" @endif() >
		<div class="row">
			<div class="col-md-8 div-marg">

				{!! bsForm::translate(function($form,$lang){
                    $form->text('title',site('title',$lang));
                    $form->text('subtitle',site('subtitle',$lang));
                    $form->text('copyright',site('copyright',$lang));
                    $form->text('address',site('address',$lang));
                    $form->textarea('desc',site('desc',$lang));
                }) !!}

				{!! bsForm::text('email',site('email')) !!}

				{!! bsForm::text('phone',site('phone')) !!}

				{!! bsForm::text('fax',site('fax')) !!}

				{!! bsForm::text('pobox',site('pobox')) !!}

				{!! bsForm::text('map',site('map')) !!}

				{!! bsForm::text('keywords',site('keywords')) !!}

				{!! bsForm::text('facebook',site('facebook')) !!}

				{!! bsForm::text('twitter',site('twitter')) !!}

				{!! bsForm::text('linkedin',site('linkedin')) !!}

				{!! bsForm::text('instagram',site('instagram')) !!}

				{!! bsForm::text('youtube',site('youtube')) !!}

				<label>{{ trans('lang.maintenance')}}</label>
				<div data-toggle="buttons">
					<label class="btn btn-lg btn-info {{ $settings->maintenance == 'open' ? 'active' : '' }}"><input tabindex="8" class="icheck-11" type="radio" id="minimal-radio-2-11" value="open" name="maintenance">{{ trans('lang.maintenance_open') }}</label>
					<label class="btn btn-lg btn-info {{ $settings->maintenance == 'close' ? 'active' : '' }}"><input tabindex="8" class="icheck-11" type="radio" id="minimal-radio-2-11" value="close" name="maintenance">{{ trans('lang.maintenance_close') }}</label>
				</div>

			</div>


			<div class="col-md-4 div-img-marg">
				<div class="col-md-11">
					<div class="form-group">
							<label>{{ trans('lang.select_image') }}</label>
						<br>
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
								<?php
								if(empty($settings->photo)){
									$photo = "unknown_image.png";
								}else{
									$photo = $settings->photo;
								}
								?>
								{{ Html::image('/uploads/'. $photo, $settings->title, ['class' =>' responsive'])}}
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 360px; max-height: 190px"></div>
							<div>
								<span class="btn btn-white btn-file">
								  <span class="fileinput-new"> {{ trans('lang.select_image') }} </span>
								  <span class="fileinput-exists"> {{ trans('lang.change') }} </span>
								  <input type="file" name="photo" accept="image/*">
								</span>
								<a href="javascript:;" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"> {{ trans('lang.remove') }} </a>
							</div>
						</div>
					</div>
				</div>
			</div>

		<div class="col-xs-12">
			<br>
		</div>

		<div class="col-xs-12">
			<button type="submit" class="btn btn-lg btn-success btn-block">{{ trans('lang.save')}}</button>
		</div>

		<div class="col-xs-12">
			<br>
		</div>

	</div>

	{!! Form::close() !!}


@endsection