<footer>
	<div class="footer">
		  <div class="container">
			<div class="col-sm-12 center-block">
				<p>&copy; <?php echo date("Y") ?> South Waterboro Bible Chapel&nbsp;  | <span data-toggle="tooltip" style="cursor:pointer" id="footer-tool" title="Need a website? Contact me at nharris@cedarville.edu" class="text-orange">&nbsp;Designed by Nate Harris</span></p>
			</div>
		  </div>
	</div>
</footer>
<div id="backToTop" data-spy="affix" data-offset-top="10" data-offset-bottom="100" class="affix">
		<a href="#top" class="btn dg-btn dg-btn-primary">
			<i class="fa fa-chevron-up"></i> Back to Top</a>
		
</div>
<script type="text/javascript" src="./scripts/jquery.calendario.js"></script>

<script>
$(document).ready(function(){
 var url = "https://www.googleapis.com/calendar/v3/calendars/swbiblechapel@gmail.com/events?singleEvents=true&key=AIzaSyAlf8qz1YW_lsqc3vRuGlutYMvbwuPoESM&maxResults=1000&timeMin=<?php echo date('Y-m-d', strtotime('-365 day')); ?>T00:00:00.000Z&timeMax=<?php echo date('Y-m-d', strtotime('+730 day')); ?>T23:59:59.000Z";

    $.ajax({
           type: "GET",
           url: url,
           success: function(data)
           {
		listEvents(data);
           }

         });
});

  function listEvents(root) {
	var codropsEvents = [];
    var entries = root.items;
    //var entries = feed.entry || [];
	var days = [];
	var events = [];

    for (var i = 0; i < entries.length; ++i) {
      var entry = entries[i];
      var title = entry.summary;
	  //title = decodeURIComponent(title.trim());
      var start = (entry.start.dateTime) ? entry.start.dateTime : "";	
	  if(start != ""){
		var index = 10;  // Gets the first index where a space occours
		var actualTime = "";
	    var day = start.substr(0, index); // Gets the first part
	    var time = start.substr(index + 1);
		if(time != ""){
			var twentyFourHour = time.substr(0, 5);
			var H = twentyFourHour.substr(0, 2);
			var h = H % 12 || 12;
			var ampm = H < 12 ? "AM" : "PM";
			var minutes = twentyFourHour.substr(3);
			actualTime = h + ':' + minutes +  ' ' + ampm;
		}
		dayParts = day.split("-");
		var y = dayParts[0];
		var m = dayParts[1];
		var d = dayParts[2];
		day = m + '-' + d + '-' + y;
		days[i] = day;
		events[i] = '<a>' + actualTime + ' - ' + title + '</a>';
		
		
	  }
    }
	
	for(var i = 0; i < events.length; i++){
		if(codropsEvents.hasOwnProperty(days[i])){
			codropsEvents[days[i]] += events[i];
		} else {
			codropsEvents[days[i]] = events[i];
		}
	}
	
	var cal = $( '#calendar' ).calendario( {
						onDayClick : function( $el, $contentEl, dateProperties ) {
							var calMonth = dateProperties.month;
							var calDay = dateProperties.day;
							
							if(parseInt(calMonth, 10) < 10){
								calMonth = "0" + calMonth;
							}
							
							if(parseInt(calDay, 10) < 10){
								calDay = "0" + calDay;
							}
							$('#modalTitle').empty();
							$('#eventList').empty();
							$('#modalTitle').append('Events for ' + dateProperties.weekdayname + ', ' + dateProperties.monthname + ' ' + dateProperties.day);
							if(codropsEvents[calMonth + '-' + calDay + '-' + dateProperties.year]){
								var returnedHTML = $.parseHTML(codropsEvents[calMonth + '-' + calDay + '-' + dateProperties.year]);
								var nodeNames = [];
								$.each( returnedHTML, function( i, el ) {
								  if(i == returnedHTML.length - 1){
									nodeNames[ i ] = "<li class='calendarModalList'>" + el.innerHTML + "</li>";
								  } else {
									nodeNames[ i ] = "<li class='calendarModalList'>" + el.innerHTML + "</li><hr>";
								  }
								});
								$('#eventList').append(nodeNames.join(""));
							} else {
								$('#eventList').append("No currently scheduled events");
							}

							$('#calendar-modal').modal('show');

						},
						caldata : codropsEvents
					} ),
	$month = $( '#custom-month' ).html( cal.getMonthName() ),
	$year = $( '#custom-year' ).html( cal.getYear() );

	$( '#custom-next' ).on( 'click', function() {
		cal.gotoNextMonth( updateMonthYear );
	} );
	$( '#custom-prev' ).on( 'click', function() {
		cal.gotoPreviousMonth( updateMonthYear );
	} );
	$( '#custom-current' ).on( 'click', function() {
		cal.gotoNow( updateMonthYear );
	} );

	function updateMonthYear() {				
		$month.html( cal.getMonthName() );
		$year.html( cal.getYear() );
	}

	
	
				
				
  }

</script>

</div>
</body>
</html>