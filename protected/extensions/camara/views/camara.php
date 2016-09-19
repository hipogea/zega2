<script src="webcam.js"></script>

    <div id="my_camera" style="width:320px; height:240px;"></div>
    <div id="my_result"></div>

    <script language="JavaScript">
        Webcam.attach( '#my_camera' );

        function take_snapshot() {
           Webcam.snap( function(data_uri) {
        // snap complete, image data is in 'data_uri'
        var username = 'jhuckaby';
    var image_fmt = 'jpeg';
    var url = 'myscript.php?username=' + username + '&format=' + image_fmt;
        Webcam.upload( data_uri,'<?php echo $accion; ?>', function(code, text) {
            // Upload complete!
            // 'code' will be the HTTP response code from the server, e.g. 200
            // 'text' will be the raw response content
        } );

    } );
        }
    </script>

    <a href="javascript:void(take_snapshot())">Take Snapshot</a>
    