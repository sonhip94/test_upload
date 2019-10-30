@extends('layouts.master')

@section('fileUpload-style')
<!-- CSS goes here -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
@stop




@section('content')

<div class="text-center" >
  <h1>File Manager</h1>
</div>
  

 <div class="table-responsive" style="margin: 0% 10% 10% 5%;"> 

  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th style="width:5%">#</th>
        <th style="width:65%">File Name</th>
        <th style="width:10%">Size</th>
        <th style="width:10%">Date Added</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
		<?php $a = 0 ?>
		@foreach($data as $item)
		<?php $a = $a + 1 ?>
      <tr>
        <td>{!!$item["id"] !!}</td>
        <td><a href="url">{{ $item["name"]}}</a></td>
        <td>{{ $item["size"]}}</td>
        <td>31/09/2019</td>
        <td>
			<button class="btn btnDrk" type="button">
           <a href="{{ route('downloadfile', $item['id']) }}">
        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
			</button>
            <button class="btn btnDrk" type="input" value="Delete">
                    <a onclick="return confirm('Are you sure?')" href="{!! URL::route('files.getDelete',$item["id"]) !!}">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </button>
		</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
 

<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);

}
</script>
	
@stop
