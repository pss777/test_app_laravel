@extends('body')

@section('title','/ '.$titlePage)

@section('app_content')

    <div class="page-header">
		
		<h1>{{ $titleForm }}</h1>
		
	</div>
	
	@if (count($divisions) > 0)
	<!-- Отображение ошибок проверки ввода -->
		{{-- @include('errors') --}}
		
		<!-- Форма добавления/редактироания сотрудника -->
		<form 
			@if ($actionForm == "create") 
				action="{{ url('/workers') }}" 
			@elseif ($actionForm == "edit") 
				action="{{ url('/workers/'.$workers->id) }}" 
			@endif
				method="POST" class="form-horizontal">
			@if ($actionForm == "edit") 
				{{ method_field('PUT') }} 
		    @endif
		   {{ csrf_field() }}

			{{-- Имя --}}
			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
				<label for="inputName" class="col-sm-2 control-label">Имя</label>
				<div class="col-sm-10">
					<input type="text" name="name" value="{{ (!empty($workers->name) AND !old('name')) ? $workers->name : old('name') }}" class="form-control" id="inputName" required>
					<span class="help-block small">{{ $errors->first('name') }} </span>
				</div>
			</div>
			  
			{{-- Фамилия --}}
			<div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
				<label for="inputSurname" class="col-sm-2 control-label">Фамилия</label>
				<div class="col-sm-10">
				  <input type="text" name="surname" value="{{ (!empty($workers->surname) AND !old('surname')) ? $workers->surname : old('surname') }}" id="inputSurname" class="form-control" required>
				  <span class="help-block small">{{ $errors->first('surname') }} </span>
				</div>
			</div>
			  
			{{-- Отчество --}}
			<div class="form-group">
				<label for="inputPatronymic" class="col-sm-2 control-label">Отчество</label>
				<div class="col-sm-10">
				  <input type="text" name="patronymic" value="{{ (!empty($workers->patronymic) AND !old('patronymic')) ? $workers->patronymic : old('patronymic') }}" id="inputPatronymic" class="form-control">
				</div>
			</div>
			  
			{{-- Пол --}}
			<div class="form-group">
				<label for="sex" class="col-sm-2 control-label">Пол:</label>
				<div class="form-check col-sm-10">
					<label class="radio-inline" for="sexRadioMale">
						<input type="radio" name="sex" id="sexRadioMale" value="male" {{ ($workers->sex == 'male' AND !old('sex')) ? 'checked' : (old('sex') == 'male') ? 'checked' : '' }} > Мужской
					</label>
					<label class="radio-inline" for="sexRadioFemale">
						<input type="radio" name="sex" id="sexRadioFemale" value="female" {{ ($workers->sex == 'female' AND !old('sex')) ? 'checked' : (old('sex') == 'female') ? 'checked' : '' }} > Женский
					</label>
					<label class="radio-inline" for="sexRadioNone">
						<input type="radio" name="sex" id="sexRadioNone" value="none" {{ ($workers->sex == 'none' AND !old('sex')) ? 'checked' : (old('sex') == 'none') ? 'checked' : '' }} > Не указывать
					</label>
				</div>
			</div>
			  
			{{-- Зарплата --}}
			<div class="form-group {{ $errors->has('wages') ? ' has-error' : '' }}">
				<label for="inputWages" class="col-sm-2 control-label">Зарплата</label>
				<div class="col-sm-10">
				  <input type="text" name="wages" pattern="^[0-9]+$"  value="{{ (!empty($workers->wages) AND !old('wages')) ? $workers->wages : old('wages') }}" id="inputWages" class="form-control" required>
				  <span class="help-block small">{{ $errors->first('wages') }} </span>
				</div>
			</div>
			  
			{{-- Отделы --}}
			<div class="form-group {{ $errors->has('divisions') ? ' has-error' : '' }}">
				<label for="selectDivisions" class="col-sm-2 control-label">Отделы</label>
				<div class="col-sm-10">
				
					<select name="divisions[]" multiple class="form-control" id="selectDivisions" required>
					  @foreach($divisions as $division)
						<option value="{{ $division->id }}" {{ (collect($workers->divisions)->contains($division->id) AND !old('divisions')) ? 'selected': collect(old('divisions'))->contains($division->id) ? 'selected' : '' }} >{{ $division->title }}</option>
					  @endforeach
					</select>
					<span class="help-block small">{{ $errors->first('divisions') }} </span>
				</div>
			</div>
			
			{{-- Кнопка добавления сотрудника --}}
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> &nbsp; Сохранить</button>
				</div>
			</div>
			
		</form>
	
	@else
		<div class="atention">
			Для добавления сотрудников необходимо создать, как минимум, один отдел! 
			<br><br>
			<a href="/divisions/create"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Добавить отдел</button></a>
		</div>
	@endif
	
@endsection

