@extends('body')

@section('title','/ '.$titlePage)

@section('app_content')

    <div class="page-header">
	
		<h1>{{ $titleForm }}</h1>
		
	</div>
	
	<!-- Отображение ошибок проверки ввода -->
		{{-- @include('errors') --}}
		
		<!-- Форма добавления/редактироания сотрудника -->
		<form 
			@if ($actionForm == "create") 
				action="{{ url('/divisions') }}" 
			@elseif ($actionForm == "edit") 
				action="{{ url('/divisions/'.$divisions->id) }}" 
			@endif
				method="POST" class="form-horizontal" role="form">
			@if ($actionForm == "edit") 
				{{ method_field('PUT') }} 
		    @endif
		   {{ csrf_field() }}

			{{-- Название отдела --}}
			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
				<label for="inputTitle" class="col-sm-2 control-label">Название отдела</label>
				<div class="col-sm-10">
					<input type="text" name="title" value="{{ (!empty($divisions->title) AND !old('title')) ? $divisions->title : old('title') }}" class="form-control" id="inputTitle" required>
					<span class="help-block small">{{ $errors->first('title') }} </span>
				</div>
			</div>

			{{-- Кнопка добавления отдела --}}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> &nbsp; Сохранить</button>
				</div>
			</div>
			
		</form>
	
@endsection

