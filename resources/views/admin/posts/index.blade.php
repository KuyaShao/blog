@extends('layouts.app')

	@section('content')

	<div class="panel panel-primary">
		<div class="panel panel-heading">
			Published Post
		</div>
		<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Title</th>
				<th>Image</th>
				<th>Editing</th>
				<th>Deleting</th>
				</tr>
			</thead>
			<tbody>
				@if($post->count()>0)
				@foreach($post as $posts)
				<tr>
					<td>{{$posts->title}}</td>
					<td><img src="{{asset($posts->featured)}}" alt="{{$posts->title}}" width="90px" height="50px">
					<td><a href="{{route('post.edit',['id'=>$posts->id])}}" class="btn btn-sm btn-info">Edit</a></td>
				<td><a href="{{route('post.destroy',['id'=>$posts->id])}}" class="btn btn-sm btn-danger">Trash</a></td>
				</tr>
				@endforeach
				
				@else
					<th>No Published Post</th>
				@endif
			
			</tbody>

		</table>
	</div>
</div>
	@stop