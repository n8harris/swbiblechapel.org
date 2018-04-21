$(document).ready(function() {

  $('body').oiplayer();
  $("#footer-tool").tooltip();
  $("[data-toggle='tooltip']").tooltip({ placement : 'left'});
  $('#backToTop').removeClass('affix');
  $('#backToTop').addClass('affix-top');
  $('#errorLogin').hide();
	$('#messageCreate').hide();
	
	$('.navbar-nav .dropdown a').each(function(index, item){ 
		if (window.location.href.includes(item['href'])) {
			$(item).parent().addClass('current-drop');
		}
	});

	$('.navbar-nav > li > a').each(function(index, item){ 
		if (window.location.href.includes(item['href'])) {
			$(item).parent().addClass('current');
		}
	});
  
  var win = $(window),
      bod = $('body'),
      hsh = false;

  win.bind('scroll.dg-small-header', function() {
    if (!hsh) {
      if (win.scrollTop() >= 200) {
        bod.addClass('dg-small-header');
        hsh = true;
      }
    } else {
      if (win.scrollTop() < 200) {
        bod.removeClass('dg-small-header');
        hsh = false;
      }
    }
  });
  
  var tim;

var start = $('#myCarousel').find('.active').attr('data-interval');
tim = setTimeout("$('#myCarousel').carousel();", start-1000);

$('#myCarousel').on('slid.bs.carousel', function () {   
     clearTimeout(tim);  
     var duration = $(this).find('.active').attr('data-interval');

     $('#myCarousel').carousel('pause');
     tim = setTimeout("$('#myCarousel').carousel();", duration-1000);
})

$('.carousel-control.right').on('click', function(){
    clearTimeout(tim);   
});

$('.carousel-control.left').on('click', function(){
    clearTimeout(tim);   
});

  /**
   * DG Home Jumbotron
   *
   * Sets height of jumbotron to fill viewport, then adds scroll arrows.
   */
  if ($('#dg-home-jumbotron')) {
    var win = $(window),
        hjt = $('#dg-home-jumbotron'),
        hdr = $('#dg-header');
    var winHeight = win.height(),
        hdrHeight = hdr.height();

    var hjtHeight = winHeight - hdrHeight;
    if (hjtHeight < 400) { hjtHeight = 400; }
    hjt.height(hjtHeight);

    if (hjtHeight > 400) {
      var hjtda = hjt.find('.dg-down-arrow:first');
      hjtda.css('bottom', 20);
      hjtda.addClass('show');

      var hideArrow = function() {
        hjtda.removeClass('show');
        $(win).unbind('scroll.downArrow');
      };

      $(win).bind('scroll.downArrow', hideArrow);
    }
  }

  /**
   * DG Image Divider
   *
   * Allows image to move while scrolling.
   */
  if ($('.dg-section-image-divider')) {
    var win = $(win),
        ids = $('.dg-section-image-divider');

    ids.scroll(function() {
      console.log("scrolling...");
      console.log($(this).scrollTop());
    });
  }

  /**
   * DG Modals
   *
   * Shows modal windows for links
   */
  if ($('.dg-section [href^="#"], .dg-footer-quick-tools [href^="#"]').length > 0) {
    var mls = $('.dg-section [href^="#"], .dg-footer-quick-tools [href^="#"]');

    mls.click(function(e) {
      var mid = $(this).attr('href');
      $(mid).modal('toggle');
    });
  }

  /**
   * Back to Top Button
   */
  $('#backToTop').click(function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: 0}, 900);
  });
  
  $('.eto-to-map').click(function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: $(document).height()}, 900);
  });
  
  $('.read-expand').click(function(){
	if($('.expand-content').is(":visible")){
		$('.expand-content').hide(1000).css('display', 'none');
		$('.read-expand').html("Read More");
	} else {
		$('.expand-content').show(1000).css('display', 'inline');
		$('.read-expand').html("Read Less");
	}
  });
  

  $(window).load(function() {
	setTimeout(function(){
	  initialize();
		$('.main-container').fadeIn(1000);
		$("#loaderImage").fadeOut(1000);
		$('.carousel').carousel({
			 interval: 5000
		});
	}, 800);
  });
  
  $('#calendar-modal').on('show.bs.modal', function() {
	$(this).css('display', 'block');
    $(this).find('.modal-calendar').css({
        'margin-top': function () {
            return -($(this).outerHeight() / 2);
        },
        'margin-left': function () {
            return -($(this).outerWidth() / 2);
        }
    });
  });
  
  $('.waterboro-info a').contents().unwrap();
  
  $('.contact-person').click(function(){
		var email = $(this).data('contact-email');
		document.getElementById('inputContact').value = email;
  });
  
  $('#contact-modal').on('shown.bs.modal', function() {
    $("#success-message").hide();
	$("#contact-form").show();
	$(".modal-footer").show();
});

$('#membership-application').on('shown.bs.modal', function() {
    $("#success-message-membership").hide();
	$("#membership-form").show();
	$(".modal-footer").show();
	$("#baptismDate").hide();
	$("#currentMember").hide();
	
	$("#inputBaptism").click(function(){
		if($(this).is(":checked")){
			$("#baptismDate").show();
		}
	});
	
	$("#inputBaptismNo").click(function(){
		if($(this).is(":checked")){
			if($("#baptismDate").is(":visible")){
				$("#baptismDate").hide();
			}
		}
	});
	
	$("#inputCurrentMember").click(function(){
		if($(this).is(":checked")){
			$("#currentMember").show();
			$("#lastAffiliation").hide();
		}
	});
	
	$("#inputCurrentMemberNo").click(function(){
		if($(this).is(":checked")){
			$("#currentMember").hide();
			$("#lastAffiliation").show();
		}
	});

});

$('#wedding-application').on('shown.bs.modal', function() {
    $("#success-message-wedding").hide();
	$("#wedding-form").show();
	$(".modal-footer").show();
	$("#bride-optional").hide();
	$("#groom-optional").hide();
	$("#differentPastor").hide();
	
	$("#inputBrideNoAttendSWBC").click(function(){
		if($(this).is(":checked")){
			$("#bride-optional").show();
		}
	});
	
	$("#inputBrideAttendSWBC").click(function(){
		if($(this).is(":checked")){
			if($("#bride-optional").is(":visible")){
				$("#bride-optional").hide();
			}
		}
	});

	$("#inputGroomSWBCNoAttend").click(function(){
		if($(this).is(":checked")){
			$("#groom-optional").show();
		}
	});
	
	$("#inputGroomSWBCAttend").click(function(){
		if($(this).is(":checked")){
			if($("#groom-optional").is(":visible")){
				$("#groom-optional").hide();
			}
		}
	});

	$("#inputOtherPastor").click(function(){
		if($(this).is(":checked")){
			$("#differentPastor").show();
		} else if(!$(this).is(":checked")){
			$("#differentPastor").hide();
		}
	});
});

$("#cancelCheckbox").change(function() {
    if(this.checked) {
        $("#bulletins input.form-control").val('C').prop('readonly',true);
		$('textarea.inputAnnouncement').css('visibility','hidden');
		$('#addAnnouncement').hide();
    } else {
		$("#bulletins input.form-control").val('').prop('readonly',false);
		$('textarea.inputAnnouncement').css('visibility','visible');
		$('#addAnnouncement').show();
	}
});


$("#addAnnouncement").click(function(){
	$( ".announcement" ).first().clone().appendTo( "#announcementContainer" );
});

$("#addUrgentAnnouncement").click(function(){
	$( ".urgent-announcement" ).first().clone().appendTo( "#urgentAnnouncementContainer" );
});

$("#create-urgent-form").submit(function() {

    var url = "./urgentValidate.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#create-urgent-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
				var a = data;
               if(data == 'nofill'){
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('*Please fill all fields');
					
			   } else if(data == 'errorCreate') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Error adding bulletin. Please try again.');
			   } else if(data == 'created') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Urgent announcements added');
			   }
           },
		   error: function(data){
				$('#messageCreate').empty();
				$('#messageCreate').show();
				$('#messageCreate').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});

$("#create-bulletin-form").submit(function() {

    var url = "./bulletinValidate.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#create-bulletin-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == 'nofill'){
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('*Please fill all fields');
					
			   } else if(data == 'errorCreate') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Error adding bulletin. Please try again.');
			   } else if(data == 'created') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Bulletin added');
			   } else if(data == 'edited') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Bulletin saved');
			   }
			   
           },
		   error: function(data){
				$('#messageCreate').empty();
				$('#messageCreate').show();
				$('#messageCreate').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});

$("#create-sermon-form").submit(function() {

    var url = "./sermonValidate.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#create-sermon-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == 'nofill'){
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('*Please fill all fields');
					
			   } else if(data == 'errorCreate') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Error adding sermon. Please try again.');
			   } else if(data == 'created') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Sermon added');
			   } else if(data == 'edited') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Sermon saved');
			   }
           },
		   error: function(data){
				$('#messageCreate').empty();
				$('#messageCreate').show();
				$('#messageCreate').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});

$("#create-service-form").submit(function() {

    var url = "./serviceValidate.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#create-service-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == 'nofill'){
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('*Please fill all fields');
					
			   } else if(data == 'alreadyexists') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Service already exists');
			   } else if(data == 'errorCreate') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Error creating service. Please try again.');
			   } else if(data == 'created') {
					$('#messageCreate').empty();
					$('#messageCreate').show();
					$('#messageCreate').append('Service created');
			   }
           },
		   error: function(data){
				$('#messageCreate').empty();
				$('#messageCreate').show();
				$('#messageCreate').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});

$('#inputSelectServiceBulletinEdit').change(function(){
	var url = "./bulletinEdit.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
		   url: url,
           data: $("#create-bulletin-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               var content = $.parseHTML(data);
			   $('#bulletin-edit').fadeOut(300, function(){
				   $('#bulletin-edit').empty();
				   $('#bulletin-edit').fadeIn(300);
				   $('#bulletin-edit').append(content);
			   });
			   
           },
		   error: function(data){
				$('#messageCreate').empty();
				$('#messageCreate').show();
				$('#messageCreate').append('Something went wrong. Please try again.');
		   }
         });
	
});


$('#inputSelectServiceEdit').change(function(){
	var url = "./sermonEdit.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
		   url: url,
           data: $("#create-sermon-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               var content = $.parseHTML(data);
			   $('#sermon-edit').fadeOut(300, function(){
				   $('#sermon-edit').empty();
				   $('#sermon-edit').fadeIn(300);
				   $('#sermon-edit').append(content);
			   });
           },
		   error: function(data){
				$('#messageCreate').empty();
				$('#messageCreate').show();
				$('#messageCreate').append('Something went wrong. Please try again.');
		   }
         });
	
});

$("#login-form").submit(function() {

    var url = "./adminValidate.php"; // the script where you handle the form input.
	if($('#login-form').context.activeElement.name == "sendLoginCreate"){
		$('#adminType').val('create');
	} else if($('#login-form').context.activeElement.name == "sendLoginEdit") {
		$('#adminType').val('edit');
	}

    $.ajax({
           type: "POST",
           url: url,
           data: $("#login-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == 'errorLogin'){
					$('#errorLogin').empty();
					$('#errorLogin').show();
					$('#errorLogin').append('Incorrect username or password');
					
			   } else if(data == 'loggedInCreate') {
					window.location.href = 'adminCreate';
			   } else if(data == 'loggedInEdit'){
				   window.location.href = 'adminEdit';
			   } else {
				   $('#errorLogin').empty();
				   $('#errorLogin').show();
				   $('#errorLogin').append('Something went wrong. Please check your input and try again.');
			   }
           },
		   error: function(data){
				$('#errorLogin').empty();
				$('#errorLogin').show();
				$('#errorLogin').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});

$("#membership-form").submit(function() {

    var url = "./membership-submit.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#membership-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == 'nofill'){
					$('#error-message-membership').empty();
					$('#error-message-membership').append('*Please fill in all fields');
					
			   } else if (data == 'emailerror'){
					$('#error-message-membership').empty();
					$('#error-message-membership').append('*Please enter a valid email');
			   } else if (data == 'error'){
					$('#error-message-membership').empty();
					$('#error-message-membership').append('Something went wrong. Please check your input and try again. ' + data);
			   } else {
					$('#membership-form').hide();
					$('.modal-footer').hide();
					$('#success-message-membership').empty();
					$('#success-message-membership').append('<h2>Thanks ' + data + '</h2><p>Your application has been received successfully.</p>');
					$('#success-message-membership').show();
					
			   }
           },
		   error: function(data){
				$('#error-message-membership').empty();
				$('#error-message-membership').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});

$("#wedding-form").submit(function() {

    var url = "./wedding-submit.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#wedding-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == 'nofill'){
					$('#error-message-wedding').empty();
					$('#error-message-wedding').append('*Please fill in all fields');
					
			   } else if (data == 'emailerror'){
					$('#error-message-wedding').empty();
					$('#error-message-wedding').append('*Please enter a valid email');
			   } else if (data == 'error'){
					$('#error-message-wedding').empty();
					$('#error-message-wedding').append('Something went wrong. Please check your input and try again. ' + data);
			   } else {
					$('#wedding-form').hide();
					$('.modal-footer').hide();
					$('#success-message-wedding').empty();
					$('#success-message-wedding').append('<h2>Thanks ' + data + '</h2><p>Your application has been received successfully.</p>');
					$('#success-message-wedding').show();
					
			   }
           },
		   error: function(data){
				$('#error-message-wedding').empty();
				$('#error-message-wedding').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});


  
  	$("#contact-form").submit(function() {

    var url = "./contact-us.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#contact-form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data == 'nofill'){
					$('.error-message').empty();
					$('.error-message').append('*Please fill in all fields');
					
			   } else if (data == 'emailerror'){
					$('.error-message').empty();
					$('.error-message').append('*Please enter a valid email');
			   } else if (data == 'error'){
					$('.error-message').empty();
					$('.error-message').append('Something went wrong. Please check your input and try again.');
			   } else {
					$('#contact-form').hide();
					$('.modal-footer').hide();
					$('#success-message').empty();
					$('#success-message').append('<h2>Thanks ' + data + '</h2><p>Your message was sent successfully.</p>');
					$('#success-message').show();
					
			   }
           },
		   error: function(data){
				$('.error-message').empty();
				$('.error-message').append('Something went wrong. Please check your input and try again.');
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});

  	$(".sermon-link").click(function() {

    var parts = $(this).attr('href').split('?');
	var url = "./" + parts[0];
	var queryString = parts[1]; // the script where you handle the form input.

    $.ajax({
           type: "GET",
           url: url,
           data: queryString,
           success: function(data)
           {
               if(data == 'nofill'){
					$('audio, video').each(function(){
						this.pause(); // Stop playing
						this.currentTime = 0; // Reset time
					});
					$('#sermonInfo').hide();
					$('#sermonTitle').empty();
					$('#sermonTitle').append('No sermon');
					$('#sermonInfo').fadeIn(300);
					
			   } else {
					$('audio, video').each(function(){
						if(!($('#sermonId').attr('src') == '')){
							this.pause(); // Stop playing
							this.currentTime = 0; // Reset time
						}
					});
					var elements = data.split('|');
					$('#sermonInfo').hide();
					$('#sermonTitle').empty();
					$('.audio-image-wrapper').attr('data-original-title', "Speaker: " + elements[0] + " " + elements[1]);
					$('.audio-image').attr('src', elements[2]);
					$('.oiplayer').remove();
					if(elements[5]){
						if($('.oiplayer').length){
							$('.oiplayer').remove();
						} else {
							$('#music').remove();
							$('.oipcontrols').remove();
						}
						$('#sermonInfo').append('<video id="music" preload="true" controls></video>');
						$('#music').append('<source id="sermonId" src="' + elements[4] + '" type="video/mp4">');
						$('.audio-image-wrapper').hide();
						
					} else {
						if($('.oiplayer').length){
							$('.oiplayer').remove();
						} else {
							$('#music').remove();
							$('.oipcontrols').remove();
						}
						
						$('#sermonInfo').append('<audio id="music" preload="true"></audio>');
						$('#music').append('<source id="sermonId" src="' + elements[4] + '" type="audio/mpeg">');
						$('body').oiplayer();
						$('.audio-image-wrapper').show();
					}
					$('#sermonTitle').append(elements[3]);
					$('#sermonId').attr('src', elements[4]);
					$('#music').load();
					$('#sermonInfo').fadeIn(500);
					document.getElementById('music').pause();
			   } 
           },
		   error: function(data){
				$('audio, video').each(function(){
					this.pause(); // Stop playing
					this.currentTime = 0; // Reset time
				}); 
				$('#sermonInfo').hide();
				$('#sermonTitle').empty();
				$('#sermonTitle').append('No sermon');
				$('#sermonInfo').fadeIn(300);
		   }
         });

    return false; // avoid to execute the actual submit of the form.
});
  
	

});

function initialize() {   
			var e;
			var t=new google.maps.LatLng(43.536649, -70.714188);
			var r=[{featureType:"all",elementType:"all",stylers:[{saturation:-100,gamma:1.51}]}];
			var i={zoom:14,center:t,scrollwheel:false,mapTypeControlOptions:{mapTypeIds:[google.maps.MapTypeId.ROADMAP,"tehgrayz"]}};
			e=new google.maps.Map(document.getElementById("map_canvas"),i);
			var s="./images/pointer_map.png";
			var o=new google.maps.Marker({position:t,map:e,icon:s});
			var u=new google.maps.StyledMapType(r,{name:"Grayscale"});
			e.mapTypes.set("tehgrayz",u);
			e.setMapTypeId("tehgrayz")
}

  /*function listEvents(root) {
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

	
	
				
				
  }*/


		