<?php
session_start();
$ismi = $_GET['ismi'];
$yol = $_SESSION[$ismi]['yol'];
$yeniyol = "videos/" . $yol;

?>
<head>
<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="./jquery.uploadfile.js"></script>
<style>
body {
	overflow-x: hidden;
	margin: 0 !important;
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
<input type="button" onclick="location.href='<?php echo "http://" . $_SERVER['SERVER_NAME'] . ":2132" ?>/index';" value="Geri Dön" />
<div class="row">
<?php
$sayfa = isset($_GET["sayfa"]) ? (int) $_GET["sayfa"] : 1;
if(empty($sayfa)) { $sayfa = 1; }
if($sayfa < 1) $sayfa = 1;
$dizin = glob($yeniyol."/*.{gif,mp4,webp,mov,mkv}", GLOB_BRACE); // Okunacak dizin ve dosya türleri

$sayfabasi_kayit = 24; // sayfa başı gösterilecek kayıt sayısı
$x = 8; //geçerli sayfanın Önceki Sonraki seçimleri arasında görünmesini istediğiniz adet sayfa butonu
$link = "?ismi=" . $ismi . "&sayfa=";
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
	
	$_SESSION[$dosyaadi]['yol'] = $dosyayolu;
	$_SESSION[$dosyaadi]['anime'] = $ismi;
	
	$movie = $dosyayolu;
	$thumbnail = 'resimler/'.$dosyaadi . '.png';
	require 'vendor/autoload.php';
	if(file_exists($thumbnail)) {
	}else{
		$ffmpeg = FFMpeg\FFMpeg::create();
		$video = $ffmpeg->open($movie);
		$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
		$frame->save($thumbnail);
	}
	
	$links = "http://" . $_SERVER['SERVER_NAME'] . ':2132/watch?v=' . $dosyaadi . '&sayfa=' . $sayfa; 
	echo "<div style='max-width:200px;min-width:200px;display:block;margin-left:10px;margin-top:10px;position: relative;'>";
	echo '<a style="text-decoration:none;color:white;font-size:11px;" href="'. $links . '" >';
	echo '<img src="'.$thumbnail.'" width="200" height="auto" ></img>';
	$_SESSION['isim'][$dosyayolu] = $isim;
	$_SESSION['resim'][$dosyayolu] = $thumbnail;
	if(isset($_SESSION['izlendimi'][$dosyayolu])) {
		$izlendimii = $_SESSION['izlendimi'][$dosyayolu];
		if($izlendimii > "0") {
		echo "<div style='color:red;position: absolute;top: 2px;right: -5px;font-weight: bold;'><h6>İZLENDİ</h6></div>";
		echo "<div style='position: absolute;bottom: 2px;left: 13px;font-weight: bold;'>". $isim ."</div></a>";
		
		}else {
		echo "<div style='position: absolute;bottom: 2px;left: 13px;font-weight: bold;'>". $isim ."</div></a>";
		}
	}else {
		echo "<div style='position: absolute;bottom: 2px;left: 13px;font-weight: bold;'>". $isim ."</div></a>";
	}
	
	
	
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