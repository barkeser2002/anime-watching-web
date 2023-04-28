<head>
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="./jquery.uploadfile.js"></script>
<style>
body {
		overflow-x: hidden;
	margin: 0;
	background-color: black !important;
	text-decoration: none !important;
	color: white !important;
}
#aaa {
	text-decoration: none !important;
	color: white !important;
}
#sssssss,#name {
	display: inline !important;
	width: 35% !important;


}
.sayfala, li a {
	color: white !important;
	text-decoration: none !important;
} 
</style>
<style>
body {
background-color: black !important;
}
.sayfala {
	margin-top: 10px !important;
	text-decoration: none !important;
	color: black !important;
} 
.sayfala, li {
	cursor:pointer  !important;
	margin-right: 8px !important;
	font-size: 16px !important;
	color:white !important;
	text-decoration: none !important;
	display: inline-block !important;
	padding: 2px 3px !important;
	background-color: black !important;
	border: 1px solid #ccc !important;
	border-radius: 2px !important;
} 
.sayfala, li:hover, li.current {
	color: red;background-color: brown;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="row">
<?php
session_start();
$sayfa = isset($_GET["sayfa"]) ? (int) $_GET["sayfa"] : 1;
if(empty($sayfa)) { $sayfa = 1; }
if($sayfa < 1) $sayfa = 1;
$dizin = glob("videos/*", GLOB_BRACE); // Okunacak dizin ve dosya türleri

$sayfabasi_kayit = 24; // sayfa başı gösterilecek kayıt sayısı
$x = 8; //geçerli sayfanın Önceki Sonraki seçimleri arasında görünmesini istediğiniz adet sayfa butonu
$link = "?sayfa=";
natsort($dizin); // Dizin Sıralama kuralı diğer sıralama kuralları için https://www.php.net/manual/tr/array.sorting.php

$toplamkayit = count($dizin);
$toplamsayfa = ceil($toplamkayit / $sayfabasi_kayit);
if($sayfa > $toplamsayfa) { $sayfa = 1; }
$baslangic = ($sayfa-1)*$sayfabasi_kayit;
$dizinliste = array();

if($dizin){ //$dizin false veya boş değilse  
    $dizinliste = ($toplamkayit > $sayfabasi_kayit) ? array_slice($dizin,$baslangic,$sayfabasi_kayit) : $dizin;
} else {
	echo "Bu dizinde dosya bulunamadı!";
}

foreach ($dizinliste as $dosyayolu) { // $dizinliste'ye alınan dosyaları sayfaya yazdırıyoruz
    $dosyaadi = basename($dosyayolu);	
	$sec = 60;
	$isim = $dosyaadi;
	$isim = str_replace('.mp4', "", $isim);
	$isim = str_replace('-', " ", $isim);
	$isim = str_replace('_', " ", $isim);
		$isim = strtoupper($isim);

	$movie = $dosyayolu . "/" . $dosyaadi ."-1-bolum.mp4";
	$thumbnail = 'images/'.$dosyaadi . '.png';
	require 'vendor/autoload.php';
	if(file_exists($thumbnail)) {
	}else{
		$movie = $dosyayolu . "/" . $dosyaadi ."-1-bolum.mp4";
		if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-2-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-3-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-4-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-5-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-6-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-7-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-8-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-9-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-10-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-11-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-12-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-13-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-14-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-15-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-16-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-17-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-18-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-19-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-20-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-21-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-22-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-23-bolum.mp4";
			if(file_exists($movie)) {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($movie);
			$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
			$frame->save($thumbnail);
		}else{
			$movie = $dosyayolu . "/" . $dosyaadi ."-24-bolum.mp4";
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
		}
	}
	$kaydet = $dosyayolu;
	$kaydet = str_replace('videos/', "", $kaydet);
	$_SESSION[$kaydet]['yol'] = $kaydet;
	$links = "http://" . $_SERVER['SERVER_NAME'] . ':2132/anime?ismi=' . $kaydet; 
	echo "<div style='max-width:200px;display:block;margin-left:10px;margin-top:10px;position: relative;'>";
	echo '<a style="text-decoration:none;color:white;font-size:11px;" href="'. $links . '" >';
	echo '<img src="'.$thumbnail.'" width="200" height="auto" ></img>';
	echo "<div style='position: absolute;bottom: 2px;left: 13px;font-weight: bold;'>". $isim ."</div></a>";
	echo "</div>";

	
	?>
	


	
	
	
	
	
	<?php
}?>
</div><p>&nbsp;
<div style="position: absolute;bottom:-70px;left:10px;min-width:250px;height:50px;">

<?php
echo '<br>';
//  « İlk  Önceki 1 [2] 3 4 Sonraki Son » butonları oluşturan kodlar
$sayfala = "";
if($toplamkayit > $sayfabasi_kayit) {
	if($sayfa > 1){
		$onceki = $sayfa-1;
		$sayfala .="<li><a href=\"".$link."1\">&laquo; İlk</a></li>";
		$sayfala .="<li><a href=\"".$link.$onceki."\">Önceki</a></li>";
	}
	if($sayfa==1){ $sayfala .="<li><a class=\"current\">[1]</a></li>"; }
	elseif($sayfa-$x < 2){ $sayfala .="<li><a href=\"".$link."1\">1</a></li>"; }   
	if($sayfa-$x > 2){ $i = $sayfa-$x; }else{ $i = 2; } 
	if($sayfa-$x-10 > 0){ $sayfala .="<li><a class=\"current\" href=\"".$link.($sayfa-$x-10)."\">[".($sayfa-$x-10)."]</a></li>"; }
	for($i; $i<=$sayfa+$x; $i++) { 
		if($i==$sayfa){ $sayfala .="<li><a class=\"current\">[$i]</a></li>"; }else{ $sayfala .="<li><a href=\"".$link.$i."\">$i</a></li>"; }
		if($i==$toplamsayfa) break; 
	} 
	if($sayfa+$x+10 < $toplamsayfa){ $sayfala .="<li><a class=\"current\" href=\"".$link.($sayfa+$x+10)."\">[".($sayfa+$x+10)."]</a></li>"; }
	if($sayfa < $toplamsayfa){
		$sonraki = $sayfa+1; $sayfala .="<li><a href=\"".$link.$sonraki."\">Sonraki</a></li>";
		$sayfala .="<li><a href=\"".$link.$toplamsayfa."\">Son &raquo;</a></li> ";
	} 
}
echo $sayfala;
echo "<br>";
echo "Toplam: ".$toplamsayfa." sayfa, şu anda ".$sayfa.". Sayfadasiniz..";
?>
</div>
</body>