<div class="modal fade" id="membership-application" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Membership Application</h3>
        </div>
		<form id="membership-form" class="form-horizontal">
        <div class="modal-body">
            <div id="main-membership-form">
						<div class="form-group">
							<label for="inputMembershipName" class="control-label col-xs-2">Name</label>
							<div class="col-xs-10">
								<input name="membership-name" class="form-control" id="inputMembershipName" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputMembershipAddress1" class="control-label col-xs-2">Address Line 1</label>
							<div class="col-xs-10">
								<input name="membership-address" class="form-control" id="inputMembershipAddress1" placeholder="Address">
							</div>
						</div>
						<div class="form-group">
							<label for="inputMembershipCity" class="control-label col-xs-2">City</label>
							<div class="col-xs-5">
								<input name="membership-city" class="form-control" id="inputMembershipCity" placeholder="City">
							</div>
						</div>
						<div class="form-group">
							<label for="inputMembershipState" class="control-label col-xs-2">State</label>
							<div class="col-xs-3">
								<input name="membership-state" class="form-control" id="inputMembershipState" placeholder="State">
							</div>
						</div>
						<div class="form-group">
							<label for="inputMembershipZip" class="control-label col-xs-2">Zip Code</label>
							<div class="col-xs-7">
								<input name="membership-zip-code" class="form-control" id="inputMembershipZip" placeholder="Zip Code">
							</div>
						</div>
						<div class="form-group">
							<label for="inputMembershipPhone" class="control-label col-xs-2">Phone Number</label>
							<div class="col-xs-7">
								<input name="membership-phone" class="form-control" id="inputMembershipPhone" placeholder="Phone Number">
							</div>
						</div>
						<div class="form-group">
							<label for="inputMembershipEmail" class="control-label col-xs-2">Email</label>
							<div class="col-xs-10">
								<input name="membership-email" class="form-control" id="inputMembershipEmail" placeholder="Email">
							</div>
						</div>
						<p>Have you ever been baptized by immersion?</p>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="membership-baptism" value="yes" id="inputBaptism"> Yes
									</label>
								  </div>
								</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="membership-baptism" value="no" id="inputBaptismNo"> No
									</label>
								  </div>
								</div>
						</div>
						<div id="baptismDate" class="form-group">
								<label for="inputBaptismDate" class="control-label col-xs-2">Baptism Date (approx)</label>
								<div class="col-xs-10">
									<input name="baptism-date" data-provide="datepicker" class="form-control datepicker" data-date-format="mm/dd/yyyy" id="inputBaptismDate" placeholder="Date">
								</div>
						</div>
						<p>Are you now a member of another church?</p>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="membership-church" value="yes" id="inputCurrentMember"> Yes
									</label>
								  </div>
								</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="membership-church" value="no" id="inputCurrentMemberNo"> No
									</label>
								  </div>
								</div>
						</div>
						<div id="currentMember">
							<div class="form-group">
								<label for="inputMemberChurchName" class="control-label col-xs-2">Church Name</label>
								<div class="col-xs-10">
									<input name="member-church-name" class="form-control" id="inputMemberChurchName" placeholder="Name">
								</div>
							</div>
							<div class="form-group">
								<label for="inputMemberChurchAddress1" class="control-label col-xs-2">Church Address Line 1</label>
								<div class="col-xs-10">
									<input name="member-church-address" class="form-control" id="inputMemberChurchAddress1" placeholder="Address">
								</div>
							</div>
							<div class="form-group">
								<label for="inputMemberChurchCity" class="control-label col-xs-2">Church City</label>
								<div class="col-xs-5">
									<input name="member-church-city" class="form-control" id="inputMemberChurchCity" placeholder="City">
								</div>
							</div>
							<div class="form-group">
								<label for="inputMemberChurchState" class="control-label col-xs-2">Church State</label>
								<div class="col-xs-3">
									<input name="member-church-state" class="form-control" id="inputMemberChurchState" placeholder="State">
								</div>
							</div>
							<div class="form-group">
								<label for="inputMemberChurchZip" class="control-label col-xs-2">Church Zip Code</label>
								<div class="col-xs-7">
									<input name="member-church-zip-code" class="form-control" id="inputMemberChurchZip" placeholder="Zip Code">
								</div>
							</div>
						</div>
						<div id="lastAffiliation">
							<div class="form-group">
								<label for="inputAffiliationChurchName" class="control-label col-xs-2">Name of church last affiliated with</label>
								<div class="col-xs-10">
									<input name="affiliation-church-name" class="form-control" id="inputAffiliationChurchName" placeholder="Name">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAffiliationChurchAddress1" class="control-label col-xs-2">Church Address Line 1</label>
								<div class="col-xs-10">
									<input name="affiliation-church-address" class="form-control" id="inputAffiliationChurchAddress1" placeholder="Address">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAffiliationChurchCity" class="control-label col-xs-2">Church City</label>
								<div class="col-xs-5">
									<input name="affiliation-church-city" class="form-control" id="inputAffiliationChurchCity" placeholder="City">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAffiliationChurchState" class="control-label col-xs-2">Church State</label>
								<div class="col-xs-3">
									<input name="affiliation-church-state" class="form-control" id="inputAffiliationChurchState" placeholder="State">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAffiliationChurchZip" class="control-label col-xs-2">Church Zip Code</label>
								<div class="col-xs-7">
									<input name="affiliation-church-zip-code" class="form-control" id="inputAffiliationChurchZip" placeholder="Zip Code">
								</div>
							</div>
						</div>
						<p>Please write a brief testimony regarding your faith in Christ, including your conversion experience.
						Include within your testimony whether you know that God has forgiven your sins and granted you eternal life. You may also include
						Scripture upon which you base your salvation.</p>
						<div class="form-group">
							<label for="inputMembershipTestimony" class="control-label col-xs-2">Please write your testimony</label>
							<div class="col-xs-10">
								<textarea name="membership-testimony" rows="6" class="form-control" id="inputMembershipTestimony" placeholder="Testimony"></textarea>
							</div>
						</div>
						<p>Do you agree, without reservation, to the <a href="/documents/SWBC-Constitution.pdf" target="_blank">Church Constitution</a>?</p>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="constitution-agree" value="yes" id="inputConstitutionAgree"> Yes
									</label>
								  </div>
								</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="constitution-agree" value="no" id="inputConstitutionAgreeNo"> No
									</label>
								  </div>
								</div>
						</div>
						<p>Do you agree with the basic doctrine that we as the body of Christ hold to, as outlined within the Church Constitution?</p>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="constitution-doctrine-agree" value="yes" id="inputConstitutionDoctrineAgree"> Yes
									</label>
								  </div>
								</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="constitution-doctrine-agree" value="no" id="inputConstitutionDoctrineAgreeNo"> No
									</label>
								  </div>
								</div>
						</div>
						<p>Will you promise to fulfill the Church covenant (as stated in Article III of the Church Constitution) and uphold the doctrines of the Bible
						as a member of this Church in the strength that God gives you?</p>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="fulfill-covenant-agree" value="yes" id="inputFulfillCovenantAgree"> Yes
									</label>
								  </div>
								</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="radio">
									<label>
									  <input type="radio" name="fulfill-covenant-agree" value="no" id="inputFulfillCovenantAgreeNo"> No
									</label>
								  </div>
								</div>
						</div>
						

					</div>
					<p id="error-message-membership"></p>
				
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" id="sendMembershipApplication" value="Submit" class="btn btn-primary">
        </div>
		</form>
		<div id="success-message-membership"></div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>