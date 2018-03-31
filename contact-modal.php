<?php
include ('directus-connect.php');
?>
<div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Contact Us</h3>
        </div>
		<form id="contact-form" class="form-horizontal">
        <div class="modal-body">
            <div id="main-form">
				<div class="form-group">
					<label for="inputContact" class="control-label col-xs-2">Recipient</label>
					<div class="col-xs-10">
						<select name="contact" class="form-control" id="inputContact">
							<?php
							$staff = $client->getItems('staff_members')->getData();
							foreach($staff as $staffMember) {
								echo '<option value="' . $staffMember['email'] . '">' . $staffMember['staff_first_name'] . ' ' . $staffMember['staff_last_name'] . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="control-label col-xs-2">Your Name</label>
					<div class="col-xs-10">
						<input name="name" class="form-control" id="inputEmail" placeholder="Name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="control-label col-xs-2">Your Email</label>
					<div class="col-xs-10">
						<input type="email" name="email" class="form-control" id="inputPassword" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputSubject" class="control-label col-xs-2">Subject</label>
					<div class="col-xs-10">
						<input name="subject" class="form-control" id="inputSubject" placeholder="Subject">
					</div>
				</div>
				<div class="form-group">
					<label for="inputMessage" class="control-label col-xs-2">Message</label>
					<div class="col-xs-10">
						<textarea name="message" rows="6" class="form-control" id="inputMessage" placeholder="Message"></textarea>
					</div>
				</div>
	
				<p class="error-message"></p>
				</div>
				
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" id="sendMessage" value="Send" class="btn btn-primary">
        </div>
		</form>
		<div id="success-message"></div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>