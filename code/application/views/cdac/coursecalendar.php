
<link href='assets/dist/frontend/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/dist/frontend/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<!-- <script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script> -->
<script src='assets/dist/frontend/fullcalendar/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

		var attendance_calendar = $('#calendar').fullCalendar({
			//defaultDate: '<?php echo date("Y-m-d")?>',
			/*validRange: {
		        start: '2017-11-01',
		        end: '<?php echo date("Y-m-d")?>'
		    },*/
		    visibleRange: function(currentDate) {
		        return {
		            start: currentDate.clone().subtract(1, 'days'),
		            end: currentDate.clone().add(3, 'days') // exclusive end, so 3
		        };
		    },
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			dayClick: function(date, jsEvent, view) {
				    $("#myModal").modal("show");

				    //alert('Clicked on: ' + date.format());

				    $('#modal-date-title').html(date.format());

				    $('#attendance_date').val(date.format());

			       	// alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

			        // alert('Current view: ' + view.name);

			        // change the day's background color just for fun
			        //$(this).css('background-color', 'red');
			        /*
			        if($('#attendance_date').val() != "<?php echo date('Y-m-d'); ?>") {
			        	//alert(date.format() + " || " + "<?php echo date('Y-m-d'); ?> ===== if ======= ");

			        	$("input:checkbox").prop('disabled', "disabled");
			        } else {
			        	//alert(date.format() + " || " + "<?php echo date('Y-m-d'); ?> ===== else ======= ");
			        	$("input:checkbox").prop('disabled', "");
			        }
			        */
			        $("input:checkbox").prop('checked', false);
			        $.ajax({
			        	type:'post',
			        	url:"<?php echo $base_url.'index.php/cdac/getAttendance'?>",
			        	data:{'course_id': '<?php echo $this->uri->segment(3); ?>', 'start_dt' : '<?php echo $students[0]['start_dt']; ?>', 'end_dt' : '<?php echo $students[0]['end_dt']; ?>', 'attendance_date' : date.format()},
			        	datatype: 'json',
			        	success: function(responseData) {
			        		var data = $.parseJSON(responseData);
			        		if(data.reocrdfound != 0) {
			        			//alert("Records found!");
			        			$("input:checkbox").each(function() {
			        				
			        				//console.log("123Student absent : " + $(this).val() + " |||| : " + $.inArray($(this).val(), data.absent_students));
			        				//if(contains.call(data.absent_students, $(this).val()))  {
			        				if($.inArray($(this).val(), data.absent_students) >= 0)  {
			        					//console.log("Student absent : " + $(this).val());

			        					$(this).prop('checked', true);
			        				}
			        			});
			        			console.log("============ : " + data);
			        		}
			        	},
			        });
			},
			events: {
		        url: 'cdac/get_attendance',
		        type: 'POST',
		        data:{'course_id': '<?php echo $this->uri->segment(3); ?>', 'start_dt' : '<?php echo $students[0]['start_dt']; ?>', 'end_dt' : '<?php echo $students[0]['end_dt']; ?>'},
		        error: function() {
		            alert('there was an error while fetching events!');
		        },
		        //color: 'yellow',   // a non-ajax option
		        textColor: 'black' // a non-ajax option
		    }

			/*
			events: [
				<?php 
					if(isset($courseAttendance) && $courseAttendance != "") {
				foreach($courseAttendance as $key => $calendarAttendance) { ?>
					{
						title: '<?php echo $calendarAttendance["student_id"];?>',
						start: '<?php echo $calendarAttendance["attendance_date"];?>',
						end: '<?php echo $calendarAttendance["attendance_date"];?>'
					},
				<?php } 
					}
				?>
			]
			*/
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
	.student-block .btn {
		padding: 6px 5px !important;
	}

</style>

<style type="text/css">
	.attendance_check {
		display: none;
	}
	.attendance_check + label {
		background:palegreen;
		border: 1px solid black;
		font-weight: bold;
		color: #000;
	}

	.attendance_check + label:hover {
	    background: #FFF !important;
	}
	.attendance_check:checked + label {
		background: red;
	}
	.student-block {
		display: inline-block;
		float: left;
		color: #f0ffff;
	}
</style>

	<div id='calendar'></div>



	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-date-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form method="POST" id="attendance_form" action="<?php echo current_full_url(); ?>">
          	<input type="hidden" name="course_id" value="<?php echo $this->uri->segment(3); ?>">
          	<input type="hidden" id="attendance_date" name="attendance_date" value="">
          	<input type="hidden" id="start_dt" name="start_dt" value="<?php echo $students[0]['start_dt']; ?>">
          	<input type="hidden" id="end_dt" name="end_dt" value="<?php echo $students[0]['end_dt']; ?>">
			<?php foreach ( $students_demo as $key => $student ) { 

					if(($key + 1) % 10 == 0) { 
					?>
						<div class="row">
					<?php
					}
			?>	
			<div class="student-block">
				<input type="checkbox" class="attendance_check" name="attendance[]" id="check_<?php echo $student['id']; ?>" value="<?php echo $student['id']; ?>">
				<label class="btn" for="check_<?php echo $student['id']; ?>">
					<div><?php echo $student['id']; ?></div>
					<div><?php echo $student['name']; ?></div>	
				</label>
			</div>
			<?php 
			if(($key + 1) % 10 == 0) { 
					?>
			</div>
			<?php } } ?>
				<hr/>
				<span class="btn btn-info" id="attendance_submit" data-dismiss="modal">Submit</span>
			</form>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
  </div>
  <script>
  	$("#attendance_submit").click(function() {
  		var attendance_data = $("#attendance_form").serialize();

  		console.log("==========>>>>>>> : " + attendance_data);
  		//if($('#attendance_date').val() == "<?php echo date('Y-m-d'); ?>") {
	  		$.ajax({
	  			type: "POST",
	  			url: "cdac/save_attendance",
	  			data: {'attendance_data' : attendance_data},
	  			success: function(responsedata) {
	  				if(responsedata == 1) {
	  					$('#calendar').fullCalendar( 'refetchEvents' );
	  				console.log("========responsedata==>>>>>>> : " + responsedata);
	  				//alert("=======in if ====== : " + responsedata);	
	  				} else {
	  					//alert("==== else ========= : " + responsedata);
	  					alert("Please contact higher authority to edit attendance!");
	  				}
	  				
	  			}
	  		});
	  		/*
	  	} else {
	  		alert("Please contact higher authority to edit attendance!");
	  	}
	  	*/
  	});  	
  </script>
