@extends('layouts.app')

	@section('content')	
		
	@include('admin.includes.errors')
		<div class="panel panel-primary">
			<div class="panel-heading">
				Update Category: {{$category->name}}	
			</div>


			<div class="panel-body">
				<form action="{{ route('category.update',['id'=>$category->id]) }}" method="post">
					{{csrf_field()}}

					<div class="form-group">
						<label for="title">Category Name</label>
						<input type="text" name="category" class="form-control" value="{{$category->name}}">
					</div>

					<div class="form-group">
						<div class="text-center">
							<input type="submit" value="Update Category" class="btn btn-success"></input>
						</div>
					</div>
					

				</form>
			</div>
		</div>
	
	

	@stop