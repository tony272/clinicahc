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


<!--<div class="card">-->
  <!--<div class="card-header" data-background-color="blue">-->
      <h1>Informes Médicos</h1>
  <!--</div>-->
  <div class="card-content table-responsive">
	<br><br>
	<form class="form-horizontal" role="form">
		<input type="hidden" name="view" value="searchreports">
        <?php
			$pacients = PacientData::getAll();
			$medics = MedicData::getAll();
			$medicalreports = MedicalreportData::getAll();
        ?>

  		<div class="form-group">
	    <div class="col-lg-2">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-search"></i></span>
			  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Motivo Informe">
			</div>
	    </div>

    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-male"></i></span>
			<select name="pacient_id" class="form-control">
				<option value="">PACIENTE</option>
			  		<?php foreach($pacients as $p):?>
			    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["pacient_id"]) && $_GET["pacient_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
			  		<?php endforeach; ?>
			</select>
		</div>
    </div>

    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
			<select name="medic_id" class="form-control">
				<option value="">MEDICO</option>
			  		<?php foreach($medics as $p):?>
			    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["medic_id"]) && $_GET["medic_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
			  		<?php endforeach; ?>
			</select>
		</div>
    </div>
<!--
    <div class="col-lg-4">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		  <input type="date" name="attention_date" value="<?php if(isset($_GET["attention_date"]) && $_GET["attention_date"]!=""){ echo $_GET["attention_date"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
-->
    <div class="col-lg-2">
    	<button class="btn btn-primary btn-block">Buscar</button>
    </div>

  </div>
</form>

<?php
	$users= array();
	if((isset($_GET["q"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"])) && ($_GET["q"]!="" || $_GET["pacient_id"]!="" || $_GET["medic_id"]!="") ) 
	{
		$sql = "select * from medicalreport where ";
		if($_GET["q"]!="")
		{
			$sql .= " consultation_reason like '%$_GET[q]%' ";
		}

		if($_GET["pacient_id"]!="")
		{
			if($_GET["q"]!="")
			{
				$sql .= " and ";
			}
			$sql .= " pacient_id = ".$_GET["pacient_id"];
		}

		if($_GET["medic_id"]!="")
		{
			if($_GET["q"]!=""||$_GET["pacient_id"]!="")
			{
				$sql .= " and ";
			}
			$sql .= " medic_id = ".$_GET["medic_id"];
		}
		/*
		if($_GET["date_at"]!="")
		{
			if($_GET["q"]!=""||$_GET["pacient_id"]!="" ||$_GET["medic_id"]!="" )
			{
				$sql .= " and ";
			}
			$sql .= " date_at = \"".$_GET["date_at"]."\"";
		}
		*/
		$users = MedicalreportData::getBySQL($sql);
	}

	else
	{
		$users = MedicalreportData::getAll();
	}
	
	if(count($users)>0)
	{
			// si hay usuarios
?>
	<table class="table table-bordered table-hover">

	<thead>
		<th><strong>Asunto</strong></th>
		<th><strong>Paciente</strong></th>
		<th><strong>Médico</strong></th>
		<th><strong>Fecha</strong></th>
		<th><strong>Opciones</strong></th>
	</thead>
<?php
	foreach($users as $user)
	{
		$pacient  = $user->getPacient();
		$medic = $user->getMedic();
?>
	<tr>
		<td><?php echo $user->consultation_reason; ?></td>
		<td style="width:200px;"><?php echo $pacient->name." ".$pacient->lastname; ?></td>
		<td><?php echo $medic->name." ".$medic->lastname; ?></td>
		<td style="width:110px;"><?php echo $user->attention_date; ?></td>
		<td style="width:250px;">
			<a href="index.php?view=editmedicalreport&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs" rel="tooltip" title="Editar"><i class='fa fa-pencil'></i></a>
			<a href="index.php?view=delmedicalreport&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs" rel="tooltip" title="Eliminar"><i class='fa fa-remove'></i></a>
			<a href="index.php?view=generatemedicalreport&id=<?php echo $user->id;?>" class="btn btn-info btn-xs">Generar</a>
		</td>
	</tr>
<?php

	}
?>
	</table>
  </div>
<!--</div>-->
<?php
	}
	else
	{
		echo "<p class='alert alert-danger'>No hay informes</p>";
	}

?>

	</div>
</div>
</section>