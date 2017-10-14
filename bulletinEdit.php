<?php
include('database-connect.php');

$serviceInfo = $_POST['service-info-bulletin'];
$serviceArr = explode(':', $serviceInfo);
$serviceID = $serviceArr[0];

$sql = "SELECT bulletin_id, worshipFirst, worshipLast, prayerFirst, prayerLast, pastorFirst, pastorLast, sermonTitle, sermonVerse, nurseryLeaders, juniorLeaders FROM bulletins WHERE service_id = " . $serviceID;
$result = mysql_query($sql);

$row = mysql_fetch_array($result, MYSQL_ASSOC);
$bulletinID = $row['bulletin_id'];
$sqlAnnouncements = "SELECT content FROM announcements WHERE bulletin_id = " . $bulletinID;
$resultAnnouncements = mysql_query($sqlAnnouncements);

$returnString = 
						'<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label>
							  <input type="checkbox" name="cancelled-service" id="cancelCheckbox" value="' . $row['isCancelled'] . '"> Is service cancelled?
							</label>
						  </div>
						</div>
					</div><div class="form-group">
						<label for="inputWorshipFirst" class="control-label col-xs-2">Worship Leader First Name</label>
						<div class="col-xs-5">
							<input name="worship-first" class="form-control" id="inputWorshipFirst" value="' . $row['worshipFirst'] . '" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputWorshipLast" class="control-label col-xs-2">Worship Leader Last Name</label>
						<div class="col-xs-5">
							<input name="worship-last" class="form-control" id="inputWorshipLast" value="' . $row['worshipLast'] . '" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPrayerFirst" class="control-label col-xs-2">Prayer Leader First Name</label>
						<div class="col-xs-5">
							<input name="prayer-first" class="form-control" id="inputPrayerFirst" value="' . $row['prayerFirst'] . '" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPrayerLast" class="control-label col-xs-2">Prayer Leader Last Name</label>
						<div class="col-xs-5">
							<input name="prayer-last" class="form-control" id="inputPrayerLast" value="' . $row['prayerLast'] . '" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPastorFirst" class="control-label col-xs-2">Pastor First Name</label>
						<div class="col-xs-5">
							<input name="pastor-first" class="form-control" id="inputPastorFirst" value="' . $row['pastorFirst'] . '" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPastorLast" class="control-label col-xs-2">Pastor Last Name</label>
						<div class="col-xs-5">
							<input name="pastor-last" class="form-control" id="inputPastorLast" value="' . $row['pastorLast'] . '" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSermonTitleBulletin" class="control-label col-xs-2">Sermon Title</label>
						<div class="col-xs-5">
							<input name="sermon-title-bulletin" class="form-control" id="inputSermonTitleBulletin" value="' . $row['sermonTitle'] . '" placeholder="Sermon Title">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSermonVerse" class="control-label col-xs-2">Sermon Verse</label>
						<div class="col-xs-5">
							<input name="sermon-verse" class="form-control" id="inputSermonVerse" value="' . $row['sermonVerse'] . '" placeholder="Sermon Verse">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNursery" class="control-label col-xs-2">Nursery Leaders</label>
						<div class="col-xs-5">
							<input name="nursery-leaders" class="form-control" id="inputNursery" value="' . $row['nurseryLeaders'] . '" placeholder="Nursery Leaders">
						</div>
					</div>
					<div class="form-group">
						<label for="inputJunior" class="control-label col-xs-2">Junior Church Leaders</label>
						<div class="col-xs-5">
							<input name="junior-leaders" class="form-control" id="inputJunior" value="' . $row['juniorLeaders'] . '" placeholder="Junior Church Leaders">
						</div>
					</div>
					<div id="announcementContainer">';
while ($rowAnnouncements = mysql_fetch_array($resultAnnouncements, MYSQL_ASSOC)) {
		$returnString .= '<div class="form-group announcement">
							<label class="control-label col-xs-2">Announcement</label>
							<div class="col-xs-5">
								<textarea col="6" name="announcements[]" class="form-control inputAnnouncement" placeholder="Announcement">' . $rowAnnouncements['content'] . '</textarea>
							</div>
						</div>';
}
						
$returnString .= '</div>';
echo $returnString;
?>