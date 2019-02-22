@extends('body')

@section('title', '/ Сотрудники')

@section('app_content')

		<div class="page-header">
		
			<h1>Сотрудники</h1>
			
		</div>
	
		<table class="table table-hover">
			<thead>
				<tr>
					<th>№</th>
					<th>Имя</th>
					<th>Фамилия</th>
					<th>Отчество</th>
					<th>Пол</th>
					<th>Зарплата</th>
					<th>Отделы</th>
					<th>Действие</th>
				</tr>
			</thead>
		
		@if (count($workers) > 0)
			
			<tbody>
		
			@foreach($workers as $key=>$worker)
			
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $worker->name }}</td>
					<td>{{ $worker->surname }}</td>
					<td>{{ $worker->patronymic }}</td>
					<td>
						@if ($worker->sex === 'male') 
							{{'М'}}
						@endif
						@if ($worker->sex === 'female') 
							{{'Ж'}}
						@endif
					</td>
					<td>{{ $worker->wages }}</td>
					<td>
						{{ $worker->divisions()->pluck('title')->implode(', ') }}
					</td>
					<td>
						<form action="{{ url('/workers/'.$worker->id.'/edit') }}" method="GET">
							{{ csrf_field() }}
							<button class="btn btn-success btn-sm" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></button>
						</form>
						<form action="{{ url('/workers/'.$worker->id) }}" method="POST" onsubmit="return ConfirmWorkerDelete()">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button class="btn btn-danger btn-sm" title="Удалить"><i class="glyphicon glyphicon-remove"></i></button>
						</form>
					</td>
				</tr>
			
			@endforeach
			
			</tbody>
		
		@endif
		
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $workers->render() }}
			</div>
			<div class="col-sm-12">
				<a href="/workers/create"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Добавить сотрудника</button></a>
			</div>
		</div>
	
@endsection

