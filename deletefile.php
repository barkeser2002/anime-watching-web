<?php
session_start();
$filename = $_GET['file']; //get the filename
$thumbnail = $_SESSION['resim'][$filename];
unlink($filename); //delete it
unlink($thumbnail); //delete it
echo $filename . " SİLİNDİ<br>";
echo $thumbnail . " SİLİNDİ";
?>