@extends('layouts.master')
@section('login-style')



@stop



@section('content')


	<!-- Form login -->
	
	@if ($message = Session::get('error'))
		<div class="div-container">
			<span style="text-align: center;"class="invalid-feedback label-text" role="alert">
						<strong>{{ $message }}</strong>
					</span>
		
		</div>
	@endif
@if(isset($User))
    {{ "Username: ". $User->name}}

@endif

  
    <div class ="well well-lg div-container">
        <form method="POST" style="width: 50%;" action="{{route('postLogin')}}">
        @csrf
		<input type="hidden"  name="_token" value="{!! csrf_token() !!}" />				
		<p class="h4 mb-4">Sign in</p>

		<!-- Email --> 
		<div class="form-group">
			<label for="email" class="label-text">E-mail</label>
			<input id="email" type="email" class="form-control mb-4 form-group-margin-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				@error('email')
					<span class="invalid-feedback label-text" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
		</div>
              
		<!-- Password --> 
		<div class="form-group">
			<label for="password" class="label-text">Password</label>
			<input id="password" type="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
			
                @error('password')
                    <span class="invalid-feedback label-text" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		</div>

		<!-- Remember me --> 
		<div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
               <p class="h5 mb-4">Remember me</p>
            </label>
        </div>

        <button type="submit" class="btn btnDrk">
            Log In
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link " href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            @endif

        </form>
		
	</div>
	


@endsection
