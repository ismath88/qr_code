
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link  rel="stylesheet" type="text/css" href="static/css/qrcode.css"/>
        <link  rel="stylesheet" type="text/css" href="static/css/colorpicker.css" >
        <script type="text/javascript" src="static/js/jquery.js"></script>
        <script type="text/javascript" src="static/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="static/js/jquery.qrcode.min.js"></script>
        <script type="text/javascript" src="static/js/colorpicker.js"></script>


    </head>
    <body  onload="colorpicker();" id="body">
        <div id="main" >
        </div>
        <form action="qrindex.php" method="post">
            <div id="textarea-div" class="Blsk-txt-div-ct" >
                Enter Your Text Here:<br>
                <textarea cols="25" rows="4" name="text_area" id="text_area" ></textarea>
            </div>
            <input type="text" id="color_box" name="color_box">
            <input type="submit" name="submit" value="Submit" class="sub-button" >
        </form>

        <div id="label" class="Blsk-qr-code-label">QRCODE:</div>
        <div id="qrcode_image_div" class="Blsk-qr-image-div">
            <!--div id="qrcode_image" class="Blsk-qr-image"-->

            <?php


            global $value;
            $value= $_POST['text_area'];


            if($_POST['text_area'] != '' ) {
                //echo "<div style='display:none'><img src=http://localhost/qr_pass.php?val=".$value."  alt=''/></div>";

                echo "<img src=http://localhost/qr_pass.php?val=".$value." >";
                //echo  "<img src=http://localhost/qr_pass.php?val=".$value."&color=".$color."/>";

            }
             
                   if($_POST['text_area'] == '')
              echo "<img id='new'>";
                //echo "<img src=http://localhost/qr_pass.php?val=".$value."&color=".$color."/>";
               // echo "<img src=http://localhost/test.php?color=".$color."/>";
                
            

            if( isset($_POST['rotate']) && $_POST['rotate']) {

                echo "<img src=http://localhost/rotate.php />";
            }
            ?>

        </div>
        <!--/div-->

        <form action="qrindex.php" method="post">
            <input type="submit" name="download" value="Download" class="Blsk-download-image" >
        </form>
        <?php
        if($_POST['download']) {

            $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

            $file = $PNG_TEMP_DIR."qr_code.png";

            //$file = 'temp/qr_code.png';

            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
            }
        }

        ?>

        <form action="qrindex.php" method="post">
            <div id="rotate_div" class="Blsk-rot-btn-div"><input type="submit" name="rotate" value="Rotate" class="Blsk-rot-image" ></div>
        </form>
        <div id="colorpicker" class="Blsk-color-picker" >
        </div>
        <script type="text/javascript" src="static/js/getcolor.js"></script>
        <div><?php
            //echo  "<img src=http://localhost/qr_pass.php?val=".$value."&color=".$box."/>";
            echo "<img id='new'>"
            ?></div>
    </body>
</html>
