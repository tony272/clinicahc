<section class="content">
<?php $user = InsuranceData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">


  <h1 class="title">Editar Aseguradora</h1>
  <br>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateinsurance" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo SBS</label>
    <div class="col-md-6">
      <input type="text" name="sbs_code" value="<?php echo $user->sbs_code;?>" class="form-control" id="sbs_code" placeholder="Còdigo SBS">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">RUC</label>
    <div class="col-md-6">
      <input type="text" name="ruc" class="form-control" value="<?php echo $user->ruc; ?>"  id="address1" placeholder="RUC">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" value="<?php echo $user->address;?>" required class="form-control" required id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" required class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Teléfono*</label>
    <div class="col-md-6">
      <input type="text" name="phone"  value="<?php echo $user->phone;?>"  required class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Página Web</label>
    <div class="col-md-6">
      <input type="text" name="webpage"  value="<?php echo $user->webpage;?>"  class="form-control" id="inputEmail1" placeholder="Página Web">
    </div>
  </div>
  
  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-success">Actualizar Aseguradora</button>
    </div>
  </div>
</form>


	</div>
</div>
</section>