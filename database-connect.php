<?php
$db = mysql_connect("localhost:33060","homestead","secret");
if (!$db) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("swbiblec_main");
?>
