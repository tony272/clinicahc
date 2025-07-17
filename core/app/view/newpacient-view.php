<?php
$nationalities = NationalityData::getAll();
$insurances = InsuranceData::getAll();
?>
<section class="content">
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Paciente</h1>
	<br>
	<form class="form-horizontal" method="post" id="addpacient" enctype="multipart/form-data" action="index.php?view=addpacient" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Imagen*</label>
    <div class="col-md-6">
      <input type="file" name="image">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Doc. Identidad*</label>
    <div class="col-md-2">
      <input type="text" name="no" class="form-control" id="no" placeholder="Doc. de Identidad">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
    <div class="col-md-6">
      <input type="text" name="lastname"  class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
    <div class="col-md-6">
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
</label>
<label class="checkbox-inline">
  <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
</label>

    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
    <div class="col-md-6">
      <input type="date" name="day_of_birth" class="form-control"  id="ay_of_birth" placeholder="Fecha de Nacimiento">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Edad*</label>
    <div class="col-md-1">
      <input type="text" name="age" class="form-control"  id="age" placeholder="Edad">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nacionalidad</label>
    <div class="col-md-6">
      <select name="nationality_id" class="form-control">
        <option value="">-- SELECCIONE --</option>      
        <?php foreach($nationalities as $nat):?>
        <option value="<?php echo $nat->id; ?>"><?php echo $nat->name; ?></option>      
        <?php endforeach;?>
      </select>
    </div>
  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" class="form-control"  id="address" placeholder="Direccion">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
      <p class="help-block">Si el email esta vacio se inhabilita el acceso al paciente.</p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Password*</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      <p class="help-block">Si el password esta vacio se inhabilita el acceso al paciente.</p>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Teléfono*</label>
    <div class="col-md-2">
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Teléfono">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Aseguradora</label>
    <div class="col-md-6">
      <select name="insurance_id" class="form-control">
        <option value="">-- SELECCIONE --</option>      
        <?php foreach($insurances as $ins):?>
        <option value="<?php echo $ins->id; ?>"><?php echo $ins->name; ?></option>      
        <?php endforeach;?>
      </select>
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Póliza</label>
    <div class="col-md-2">
      <input type="text" name="policy_num" class="form-control"  id="policy_num" placeholder="Póliza">
      <!--<textarea name="policy_num" class="form-control" id="policy_num" placeholder="Póliza"></textarea>-->
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nro. Referencia</label>
    <div class="col-md-2">
      <input type="text" name="reference_num" class="form-control"  id="reference_num" placeholder="Nro. Referencia">
      <!--<textarea name="reference_num" class="form-control" id="reference_num" placeholder="Nro. Referencia"></textarea>-->
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Ingreso al País</label>
    <div class="col-md-6">
      <input type="date" name="admissiondate" class="form-control"  id="admissiondate" placeholder="Fecha de Ingreso al País">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Salida del País</label>
    <div class="col-md-6">
      <input type="date" name="departuredate" class="form-control"  id="departuredate" placeholder="Fecha de Salida del País">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Enfermedad</label>
    <div class="col-md-6">
      <textarea name="sick" class="form-control" id="sick" placeholder="Enfermedad"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Medicamentos</label>
    <div class="col-md-6">
      <textarea name="medicaments" class="form-control" id="medicaments" placeholder="Medicamentos"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Alergia</label>
    <div class="col-md-6">
      <textarea name="alergy" class="form-control" id="alergy" placeholder="Alergia"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Lugar de registro</label>
    <div class="col-md-6">
      <input type="text" name="regplace" class="form-control"  id="regplace" placeholder="Lugar de Registro">
      <!--<textarea name="regplace" class="form-control" id="regplace" placeholder="Lugar de Registro"></textarea>-->
    </div>
  </div>

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Paciente</button>
    </div>
  </div>
</form>
	</div>
</div>
</section>