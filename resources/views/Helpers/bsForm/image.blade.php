
<?php
    $name = !empty($name) ? $name : '';
    $url =  !empty($url) ? $url : url('/uploads/unknown_image.png');
?>

<div class="form-group">
    <label>{{ trans('lang.select_image') }}</label>    
<br>
<div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-new thumbnail" style="width: 60%; height: 60%;">
        <img src="/uploads/unknown_image.png" alt=""> </div>
    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
    <div>
        <span class="btn btn-white btn-file">
            <span class="fileinput-new"> {{ trans('lang.select_image') }} </span>
            <span class="fileinput-exists"> {{ trans('lang.change') }} </span>
           {!! Form::file($name) !!} 
        </span>
        <a href="javascript:;" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"> {{ trans('lang.remove') }} </a>
    </div>
</div>

