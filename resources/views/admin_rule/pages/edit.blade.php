@extends('layouts.admin')
@section('title') {{ trans('lang.pages') }}  @endsection
@section('content')
{!! bsForm::start(['route'=>['admin.pages.update',$page->id],'files'=>true,'method'=>'put','title'=>'page_info']) !!}


<div class="row">
   <div class="col-sm-8"> 
   	
    {!! bsForm::translate(function($form,$lang) use($page){

        $form->text('title',$page->trans('title',$lang));
        $form->textarea('content',$page->trans('content',$lang),['class'=>'editor form-control']);

    }) !!}

    {!! bsForm::uri('uri',$page->uri) !!}
</div>
    <div class="col-sm-4">
   		<div class="panel panel-primary" data-collapsed="0">
  
	      <div class="panel-heading">
	        <div class="panel-title">
	          Featured Image
	        </div>
	        
	        <div class="panel-options">
	          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	        </div>
	      </div>
	      
	      <div class="panel-body">
	        
	        <div class="form-group">
	        
	        <div class="col-sm-12">
	          
			<label>{{ trans('lang.select_image') }}</label>
			<br>
			<div class="fileinput fileinput-new" data-provides="fileinput">
				<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
					<?php
					if(empty($page->photo)){
						$photo = "unknown_image.png";
					}else{
						$photo = $page->photo;
					}
					?>
					{{ Html::image('/uploads/'. $photo, $page->title, ['class' =>' responsive'])}}
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

				<hr/>

		    	{!! bsForm::radio('save_page',[
		    		'1'=> trans('lang.yes'),
		    		'0'=> trans('lang.no'),
		    	],$page->save_page) !!}

			</div>
	          
	        </div>
	      </div>
	        
	      </div>
	    </div>

	    <div class="panel panel-primary" data-collapsed="0">
    
        <div class="panel-heading">
          <div class="panel-title">
            Page Setting
          </div>
          
          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
          </div>
        </div>
        
        <div class="panel-body">
          
        	{!! bsForm::select('template',$templates, $page->template)!!}
            {!! bsForm::select('order', ['' => 'None' , 'before' => 'Before', 'after' => 'After', 'childOf' => 'Child Of'], null)!!}
            {!! bsForm::select('orderPage',['' => 'None'] + $orderPages->pluck('padded_title', 'id')->toArray(), null)!!}
            
        </div>
      
      </div> 
</div>
</div>

    {!! bsForm::end(['submit'=>'save']) !!}
@endsection