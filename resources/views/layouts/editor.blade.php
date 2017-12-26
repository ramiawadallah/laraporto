<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="UTF-8" content="text/html">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Owlcms By Rami Awadllah" />
	<meta name="keywords" content="@yiled('keywords')">
	<meta name="author" content="Rami Awadallah" />

	<link rel="icon" href="{{ theme('images/favicon-96x96.png') }}">

	<title>OWLCMS | @yield('title', 'Owlcms Page')</title>

	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">

	<link rel="stylesheet" href="{{ theme('js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
	<link rel="stylesheet" href="{{ theme('css/font-icons/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="{{ theme('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ theme('css/neon-core.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	<link rel="stylesheet" href="{{ theme('css/skins/white.css') }}">

	@if(app()->getLocale() == 'ar')
		<link rel="stylesheet" href="{{ theme('css/neon-theme-rtl.css') }}">	
	@else()
		<link rel="stylesheet" href="{{ theme('css/neon-theme.css') }}">
	@endif()

	<style>
		@import url('https://fonts.googleapis.com/css?family=Cairo');
	</style>

	<link rel="stylesheet" href="{{ theme('css/neon-forms.css') }}">
	<link rel="stylesheet" href="{{ theme('css/custom.css') }}">

	<script src="{{ theme('js/tinymce/tinymce.min.js') }}"></script>

	<script src="{{ theme('js/jquery-1.11.3.min.js') }}"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
		  var editor_config = {
		    path_absolute : "/",
		    selector: "textarea",
		    plugins: [
		      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		      "searchreplace wordcount visualblocks visualchars code fullscreen",
		      "insertdatetime media nonbreaking save table contextmenu directionality",
		      "emoticons template paste textcolor colorpicker textpattern"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
		    relative_urls: false,
		    file_browser_callback : function(field_name, url, type, win) {
		      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
		      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

		      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
		      if (type == 'image') {
		        cmsURL = cmsURL + "&type=Images";
		      } else {
		        cmsURL = cmsURL + "&type=Files";
		      }

		      tinyMCE.activeEditor.windowManager.open({
		        file : cmsURL,
		        title : 'Filemanager',
		        width : x * 0.8,
		        height : y * 0.8,
		        resizable : "yes",
		        close_previous : "no"
		      });
		    }
		  };

		  tinymce.init(editor_config);
	</script>

	<script>
	    $(document).ready(function() {
	        var title = '';
	      $("#title").bind('blur', function() {
	        title = $(this).val();
	            title = title.replace(/\s+/g,'-').replace(/[^a-zA-Z0-9-]/g,'').toLowerCase(); 
	        $("#slug").val(title);
	      });
	    });

	    $(document).ready(function() {
	        var name = '';
	      $("#name").bind('blur', function() {
	        name = $(this).val();
	            name = name.replace(/\s+/g,'-').replace(/[^a-zA-Z0-9-]/g,'').toLowerCase(); 
	        $("#uri").val(name);
	      });
	    });
	</script>

	<style type="text/css">
		body{
			font-family: 'Cairo', sans-serif;
		}

		h1,h2,h3,h4,h5,.lead{
		  font-family: 'Cairo', sans-serif;
		}
	</style>

</head>
<body class="page-body  page-fade" >
<div class="page-container">

@if(app()->getLocale() == 'ar')
	<div class="page-container right-sidebar text-right" ><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

	<style type="text/css">
		body{
			  text-align: right;
			  float: left;
			  clear: right;
			  font-family: 'Cairo', sans-serif;
		}

		h1,h2,h3,h4,h5,.lead{
		  font-family: 'Cairo', sans-serif;
		  text-align: right;
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

	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="{{ url('/admin') }}">
						<img src="{{ theme('images/logo.png') }}" width="170" alt="" />
					</a>
				</div>


				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

		
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>

			<div class="sidebar-user-info">
				<div class="sui-normal">
					<a href="#" class="user-link">
						<?php 
		                        if(empty(Auth::user()->photo)){
		                            $photo = "user.png";
		                        }else{
		                            $photo = Auth::user()->photo;
		                        }
		                ?>
						<img src="/uploads/<?php echo $photo; ?>" width="55" alt="" style="margin-right:50px;" class="img-circle">

						<span>{{ trans('lang.welcome')}},</span>
						<br>
						<strong>{{ Auth::user()->name }} </strong>

					</a>
				</div>

				<div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->

					<a href="extra-lockscreen.html">
						<i class="{{ url('/logout') }}"></i>
						{{ trans('lang.logout')}}
					</a>

					<span class="close-sui-popup">×</span><!-- this is mandatory --></div>
			</div>
			
									
			<ul id="main-menu" class="main-menu">

				<li class="active opened active">
					<a href="{{ url('/admin') }}"">
						<i class="entypo-gauge ico"></i>
						<span class="title">{{ trans('lang.dashbord')}}</span>
					</a>
				</li>

				<li class="active has-sub">
					<a href="{{ url('/admin/users')}}">
						<i class="entypo-monitor ico"></i>
						<span class="title">{{ trans('lang.pages')}}</span>
					</a>
					<ul class="">
						<li class="active">
							<a href="{{ url('/admin/pages')}}">
								<span class="title">{{ trans('lang.allpages')}}</span>
							</a>
						</li>
						<li class="active">
							<a href="{{ url('/admin/pages/create')}}">
								<span class="title">{{ trans('lang.addnewpage')}}</span>
							</a>
						</li>
					</ul>
				</li>

				
				<li class="active  has-sub">
					<a href="">
						<i class="entypo-book-open ico"></i>
						<span class="title">{{ trans('lang.blog')}}</span>
					</a> 
					<ul class="">
					<li class="active has-sub">
					<a href="{{ url('/admin/posts')}}">
						<i class="entypo-newspaper ico"></i>
						<span class="title">{{ trans('lang.posts')}}</span>
					</a>
					<ul class="">
								<li class="active">
									<a href="{{ url('/admin/posts')}}">
										<span class="title">{{ trans('lang.all posts')}}</span>
									</a>
								</li>
								<li class="active">
									<a href="{{ url('/admin/posts/create')}}">
										<span class="title">{{ trans('lang.add new post')}}</span>
									</a>
								</li>
							</ul>
						</li>

						<li class="active has-sub">
							<a href="{{ url('/admin/categories')}}">
								<i class="entypo-archive ico"></i>
								<span class="title">{{ trans('lang.category')}}</span>
							</a>
							<ul class="">
								<li class="active">
									<a href="{{ url('/admin/categories')}}">
										<span class="title">{{ trans('lang.all category')}}</span>
									</a>
								</li>
								<li class="active">
									<a href="{{ url('/admin/categories/create')}}">
										<span class="title">{{ trans('lang.add new category')}}</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
			    </li>

			   
			    <li class="active has-sub">
					<a href="{{ url('/admin/users')}}">
						<i class="entypo-users ico"></i>
						<span class="title">{{ trans('lang.users')}}</span>
					</a>
					<ul class="">
						<li class="active">
							<a href="{{ url('/admin/users')}}">
								<span class="title">{{ trans('lang.all user')}}</span>
							</a>
						</li>
						<li class="active">
							<a href="{{ url('/admin/users/create')}}">
								<span class="title">{{ trans('lang.add new user')}}</span>
							</a>
						</li>
					</ul>
				</li>
				

				<li class="active has-sub">
					<a href="{{ url('/admin/settings') }}">
						<i class="entypo-cog ico"></i>
						<span class="title">{{ trans('lang.settings')}}</span>
					</a>
						
					<ul class="">
						<li class="active">
							<a href="{{ url('/admin/settings') }}">
								<i class="entypo-info ico"></i>
								<span class="title">{{ trans('lang.settings')}}</span>
							</a>
						</li>

						<li class="active">
							<a href="{{ url('/admin/langs') }}">
								<i class="entypo-language ico"></i>
								<span class="title">{{ trans('lang.languages')}}</span>
							</a>
						</li>

					</ul>
				</li>

			</ul>
			
		</div>

	</div>

	<!-- End Sidebar -->
	<!-- Start main contant -->

	<div class="main-content">
		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-12 col-sm-12 pull-left clearfix ">
					@if(Auth::guest())
			            <ul class="nav navbar-nav navbar-right">
			                <!-- Authentication Links -->
			                <li><a href="{{ url('/login') }}">{{ trans('lang.login') }}</a></li>
			                <li><a href="{{ url('/register') }}">{{ trans('lang.register') }}</a></li>   
			            </ul>
		            @else()
						<ul class="user-info  pull-none-xsm">
							<!-- Profile Info -->
							<ul class="profile-info dropdown pull-right"><!-- add class "pull-right" if you want to place this from right -->
								<?php 
				                        if(empty(Auth::user()->photo)){
				                            $photo = "user.png";
				                        }else{
				                            $photo = Auth::user()->photo;
				                        }
				                ?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="/uploads/<?php echo $photo; ?>" alt="" class="img-circle" width="44" />
									{{ Auth::user()->name }} | 
								</a>

								<a class="entypo-logout right" href="{{ url('/logout') }}"> {{ trans('lang.logout') }}</a>

								<ul class="dropdown-menu">
				
									<!-- Reverse Caret -->
									<li class="caret"></li>
				
									<!-- Profile sub-links -->
									<li>
										<a href="extra-timeline.html">
											<i class="entypo-user"></i>
											Edit Profile
										</a>
									</li>
								</ul>
							</ul>

							<ul class="dropdown language-selector list-inline links-list pull-left">

								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
									<i class="entypo-language"></i> | 
									<b>{{ trans('lang.languages')}}</b>
								</a>

								<ul class="dropdown-menu" @if(app()->getLocale() == 'ar') style="margin-left: -125px;" @endif()>
									@foreach(\App\Lang::all() as $lang)
										<li >
											<a href="{{ url('/lang/'.$lang->code) }}">
												<img src="/themes/default/assets/cms/images/flags/{{ $lang->flug }}" />
												<span>{{ $lang->name }}</span>
											</a>
										</li>
									@endforeach()
								</ul>

							</ul>
						</ul>

					@endif()
			</div>
		
		</div>
		
		<hr />

		<div class="row">
			<div class="col-xs-12">
				<h3>@yield('title')</h3>	
			</div>
		</div>

		<hr/>
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<button type="button" data-dismiss="alert" aria-hidden="true" class="close" >&times;</button>
					<strong>
						<ul>
							@foreach($errors->all() as $error)
								<li> {{ $error }}</li>
							@endforeach()
						</ul>
					</strong>
				</div> 
			@endif()
		
			@if(session('message'))
				<div class="alert alert-success">
					<button type="button" data-dismiss="alert" aria-hidden="true" class="close" >&times;</button>
					<strong>{{ session('message') }}</strong>
				</div> 
            @endif

            @if(session()->has('success'))
				<div class="alert alert-success">
					<button type="button" data-dismiss="alert" aria-hidden="true" class="close" >&times;</button>
					<strong>{{ session('success') }}</strong>
				</div> 
			@endif()

			@if(session()->has('error'))
				<div class="alert alert-danger">
					<button type="button" data-dismiss="alert" aria-hidden="true" class="close" >&times;</button>
					<strong>{{ session('error') }}</strong>
				</div> 
			@endif()

	

			@yield('content')

			<div style="margin-bottom: 20px;"> <br></div>
		<!-- Footer -->
			<footer class="main navbar navbar-inverse navbar-fixed-bottom" style="text-align: center; color: #fff;">
					&copy; 2016 <strong>Owlcms</strong> Admin Theme & Development by <a style="color: #fff;" href="http://www.ramiawadallah.com/" target="_blank">Rami Awdallah</a>
			</footer>
		</div>

</div>

	<script type="text/javascript">
		$(function () {
		    $('.button-checkbox').each(function () {
		        // Settings
		        var $widget = $(this),
		            $button = $widget.find('button'),
		            $checkbox = $widget.find('input:checkbox'),
		            color = $button.data('color'),
		            settings = {
		                on: {
		                    icon: 'icon icon-check'
		                },
		                off: {
		                    icon: 'icon icon-unchecked'
		                }
		            };

		        // Event Handlers
		        $button.on('click', function () {
		            $checkbox.prop('checked', !$checkbox.is(':checked'));
		            $checkbox.triggerHandler('change');
		            updateDisplay();
		        });
		        $checkbox.on('change', function () {
		            updateDisplay();
		        });

		        // Actions
		        function updateDisplay() {
		            var isChecked = $checkbox.is(':checked');

		            // Set the button's state
		            $button.data('state', (isChecked) ? "on" : "off");

		            // Set the button's icon
		            $button.find('.state-icon')
		                .removeClass()
		                .addClass('state-icon ' + settings[$button.data('state')].icon);

		            // Update the button's color
		            if (isChecked) {
		                $button
		                    .removeClass('btn-default')
		                    .addClass('btn-' + color + ' active');
		            }
		            else {
		                $button
		                    .removeClass('btn-' + color + ' active')
		                    .addClass('btn-default');
		            }
		        }

		        // Initialization
		        function init() {

		            updateDisplay();

		            // Inject the icon if applicable
		            if ($button.find('.state-icon').length == 0) {
		                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
		            }
		        }
		        init();
		    });
		});
	</script>

	<script type="text/javascript">
		$(function () {
		    $('.button-radio').each(function () {
		        // Settings
		        var $widget = $(this),
		            $button = $widget.find('button'),
		            $radio = $widget.find('input:radio'),
		            color = $button.data('color'),
		            settings = {
		                on: {
		                    icon: 'icon icon-check'
		                },
		                off: {
		                    icon: 'icon icon-unchecked'
		                }
		            };

		        // Event Handlers
		        $button.on('click', function () {
		            $radio.prop('checked', !$radio.is(':checked'));
		            $radio.triggerHandler('change');
		            updateDisplay();
		        });
		        $radio.on('change', function () {
		            updateDisplay();
		        });

		        // Actions
		        function updateDisplay() {
		            var isChecked = $radio.is(':checked');

		            // Set the button's state
		            $button.data('state', (isChecked) ? "on" : "off");

		            // Set the button's icon
		            $button.find('.state-icon')
		                .removeClass()
		                .addClass('state-icon ' + settings[$button.data('state')].icon);

		            // Update the button's color
		            if (isChecked) {
		                $button
		                    .removeClass('btn-default')
		                    .addClass('btn-' + color + ' active');
		            }
		            else {
		                $button
		                    .removeClass('btn-' + color + ' active')
		                    .addClass('btn-default');
		            }
		        }

		        // Initialization
		        function init() {

		            updateDisplay();

		            // Inject the icon if applicable
		            if ($button.find('.state-icon').length == 0) {
		                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
		            }
		        }
		        init();
		    });
		});
	</script>

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ theme('js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{ theme('js/rickshaw/rickshaw.min.css') }}">
	<link rel="stylesheet" href="{{ theme('js/datatables/datatables.css') }}">
	<link rel="stylesheet" href="{{ theme('js/icheck/skins/minimal/_all.css') }}">
	<link rel="stylesheet" href="{{ theme('js/icheck/skins/square/_all.css') }}">
	<link rel="stylesheet" href="{{ theme('js/icheck/skins/flat/_all.css') }}">
	<link rel="stylesheet" href="{{ theme('js/icheck/skins/futurico/futurico.css') }}">
	<link rel="stylesheet" href="{{ theme('js/icheck/skins/polaris/polaris.css') }}">
	<link rel="stylesheet" href="{{ theme('js/icheck/skins/line/_all.css') }}	">

	<!-- Bottom scripts (common) -->
	<script src="{{ theme('js/gsap/TweenMax.min.js') }} "></script>
	<script src="{{ theme('js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
	<script src="{{ theme('js/bootstrap.js') }}"></script>
	<script src="{{ theme('js/joinable.js') }} "></script>
	<script src="{{ theme('js/resizeable.js') }}"></script>
	<script src="{{ theme('js/neon-api.js') }}"></script>
	<script src="{{ theme('js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ theme('js/bootstrap-switch.min.js') }}"></script>
	
	<!-- Imported scripts on this page -->
	<script src="{{ theme('js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
	<script src="{{ theme('js/jquery.sparkline.min.js') }}"></script>
	<script src="{{ theme('js/rickshaw/vendor/d3.v3.js') }}"></script>
	<script src="{{ theme('js/rickshaw/rickshaw.min.js') }}"></script>
	<script src="{{ theme('js/raphael-min.js') }}"></script>
	<script src="{{ theme('js/morris.min.js') }}"></script>
	<script src="{{ theme('js/toastr.js') }}"></script>
	<script src="{{ theme('js/neon-chat.js') }}"></script>
	<script src="{{ theme ('js/datatables/datatables.js') }}"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="{{ theme('js/neon-custom.js') }}"></script>

	<!-- Demo Settings -->
	<script src="{{ theme('js/neon-demo.js') }}"></script>

	<script src="{{ theme('js/fileinput.js') }}"></script>
	<script src="{{ theme('js/dropzone/dropzone.js') }}"></script>
	<script src="{{ theme('js/neon-chat.js') }}"></script>
	<script src="{{ theme('js/icheck/icheck.js') }}""></script>

</body>
</html>