<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="{{ theme('frontend/images/favicon-96x96.png') }}">

	<title>@yield('title') &mdash; OWLCMS</title>

	<link rel="stylesheet" href="{{ theme('frontend/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ theme('frontend/css/font-icons/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="{{ theme('frontend/css/neon.css') }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

	<script src="{{ theme('frontend/js/jquery-1.11.3.min.js') }}"></script>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Cairo');
	</style>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


	@if(app()->getLocale() == 'ar')
		<style type="text/css">
			body{
				  text-align: right;
				  font-family: 'Cairo', sans-serif;
			}

			h1,h2,h3,h4,h5,.lead{
			  font-family: 'Cairo', sans-serif;
			  text-align: right;
			}

			.site-logo{
				float: left;
			}
			.table {
				direction: rtl;
			}

			.table-scroll .table-body td:first-child {
			    border-right:none
			}
			.table > tbody > tr > td {
			    width: auto;
			    max-width: 100%;
			}

			.input-lg{
				direction: rtl;
			}
		</style>
	@endif()



</head>

<body>

<div class="wrap">

	<!-- Logo and Navigation -->
	<div class="site-header-container container">

		<div class="row">
		
			<div class="col-md-12">
				
				<header class="site-header">
				
					<section class="site-logo">
						<a href="/">
							@foreach($settings as $setting)
								<img src="/uploads/{{ $setting->photo}}" width="200" />
							@endforeach()
						</a>

						
						
					</section>
					
					<nav class="site-nav">
						
						<ul class="main-menu hidden-xs" id="main-menu">
							
							@include('partials.navigation')
							
							<li>
								<a href="/">
									<img alt="" src="{{ currentLang('flug') }}">
									<span>{{ trans('lang.languages')}}</span>
								</a>

								<ul>
									@foreach(\App\Lang::all() as $lang)
										<li>
											<a href="{{ url('setlocale/'.$lang->code) }}">
												<img src="/themes/default/assets/cms/images/flags/{{ $lang->flug }}" />
												<span>{{ $lang->name }}</span>
											</a>
										</li>
									@endforeach()
								</ul>
							</li>

							<li class="search" style="position: relative !important; z-index: 99999;">
								<a href="#">
									<i class="entypo-search"></i>
								</a>
								
								<form method="get" class="search-form" action="" enctype="application/x-www-form-urlencoded">
									<input type="text" class="form-control" name="q" placeholder="Type to search..." />
								</form>
							</li>

						</ul>

						<div class="visible-xs">
							
							<a href="#" class="menu-trigger">
								<i class="entypo-menu"></i>
							</a>
							
						</div>
					</nav>
					
				</header>
				
			</div>
			
		</div>
		
	</div>	
	
		@yield('content')
	
		<!-- Footer Widgets -->
	<section class="footer-widgets">
		
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-6">
					
					<a href="#">
						<img src="/uploads/{{ $setting->photo }}" width="100" />
					</a>
					
					<p>
						{!! str_limit($setting->miniinformation, 150)  !!}
					</p>
					
				</div>
				
				<div class="col-sm-3">
					
					<h5>{{ trans('lang.address') }}</h5>
					
					<p>
						{!! $setting->trans('address') !!}
					</p>
					
				</div>
				
				<div class="col-sm-3">
					
					<h5>{{ trans('lang.contact') }}</h5>
					
					<p>
						{{ trans('lang.phone') }} : {!! $setting->phone !!} <br />
						{{ trans('lang.fax') }} : {!! $setting->fax !!}<br />
						{!! $setting->email !!}
					</p>
					
				</div>
				
			</div>
			
		</div>
		
	</section>

	<!-- Site Footer -->
	<footer class="site-footer">

		<div class="container">
		
			<div class="row">
				
				<div class="col-sm-6">
					{{ trans('lang.copyright') }}  <a target="_new" href="https://www.ramiawadallah.com">Rami Awadallah</a> &copy; {{ $setting->name }} - All Rights Reserved. 
				</div>
				
				<div class="col-sm-6">
					
					<ul class="social-networks text-right">
						<li>
							<a target="_new" href="{{ $setting->instagram }}">
								<i class="entypo-instagram"></i>
							</a>
						</li>
						<li>
							<a target="_new"  href="{{ $setting->twitter }}">
								<i class="entypo-twitter"></i>
							</a>
						</li>
						<li>
							<a target="_new" href="{{ $setting->facebook }}">
								<i class="entypo-facebook"></i>
							</a>
						</li>
						<li>
							<a target="_new" href="{{ $setting->linkedin }}">
								<i class="entypo-linkedin"></i>
							</a>
						</li>
						<li>
							<a target="_new" href="{{ $setting->youtube }}">
								<i class="entypo-video"></i>
							</a>
						</li>
					</ul>
					
				</div>
				
			</div>
			
		</div>
		
	</footer>	

</div>


	<!-- Bottom scripts (common) -->
	<script src="{{ theme('frontend/js/gsap/TweenMax.min.js') }}"></script>
	<script src="{{ theme('frontend/js/bootstrap.js') }}"></script>
	<script src="{{ theme('frontend/js/joinable.js') }}"></script>
	<script src="{{ theme('frontend/js/resizeable.js') }}"></script>
	<script src="{{ theme('frontend/js/neon-slider.js') }}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{ theme('frontend/js/neon-custom.js') }}"></script>

</body>
</html>