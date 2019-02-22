@extends('layouts.app')

@section('body')
	<div class="container">
		
		@include('menu')
	
	</div>
			
	<div class="container">
		<div class="content">
		
			@yield('app_content')
		
		</div>
	</div>
@endsection