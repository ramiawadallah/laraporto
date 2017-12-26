@extends('layouts.admin')
@section('title') {{ trans('lang.pages') }}  @endsection
@section('content')

<div class="note note-info">
    <p>{!! $page->trans('titlepage') !!}</p>
</div>

<h1>{!! $page->trans('titlepage') !!}</h1>

<p>{!! $page->trans('content') !!}</p>
 
@endsection