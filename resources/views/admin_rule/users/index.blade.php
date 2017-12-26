@extends('layouts.admin')
@section('title') {{ trans('lang.users') }}  @endsection
@section('content')
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
   {!! Btn::create() !!}
   <br>
   <br>
    </div>
    <div class="portlet-body">
        <table class="table table-bordered datatable" id="table-1" width="100%">
            <thead>
                <tr>
                     <th>{{ trans('lang.name') }}</th>
                     <th>{{ trans('lang.created_at') }}</th>
                     <th>{{ trans('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                 <td>{{ $user->trans('name') }}</td>
                 <td>{{ date('Y/m/d',strtotime($user->created_at)) }}</td>
                 <td>
                     {!! Btn::view($user->id) !!}
                     {!! Btn::edit($user->id) !!}
                     {!! Btn::delete($user->id,$user->trans('name')) !!}
                 </td>
            </tr>
            @endforeach
                
            </tbody>
        </table>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->


@endsection