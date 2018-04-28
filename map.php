<?php

$locationInfo = $client->getItems('church_location')->getData()[0];
$staffMemberEmail = $client->getItem('staff_members', $locationInfo['staff_member_to_contact']->getData()['id'])->getData()['email'];
$contactInfoContent = $locationInfo['contact_info'];
?>

<section class="map">
        <div id="map_canvas"></div> 
		<div class="contact-information" id="contact">
          <div class="mail">
		  <i class="fa fa-envelope fa-lg"></i>
		  <a class="contact-person" data-contact-email="<?php echo $staffMemberEmail ?>" data-toggle="modal" href="#contact-modal"><?php echo $staffMemberEmail ?></a>
		  </div>
          <div class="address">
			<i class="fa fa-map-marker fa-lg"></i>
            <div class="centered">
			  
			  <p>
              <?php
                $Parsedown = new Parsedown();
                echo $Parsedown->text($contactInfoContent);
              ?>
			  </p>
            </div>
          </div>
       </div>
      </section>