@extends('body')

@section('title', '/ Отделы')

@section('app_content')
    
			<div class="page-header">
			
				<h1>Отделы</h1>
				
			</div>
			
			<table class="table table-hover">
				
				<thead>
					<tr>
						<th>
							№
						</th>
						<th>
							Название отдела
						</th>
						<th>
							Количество сотрудников
						</th>
						<th>
							Максимальная зарплата
						</th>
						<th>
							Действие
						</th>
						
					</tr>
				</thead>
				
			@if (count($divisions) > 0)
				
				<tbody>
				
				@foreach($divisions as $key=>$division)
				
					<tr>
						<td>
							{{ $key + 1 }}
						</td>
						<td>
							{{ $division->title }}
						</td>
						<td>
							{{ $division->workers()->count() }}
						</td>
						<td>
							{{ $division->workers()->max('wages') }}
						</td>
						<td>
							<form action="{{ url('/divisions/'.$division->id.'/edit') }}" method="GET">
								{{ csrf_field() }}
								<button class="btn btn-success btn-sm" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></button>
							</form>
							
								<form action="{{ url('/divisions/'.$division->id) }}" method="POST"  onsubmit="return ConfirmDivisionDelete({{$division->workers()->count()}})">
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
					{{ $divisions->render() }}
				</div>
				<div class="col-sm-12">
					<a href="/divisions/create"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Добавить отдел</button></a>
				</div>
			</div>
	
@endsection
