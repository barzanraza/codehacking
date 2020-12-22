@extends('layouts.admin')

@section('content')
	<h1>Users</h1>
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
			@if($users)

				@foreach ($users as $user)

				<tr>
					<td>{{$user->id}}</td>
					<td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td> {{-- leraya la jyaty away bnusin /images/{{$user->photo?$user->photo->file: 'http://placehold.it/400x400'}}  ema ba acessor pathi folderi images pei allen ka ama bo dahatu zor asan abet katek dastkare aw folder a bkain --}}
					<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>	{{-- wata ka user click y krd ainerin bo methodi edit y naw controller aka u aw parameter ashy lagal anerin --}}
					<td>{{$user->email}}</td>
					<td>{{$user->role->name}}</td>
					<td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td> {{-- ama ternary a alet agar nrxi columni is_active yaksanbu ba 1 ble Active a agarish wa nabu ble Not Active --}}
					<td>{{$user->created_at->diffForHumans()}}</td>
					<td>{{$user->updated_at->diffForHumans()}}</td>
				</tr>
				@endforeach
			@endif		


		</tbody>
	</table>

@endsection