@extends('layouts.app')

	@section('content')

	<div class="panel panel-primary">
		<div class="panel panel-heading">
			Categories
		</div>
		<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Category Name</th>
				<th>Editing</th>
				<th>Deleting</th>
				</tr>
			</thead>
			<tbody>
				@if($category->count()>0)
				@foreach($category as $categories)
				<tr>
					<td>{{$categories->name}}</td>
					<td><a href="{{route('category.edit',['id'=>$categories->id])}}" class="btn btn-info">Update</a></td>
				<td><a href="{{route('category.destroy',['id'=>$categories->id])}}" class="btn btn-danger">Delete</a></td>
				</tr>
				@endforeach
				@else
				<tr>
					<th><p class="text-center">No Categories Found</p></th>
				</tr>
				@endif
			
			</tbody>

		</table>
	</div>
</div>
	@stop