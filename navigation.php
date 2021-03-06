</head>
<body>
<?php 
    include('googleAnalytics.php');
	include('contact-modal.php');
	include('database-connect.php');
 ?>
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
</script>
<div class="main-container">
<header class="dg-header" id="dg-header">
	
	<div class="dg-header-top">
		<div class="container-fluid">
			<div class="center-block col-sm-12 top-links">
				<div>
					<a class="dg-nav-link-btn go-to-map" href="#map_canvas" title="Church Location"><i class="fa fa-map-marker fa-lg"></i>Church Location</a>
					<a data-toggle="modal" href="#contact-modal" class="dg-nav-link-btn contact-person" data-contact-email="secretary@swbiblechapel.org" title="Contact Us"><i class="fa fa-envelope fa-lg"></i>Contact Us</a>
				</div>
			</div>
		</div>
	</div>
	<div class="navbar dg-navbar" role="navigation">
		<a href="/" >
						<img class="dg-header-logo" src="./images/swbc-logo.png" alt="SWBC">
		</a>
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="mainNavigation">
				<div class="col-sm-offset-2 col-sm-9">
					<ul class="nav navbar-nav">
					<?php
						$navItems = $client->getItems('navigation_item')->getData();

						foreach($navItems as $navItem) {
							if ($navItem['include_in_navbar']) {
								if ($navItem['dropdown_links']) {
									echo '<li class="dropdown">';
									echo '<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#">' . $navItem['title'] . '</a>';
									echo '<ul class="dropdown-menu">';
									$links = json_decode($navItem['dropdown_links'], true);
									if ($links) {
										foreach($links as $key => $link) {
											echo '<li><a href="' . $link . '">' . $key . '</a></li>';
										}
									}
									echo '</ul>';
									echo '</li>';
								} else {
									echo '<li class="no-drop"><a href="' . $navItem['link'] . '">' . $navItem['title'] . '</a></li>';
								}
							}
						}
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="dg-header-search">
	</div>
</header>
