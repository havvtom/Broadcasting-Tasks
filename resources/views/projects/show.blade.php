@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				{{$project->title}}
			</div>
			<div class="card-body">
				<task :project="{{$project}}"></task>
			</div>
		</div>
	</div>
@endsection