@extends('layouts.app')

	@section('content')
		@include('admin.includes.errors')

		<div class="panel panel-primary">
			<div class="panel-heading">
				Create New Post			
			</div>


			<div class="panel-body">
				<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control">
					</div>

					<div class="form-group">
						<label for="featuread">Featured</label>
						<input type="file" name="featured" class="form-control">
					</div>

					<div class="form-group">
						<label for="categories">Select Categories</label>
						<select name="categ_id" id="category" class="form-control">
							@foreach($category as $categories)
								<option value="{{$categories->id}}">{{$categories->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="tags">Select Tags</label>
						@foreach($tag as $tags)
							<div class="checkbox">
								<label><input type="checkbox" name="tags[]" value="{{$tags->id}}">{{$tags->tag}}</label>
							</div>
						@endforeach
					</div>

					<div class="form-group">
						<label for="content">Content</label>
						<textarea id="summernote" name="content" class="form-control" rows="5" cols="5"></textarea>
					</div>

					<div class="form-group">
						<div class="text-center">
							<input type="submit" value="Store Post" class="btn btn-success"></input>
						</div>
					</div>
					

				</form>
			</div>
		</div>
	
	

	@stop

	@section('styles')
	
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">	
	@stop

	@section('scripts')
	

	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

	<script>
		$(document).ready(function() {
  		$('#summernote').summernote();
		});
	</script>
	@stop