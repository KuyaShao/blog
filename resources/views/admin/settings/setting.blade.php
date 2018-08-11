@extends('layouts.app')

	@section('content')
		@include('admin.includes.errors')

		<div class="panel panel-primary">
			<div class="panel-heading">
				Update Settings
			</div>


			<div class="panel-body">
				<form action="{{ route('setting.update') }}" method="post">
					{{csrf_field()}}

					<div class="form-group">
						<label for="site_name">Site Name</label>
						<input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
					</div>

					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" class="form-control" value="{{$setting->address}}">
					</div>

					<div class="form-group">
						<label for="contact">Contact Number</label>
						<input type="text" name="contact" class="form-control" value="{{$setting->contact_number}}">
					</div>

					<div class="form-group">
						<label for="email">Contact Email</label>
						<input type="email" name="email" class="form-control" value="{{$setting->contact_email}}">
					</div>

					<div class="form-group">
						<label for="about">About</label>
						<textarea name="about" class="form-control" value="{{$setting->about}}"></textarea>
					</div>

					<div class="form-group">
						<div class="text-center">
							<input type="submit" value="Update Setting" class="btn btn-success" rows="5" cols="5"></input>
						</div>
					</div>
					

				</form>
			</div>
		</div>
	
	

	@stop