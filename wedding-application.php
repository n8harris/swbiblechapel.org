<div class="modal fade" id="wedding-application" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Wedding Ceremony Application</h3>
        </div>
		<form id="wedding-form" class="form-horizontal">
        <div class="modal-body">
            <div id="main-wedding-form">
				<ul class="nav nav-tabs" id="weddingTabs">
					<li class="active"><a href="#bride" data-toggle="tab">Bride</a></li>
					<li><a href="#groom" data-toggle="tab">Groom</a></li>
					<li><a href="#both" data-toggle="tab">Both</a></li>
				</ul>
  
				<div class="tab-content">
					<div class="tab-pane active" id="bride">
						<div class="form-group">
							<label for="inputBrideName" class="control-label col-xs-2">Name</label>
							<div class="col-xs-10">
								<input name="bride-name" class="form-control" id="inputBrideName" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBrideAge" class="control-label col-xs-2">Age</label>
							<div class="col-xs-3">
								<input name="bride-age" class="form-control" id="inputBrideAge" placeholder="Age">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBrideAddress1" class="control-label col-xs-2">Address Line 1</label>
							<div class="col-xs-10">
								<input name="bride-address" class="form-control" id="inputBrideAddress1" placeholder="Address">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBrideCity" class="control-label col-xs-2">City</label>
							<div class="col-xs-5">
								<input name="bride-city" class="form-control" id="inputBrideCity" placeholder="City">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBrideState" class="control-label col-xs-2">State</label>
							<div class="col-xs-3">
								<input name="bride-state" class="form-control" id="inputBrideState" placeholder="State">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBrideZip" class="control-label col-xs-2">Zip Code</label>
							<div class="col-xs-7">
								<input name="bride-zip-code" class="form-control" id="inputBrideZip" placeholder="Zip Code">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBridePhone" class="control-label col-xs-2">Phone Number</label>
							<div class="col-xs-7">
								<input name="bride-phone" class="form-control" id="inputBridePhone" placeholder="Phone Number">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBrideEmail" class="control-label col-xs-2">Email</label>
							<div class="col-xs-10">
								<input name="bride-email" class="form-control" id="inputBrideEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBrideTestimony" class="control-label col-xs-2">Please write your testimony</label>
							<div class="col-xs-10">
								<textarea name="bride-testimony" rows="6" class="form-control" id="inputBrideTestimony" placeholder="Testimony"></textarea>
							</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="bride-attend-swbc" value="yes" id="inputBrideAttendSWBC"> I attend South Waterboro Bible Chapel
									</label>
								  </div>
								</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="bride-attend-swbc" value="no" id="inputBrideNoAttendSWBC"> I do not attend South Waterboro Bible Chapel
									</label>
								  </div>
								</div>
						</div>
						<div id="bride-optional">
							<div class="form-group">
								<label for="inputBrideChurchAttend" class="control-label col-xs-2">Name of church you attend</label>
								<div class="col-xs-10">
									<input name="bride-church-attend" class="form-control" id="inputBrideChurchAttend" placeholder="Name of church">
								</div>
							</div>
							<div class="form-group">
								<label for="inputBrideChurchAddress1" class="control-label col-xs-2">Address Line 1</label>
								<div class="col-xs-10">
									<input name="bride-church-address" class="form-control" id="inputBrideChurchAddress1" placeholder="Address">
								</div>
							</div>
							<div class="form-group">
								<label for="inputBrideChurchCity" class="control-label col-xs-2">City</label>
								<div class="col-xs-5">
									<input name="bride-church-city" class="form-control" id="inputBrideChurchCity" placeholder="City">
								</div>
							</div>
							<div class="form-group">
								<label for="inputBrideChurchState" class="control-label col-xs-2">State</label>
								<div class="col-xs-3">
									<input name="bride-church-state" class="form-control" id="inputBrideChurchState" placeholder="State">
								</div>
							</div>
							<div class="form-group">
								<label for="inputBrideChurchZip" class="control-label col-xs-2">Zip Code</label>
								<div class="col-xs-5">
									<input name="bride-church-zip" class="form-control" id="inputBrideChurchZip" placeholder="Zip Code">
								</div>
							</div>
							<div class="form-group">
								<label for="inputBrideChurchPhone" class="control-label col-xs-2">Phone Number</label>
								<div class="col-xs-5">
									<input name="bride-church-phone" class="form-control" id="inputBrideChurchPhone" placeholder="Phone Number">
								</div>
							</div>
							<div class="form-group">
								<label for="inputBrideChurchPastor" class="control-label col-xs-2">Pastor</label>
								<div class="col-xs-5">
									<input name="bride-church-pastor" class="form-control" id="inputBrideChurchPastor" placeholder="Pastor">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="bride-attend" value="usually" id="inputBrideAttend"> I attend this church
									</label>
								  </div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="bride-attend" value="occasionally" id="inputBrideOccAttend"> I attend this church occasionally
									</label>
								  </div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="bride-attend" value="rarely" id="inputBrideNoAttend"> I rarely ever attend church
									</label>
								  </div>
								</div>
							</div>
						</div>
							
						</div>
						<div class="tab-pane" id="groom">
						<div class="form-group">
							<label for="inputGroomName" class="control-label col-xs-2">Name</label>
							<div class="col-xs-10">
								<input name="groom-name" class="form-control" id="inputGroomName" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomAge" class="control-label col-xs-2">Age</label>
							<div class="col-xs-3">
								<input name="groom-age" class="form-control" id="inputGroomAge" placeholder="Age">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomAddress1" class="control-label col-xs-2">Address Line 1</label>
							<div class="col-xs-10">
								<input name="groom-address" class="form-control" id="inputGroomAddress1" placeholder="Address">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomCity" class="control-label col-xs-2">City</label>
							<div class="col-xs-5">
								<input name="groom-city" class="form-control" id="inputGroomCity" placeholder="City">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomState" class="control-label col-xs-2">State</label>
							<div class="col-xs-3">
								<input name="groom-state" class="form-control" id="inputGroomState" placeholder="State">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomZip" class="control-label col-xs-2">Zip Code</label>
							<div class="col-xs-7">
								<input name="groom-zip-code" class="form-control" id="inputGroomZip" placeholder="Zip Code">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomPhone" class="control-label col-xs-2">Phone Number</label>
							<div class="col-xs-7">
								<input name="groom-phone" class="form-control" id="inputGroomPhone" placeholder="Phone Number">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomEmail" class="control-label col-xs-2">Email</label>
							<div class="col-xs-10">
								<input name="groom-email" class="form-control" id="inputGroomEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputGroomTestimony" class="control-label col-xs-2">Please write your testimony</label>
							<div class="col-xs-10">
								<textarea name="groom-testimony" rows="6" class="form-control" id="inputGroomTestimony" placeholder="Testimony"></textarea>
							</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="groom-attend-swbc" value="yes" id="inputGroomSWBCAttend"> I attend South Waterboro Bible Chapel
									</label>
								  </div>
								</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="groom-attend-swbc" value="no" id="inputGroomSWBCNoAttend"> I do not attend South Waterboro Bible Chapel
									</label>
								  </div>
								</div>
						</div>
						<div id="groom-optional">
							<div class="form-group">
								<label for="inputGroomChurchAttend" class="control-label col-xs-2">Name of church you attend</label>
								<div class="col-xs-10">
									<input name="groom-church-attend" class="form-control" id="inputGroomChurchAttend" placeholder="Name of church">
								</div>
							</div>
							<div class="form-group">
								<label for="inputGroomChurchAddress1" class="control-label col-xs-2">Address Line 1</label>
								<div class="col-xs-10">
									<input name="groom-church-address" class="form-control" id="inputGroomChurchAddress1" placeholder="Address">
								</div>
							</div>
							<div class="form-group">
								<label for="inputGroomChurchCity" class="control-label col-xs-2">City</label>
								<div class="col-xs-5">
									<input name="groom-church-city" class="form-control" id="inputGroomChurchCity" placeholder="City">
								</div>
							</div>
							<div class="form-group">
								<label for="inputGroomChurchState" class="control-label col-xs-2">State</label>
								<div class="col-xs-3">
									<input name="groom-church-state" class="form-control" id="inputGroomChurchState" placeholder="State">
								</div>
							</div>
							<div class="form-group">
								<label for="inputGroomChurchZip" class="control-label col-xs-2">Zip Code</label>
								<div class="col-xs-5">
									<input name="groom-church-zip" class="form-control" id="inputGroomChurchZip" placeholder="Zip Code">
								</div>
							</div>
							<div class="form-group">
								<label for="inputGroomChurchPhone" class="control-label col-xs-2">Phone Number</label>
								<div class="col-xs-5">
									<input name="groom-church-phone" class="form-control" id="inputGroomChurchPhone" placeholder="Phone Number">
								</div>
							</div>
							<div class="form-group">
								<label for="inputGroomChurchPastor" class="control-label col-xs-2">Pastor</label>
								<div class="col-xs-5">
									<input name="groom-church-pastor" class="form-control" id="inputGroomChurchPastor" placeholder="Pastor">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="groom-attend" value="usually" id="inputGroomChurchAttend"> I attend this church
									</label>
								  </div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="groom-attend" value="occasionally" id="inputGroomChurchOccAttend"> I attend this church occasionally
									</label>
								  </div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="groom-attend" value="rarely" id="inputGroomChurchNoAttend"> I rarely ever attend church
									</label>
								  </div>
								</div>
							</div>
						</div>
							
						</div>
						<div class="tab-pane" id="both">
							<div class="form-group">
								<label for="inputFirstDate" class="control-label col-xs-2">Wedding Date First Choice</label>
								<div class="col-xs-10">
									<input name="first-date-choice" data-provide="datepicker" class="form-control datepicker" data-date-format="mm/dd/yyyy" id="inputFirstDate" placeholder="Date">
								</div>
							</div>
							<div class="form-group">
								<label for="inputSecondDate" class="control-label col-xs-2">Wedding Date Second Choice</label>
								<div class="col-xs-10">
									<input name="second-date-choice" data-provide="datepicker" class="form-control datepicker" data-date-format="mm/dd/yyyy" id="inputSecondDate" placeholder="Date">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="checkbox">
									<label>
									  <input type="checkbox" name="other-pastor" id="inputOtherPastor" value="true"> Someone other than the SWBC Pastor will officiate
									</label>
								  </div>
								</div>
							</div>
							<div id="differentPastor">
							<div class="form-group">
								<label for="inputPastorName" class="control-label col-xs-2">Pastor Name</label>
								<div class="col-xs-10">
									<input name="pastor-name" class="form-control" id="inputPastorName" placeholder="Pastor Name">
								</div>
							</div>
							<div class="form-group">
								<label for="inputChurchAffiliation" class="control-label col-xs-2">Church Affiliation</label>
								<div class="col-xs-10">
									<input name="church-affiliation" class="form-control" id="inputChurchAffiliation" placeholder="Church Affiliation">
								</div>
							</div>
							<div class="form-group">
								<label for="inputChurchAddress1" class="control-label col-xs-2"> Church Address Line 1</label>
								<div class="col-xs-10">
									<input name="church-address" class="form-control" id="ChurchAddress1" placeholder="Address">
								</div>
							</div>
							<div class="form-group">
								<label for="inputChurchCity" class="control-label col-xs-2">City</label>
								<div class="col-xs-5">
									<input name="church-city" class="form-control" id="inputChurchCity" placeholder="City">
								</div>
							</div>
							<div class="form-group">
								<label for="inputChurchState" class="control-label col-xs-2">State</label>
								<div class="col-xs-3">
									<input name="church-state" class="form-control" id="inputChurchState" placeholder="State">
								</div>
							</div>
							<div class="form-group">
								<label for="inputChurchZip" class="control-label col-xs-2">Zip Code</label>
								<div class="col-xs-5">
									<input name="church-zip" class="form-control" id="inputChurchZip" placeholder="Zip Code">
								</div>
							</div>
							<div class="form-group">
								<label for="inputChurchPhone" class="control-label col-xs-2">Phone Number</label>
								<div class="col-xs-5">
									<input name="church-phone" class="form-control" id="inputChurchPhone" placeholder="Phone Number">
								</div>
							</div>
							<div class="form-group">
								<label for="inputReason" class="control-label col-xs-2">Reason for this pastor to officiate</label>
								<div class="col-xs-10">
									<textarea name="reason" rows="6" class="form-control" id="inputReason" placeholder="Reason"></textarea>
								</div>
							</div>
							</div>
							<h3>Please Note</h3>
							<ol>
								<li>Completion of this application and a consultation with the pastor does not confirm a commitment concerning the use of
								the church facilities and/or pastor for your wedding. However, it does help to acquaint us with you and your request in a
								more personal way.</li>
								<li>Additional policies concerning weddings will be shared with you at the consultation with the pastor if we are able to honor
								your request.</li>
								<li>All use of our church facilities must be consistent with the statement of faith and policies of the South Waterboro Bible
								Chapel. This includes any other pastors and supporting individuals involved in the wedding ceremony, music used, and
								conduct on the church property.</li>
							</ol>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="checkbox">
									<label>
									  <input type="checkbox" name="agreement" id="inputUnderstand" value="true"> We understand and wish to proceed
									</label>
								  </div>
								</div>
							</div>
							
							
							
						</div>

					</div>
					<p id="error-message-wedding"></p>
	
				
				</div>
				
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" id="sendWeddingApplication" value="Submit" class="btn btn-primary">
        </div>
		</form>
		<div id="success-message-wedding"></div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>