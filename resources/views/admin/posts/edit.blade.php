@extends('layouts.app')

	@section('content')
		@include('admin.includes.errors')

		<div class="panel panel-primary">
			<div class="panel-heading">
				Update Post: {{$post->title}}			
			</div>


			<div class="panel-body">
				<form action="{{ route('post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{$post->title}}">
					</div>

					<div class="form-group">
						<label for="featuread">Featured</label>
						<input type="file" name="featured" class="form-control" value="{{$post->featured}}">
					</div>

					<div class="form-group">
						<label for="categories">Select Categories</label>
						<select name="categ_id" id="category" class="form-control">
							@foreach($category as $categories)
								<option value="{{$categories->id}}"

									@if($post->category->id == $categories->id)
										selected 
										@endif

									>{{$categories->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="tags">Select Tags</label>
						@foreach($tag as $tags)
							<div class="checkbox">
								<label><input type="checkbox" name="tags[]" value="{{$tags->id}}"

									@foreach($post->tags as $t)
										@if($tags->id == $t->id)
											checked 
										@endif

									@endforeach

									>{{$tags->tag}}</label>
							</div>
						@endforeach
					</div>

					<div class="form-group">
						<label for="content">Content</label>
						<textarea  name="content" class="form-control" rows="5" cols="5">{{$post->content}}</textarea>
					</div>

					<div class="form-group">
						<div class="text-center">
							<input type="submit" value="Update Post" class="btn btn-success"></input>
						</div>
					</div>
					

				</form>
			</div>
		</div>
	
	

	@stop