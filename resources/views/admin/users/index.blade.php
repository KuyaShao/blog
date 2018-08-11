@extends('layouts.app')

	@section('content')

	<div class="panel panel-primary">
		<div class="panel panel-heading">
			Users
		</div>
		<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Permission</th>
				<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@if($user->count()>0)
				@foreach($user as $users)
				<tr>
					<td><img src="{{asset($users->profile->avatar)}}" alt="{{$users->name}}" width="60px" height="60px" style="border-radius: 50%;">
					<td>{{$users->name}}</td>
					
					<td>
						@if($users->admin)
							<a href="{{route('user.notadmin',['id'=>$users->id])}}" class="btn btn-xs btn-danger">Remove Permission</a>
						@else
							<a href="{{route('user.admin',['id'=>$users->id])}}" class="btn btn-xs btn-success">Make Admin</a>
						@endif

					</td>


				<td>
					
					@if(Auth::id() !== $users->id)
					<a href="{{route('user.delete',['id'=>$users->id])}}" class="btn btn-xs btn-danger">Delete</a>
					@endif
				</td>
				</tr>
				@endforeach
				
				@else
					<th>No User Found</th>
				@endif
			
			</tbody>

		</table>
	</div>
</div>
	@stop