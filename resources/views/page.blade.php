@extends('layouts.home')
@section('title') {{ $page->trans('title') }} @endsection()

@section('content')
	@if($page->view)
		{!! $page->view->render() !!}
	@else
		<section class="breadcrumb">
	
			<div class="container">
				
				<div class="row">
					
					<div class="col-sm-12">
						
						<h1>{{ $page->trans('title') }}</h1>
						
						<ol class="breadcrumb bc-3" >
							<li>
								<a href="/"><i class="fa-home"></i>Home</a>
							</li>
						
							<li class="active">
								<strong>{{ $page->trans('title') }}</strong>
							</li>
						</ol>
									
					</div>
					
				</div>
				
			</div>
			
		</section>
		<div class="container">
			<?php  
                if(empty($page->photo)){
                    $photo = "unknown_image.png";
                }else{
                    $photo = $page->photo;
                }
            ?>
            <div class="container">
            	<img src="uploads/<?php echo $photo; ?>" class="img-responsive" alt="<?php echo $photo; ?>" style="max-height: 80%;">
			</div>

		    <h3>{{ $page->trans('title') }}</h3>
		    <br>
		    {!! $page->trans('content') !!}
	    </div>
    @endif
@endsection