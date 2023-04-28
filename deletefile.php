<?php
session_start();
$filename = $_GET['file'];
$thumbnail = $_SESSION['resim'][$filename];
unlink($filename);
unlink($thumbnail);
echo $filename . " SİLİNDİ<br>";
echo $thumbnail . " SİLİNDİ";
?>