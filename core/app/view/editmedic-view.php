<section class="content">
<?php 
$user = MedicData::getById($_GET["id"]);
$categories = CategoryData::getAll();
?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Médico</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=updatemedic" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Imagen*</label>
    <div class="col-md-6">

        <?php if($user->image!=""):?>
  <img src="storage/<?php echo $user->image; ?>" class="img-responsive">
        <br><?php endif; ?>

      <input type="file" name="image">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Area*</label>
    <div class="col-md-6">
    <select name="medicarea_id" class="form-control">
    <option value="">-- SELECCIONE --</option>      
    <?php foreach($categories as $cat):?>
    <option value="<?php echo $cat->id; ?>" <?php if($user->medicarea_id==$cat->id){ echo "selected"; }?>><?php echo $cat->name; ?></option>      
    <?php endforeach;?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Doc. de Identidad</label>
    <div class="col-md-6">
      <input type="text" name="no" value="<?php echo $user->no;?>" class="form-control" id="no" placeholder="DNI">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>"  class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Dirección*</label>
    <div class="col-md-6">
      <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Teléfono</label>
    <div class="col-md-6">
      <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">CMP</label>
    <div class="col-md-6">
      <input type="text" name="cmp"  value="<?php echo $user->cmp;?>"  class="form-control" id="inputEmail1" placeholder="CMP">
    </div>
  </div>

    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked"; }?>> Activar acceso
        </label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Password</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>" id="phone" placeholder="Password">
    </div>
  </div>

<p class="text-info">La hora inicio y fin son las horas iniciales, las hora inicio 2 y fin 2 son horas considerando un descanso.</p>
  <div class="row">
    <div class="col-md-1"></div>
    <?php
$data = array(1=>"Lunes",2=>"Martes",3=>"Miercoles",4=>"Jueves",5=>"Viernes",6=>"Sabado",7=>"Domingo");

    ?>
<div class="col-md-7">
  <?php 
  foreach($data as $k=>$v):
$datax = $user->{'time'.$k.'_data'};
$datax = htmlspecialchars_decode($datax);
$datax = unserialize($datax);
//print_r($datax);
    ?>
    <h3><?php echo $v; ?></h3>
  <div class="form-group">
    <div class="col-md-2">
    <label for="inputEmail1" class="control-label">Activar</label><br><br>
      <input type="checkbox" <?php if($datax["time_active"]==1){ echo "checked"; }?> name="time_active_<?php echo $k; ?>" >
    </div>
        <div class="col-md-2">
    <label for="inputEmail1" class="control-label">Hora inicio (formato 24h)</label>
      <input type="time" name="time1_start_<?php echo $k; ?>"  class="form-control" id="time1_start" value="<?php echo $datax['time1_start'];?>" placeholder="Hora inicio">
    </div>
    <div class="col-md-2">
    <label for="inputEmail1" class="control-label">Hora fin (formato 24h)</label>
      <input type="time" name="time1_finish_<?php echo $k; ?>"  class="form-control" id="time1_finish"  value="<?php echo $datax['time1_finish'];?>" placeholder="Hora fin">
    </div>
    <div class="col-md-2">
    <label for="inputEmail1" class="control-label">Hora inicio 2 (formato 24h)</label>
      <input type="time" name="time2_start_<?php echo $k; ?>"  class="form-control" id="time2_start"  value="<?php echo $datax['time2_start'];?>"placeholder="Hora inicio">
    </div>
    <div class="col-md-2">
    <label for="inputEmail1" class="control-label">Hora fin 2 (formato 24h)</label>
      <input type="time" name="time2_finish_<?php echo $k; ?>"  class="form-control" id="time2_finish" value="<?php echo $datax['time2_finish'];?>" placeholder="Hora fin">
    </div>
    <div class="col-md-2">
    <label for="inputEmail1" class="control-label">Duracion de la cita (Minutos)</label>
      <input type="text" name="duration_<?php echo $k; ?>" required class="form-control" id="duration"  value="<?php echo $datax['duration'];?>" placeholder="Duracion de la cita">
    </div>
  </div>
<?php endforeach; ?>
</div>
</div>
  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-success">Actualizar Medico</button>
    </div>
  </div>
</form>
	</div>
</div>
</section>