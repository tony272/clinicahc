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
<div class="card">
  <!--<div class="card-header" data-background-color="blue">-->
      <h1>Informes Médicos</h1>
  <!--</div>-->
  <div class="card-content table-responsive">
	<a href="index.php?view=newmedicalreport" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nuevo Informe Médico</a>
	<a href="index.php?view=searchreports" class="btn btn-default"><i class='fa fa-search'></i> Buscar Informes </a>
	<br>
	<br>
		<?php

		$users = MedicalreportData::getAll();
		
		if(count($users)>0){
			// si hay reportes
			?>
			<div class="box box-primary">
				<div class="box-body">
					<table class="table table-bordered table-hover datatable">
					<thead>
					<th class="text-center"><strong>Id</strong></th>
					<th class="text-center"><strong>Motivo de Consulta</strong></th>
					<th class="text-center"><strong>Tipo de Informe Médico</strong></th>
					<th class="text-center"><strong>Fecha y Hora de Informe</strong></th>
					<th class="text-center"><strong>Opciones</strong></th>
					</thead>
					<?php
					foreach($users as $user){
						?>
						<tr>
						<td><?php echo $user->id; ?></td>
						<td><?php echo $user->consultation_reason; ?></td>
						<td><?php 
						if ($user->type_report=='l')
							{echo "Alta";}
						else 
							{
								if ($user->type_report=='p')
								{echo "Progresivo";} 
								else 
									{echo "Atención";}
							} ?></td>
						<td><?php echo $user->attention_date." / ".$user->attention_hour; ?></td>
						<td style="width:220px;">
						<a href="index.php?view=editmedicalreport&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs" rel="tooltip" title="Editar"><i class='fa fa-pencil'></i></a>
						<a href="index.php?view=delmedicalreport&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs" rel="tooltip" title="Eliminar"><i class='fa fa-remove'></i></a>
						 <a href="index.php?view=generatemedicalreport&id=<?php echo $user->id;?>" class="btn btn-info btn-xs">Generar</a>
						<!--<a href="./report/report2-word.php" class="btn btn-info btn-xs">GenerarX</a>-->
						<!--<a href="./report/reporte-word.php" class="btn btn-info btn-xs">Generar</a>-->
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
			echo "<p class='alert alert-danger'>No hay informes</p>";
		}


		?>


	</div>
</div>
</section>
