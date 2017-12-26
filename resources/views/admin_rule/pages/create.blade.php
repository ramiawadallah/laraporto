@extends('layouts.admin')
@section('title') {{ trans('lang.pages') }}  @endsection
@section('content')
{!! bsForm::start(['route'=>'admin.pages.store','files'=>true,'title'=>'page_info']) !!}
 <div class="row">
   <div class="col-sm-8"> 

	    {!! bsForm::translate(function($form){
	        $form->text('title');
	        $form->textarea('content',null,['class'=>'editor form-control']);
	    }) !!}

	    {!! bsForm::uri('uri') !!}

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
	          
	          {!! bsForm::image('photo') !!}

	          <hr/>

		    	{!! bsForm::radio('save_page',[
		    		'1'=> trans('lang.yes'),
		    		'0'=> trans('lang.no'),
		    	]) !!}
	          
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
            {!! bsForm::select('template',$templates, null)!!}
            {!! bsForm::select('order', ['' => 'None' , 'before' => 'Before', 'after' => 'After', 'childOf' => 'Child Of'], null)!!}
            {!! bsForm::select('orderPage',['' => 'None'] + $orderPages->pluck('padded_title', 'id')->toArray(), null)!!}
        </div>
      
      </div> 
   </div>
</div>

    {!! bsForm::end(['submit'=>'save']) !!}
@endsection