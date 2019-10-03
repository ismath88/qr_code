<?php
header("Content-Type: image/png");
header("Content-Disposition: attachment; filename=".basename($_GET['path']));
readfile($_GET['path']);
function myname(){
    echo "download";
}
?>
