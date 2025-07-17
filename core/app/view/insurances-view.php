<section class="content">
<div class="row">
	<div class="col-md-12">
      <h1>Compañías de Seguros</h1>
	  <a href="index.php?view=newinsurance" class="btn btn-default"><i class='fa fa-university'></i> Nueva Aseguradora</a>
	  <br>
	  <br>

		<?php

		$users = InsuranceData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="box-body">
			<table class="table table-bordered table-hover datatable">
			<thead>
			<th><strong>Aseguradora</strong></th>
			<th><strong>Dirección</strong></th>
			<th><strong>Email</strong></th>
			<th><strong>Teléfono</strong></th>
			<th><strong>Página Web</strong></th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->address; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td><?php echo $user->webpage; ?></td>

				<td style="width:120px;" >
				<a href="index.php?view=editinsurance&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delinsurance&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
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
			echo "<p class='alert alert-danger'>No hay Aseguradoras</p>";
		}


		?>


	</div>
</div>
</section>