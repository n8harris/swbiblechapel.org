<?php
include('database-connect.php');

$serviceInfo = $_POST['service-info'];
$serviceArr = explode(':', $serviceInfo);
$serviceID = $serviceArr[0];

$sql = "SELECT speakerFirst, speakerLast, sermonTitle, filePath FROM sermons WHERE service_id = " . $serviceID;
$result = mysql_query($sql);

$row = mysql_fetch_array($result, MYSQL_ASSOC);
$fileArray = explode('/', $row['filePath']);
$file = $fileArray[count($fileArray) - 1];


$returnString =         '<div class="form-group">
						<label for="inputSpeakerFirst" class="control-label col-xs-2">Speaker First Name</label>
						<div class="col-xs-5">
							<input name="speaker-first" class="form-control" id="inputSpeakerFirst" value="' . $row['speakerFirst'] . '" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSpeakerLast" class="control-label col-xs-2">Speaker Last Name</label>
						<div class="col-xs-5">
							<input name="speaker-last" class="form-control" id="inputSpeakerLast" value="' . $row['speakerLast'] . '" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSermonTitle" class="control-label col-xs-2">Sermon Title</label>
						<div class="col-xs-5">
							<input name="sermon-title" class="form-control" id="inputSermonTitle" value="' . $row['sermonTitle'] . '" placeholder="Sermon Title">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAudioFile" class="control-label col-xs-2">Sermon Audio File</label>
						<div class="col-xs-5">
							<input name="sermon-audio-file" class="form-control" id="inputAudioFile" value="' . $file . '" placeholder="Sermon Audio File">
						</div>
					</div>';
						
echo $returnString;
?>