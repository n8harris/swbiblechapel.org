<?php $navsection = 'calendar' ?>
<?php include('head-cal.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php include('calendar-modal.php') ?>
<div class="main-body-cal">
<h2 class="page-heading">Church Calendar</h2>
<div class="cal-container">	
			<div class="custom-calendar-wrap custom-calendar-full">
				<div class="custom-header clearfix">
					<h3 class="custom-month-year">
						<span id="custom-month" class="custom-month"></span>
						<span id="custom-year" class="custom-year"></span>
						<nav>
							<span id="custom-prev" class="custom-prev" title="Go to previous month"></span>
							<span id="custom-next" class="custom-next" title="Go to next month"></span>
							<span id="custom-current" class="custom-current" title="Go to current date"></span>
						</nav>
					</h3>
				</div>
				<div id="calendar" class="fc-calendar-container"></div>
			</div>
		</div><!-- /container -->
<div class="container marketing feat-cal">
	<div class="featurette-cal">
				<h2 class="featurette-heading">Adding Events <span class="text-orange">to Calendar</span></h2>
				<p class="lead">
					To add events to the calendar, please contact the church office at (207)-247-6293 or contact us via our online form:
				</p>
				<p class="lead"><a data-toggle="modal" href="#contact-modal" id="secretary-contact" class="btn btn-lg btn-primary" title="Contact Us">Contact Us</a></p>
	</div>
</div>

	<?php include('map.php') ?>
</div>
<?php include('footer-cal.php') ?>


