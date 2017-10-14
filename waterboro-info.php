<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<h2 class="page-heading">Info on Waterboro, ME</h2>
<div class="container marketing">
	<div class="featurette waterboro-info" style="overflow: inherit">
				<div class="lead">
					<?php
						$url = 'https://en.wikipedia.org/w/api.php?action=parse&page=Waterboro,_Maine&format=json&prop=text&section=0';
						$userAgent = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
						$ch = curl_init($url);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt ($ch, CURLOPT_USERAGENT, $userAgent); // required by wikipedia.org server; use YOUR user agent with YOUR contact information. (otherwise your IP might get blocked)
						$c = curl_exec($ch);
						$json = json_decode($c);

						$content = $json->{'parse'}->{'text'}->{'*'};

						$doc = new DOMDocument("1.0", "utf-8");
						$doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8"));
						
						
						foreach($doc->getElementsByTagName('p') as $paragraph) {
							
							foreach ($doc->getElementsByTagName('a') as $e){

								$e->setAttribute('href','#');
								
							}
							echo $doc->saveHtml($paragraph);
						} 
						
						
							
					?>
				</div>
				
	</div>
	<p class="lead"><a href="http://en.wikipedia.org/wiki/Waterboro,_Maine" target="_blank" class="btn btn-lg btn-primary">View Entire Wikipedia Article</a></p>
</div>
<?php include('map.php') ?>
</div>
<?php include('footer.php') ?>