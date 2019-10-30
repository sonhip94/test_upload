<div class="modal fade" id="homeVideo{{ $id }}">
  <div class="modal-dialog" >
  <div class="modal-header">
        <button type="button" class="btn btnDrk" data-dismiss="modal">
    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
  </div>
    <div class="modal-content">
      <div class="embed-responsive embed-responsive-16by9">
        <!-- <div id="myvideo5">Loading the player...
    <script src="https://cdn.jwplayer.com/players/IeNZL5Lw-a9PWVDut.js"></script>
    </div> -->
     <video width="800" height="600" controls>
        <source src="{{ \Storage::url('videos/') . $video['name'] }}" type="video/mp4">
      Your browser does not support the video tag.
      </video>

      </div>
    </div>
  
  </div>
</div>
