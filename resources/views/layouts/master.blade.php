<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>File Uploader - Group PS1907</title>
        
        <!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
		<script src="https://kit.fontawesome.com/5e3bd48dd9.js" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>


        <!-- Fonts -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		
		
		<link rel="dns-prefetch" href="//fonts.gstatic.com">

        <!-- Fecthing Tus/Uppy -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link href="https://transloadit.edgly.net/releases/uppy/v1.5.2/uppy.min.css" rel="stylesheet" />
        
		<!-- jwplayer -->
		<script type="text/javascript" src="jwplayer/jwplayer.js"></script>
		<script type="text/javascript" src="jwplatform/upload.js"></script>
		<script type="text/javascript">jwplayer.key="WcX7YyJH";</script>

		<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
		<link rel="stylesheet" href="css/style.css">
		
        <!-- Styles -->
      
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
			
			.btnDrk {
				background-color: #555555;
				color: white;
			}

			<!-- Puts stuff into the centre -->
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
			
			/** Centered container       **/
			.div-container {
				display: flex;
				align-items: center;
				justify-content: center;
				width: 50%;
				margin-top:  2%;
				margin-left: 25%;
				margin-left: 25%;}
			

			
            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }
			
			.m-b-md {
                margin-bottom: 30px;
            }

            
            <!-- For Login -->
			@yield('login-style')
			
			<!-- For Register -->
			@yield('register-style')
			
			<!-- For Uploading -->
			@yield('uploading-style')
			
			<!-- For Uploading Queue -->
			@yield('uploadingQueue-style')
			
			img.rounded{
				width: 200px;
			}
			
			.row {
				
				width: 100%;
				margin: 20px;
			}

	

			.jumbotron{
				text-align: center;
			}
			
			.single {
				background-color: #cfd3d8;
				display: flex;
				align-items: center;
			}

			
			
		
			.progress-text p{
				margin-top: 1rem;
			}

			.control-list {
				display: flex;
			}
			
			.control-list ul{
				list-style: none;
				display: flex;
			}
			
			.control-list ul li{
				margin-left: 1rem;
				cursor: pointer;
			}

			.control-list ul li i:hover {
				color: #598dc5 !important;
			}

			@media (min-width: 576px){
				.single {
					padding: 1rem 1rem;
				}
			}
			
			<!-- For FileUploads -->
			@yield('fileUpload-style')
			
			<!-- For VideoUploads -->
			@yield('videoUpload-style')
            
        </style>
    </head>
    <body>
	<header>
	<!-- For navbar -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand class="{{ Request::is('#home') ? 'active' : '' }}"" href="{{ url('/#home') }}">Home</a>
			</div>
			<ul class="nav navbar-nav">

					<li class="{{ Request::is('file') ? 'active' : '' }} {{ Request::is('uploadingprogress') ? 'active' : '' }} {{ Request::is('uploadingqueue') ? 'active' : '' }}">
						<a href="{{ url('/file') }}">Upload Now</a>
					</li>
					<li class="{{ Request::is('uploadManage') ? 'active' : '' }}">
						<a href="{{ url('/uploadManage') }}">File Uploads</a>
					</li>
					<li class="{{ Request::is('videos') ? 'active' : '' }}">
						<a href="{{ url('/videos') }}">Video Uploads</a>
					</li>
					
					
					

			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if (Route::has('getLogin'))
                
					@auth
				
						<li>
							<a href="{{url('logout')}}">Logout</a>
						</li>

					@else
					
						<li class="{{ Request::is('authentication/getLogin') ? 'active' : '' }} {{ Request::is('/password/email') ? 'active' : '' }} {{ Request::is('password/reset') ? 'active' : '' }}">
							<a href="{{ route('getLogin') }}">Login</a>
						</li>
						@if (Route::has('getRegister'))
							<li class="{{ Request::is('authentication/getRegister') ? 'active' : '' }} {{ Request::is('verify') ? 'active' : '' }}">
							<a href="{{ route('getRegister') }}">Register</a>
							</li>
						@endif
					@endauth 
				@endif
			</ul>
        

	  </div>
    </nav>
	</header>

            <div>
                
					@yield('content')
                
            </div>

    </body>
</html>
