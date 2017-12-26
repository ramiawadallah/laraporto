<style type="text/css" media="screen">
		body{
		   width: 100%;
		   background-color: #fff;
		    
		 }

		#gradient
		{
		  width: 100%;
		  height: 800px;
		  padding: 0px;
		  margin: 0px;
		}

		#cover{
			background: #222;
			background-size: cover;
			height: 100%;
			color: #fff;
			text-align: center;
			padding-bottom: 175px;
			padding-top: 175px;
		}

		#cover-caption{
			color: #fff;
		}

		.p_text{
			#color: #fff;
		}

		.form-pad{
			padding-top: 20px;
		}

		.ico{
			font-size: 150px; 
		}


	}
</style>


<body>

	<div id="gradient"/>

	<section id="cover" class="gradient">
		<div id="cover-caption">
			<div class="container">
				<div class="col-sm-10 col-sm-offset-1">

					<div class="error-symbol ico animated bounceInDown">
			            <i class="entypo-attention"></i>
			        </div>
			        @foreach($settings as $setting)
			        @if(app()->getLocale() == 'ar') 
		            	<h1 class="animated flash" style="text-align: center;">هذا الموقع تحت الانشاء !</h1>
		            	<p class="p_text animated flash" style="color: #fff;"> للمزيد من المعلومات: </br> جوال: {{ $setting->phone }} </br> إيميل: {{ $setting->email }}</p>
		            @else()

						<h1 class="animated flash">This wibsite well comming soon!</h1>
						<p class="p_text animated flash" style="color: #fff;"> For mor information: </br> Mobile: {{ $setting->phone }}  </br> Email: {{ $setting->phone }}</p>

						<form action="{{ url('send_email') }}" class="form-inline form-pad animated rubberBand" method="POST">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">

			            	<div class="form-group">
			            		<input class="form-control" name="name" placeholder="Your name"> 
			            	</div>
			            	<div class="form-group">
			            		<input class="form-control" type="email"  name="email" placeholder="Your email!">
			            	</div>
			            	<div class="form-group">
			            		<input class="form-control" name="message" placeholder="Your Message">
			            	</div>
			            	<div class="form-group">
			            		<button class="btn btn-primary" type="submite" name="msg" value="send"><span class="entypo-paper-plane"></span> | Send</button>
			            	</div>
			            </form>

			            <ul class="nav animated bounceInUp" style="color:red;">
							@foreach($errors->all() as $error)
								<li> {{ $error }}</li>
							@endforeach()
						</ul>


		            @endif()
		            @endforeach()

		            

				</div>
			</div>
		</div>
	</section>


	<script>
		var colors = new Array(
		  [62,35,255],
		  [60,255,60],
		  [255,35,98],
		  [45,175,230],
		  [255,0,255],
		  [255,128,0])
		;

		var step = 0;
		//color table indices for: 
		// current color left
		// next color left
		// current color right
		// next color right
		var colorIndices = [0,1,2,3];

		//transition speed
		var gradientSpeed = 0.002;

		function updateGradient()
		{
		  
		  if ( $===undefined ) return;
		  
		var c0_0 = colors[colorIndices[0]];
		var c0_1 = colors[colorIndices[1]];
		var c1_0 = colors[colorIndices[2]];
		var c1_1 = colors[colorIndices[3]];

		var istep = 1 - step;
		var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
		var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
		var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
		var color1 = "rgb("+r1+","+g1+","+b1+")";

		var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
		var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
		var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
		var color2 = "rgb("+r2+","+g2+","+b2+")";

		 $('.gradient').css({
		   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
		    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
		  
		  step += gradientSpeed;
		  if ( step >= 1 )
		  {
		    step %= 1;
		    colorIndices[0] = colorIndices[1];
		    colorIndices[2] = colorIndices[3];
		    
		    //pick two new target color indices
		    //do not pick the same as the current one
		    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
		    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
		    
		  }
		}

		setInterval(updateGradient,10);
	</script>

</body>

