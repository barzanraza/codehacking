@extends('layouts.admin')

@section('content')

	<h1>Create User</h1>
	{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('role_id', 'Role:') !!}
			{!! Form::select('role_id', [''=>'Choose Options']+$roles, null, ['class'=>'form-control']) !!}
		</div>	


		<div class="form-group">
			{!! Form::label('is_active', 'Status:') !!}
			{!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control']) !!}     {{-- aw array ya wata option tag akan, aw 0 ay dwatrish wata by default aw option ayan dyare krabet --}}
		</div>	


		<div class="form-group">
			{!! Form::label('photo_id', 'Photo:') !!}
			{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('password', 'Password:') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>



		<div class="form-group">
			{!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}



	{{-- ama bo awaya agar input akan baw shewaya pr nakrabunawa ka ema amanawet  --}}
	@include('includes.form_error')



@endsection

