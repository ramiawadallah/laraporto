@extends('layouts.admin')
@section('title') {{ trans('lang.pages') }}  @endsection
@section('content')
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
   {!! Btn::create() !!}
   <br><br>
    </div>
    <div class="portlet-body">
        <table class="table table-bordered datatable" id="table-1" width="100%">
            <thead>
                <tr>
                     <th>{{ trans('lang.name') }}</th>
                     <th>{{ trans('lang.uri') }}</th>
                     <th>{{ trans('lang.created_at') }}</th>
                     <th>{{ trans('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
            <tr>
                 <td>{{ $page->trans('title') }}</td>
                 <td><a href="{{ url($page->uri)}}" >{{ $page->pretty_uri }}</a></td>
                 <td>{{ date('Y/m/d',strtotime($page->created_at)) }}</td>
                 <td>
                     {!! Btn::view($page->id) !!}
                     {!! Btn::edit($page->id) !!}
                     {!! Btn::delete($page->id,$page->trans('name')) !!}
                 </td>
            </tr>
            @endforeach
                
            </tbody>
        </table>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->


@endsection