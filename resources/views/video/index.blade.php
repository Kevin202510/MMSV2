@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('css')
<style type="text/css">
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
	</style>
@endsection

@section('content')
<section class="section">
<div class="section-header">
            <h3 class="page__heading">Video Feeder</h3>
            <div class="section-header-breadcrumb">
            <nav aria-label="breadcrumb">
              @include('layouts.breadcrum')
            </nav>
            <!-- <button type="button" class="btn btn-primary" id="generateReport" >Generate Report <i class="far fa-file-invoice"></i></button> -->
            </div>
        </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0" style="text-align:center;">
                    <div class="container-lg" id="my_camera">
                        <span class="fa fa-camera" style="font-size: 200px;"></span>
                    </div><br><br>
                    <button type="button" class="btn btn-primary" onclick="startCam();">Feed Camera<i class="fa fa-camera"></i></button>
                    <br><br>
                    <form>
                        <div id="pre_take_buttons">
                            <input type=button value="Take Snapshot" onClick="preview_snapshot()">
                        </div>
                        <div id="post_take_buttons" style="display:none">
                            <input type=button value="&lt; Take Another" onClick="cancel_preview()">
                            <input type=button value="Save Photo &gt;" onClick="save_photo()" style="font-weight:bold;">
                        </div>
                    </form>
                    <div class="container-lg" id="results"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<!-- First, include the Webcam.js JavaScript Library -->
<script type="text/javascript" src="{{ asset('js/webcam.min.js') }}"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		function startCam(){
            Webcam.set({
			width: 950,
			height: 350,
			image_format: 'jpeg',
			jpeg_quality: 120
		});
		Webcam.attach( '#my_camera' );
        }
	</script>

    <!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function preview_snapshot() {
			// freeze camera so user can preview pic
			Webcam.freeze();
			
			// swap button sets
			document.getElementById('pre_take_buttons').style.display = 'none';
			document.getElementById('post_take_buttons').style.display = '';
		}
		
		function cancel_preview() {
			// cancel preview freeze and return to live camera feed
			Webcam.unfreeze();
			
			// swap buttons back
			document.getElementById('pre_take_buttons').style.display = '';
			document.getElementById('post_take_buttons').style.display = 'none';
		}
		
		function save_photo() {
			// actually snap photo (from preview freeze) and display it
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
				
				// swap buttons back
				document.getElementById('pre_take_buttons').style.display = '';
				document.getElementById('post_take_buttons').style.display = 'none';
			} );
		}
	</script>

@endsection

