<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
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
	
	<link rel="stylesheet" href="{{ theme('css/skins/white.css') }}">

	@if(app()->getLocale() == 'ar')
		<link rel="stylesheet" href="{{ theme('css/neon-theme-rtl.css') }}">	
	@else()
		<link rel="stylesheet" href="{{ theme('css/neon-theme.css') }}">
	@endif()

	<link rel="stylesheet" href="{{ theme('css/neon-forms.css') }}">
	<link rel="stylesheet" href="{{ theme('css/custom.css') }}">

	<script src="{{ theme('js/tinymce/tinymce.min.js') }}"></script>

	<script src="{{ theme('js/jquery-1.11.3.min.js') }}"></script>

	<body>

	@yield('content')

	<footer class="" style="height: 40px; bottom: 0; width: 100%; text-align:center; ">
		&copy; 2016 <strong>Owlcms</strong> Dev. by <a style="color:#d5d5d5" href="http://www.ramiawadallah.com/" target="_blank">Rami Awadallah</a>
	</footer>

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ theme('js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{ theme ('js/rickshaw/rickshaw.min.css') }}">
	<link rel="stylesheet" href="{{ theme ('js/datatables/datatables.css') }}">

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

</body>
</html>