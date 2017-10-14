<?php $navsection = 'home' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<h2 class="page-heading page-heading-home">Welcome to Our Church</h2>
	<div class="container marketing">
		<div class="featurette">
		<?php
			$result = mysql_query("SELECT serviceDay, serviceMonth, serviceYear
								   FROM services
								   WHERE hasBulletin =1
								   ORDER BY service_id DESC 
								   LIMIT 0 , 1");
			$date = mysql_fetch_array($result,MYSQL_ASSOC);
			$bulletinSql = "SELECT bulletin_id
					   FROM bulletins
					   INNER JOIN services ON ( bulletins.service_id = services.service_id )
					   WHERE serviceDay = " . $date['serviceDay'] . " AND serviceMonth = " . $date['serviceMonth'] . " AND serviceYear = " . $date['serviceYear'];
			$bulletinResult = mysql_query($bulletinSql);
			$bulletinValues = mysql_fetch_array($bulletinResult,MYSQL_ASSOC);
			$announcementsSql = "SELECT content, announcement_id, urgent FROM announcements WHERE bulletin_id = " . $bulletinValues['bulletin_id'] . " ORDER BY urgent DESC";
					$announcementsResult = mysql_query($announcementsSql);
					while($announcementValues=mysql_fetch_assoc($announcementsResult)){
						if($announcementValues['urgent'] == true){
							echo "<div class='alert alert-danger alert-dismissible' role='alert'>";
							echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
							echo $announcementValues['content'];
							echo "</div>";
						}
					}
		?>
			<h2 class="featurette-heading">A Note <span class="text-orange">From Our Pastor</span></h2>
			<p class="lead">
			Have you ever considered that God cares about you personally including every detail of your life? That's right,
		 He does! In fact He cares so much, that He provided a way to once again come back into a personal relationship with Him, 
		 a relationship of forgiveness, peace, assurance, confidence, and victory. Impossible you might say? Perhaps the
		 answer is not what you have considered before. <a class="mike" href="http://www.mikepettus.wix.com/mike">Mike</a></p>	
		<p class="lead">
			<span class="expand-content">
		
				 You see, everyone (that means you and me) has inherited a human nature that is corrupted by sin. That is why even
				the best of people still do things that are wrong.  This sin problem has created a gap between us and God so great
				that no effort on our part is good enough to build a bridge back to God.  As a result, we all deserve both physical
				and eternal death. The situation would be hopeless if that was the end of the story.  God loved each of us so much
				that He sent Jesus Christ to brutally suffer and die an agonizing death on a Roman cross to pay the price of our sin.
				His death has paid the penalty that you and I deserve. His resurrection from the grave three days later was a permanent
				victory over death and Satan, and it made possible full forgiveness plus a life forever in heaven with the Lord for each of us.
			
			</span>
		</p>
		<p class="lead">
			<span class="expand-content">
			This offer of salvation and eternal life is a free gift that is not possible to earn through any kind of effort from us.
			Jesus Christ has already met the terms demanded by God &ndash; the substitutionary death of the only One who was ever
			perfect and sinless!  Like any gift, each of us must make a personal decision to either accept or reject this offer
			from God. To receive God's free gift to us, and thus become saved from our sins and death (to be "born again"
			as Jesus called it), we must have a repentant attitude toward our own rebelliousness, pride, and sin, and place
			our entire trust in what Jesus Christ has completed as the Way, the Truth, and the Life. It is only through this that
			we will again be at peace with God and will go to be with Him in heaven when our life here on earth comes to an end.
			</span>
		</p>
		<p class="lead">
			<span class="expand-content">
				If God is prompting you about this, why not pray something like this to Him right now: "Dear God, thank you
				for loving me so much that You sent Jesus Christ to die on the cross to pay for my sins. Because I believe in
				Jesus for eternal life, I trust that you have forgiven me and given me that life as a free gift. Help me now to live
				for You in such a way that I'll say 'Thank You' with all my life too."
			</span>
		</p>
		<p class="lead">
			<span class="expand-content">
				If you really mean and believe what you say, God will do exactly as He has promised. There will be immediate
				internal changes in your life that will only continue to increase and show for the rest of your life.  You will no longer
				live for yourself. Your life belongs to the Lord and your desire will be to obey Him.  The problems of life do not go away,
				but you will have a whole new purpose for living. You will be at peace with God. That load from sin and the emptiness
				of trying to satisfy yourself with things of this world that are only hollow will be gone. You will have the privilege of direct access to God that only a member of God's family can have.  God has given
				His Word, the Bible, to us as the textbook for life. In addition, as a new believer, you will have a whole new "family"
				of other believers in a church to help you to learn and grow and to provide support.
			</span>
		</p>
		<p class="lead">
			<span class="expand-content">
				That is where we at South Waterboro Bible Chapel fit in. We teach and preach the Bible.  We believe that the
				Bible is still relevant for today, that it is entirely without error, that it is indeed the Word of God, and that it is our
				authority as given by God for what we believe and practice.  We are a local gathering of believers in Jesus Christ.
				While holding to Baptist distinctives in many areas according to our understanding of Scripture, as an
				independent evangelical congregation we are first and only Christians, and are a part of all those who also have
				placed their faith in Jesus Christ for salvation and believe the Word of God in word and practice.   We accept the
				responsibility of declaring the Gospel to the world and teaching those who have become believers in Jesus Christ.
				We invite you to visit with us and inquire further. If we can be of any help or answer any questions, please
				contact us.  We encourage you to worship with us any time you are in the southern Maine area.  May God bless you.
			</span>
		</p>
		
		<p class="lead"><a class="read-expand btn btn-lg btn-primary">Read More</a></p>
		
			
				
				
			
			
			
		</div>
		<div class="featurette feat-main">
			<h2 class="featurette-heading">Events at <span class="text-orange">South Waterboro Bible Chapel</span></h2>
			<p class="lead">
				South Waterboro Bible Chapel meets weekly for worship service, and regularly for fellowship opportunities and Bible studies. Please contact the church office at (207)-247-6293 for further information. A full list of events can be 
				viewed on our calendar.
			</p>
			<p class="lead"><a href="calendar.php" class="btn btn-lg btn-primary">View Calendar</a></p>
		 </div>
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>