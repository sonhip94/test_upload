<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TusPHP - Demo</title>
	<script src="https://cdn.jsdelivr.net/npm/tus-js-client@1.8.0/dist/tus.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background: #eee;
            letter-spacing: 0.5px;
            line-height: 1.5em;
            font-family: Lato, Helvetica Neue, Helvetica, Arial, sans-serif;
            margin-top: 40px;
        }

        .container {
            position: relative;
            background: #fff;
            margin: 0 auto;
            font-weight: 300;
            font-size: 1.1em;
            border-top: 5px solid #70B7FD;
        }

        h1 {
            font-size: 2em;
            line-height: 1.3em;
        }

        h3 {
            font-size: 1.5em;
        }

        .gutter-bottom {
            margin-bottom: 15px;
        }

        ol, ul {
            margin-top: 5px;
            padding-bottom: 2.5rem;
        }

        ol li, ul li {
            margin: 1rem 0;
            padding-left: 5px;
        }

        .completed-uploads .panel-body {
            font-weight: bold;
            text-align: center;
            font-size: 1em;
        }

        .progress {
            height: 30px;
            display: none;
        }

        .progress span {
            font-weight: bold;
            display: inline-block;
            margin-top: 5px;
            padding: 0 5px;
        }

        .file-input {
            position: relative;
            overflow: hidden;
            margin: 0;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .file-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .project-info {
            text-align: center;
            padding: 5px;
            margin-top: 10px;
        }

        a.github-corner svg {
            z-index: 9999;
        }

        .github-corner:hover .octo-arm {
            animation: octocat-wave 560ms ease-in-out
        }

        @keyframes octocat-wave {
            0%, 100% {
                transform: rotate(0)
            }
            20%, 60% {
                transform: rotate(-25deg)
            }
            40%, 80% {
                transform: rotate(10deg)
            }
        }

        @media (max-width: 500px) {
            .github-corner:hover .octo-arm {
                animation: none
            }

            .github-corner .octo-arm {
                animation: octocat-wave 560ms ease-in-out
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Tus-php Demos</h1>
            <h3 class="gutter-bottom">Instructions</h3>
			Upload File:
			<input type="file" id="fileUploader" onchange="handleFileChange" name="fileUploader" accept="*/*" />
                

            
        </div>

    </div>
</div>
<div class="project-info">
    <a href="https://github.com/ankitpokhrel/tus-php">View this project in GitHub &#8594</a>
</div>
	<script type="text/javascript">
		function handleFileChange(e) {
			var file = e.target.files[0]

			// Create a new tus upload
			var upload = new tus.Upload(file, {
				endpoint: "http://homestead.test/tus/",
				retryDelays: [0, 3000, 5000, 10000, 20000],
				metadata: {
					filename: file.name,
					filetype: file.type
				},
				onError: function (error) {
					console.log("Failed because: " + error)
				},
				onProgress: function (bytesUploaded, bytesTotal) {
					var percentage = (bytesUploaded / bytesTotal * 100).toFixed(2)
					console.log(bytesUploaded, bytesTotal, percentage + "%")
				},
				onSuccess: function () {
					console.log("Download %s from %s", upload.file.name, upload.url)
				}
			})

			// Start the upload
			upload.start();
		}
		function attachUploadListener(){
			var input = document.getElementById('fileUploader');
			input.addEventListener("change", function (e) {
			// Get the selected file from the input element
				handleFileChange(e);
				})
			}	
	</script>
</body>
</html>
