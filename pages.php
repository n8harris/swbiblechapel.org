<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<?php
  $pageId = (empty($_GET['pid'])) ? '' : $_GET['pid'];
  if ($pageId == '') {
    echo '<h2 class="page-heading">Pages</h2>';
    echo '<div class="container">';
    echo '<div class="featurette">';
    echo '<p>Page not available</p>';
  } else {
    $content = array('title' => 'Pages', 'content' => '<p>Page not available</p>');
    $customPageContent = $client->getItem('custom_pages', $pageId);
    if ($customPageContent) {
      $customPageContentData = $customPageContent->getData();
      if ($customPageContentData) {
        $content = $customPageContentData;
      }
    }
    echo '<h2 class="page-heading">' . $content['title'] . '</h2>';
    echo '<div class="container">';
    echo '<div class="featurette">';
    $Parsedown = new Parsedown();
    echo $Parsedown->text($content['content']);
  }
  echo '</div>';
  echo '</div>';
?>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>