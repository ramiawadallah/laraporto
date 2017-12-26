@extends('layouts.admin')
@section('title') {{ trans('lang.users') }}  @endsection
@section('content')
{!! bsForm::start(['route'=>['admin.users.update',$user->id],'files'=>true,'method'=>'put','title'=>'user_info']) !!}
    
    <div class="col-md-12">
    	{!! bsForm::text('name',$user->name) !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::text('phone',$user->phone)!!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::email('email',$user->email) !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::password('password') !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::password('password_confirmation') !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::radio('rule',[
    		'user'=> trans('lang.User'),
    		'editor'=> trans('lang.Editor'),
    		'admin'=> trans('lang.Admin'),
    	],$user->rule) !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::radio('gender',[
    		'male'=> trans('lang.male'),
    		'female'=> trans('lang.female'),
    	],$user->gender) !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::textarea('info',$user->info) !!}
    </div>

    <div class="col-md-6">
        <div class="form-group">
			<label>{{ trans('lang.select_image') }}</label>
			<br>
			<div class="fileinput fileinput-new" data-provides="fileinput">
				<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
					<?php
					if(empty($user->photo)){
						$photo = "unknown_image.png";
					}else{
						$photo = $user->photo;
					}
					?>
					{{ Html::image('/uploads/'. $photo, $user->name, ['class' =>' responsive'])}}
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

    <div class="col-md-12">
        <br>
    </div>

    <div style="margin-bottom: 50px !important; margin-top: 30px !important;" class="col-md-12">
        <button type="submit" class="btn btn-lg btn-success btn-block">{{ trans('lang.save')}}</button>
    </div>
@endsection