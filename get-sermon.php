<?php
include ('directus-connect.php');

$sermonId = (empty($_GET['id'])) ? '' : $_GET['id'];

if($sermonId == ''){
	echo 'nofill';
} else {
	$sermon = $client->getItem('sermon', $sermonId)->getData();
	
	if(!$sermon){
		echo 'nofill';
	} else {
		$speaker = $client->getItem('speaker', $sermon['speaker']->getData()['id'])->getData();
		$imgUrl = $client->getFile($speaker['speaker_image']->getData()['id'])->getData()['url'];
		echo $speaker['speaker_first'] . "|" . $speaker['speaker_last'] . "|" . $imgUrl . "|" . $sermon['sermon_title'] . "|";
		if(isset($sermon['is_video'])){
			if(!$sermon['is_video']){
				echo $sermon['file_path'] . "|" . false;
			} else {
				echo $sermon['file_path'] . "|" . true;
			}
		}

	}
}
?>