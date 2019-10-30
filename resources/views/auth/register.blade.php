@extends('layouts.master')

@section('register-style')


@stop




@section('content')

	<div class ="well well-lg div-container ">
		<form method="POST" action="{{ route('postRegister') }}" style="width: 50%;">
		@csrf
		<input type="hidden"  name="_token" value="{!! csrf_token() !!}" />
		<p class="h4 mb-4">Register</p>

		<!-- Name -->
		<div class="form-group">
			<label for="name" class="label-text">Name</label>
			<input id="name" type="text" class="form-control regInput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
                         


		<!-- E-mail -->
		<div class="form-group">
		<label for="email" class="label-text">E-mail</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

        <!-- Password -->
		<div class="form-group ">
			<label for="password" class="label-text">Password</label>
            <input id="password" type="password" class="inputSpace form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
				
		</div>
		
					<!-- Confirm Password -->                 
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
		
		<div class= "login-check">
			<label class="login-check-label" for="logincheck">
				<p class="h5 mb-4">Already have an account? <a href="{{ route('getLogin') }}">Login</a></p>
			</label>
		</div>

		
        <button type="submit" class="btn btnDrk">
            Register
        </button>
		
                     
        </form>
	</div>
	
	
             

@endsection
