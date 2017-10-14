<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body { font-family: 'Capsuula', sans-serif; background: url('./images/tweed.png'); }
#loaderImage {
	position: absolute;
	z-index: 9999;
}
</style>
<link rel="shortcut icon" href="/images/swbc-icon.ico">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./css/swbc-style.css">
<link rel="stylesheet" type="text/css" href="./css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="./css/datepicker3.css"/>
<link href="./css/oiplayer.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.main-container {
    /* Hide it for nifty fade-in effect */
    display: none;
}
</style>
<!-- Fallback for non-JavaScript people -->
<noscript>
<style type="text/css">
.main-container {
    /* Re-displays it by overriding the above */
    display: block;
}
</style>
</noscript>

<script type="text/javascript" src="./scripts/modernizr.custom.12245.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.11.1.js"></script>

<script type="text/javascript" src="./scripts/bootstrap.js"></script>
<title>South Waterboro Bible Chapel</title>
<meta name="description" content="South Waterboro Bible Chapel">
</head>
<body>
<div id="loaderImage"></div>
<script type="text/javascript">
	var cSpeed=8;
	var cWidth=72;
	var cHeight=72;
	var cTotalFrames=22;
	var cFrameWidth=72;
	var cImageSrc='./images/sprites.png';
	
	var cImageTimeout=false;
	var cIndex=0;
	var cXpos=0;
	var cPreloaderTimeout=false;
	var SECONDS_BETWEEN_FRAMES=0;
	
	function startAnimation(){
		
		document.getElementById('loaderImage').style.backgroundImage='url('+cImageSrc+')';
		document.getElementById('loaderImage').style.width=cWidth+'px';
		document.getElementById('loaderImage').style.height=cHeight+'px';
		document.getElementById('loaderImage').style.top = Math.round(($(window).height() - cHeight) / 2) + 'px';
		document.getElementById('loaderImage').style.left = Math.round(($(window).width() - cWidth) / 2) + 'px';
		
		
		//FPS = Math.round(100/(maxSpeed+2-speed));
		FPS = Math.round(100/cSpeed);
		SECONDS_BETWEEN_FRAMES = 1 / FPS;
		
		cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES/1000);
		
	}
	
	function continueAnimation(){
		
		cXpos += cFrameWidth;
		//increase the index so we know which frame of our animation we are currently on
		cIndex += 1;
		 
		//if our cIndex is higher than our total number of frames, we're at the end and should restart
		if (cIndex >= cTotalFrames) {
			cXpos =0;
			cIndex=0;
		}
		
		if(document.getElementById('loaderImage'))
			document.getElementById('loaderImage').style.backgroundPosition=(-cXpos)+'px 0';
		
		cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES*1000);
	}
	
	function stopAnimation(){//stops animation
		clearTimeout(cPreloaderTimeout);
		cPreloaderTimeout=false;
	}
	
	function imageLoader(s, fun)//Pre-loads the sprites image
	{
		clearTimeout(cImageTimeout);
		cImageTimeout=0;
		genImage = new Image();
		genImage.onload=function (){cImageTimeout=setTimeout(fun, 0)};
		genImage.onerror=new Function('alert(\'Could not load the image\')');
		genImage.src=s;
	}
	
	//The following code starts the animation
	new imageLoader(cImageSrc, 'startAnimation()');
	
	$(document).ready(function() {
		$('#message').css("position", "absolute").css("left", -9999);
	});
	
	$(window).load(function() {
	setTimeout(function(){
		document.getElementById('message').style.top = Math.round(($(window).height() - $('#message').height()) / 2) + 'px';
		$('.container').hide();
		$('#message').css("position", "").css("left", "");
		$('.container').fadeIn(1000);
		$("#loaderImage").fadeOut(1000);
	}, 800);
  });
</script>
<div class="container">
<div id="message" class="col-sm-12 center-block" style="text-align:center">
	<img src="/images/swbc-logo-404.png" class="not-found-image"/>
	<h1 style="color:#fff">404</h1>
	<p style="color:#fff">We're sorry the requested page cannot be found.</p>
	<p><a href="/" class="btn btn-lg btn-primary">Go to Our Home Page</a></p>
</div>
</div>

</body>
</html>