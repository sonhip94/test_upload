@extends('layouts.master')





@section('content')

	
	 <div class="div-container">
	 
	 			@if (session('status'))
                        <div class="alert alert-success" role="alert">

					
                    @if (Route::has('getLogin'))
                
					@auth
					You are logged in
				

					@else
					You are not logged in 
			
						@endif
					@endauth 
					
					                            {{ session('status') }}
                        </div>
                    @endif
                </div>
	
	 
		
@stop
