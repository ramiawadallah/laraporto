@extends('layouts.admin')
@section('title') {{ trans('lang.users') }}  @endsection
@section('content')
{!! bsForm::start(['route'=>'admin.users.store','files'=>true,'title'=>'user_info']) !!}
	<div class="col-md-12">
    	{!! bsForm::text('name') !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::text('phone') !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::email('email') !!}
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
    	]) !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::radio('gender',[
    		'male'=> trans('lang.male'),
    		'female'=> trans('lang.female'),
    	]) !!}
    </div>

    <div class="col-md-6">
    	{!! bsForm::textarea('info') !!}
    </div>

    <div class="col-md-6">
        {!! bsForm::image('photo') !!}
    </div>

    <div class="col-md-12">
        <br>
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-lg btn-success btn-block">{{ trans('lang.save')}}</button>
    </div>

@endsection