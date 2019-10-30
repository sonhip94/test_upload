@extends('layouts.master')

@section('uploadingQueue-style')



@stop



@section('content')

<!-- Upload queue row -->
<div class="container">
  <div class="row" style="background: #F5F5F5;">
  <div>
  <div class="text-center">
	<div class="col-lg-1" style="padding-top: 2rem;">
		<i class="text-primary fas fa-spinner fa-spin fa-3x"></i>
	</div>
	<div class="col-lg-1" style="padding-top: 2rem;">
		<span style="font-size: 50px;" class="glyphicon glyphicon-file" aria-hidden="true"></span>
	</div>	
    <div class="col-lg-2" style="padding-top: 2rem;">
		<p style="font-size: 2rem;">something.txt</p>
		<p style="font-size: 2rem;">29/10/19</p>
	</div>

	<div class="col-lg-6" style="padding-top: 4rem;">
		<div class="progress-div">
		    <div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width:65%">
					65%
				</div>
			</div>
		</div>	
	</div>
	
		<div class="col-lg-2" style="padding-top: 4rem;">
			<button class="btn btnDrk type="button">
				<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
			</button>
			<button class="btn btnDrk" type="button">
				<span class="glyphicon glyphicon-pause" aria-hidden="true"></span>
			</button>
			<button class="btn btnDrk" type="button">
				<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
			</button>
		</div>


	</div>
	</div>
  </div>
</div>
@stop
