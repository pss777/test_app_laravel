<!DOCTYPE html>
<html lang="ru">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Предприятие @yield('title')</title>
		
		<!-- Fonts -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

		<!-- Styles -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		
		<!-- MyStyles -->
		<link href="/css/style.css" rel="stylesheet">
		
    </head>
    <body>
		<br>
		<div class="container">
			<div class="col-md-offset-10">
				&nbsp;
			</div>
			<div class="col-md-2 pull-right">
				@if (Auth::check())
					<a href="/logout">
						<button class="btn btn-primary">Выйти &nbsp; <i class="glyphicon glyphicon-log-out"></i></button>
					</a>
				@else
				<!-- <a href="/register">
						<button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> &nbsp; Регистрация</button>
					</a>
				<br><br> -->
				@endif
			</div>
		</div>
		
		@yield('body')
		@yield('content')
				
		<!-- JavaScripts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
		<script src="/js/common.js" type="text/javascript" ></script>
		
    </body>
</html>
