@extends('layouts.master')

@section('videoUpload-style')
<!-- CSS goes here -->

.buttonSpace {
  margin-left: 2px;
  margin-right: 2px;
  margin-bottom: 5px;
}

                           
    
@stop



@section('content')
<div class="text-center" >
  <h1>Video Viewer</h1>
</div>
  

 <div class="table-responsive" style="margin: 0% 10% 10% 5%;">  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th style="width:5%">#</th>
        <th style="width:60%">Video Name</th>
        <th style="width:10%">Length</th>
        <th style="width:10%">Date Added</th>
        <th style="width:15%"></th>
      </tr>
    </thead>
    <tbody>
      <!-- <script src="https://cdn.jwplayer.com/players/IeNZL5Lw-a9PWVDut.js"></script> -->
      <!-- <script>jwplayer.key = "{chỗ này điền key đã lấy bên trên}";</script> -->
      @foreach ($data as $video)
      <tr>
            <td>{{ $video['id'] }}</td>
            <td><a data-toggle="modal" data-target="#homeVideo{{ $video['id'] }}">{{ $video['name'] }}</a></td>
            <td>05:00</td>
            <td>{{ $video['createDate'] }}</td>
            <td>
            @include('modal_video', ['id' => $video['id'], 'video' => $video])
      <button class="btn btnDrk" type="button">
           <a href="{{ route('downloadfile-video', $video['id']) }}">
        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
      </button>
            <button class="btn btnDrk" type="input" value="Delete">
                    <a onclick="return confirm('Are you sure?')" href="{!! URL::route('files.getDelete_videos',$video["id"]) !!}">
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



<!-- <script type="text/javascript">
    jwplayer("myvideo5").setup({
        file: "http://mydomain/mymovie.mp4",
        image: "http://mydomaincom/muposterpic.png",
        width: "100%",
        aspectratio: "16:9"
    });
  
  
</script> -->


@stop

