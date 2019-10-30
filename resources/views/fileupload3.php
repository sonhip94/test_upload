<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>tus-js-client demo - File Upload</title>
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet" />
	  <script src="https://cdn.jsdelivr.net/npm/tus-js-client@1.8.0/dist/tus.js"></script>
	 
	   <script src="js/demo.js" rel="stylesheet" media="screen"> </script>
	  
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   
	  <style>
          body {
              padding-top: 40px;
          }

          .progress {
              height: 32px;
          }

          a.btn {
              margin-bottom: 2px;
          }
	</style>
  </head>
  <body>
    <div class="container">
      <h1>File Upload</h1>

      <div class="alert alert-warining hidden" id="support-alert">
        <b>Warning!</b> Your browser does not seem to support the features necessary to run tus-js-client. The buttons below may work but probably will fail silently.
      </div>
      <br />
      <table>
        <tr>
          <td>
            <label for="endpoint">
              Upload endpoint:
            </label>
          </td>
          <td>
            <input type="text" id="endpoint" name="endpoint" value="https://master.tus.io/files/">
          </td>
        </tr>
        <tr>
          <td>
            <label for="chunksize">
              Chunk size (bytes):
            </label>
          </td>
          <td>
            <input type="number" id="chunksize" name="chunksize">
          </td>
        </tr>
        <tr>
			  <td>
					<label for="resume">
					  Perform full upload:
					  <br />
					  <small>(even if we could resume)</small>
					</label>
			  </td>
				<td>
					<input type="checkbox" id="resume">
				</td>
        </tr>
      </table>

      <br />

      <input type="file">

      <br />
      <br />

      <div class="row">
        <div class="span8">
          <div class="progress progress-striped progress-success">
            <div class="bar" style="width: 0%;"></div>
          </div>
        </div>
        <div class="span4">
          <button class="btn stop" onclick="abc" id="toggle-btn">start upload</button>

        </div>
      </div>

      <hr />

      <h3>Uploads</h3>
      <p id="upload-list">
        Succesful uploads will be listed here. Try one!
      </p>

    </div>
	
  </body>
      
</html>
