<?php
session_start();
$url = $_GET['v'];
$yenidosya = $_SESSION[$url]['yol'];
$anime = $_SESSION[$url]['anime'];


$sayfa = $_GET['sayfa'];
$name = $yenidosya;
$videoslug = $yenidosya;


if(empty($_SESSION['izlendimi'][$yenidosya])) {
  $keyy =1;
  $_SESSION['izlendimi'][$yenidosya] = $keyy;
  echo "Yeni İzleniyor : ".$keyy;
}else {
	$keyy = $_SESSION['izlendimi'][$yenidosya] ;
	$keyy +=1;
  $_SESSION['izlendimi'][$yenidosya] = $keyy;
  echo "İzlendi Şu Kadar : ".$keyy;
}
$isim = $_SESSION['isim'][$yenidosya];
$yeniid = $_SESSION['isim'][$yenidosya];
$yeniid = str_replace(' ', "", $yeniid);

?>
<head>
<title><?php echo $isim; ?> - Barış Keser Archives</title>
<meta name='title' content='<?php echo $isim; ?>'>
<meta name='description' content=''>
<meta property='og:title' content='<?php echo $isim; ?>'>
<style>
dom-bind,dom-if,dom-repeat{
	display:none;
}
.artplayer-app {
	width: 150vmin;
	height: 75vmin;
	display: block;
	margin: 0 auto;
}
body {
	marging:auto;
	padding:auto;
	background-color:black;
	color:white;
	text-align: center;
}

</style></head>
</head>
<body>
<input type="button" onclick="location.href='<?php echo "http://" . $_SERVER['SERVER_NAME'] . ":2132"  ?>/anime?ismi=<?php echo $anime; ?>';" value="Geri Dön" /> <input type="button" onclick="location.href='deletefile?file=<?php echo $yenidosya; ?>';" value="VİDEOYU SİL" />  <h2>
<?php echo $isim; ?></h2><br>
    <div class="artplayer-app"></div>
	<script src="https://unpkg.com/artplayer/dist/artplayer.js"></script>
<script>


var art = new Artplayer({
    container: '.artplayer-app',
    url: '<?php echo $yenidosya; ?>',
    title: '<?php echo $isim; ?>',
    poster: '<?php echo 'images/'.$url . '.png';?>',
    volume: 0.5,
    isLive: false,
    muted: false,
    autoplay: false,
    pip: true,
    autoSize: true,
    autoMini: false,
    screenshot: false,
    setting: true,
    loop: true,
    flip: false,
    playbackRate: true,
    aspectRatio: true,
    fullscreen: true,
    fullscreenWeb: true,
    subtitleOffset: true,
    miniProgressBar: true,
    mutex: true,
    backdrop: true,
    playsInline: true,
    autoPlayback: true,
    airplay: true,
    theme: '#23ade5',
    lang: navigator.language.toLowerCase(),
    whitelist: ['*'],
    moreVideoAttr: {
        crossOrigin: 'anonymous',
    },
    quality: [
        {
            default: true,
            html: 'Orjinal Kalite',
            url: '<?php echo $yenidosya; ?>',
        },
    ],
});


</script>



</body>