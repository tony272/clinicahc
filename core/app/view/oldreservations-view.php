<section class="content">
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
<!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->
</div>
		<h1>Citas</h1>
<br>
		<?php

		$users = ReservationData::getOld();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="box-body">

			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>Asunto</th>
			<th>Paciente</th>
			<th>Médico</th>
			<th>Fecha</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$pacient  = $user->getPacient();
				$medic = $user->getMedic();
				?>
				<tr>
				<td><?php echo $user->title; ?></td>
				<td><?php echo $pacient->name." ".$pacient->lastname; ?></td>
				<td><?php echo $medic->name." ".$medic->lastname; ?></td>
				<td><?php echo $user->date_at." ".$user->time_at; ?></td>
				<td style="width:170px;">
				<a href="./report/reservation-word.php?id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Descargar</a>

				<a href="index.php?view=editreservation&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=delreservation&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
?>
</table>
</div>
</div>
<?php


		}else{
			echo "<p class='alert alert-info'>No hay citas</p>";
		}


		?>


	</div>
</div>

</section>