@extends('layouts.app')

	@section('content')
		@include('admin.includes.errors')

		<div class="panel panel-primary">
			<div class="panel-heading">
				Edit Profile
			</div>


			<div class="panel-body">
				<form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="form-group">
						<label for="user">User</label>
						<input type="text" name="name" value="{{$user->name}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" value="{{$user->email}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="email">New Password</label>
						<input type="password" name="password" class="form-control">
					</div>

					<div class="form-group">
						<label for="email">Change Avatar</label>
						<input type="file" name="avatar" class="form-control">
					</div>

					<div class="form-group">
						<label for="facebook">Facebook Profile</label>
						<input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="youtube">Youtube Account</label>
						<input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="email">About</label>
						<textarea name="about" class="form-control"  rows="6" cols="class="6>{{$user->profile->about}}</textarea>  
					</div>

					<div class="form-group">
						<div class="text-center">
							<input type="submit" value="Update Profile" class="btn btn-success"></input>
						</div>
					</div>
					

				</form>
			</div>
		</div>
	
	

	@stop