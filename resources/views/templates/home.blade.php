<section class="slider-container" style="background-image: url(" {{ theme('frontend/images/slide-img-1-bg.png') }} ")>
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-12">
				
				<div class="slides">
					
					<!-- Slide 1 -->
					<div class="slide">
					
						<div class="slide-content">
							<h2>
								<small>OWL CMS - Bootstrap 3</small>
								Dashboard &amp; Front-end
							</h2>
							
							<p>
								OWL CMS &ndash; is flat admin template for multi-purpose usage built<br /> with the latest version of Bootstrap &ndash; 3.
							</p>
						</div>
						
						<div class="slide-image">
							
							<a href="#">
								<img src="{{ theme('frontend/images/slide-img-1.png') }}" class="img-responsive" />
							</a>
						</div>
						
					</div>
					
					<!-- Slide 2 -->
					<div class="slide" data-bg="{{ theme('frontend/images/slide-img-1-bg.png') }}">
						
						<div class="slide-image">
							
							<a href="#">
								<img src="{{ theme('frontend/images/slide-img-2.png') }}" class="img-responsive" />
							</a>
						</div>
					
						<div class="slide-content text-right">
							<h2>
								<small>OWL CMS - Bootstrap 3</small>
								Powerful Admin Template
							</h2>
							
							<p>
								Designed for Bootstrap Framework, the theme works <br />
								perfectly on any device, you can use it on<br />
								 your smartphone, tablet or your laptop.
							</p>
							
						</div>
						
					</div>
					
					<!-- Slide 3 -->
					<div class="slide">
					
						<div class="slide-content">
							<h2>
								<small>Neon - Bootstrap 3</small>
								Responsive &amp; Retina
							</h2>
							
							<p>
								Device type is not a problem if you use Neon theme for your application UI.<br />
								It's packed with latest Bootstrap framework and it's compatible for Large Screens, Tablets and Smartphones.
							</p>
						</div>
						
						<div class="slide-image">
							
							<a href="#">
								<img src="{{ theme('frontend/images/slide-img-1.png') }}" class="img-responsive" />
							</a>
						</div>
						
					</div>
					
					<!-- Slider navigation -->
					<div class="slides-nextprev-nav">
						<a href="#" class="prev">
							<i class="entypo-left-open-mini"></i>
						</a>
						<a href="#" class="next">
							<i class="entypo-right-open-mini"></i>
						</a>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>






<div class="container">
	@foreach(\App\Page::all() as $page)
		{{ $page->trans('titlepage') }}
	@endforeach()
</div>

							
<!-- Client Logos -->
<section class="clients-logos-container">
	
	<div class="container">
		
		<div class="row">
			
			<div class="client-logos carousel slide" data-ride="carousel" data-interval="5000">
			
				<div class="carousel-inner">
				
					<div class="item active">
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
					</div>
					
					<div class="item">
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
						<a href="#">
							<img src="{{ theme('frontend/images/client-logo-1.png') }}" />
						</a>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>	





