<?php
$thejson=null;
$events = ReservationData::getEvery();
foreach($events as $event){
	$thejson[] = array("title"=>$event->title,"url"=>"./?view=editreservation&id=".$event->id,"start"=>$event->date_at."T".$event->time_at);
}
?>
<script>
	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '<?php echo date('Y-m-d');?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});
		
	});

</script>


<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
      <h4 class="title">CALENDARIO DE CITAS</h4>
	  <a href="./index.php?view=reservations" class="btn btn-default">VER PROXIMAS RESERVAS</a>
  </div>
  <div class="card-content table-responsive">
  
<div id="calendar"></div>
</div>
</div>
</div>
</div>
