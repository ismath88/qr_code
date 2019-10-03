<?php
$text = '';
$color = 'ff0000';
$rotation = 0;
$download = false;
$url = '';

if ( isset($_POST['submit']) && $_POST['submit'] == 'Submit' ) {
    $text = filter_input(INPUT_POST, 'text');
    $color = filter_input(INPUT_POST, 'color');
    $rotation = filter_input(INPUT_POST, 'rotation', FILTER_VALIDATE_INT);
    $download = filter_input(INPUT_POST, 'download', FILTER_VALIDATE_BOOLEAN);


    if ( $text != '' && $text ) {

        if($_POST['rotation']) {
            $rotn = $_POST['rotation'];
            switch($rotn) {
                case 'Rotation1':
                    $angle = 45;
                    break;
                case 'Rotation2':
                    $angle = 180;
                    break;
                case 'Rotation3':
                    $angle = 90;
                    break;
                default:
                    $angle = 0;
            }

            $url = '/qr_pass.php?text=' . urlencode($text) . '&color=' . urlencode($color).'&angle=' . urlencode($angle);

        }
        else {
            if(!$_POST['rotation']) {

                $url = '/qr_pass.php?text=' . urlencode($text) . '&color=' . urlencode($color).'&angle=' . urlencode(0);
            }
        }

    }

    if($_POST['download']) {
        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

        $file = $_SERVER["DOCUMENT_ROOT"]."temp/new_qrcode.png";

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
        else {
            echo $_SERVER["DOCUMENT_ROOT"] ."qr_code.png";
        }
    }
}
?>
<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>QR Code Using Plain PHP</title>
        <meta name="description" content="QR Code">
        <meta name="author" content="Ismath">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link  rel="stylesheet" type="text/css" href="/static/css/colorpicker.css" >
        <style type="text/css">
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
            .colorpicker_field input {
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
                -webkit-transition: none;
                -moz-transition: none;
                -ms-transition: none;
                -o-transition: none;
                transition: none;
                border-color: none;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
                outline: none;
                outline: none;
                width: 60px !important;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">QR Code Trial</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span6">
                    <h6>Please input details</h6>
                    <hr/>
                    <form action="qr_via_php.php" method="post">
                        <label for="text">Text:</label> <input type="text" id="text" name="text" value="<?php echo $text; ?>"/><br/>
                        <label for="color">Color:</label> <input type="text" id="color" name="color" value="<?php echo $color; ?>"/><br/>
                        <div>
                            <label class="radio" for="rotation1"><input type="radio" id="rotation1" value="Rotation1" name="rotation" <?php echo $rotation ?>/>Rotation1</label>
                            <label class="radio" for="rotation2"><input type="radio" id="rotation2" value="Rotation2" name="rotation" <?php echo $rotation ?>/>Rotation2</label>
                            <label class="radio" for="rotation3"><input type="radio" id="rotation3" value="Rotation3" name="rotation" <?php echo $rotation ?>/>Rotation3</label>
                        </div>
                        <label class="checkbox" for="download"><input type="checkbox" id="download" value="1" name="download" <?php if ( $download ) echo "checked=\"checked\""; ?>/>Download the file</label>
                        <hr/>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary" >
                    </form>
                </div>

                <div class="span6">
                    <div id="colorpicker"></div>
                    <div style="padding: 20px;">&nbsp;</div>
                    <div class="well">
                        <?php if( $url != '' ): ?>
                        <img src="<?php echo $url; ?>"/>
                        <?php endif ?>

                    </div>

                </div>
            </div> 
        </div> <!-- /container -->
        <script type="text/javascript" src="/static/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="/static/js/colorpicker.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#colorpicker').ColorPicker({
                    flat: true,
                    color: '#' + '<?php echo $color; ?>',
                    onChange: function (hsb, hex, rgb) {
                        document.getElementById('color').value = hex;
                    }
                });
            });
        </script>
    </body>
</html>
