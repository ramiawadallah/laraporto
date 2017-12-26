<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="{{ theme('images/favicon-96x96.png') }}">

	<title>OwlcmsCMS | @yield('title')</title>

	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">

	<link rel="stylesheet" href="{{ theme('js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
	<link rel="stylesheet" href="{{ theme('css/font-icons/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="{{ theme('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ theme('css/neon-core.css') }}">
	<link rel="stylesheet" href="{{ theme('css/neon-theme.css') }}">
	<link rel="stylesheet" href="{{ theme('css/neon-forms.css') }}">
	<link rel="stylesheet" href="{{ theme('css/custom.css') }}">

	<script src="{{ theme('js/jquery-1.11.3.min.js') }}"></script>



	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="{{ url('/admin') }}">

@if(app()->getLocale() == 'ar')
	<body dir="rtl" data-url="{{ url('/admin') }}">
@endif()

@yield('content')


<footer class="" style="height: 40px; bottom: 0; width: 100%; text-align:center; color: #fff;">
	&copy; 2016 <strong>Owlcms</strong> Dev. by <a style="color:#d5d5d5" href="http://www.ramiawadallah.com/" target="_blank">Rami Awadallah</a>
</footer>


<!-- Imported scripts on this page -->
<script src="{{ theme('js/gsap/TweenMax.min.js') }}"></script>
<script src="{{ theme('js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
<script src="{{ theme('js/bootstrap.js') }}"></script>
<script src="{{ theme('js/joinable.js') }}"></script>
<script src="{{ theme('js/resizeable.js') }}"></script>
<script src="{{ theme('js/neon-api.js') }}"></script>
<script src="{{ theme('js/jquery.validate.min.js') }}"></script>
<script src="{{ theme('js/neon-login.js') }}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{ theme('js/neon-custom.js') }}"></script>
<!-- Demo Settings -->
<script src="{{ theme('js/neon-demo.js') }}"></script>


</body>
</html>