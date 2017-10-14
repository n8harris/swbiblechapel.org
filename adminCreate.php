<?php 
 session_start();
 if($_SESSION['logged-in'] != true){
	header('Location:index.php');
 }
 include('database-connect.php');
 include('head.php');
 include('navigation.php');
 include('carousel.php');
?>
<div class="main-body">
<h2 class="page-heading">Create Content</h2>
	<div class="container marketing">
		<div class="featurette-login">
		
			<ul class="nav nav-tabs" id="createTabs">
					<li class="active"><a href="#services" data-toggle="tab">Services</a></li>
					<li><a href="#bulletins" data-toggle="tab">Bulletins</a></li>
					<li><a href="#sermons" data-toggle="tab">Sermons</a></li>
					<li><a href="#urgent" data-toggle="tab">Urgent Announcements</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="services">
				    <form id="create-service-form" class="form-horizontal">
					
					<div class="form-group">
						<label for="inputServiceDate" class="control-label col-xs-2">Service Date</label>
						<div class="col-xs-5">
							<input name="service-date" data-provide="datepicker" class="form-control datepicker" data-date-format="mm/dd/yyyy" id="inputServiceDate" placeholder="Service Date">
						</div>
					</div>
					<div class="col-sm-offset-2">
					<input type="submit" id="sendServiceInfo" value="Create Service" class="btn btn-primary">
					</div>
					</form>
				</div>
				<div class="tab-pane" id="bulletins">
				    <form id="create-bulletin-form" class="form-horizontal">
					<input type="hidden" name="bulletinMode" value="create">
					<div class="form-group">
						<label for="inputSelectServiceBulletin" class="control-label col-xs-2">Select Service</label>
						<div class="col-xs-5">
							<select name="service-info-bulletin" class="form-control" id="inputSelectServiceBulletin">
							<?php 
								$result = mysql_query("SELECT service_id, serviceDay, serviceMonth, serviceYear
													   FROM services
													   WHERE hasBulletin = 0");

								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
									echo "<option value='" . $row['service_id'] . ":" . $row['serviceMonth'] . "/" . $row['serviceDay'] . "/" . $row['serviceYear'] . "'>" . $row['serviceMonth'] . "/" . $row['serviceDay'] . "/" . $row['serviceYear'] . "</option>";
								}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label>
							  <input type="checkbox" name="cancelled-service" id="cancelCheckbox"> Is service cancelled?
							</label>
						  </div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputWorshipFirst" class="control-label col-xs-2">Worship Leader First Name</label>
						<div class="col-xs-5">
							<input name="worship-first" class="form-control" id="inputWorshipFirst" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputWorshipLast" class="control-label col-xs-2">Worship Leader Last Name</label>
						<div class="col-xs-5">
							<input name="worship-last" class="form-control" id="inputWorshipLast" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPrayerFirst" class="control-label col-xs-2">Prayer Leader First Name</label>
						<div class="col-xs-5">
							<input name="prayer-first" class="form-control" id="inputPrayerFirst" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPrayerLast" class="control-label col-xs-2">Prayer Leader Last Name</label>
						<div class="col-xs-5">
							<input name="prayer-last" class="form-control" id="inputPrayerLast" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPastorFirst" class="control-label col-xs-2">Pastor First Name</label>
						<div class="col-xs-5">
							<input name="pastor-first" class="form-control" id="inputPastorFirst" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPastorLast" class="control-label col-xs-2">Pastor Last Name</label>
						<div class="col-xs-5">
							<input name="pastor-last" class="form-control" id="inputPastorLast" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSermonTitleBulletin" class="control-label col-xs-2">Sermon Title</label>
						<div class="col-xs-5">
							<input name="sermon-title-bulletin" class="form-control" id="inputSermonTitleBulletin" placeholder="Sermon Title">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSermonVerse" class="control-label col-xs-2">Sermon Verse</label>
						<div class="col-xs-5">
							<input name="sermon-verse" class="form-control" id="inputSermonVerse" placeholder="Sermon Verse">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNursery" class="control-label col-xs-2">Nursery Leaders</label>
						<div class="col-xs-5">
							<input name="nursery-leaders" class="form-control" id="inputNursery" placeholder="Nursery Leaders">
						</div>
					</div>
					<div class="form-group">
						<label for="inputJunior" class="control-label col-xs-2">Junior Church Leaders</label>
						<div class="col-xs-5">
							<input name="junior-leaders" class="form-control" id="inputJunior" placeholder="Junior Church Leaders">
						</div>
					</div>
					<div id="announcementContainer">
						<div class="form-group announcement">
							<label class="control-label col-xs-2">Announcement</label>
							<div class="col-xs-5">
								<textarea col="6" name="announcements[]" class="form-control inputAnnouncement" placeholder="Announcement"></textarea>
							</div>
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-6">
					<input type="submit" id="sendBulletinInfo" value="Add Bulletin" class="btn btn-primary">
					<a style="cursor:pointer" class="btn btn-primary" id="addAnnouncement">Add Announcement</a>
					</div>
					</form>
				</div>
				<div class="tab-pane" id="sermons">
				    <form id="create-sermon-form" class="form-horizontal">
					<input type="hidden" name="sermonMode" value="create">
					<div class="form-group">
						<label for="inputSelectService" class="control-label col-xs-2">Select Service</label>
						<div class="col-xs-5">
							<select name="service-info" class="form-control" id="inputSelectService">
							<?php 
								$result = mysql_query("SELECT service_id, serviceDay, serviceMonth, serviceYear
													   FROM services
													   WHERE hasSermon = 0");

								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
									echo "<option value='" . $row['service_id'] . ":" . $row['serviceMonth'] . "/" . $row['serviceDay'] . "/" . $row['serviceYear'] . "'>" . $row['serviceMonth'] . "/" . $row['serviceDay'] . "/" . $row['serviceYear'] . "</option>";
								}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputSpeakerFirst" class="control-label col-xs-2">Speaker First Name</label>
						<div class="col-xs-5">
							<input name="speaker-first" class="form-control" id="inputSpeakerFirst" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSpeakerLast" class="control-label col-xs-2">Speaker Last Name</label>
						<div class="col-xs-5">
							<input name="speaker-last" class="form-control" id="inputSpeakerLast" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputSermonTitle" class="control-label col-xs-2">Sermon Title</label>
						<div class="col-xs-5">
							<input name="sermon-title" class="form-control" id="inputSermonTitle" placeholder="Sermon Title">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAudioFile" class="control-label col-xs-2">Sermon File</label>
						<div class="col-xs-5">
							<input name="sermon-audio-file" class="form-control" id="inputAudioFile" placeholder="Sermon File">
						</div>
					</div>
					<div class="form-group">
						<label for="inputIsVideo" class="control-label col-xs-2">Is File Video?</label>
						<div class="col-xs-5">
							<input name="is-video" type="checkbox" class="form-control" id="inputIsVideo">
						</div>
					</div>
					<div class="col-sm-offset-2">
					<input type="submit" id="sendSermonInfo" value="Add Sermon" class="btn btn-primary">
					</div>
					</form>
				</div>
				<div class="tab-pane" id="urgent">
				    <form id="create-urgent-form" class="form-horizontal">

					<div id="urgentAnnouncementContainer">
						<div class="urgent-announcement">
							<div class="form-group">
								<label for="inputSelectServiceUrgent" class="control-label col-xs-2">Select Service</label>
								<div class="col-xs-5">
									<select name="service-info-urgent" class="form-control" id="inputSelectServiceUrgent">
									<?php 
										$result = mysql_query("SELECT service_id, serviceDay, serviceMonth, serviceYear
															   FROM services");

										while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
											echo "<option value='" . $row['service_id'] . ":" . $row['serviceMonth'] . "/" . $row['serviceDay'] . "/" . $row['serviceYear'] . "'>" . $row['serviceMonth'] . "/" . $row['serviceDay'] . "/" . $row['serviceYear'] . "</option>";
										}
									?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-2">Announcement</label>
								<div class="col-xs-5">
									<textarea col="6" name="urgent-announcements[]" class="form-control inputUrgentAnnouncement" placeholder="Announcement"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-6">
					<input type="submit" id="sendUrgentInfo" value="Save Announcement" class="btn btn-primary">
					</div>
					</form>
				</div>
				
			</div>
			<p id="messageCreate"></p>
		
		</div>
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>