@extends('layouts.master')

@section('uploading-style')


@stop

@section('content')



    <main role="main" class="container">


        <div id="drag-drop-area" class="div-container"></div>
        <script src="https://transloadit.edgly.net/releases/uppy/v1.5.2/uppy.min.js"></script>
        <input type="hidden" name="upload" id="upload" data-action="{{route('upload_tus')}}"/>

        <script>
            var uppy = Uppy.Core()
                .use(Uppy.Dashboard, {
                    inline: true,
                    target: '#drag-drop-area',
                })
                .use(Uppy.Tus, { endpoint: 'http://localhost:8000/tus/' })

            uppy.on('complete', (result) => {
                var formData = new FormData();
                if (result.successful) {
                    for (let i in result.successful) {
                        formData.append(i, result.successful[i].data);
                    }
                    $.ajaxSetup({
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: $('#upload').data('action'),
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                    })
                    .done(function(e) {
                        window.location.href="/uploadManage";
                    })
                }

            })
        </script>

       

        <script>

            $('#inputGroupFile01').on('change', function () {
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
        
        @if(isset($User))
        <!-- <form action="/file/{{$User->id}}" method="post" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <div class="jumbotron">
                <img src="{{ asset('img/uploadimage.png') }}" style="height: 10%; width: 20%;" class="rounded" alt="File Upload" />
                <h2>Browse to Upload</h2>
                
                      {{ "Username: ". $User->name}}
                <br />
                {{"Id: ".$User->id}}
                <label for="id" class="label-text" value="{{ $User->id  }}">Id User: {{"Id: ".$User->id}}</label>

                <div class="input-group">
                    <label class="input-group-btn">
                        <span class="btn btnDrk">
                            <input type="file" name="file" class="custom-file" id="inputGroupFile01" style="display: inline;" />
                        </span>
                    </label>
           
                </div>

                <input type="submit" class="btn text-uppercase btnDrk" value="Upload" style="margin-top:5px; margin-bottom:10px;" />

                <a class="btn text-uppercase btnDrk" style="margin-top:5px; margin-bottom:10px;" href="{{ url('/uploadingqueue') }}">Upload Queue</a>


            </div>
        </form> -->
        @endif
    </main>
@stop
