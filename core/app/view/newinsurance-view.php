<div class="row">
	<div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="blue">
          <h4 class="title">Nueva Aseguradora</h4>
      </div>
      <div class="card-content table-responsive">

		    <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addinsurance" role="form">


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Código SBS</label>
            <div class="col-md-6">
              <input type="text" name="sbs_code"  class="form-control" id="sbs_code" placeholder="Código SBS">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">RUC</label>
            <div class="col-md-6">
              <input type="text" name="ruc" class="form-control"  id="ruc" placeholder="Nro. RUC">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
            <div class="col-md-6">
              <input type="text" name="address"  required class="form-control"  id="address1" placeholder="Direccion">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
            <div class="col-md-6">
              <input type="text" name="phone" required class="form-control" id="phone1" placeholder="Telefono">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="text" name="email" required class="form-control" id="email1" placeholder="Email">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Pagina Web</label>
            <div class="col-md-6">
              <input type="text" name="webpage" class="form-control" id="webpage" placeholder="Página Web">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-primary">Agregar Aseguradora</button>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</div>