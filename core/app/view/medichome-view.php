<section class="content">
<?php
$thejson = null;

$events = ReservationData::getEveryByMedicId($_SESSION["medic_id"]);
foreach($events as $event){
	$thejson[] = array("title"=>$event->title,"start"=>$event->date_at."T".$event->time_at);
}
// print_r(json_encode($thejson));

?>
<script>


	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});
		
	});

</script>


<div class="row">
<div class="col-md-12">
<h1>Calendario</h1>
<div class="box box-primary">
<div id="calendar"></div>
</div>

</div>
</div>
</section>