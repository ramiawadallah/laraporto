@extends('layouts.admin')
@section('title') {{ trans('lang.languages') }}  @endsection
@section('content')

<div class="note note-info">
    <p>{{ $lang->name }}</p>
</div>
 
@endsection