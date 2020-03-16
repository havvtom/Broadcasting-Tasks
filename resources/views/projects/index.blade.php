@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3>Projects</h3>
			</div>
			<div class="card-body">
				<ul>
					@foreach($projects as $project)
						<li><a href="/projects/{{$project->id}}">{{$project->title}}</a></li>
					@endforeach
				</ul>				
			</div>
		</div>
	</div>
@endsection