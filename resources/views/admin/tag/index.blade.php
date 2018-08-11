@extends('layouts.app')

	@section('content')

	<div class="panel panel-primary">
		<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Tag Name</th>
				<th>Editing</th>
				<th>Deleting</th>
				</tr>
			</thead>
			<tbody>
				@if($tag->count()>0)
				@foreach($tag as $tags)
				<tr>
					<td>{{$tags->tag}}</td>
					<td><a href="{{route('tag.edit',['id'=>$tags->id])}}" class="btn btn-info">Update</a></td>
				<td><a href="{{route('tag.delete',['id'=>$tags->id])}}" class="btn btn-danger">Delete</a></td>
				</tr>
				@endforeach
				@else

				<tr>
					<th>No Tags Found</h>
				</tr>
				@endif
			
			</tbody>

		</table>
	</div>
</div>
	@stop