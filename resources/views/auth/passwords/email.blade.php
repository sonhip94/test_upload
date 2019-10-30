@extends('layouts.master')

@section('content')
<div class="container">

  <div class ="well well-lg div-container">
    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<form method="POST" action="{{ route('password.email') }}">
                        @csrf
				<p class="h4 mb-4">Reset Password</p>
				
				    <div class="form-group">
						<label for="email" class="label-text">E-mail</label>
						<input id="email" type="email" class="form-control mb-4 form-group-margin-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						@error('email')
							<span class="invalid-feedback label-text" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
              
    
                                <button type="submit" class="btn btnDrk">
                                    {{ __('Send Password Reset Link') }}
                                </button>

	</div>
	

@endsection
