@extends('layouts.admin')
@section('title') {{ trans('lang.languages') }}  @endsection
@section('content')

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
                     <th>{{ trans('lang.trans_files')}}</th>
                     <th>{{ trans('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($langs as $language)
            <tr>
                 <td>{{ $language->trans('name') }}</td>
                 <td>{{ date('Y/m/d',strtotime($language->created_at)) }}</td>
                 <td>
                    <a class="btn btn-primary" data-toggle="modal" href='#modal-files-{{ $language->id }}'>{{ trans('lang.trans_files') }}</a>      
                    <div class="modal fade" id="modal-files-{{ $language->id }}">
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
                                        @foreach (langFiles($language->code) as $key => $file)
                                        <li role="presentation" class="{{ $key == 0 ? 'active' : '' }}">
                                            <a href="#lang_files_{{ $key }}-{{ $language->id }}" aria-controls="lang_files_{{ $key }}-{{ $language->id }}" role="tab" data-toggle="tab">
                                            {{ ucfirst(explode('.', $file['name'])[0]) }}</a>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                    @foreach (langFiles($language->code) as $key => $file)
                                        <div role="tabpanel" class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="lang_files_{{ $key }}-{{ $language->id }}">
                                        {!! Form::open(['route' => 'update_file']) !!}

                                            <div file="{{ $file['name'] }}"  dir="ltr" lang-id="{{ $language->id }}">

                                            {{-- <textarea name="content[]" file="{{ $file['name'] }}" lang-id="{{ $language->id }}" class="content form-control" id="" cols="30" rows="20"> --}}
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
                                            <input type="hidden" name="lang" value="{{ $language->id }}">
                                            
                                            </div>
                                            <button type="lang_files_submit" class="btn btn-primary btn-block lang_files_submit">{{ trans('lang.save') }}</button>
                                        {!! Form::close() !!}

                                        </div>
                                    @endforeach
                                    </div>
                                    </div>
                                </div>



                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('lang.close') }}</button>

                            
                            </div>
                            </div>
                        </div>
                    </div>

        
                    
                 </td>
                 <td>
                     {!! Btn::view($language->id) !!}
                     {!! Btn::edit($language->id) !!}
                     {!! Btn::delete($language->id,$language->trans('name')) !!}
                 </td>
            </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->



@endsection