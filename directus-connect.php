<?php 
  require 'vendor/autoload.php';

  $client = \Directus\SDK\ClientFactory::create('J5XSNBl02F1C4Dxro0GL6RUt95pkgpSM', [
      // Directus API Path without its version
      'base_url' => 'http://swbiblechapel.org/cms',
      'version' => '1.1' // Optional - default 1
  ]);
?>