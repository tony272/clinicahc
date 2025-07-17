<section class="content">
<div class="row">
	<div class="col-md-12">
		<h1>Médicos</h1>
		<a href="index.php?view=newmedic" class="btn btn-default"><i class='fa fa-user-md'></i> Nuevo Médico</a>

<br>
<br>
		<?php

		$users = MedicData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="box-body">
			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>DNI</th>
			<th><i class="fa fa-picture-o"></i></th>
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Area</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->no;?></td>
				<td style="width:80px;">
				<?php if($user->image!=""):?>
				<img src="storage/<?php echo $user->image; ?>" class="img-responsive">
				<?php endif; ?>

				</td>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->address; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td><?php if($user->medicarea_id!=null){ echo $user->getCategory()->name; } ?></td>
				<td style="width:250px;">
				<a href="index.php?view=medichistory&id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Historial</a>
				<a href="index.php?view=editmedic&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delmedic&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

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
			echo "<p class='alert alert-danger'>No hay médicos</p>";
		}


		?>


	</div>
</div>
</section>