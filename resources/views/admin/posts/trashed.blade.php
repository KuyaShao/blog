@extends('layouts.app')

	@section('content')

	<div class="panel panel-primary">
		<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Title</th>
				<th>Image</th>
				<th>Restore</th>
				<th>Deleting</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($post as $posts)
				<tr>
					<td>{{$posts->title}}</td>
					<td><img src="{{asset($posts->featured)}}" alt="{{$posts->title}}" width="90px" height="50px">
					<td><a href="{{route('trashed.restored',['id'=>$posts->id])}}" class="btn btn-success">Restore</a></td>
				<td><a href="{{route('trashed.kill',['id'=>$posts->id])}}" class="btn btn-danger">Delete</a></td>
				</tr>
				@endforeach
				

			
			</tbody>

		</table>
	</div>
</div>
	@stop