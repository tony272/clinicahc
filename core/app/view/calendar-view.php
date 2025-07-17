<section class="content">

<div class="row">
<div class="col-md-12">
<h1>Calendario</h1>

<div class="box box-primary">
<div class="box-body">
<form class="form-horizontal" role="form" method="post" id="filterreservation">

  <div class="form-group">
    <div class="col-lg-4 ">
    <label for="inputEmail1" class="control-label">Seleccionar médico</label>
<select name="medic_id" id="medicarea_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(MedicData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo "(".$p->no.") ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <div class="col-lg-2 ">
    <label for="inputEmail1" class="control-label">Estado de cita</label>
<select name="status_id" id="medicarea_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(StatusData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <div class=" col-lg-3">
    <label for="inputEmail1" class="control-label"><br><br></label>
      <button type="submit" class="btn btn-default">Filtrar Citas</button>
    </div>
    </div>

</form>
</div>
</div>
<div class="box box-primary">
<div class="box-body">
<script>
  $("#filterreservation").submit(function(e){
    e.preventDefault();
      console.log("xxxx");
    $.get("./?action=filterreservation",$("#filterreservation").serialize(),function(data){
      $(".dataload").html(data);
    });
  });

  $(document).ready(function(){
    $.get("./?action=filterreservation","",function(data){
      $(".dataload").html(data);
    });
  });

</script>

<div class="clearfix"></div>
<br>

<div class="dataload">
</div>

</div>
</div>

</div>
</div>
</section>