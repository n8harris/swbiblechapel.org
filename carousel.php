<?php

  $carouselItems = $client->getItems('carousel_item')->getData();
?>
<div id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
      foreach($carouselItems as $index => $item) {
        if ($index == 0) {
          echo '<li data-target="#myCarousel" data-slide-to="' . $index . '" class="active"></li>';
        } else {
          echo '<li data-target="#myCarousel" data-slide-to="' . $index . '"></li>';
        }
      }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
      foreach($carouselItems as $index => $item) {
        if ($index == 0) {
          echo '<div class="item active" data-interval="' . $item['slide_interval'] . '">';
        } else {
          echo '<div class="item" data-interval="' . $item['slide_interval'] . '">';
        }
        $image = $client->getFile($item['image']->getData()['id'])->getData()['url'];
        echo '<img src="' . $image . '" class="img-responsive">';
        echo '<div class="container">';
        echo '<div class="carousel-caption">';
        echo '<h1>' . $item['heading'] . '</h1>';
        $links = json_decode($item['link'], true);
				if ($links) {
					foreach($links as $key => $link) {
						echo '<p><a href="' . $link . '" class="btn btn-lg btn-primary">' . $key . '</a></p>';
					}
				}
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    ?>
    </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>