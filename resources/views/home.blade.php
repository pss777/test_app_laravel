@extends('body')

@section('title', '/ Сетка')

@section('app_content')

    <div class="page-header">
		
		<h1>Сетка</h1>
	
	</div>
	
	@if (count($divisions) == 0 AND count($divisions) == 0)
	
		<div class="atention">Нет данных!</div><br>

	@endif 
	
	<table class="table table-hover">
	
		@if (count($divisions) > 0)
		<thead>
		
			<tr>
				<th>
					&nbsp;
				</th>
				
					@foreach($divisions as $division)
					
						<th>
							{{ $division->title }}
						</th>
						
					@endforeach
				
			</tr>
			
		</thead>
		@endif
		
		@if (count($workers) > 0)
			
			<tbody>
		
			@foreach($workers as $worker)
			
				<tr>
					<td>
						{{ $worker->name }} {{ $worker->surname }}
					</td>
					
						@foreach($divisions as $division)
						
							@if ( $worker->divisions()->where('id',$division->id)->count() )
								
								<td>&#10003;</td>
								
							@else
								
								<td>&nbsp;</td>
							
							@endif
							
						@endforeach
					
				</tr>
			
			@endforeach
			
			</tbody>
			
		@endif
		
	</table>
	
		@if (count($workers) == 0)
		
			<br><a href="/workers/create"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Добавить сотрудника</button></a>
		
		@endif
		
@endsection
