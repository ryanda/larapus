@extends('layout.guest')
@section('content')
	<div class="row">
		<div class="col s4 offset-s4">
			{{Form::open(['url'=>'login', 'method'=>'post'])}}
			<div class="input-field">
				<i class="mdi-action-account-circle prefix"></i>
				{{Form::text('username', null,['class' => 'validate', 'placeholder' => 'masukkan username anda'])}}
			</div>
			<div class="input-field">
				<i class="mdi-action-https prefix"></i>
				{{Form::password('password',['class' => 'validate', 'placeholder' => 'masukkan password anda'])}}
			</div>
			<div class="input-field">
			    <button class="btn waves-effect waves-light" type="submit" name="action">	Login<i class="mdi-content-send right"></i>
			    </button>
			</div>
			{{Form::close()}}
		</div>
	</div>
@stop