<?php
//$nationalities = NationalityData::getAll();
//$insurances = InsuranceData::getAll();
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$medicalreports = AttentionsheetData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h1 class="title">Editar Ficha de Atención</h1>
  </div>
  <br>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateattentionsheet" role="form">

<!-- Tipo de Informe Medico 
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Tipo de Informe Médico*</label>
    <div class="col-sm-6">
    <label class="checkbox-inline">
      <input type="radio" id="inlineCheckbox1" name="type_report" required <?php if($medicalreports->type_report=="a"){ echo "checked"; }?> value="a"> De Atención
    </label>
    <label class="checkbox-inline">
      <input type="radio" id="inlineCheckbox2" name="type_report" required <?php if($medicalreports->type_report=="p"){ echo "checked"; }?> value="p"> Progresivo
    </label>
    <label class="checkbox-inline">
      <input type="radio" id="inlineCheckbox2" name="type_report" required <?php if($medicalreports->type_report=="l"){ echo "checked"; }?> value="l"> De Alta
    </label>
    </div>
  </div>
-->
  <!-- Seleccionar Paciente -->

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
    <div class="col-md-4">
    <select name="pacient_id" class="form-control">
    <option value="">-- SELECCIONE --</option>      
    <?php foreach($pacients as $pac):?>
    <option value="<?php echo $pac->id; ?>" <?php if($medicalreports->pacient_id==$pac->id){ echo "selected"; }?>><?php echo $pac->name." ".$pac->lastname; ?></option>      
    <?php endforeach;?>
    </select>
    </div>
  </div>

<!-- Seleccionar Medico -->

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Médico</label>
    <div class="col-md-4">
    <select name="medic_id" class="form-control">
    <option value="">-- SELECCIONE --</option>      
    <?php foreach($medics as $med):?>
    <option value="<?php echo $med->id; ?>" <?php if($medicalreports->medic_id==$med->id){ echo "selected"; }?>><?php echo $med->name." ".$med->lastname; ?></option>      
    <?php endforeach;?>
    </select>
    </div>
  </div>

<!-- Fecha y hora de Reporte -->

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
    <div class="col-lg-3">
      <input type="date" name="attention_date" required class="form-control" value="<?php echo $medicalreports->attentionas_date; ?>" id="inputEmail1" placeholder="Fecha">
    </div>
    <div class="col-lg-3">
      <input type="time" name="attention_hour" required class="form-control" value="<?php echo $medicalreports->attentionas_hour; ?>" id="inputEmail1" placeholder="Hora">
    </div>
  </div>

<!-- Fecha y hora de Reporte -->

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Motivo de la Consulta*</label>
    <div class="col-md-3">
      <input type="text" name="consultation_reason"  required class="form-control" value="<?php echo $medicalreports->consultationas_reason; ?>" id="consultation_reason" placeholder="Motivo de la Consulta">
    </div>
<!--
    <label for="inputEmail1" class="col-lg-1 control-label">Edad*</label>
    <div class="col-md-2">
      <input type="text" name="age"  required class="form-control" id="age" placeholder="Edad">
    </div>
  </div>
-->
<!-- Historia de la Enfermedad  

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Historia de la Enfermedad</label>
    <div class="col-md-6">
      <textarea name="history_disease" class="form-control" id="history_disease" placeholder="Historia de la Enfermedad"><?php echo $medicalreports->history_disease; ?></textarea>
    </div>
  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tiempo de Enfermedad</label>
    <div class="col-lg-2">
      <input type="text" name="sick_time" required class="form-control" value="<?php echo $medicalreports->sick_time; ?>" id="onset_form" placeholder="Tiempo de Enfermedad">
    </div>
    <label for="inputEmail1" class="col-lg-1 control-label">Forma de Inicio</label>
    <div class="col-lg-1">
      <input type="text" name="onset_form" required class="form-control" value="<?php echo $medicalreports->onset_form; ?>" id="onset_form" placeholder="Forma de Inicio">
    </div>
    <label for="inputEmail1" class="col-lg-1 control-label">Curso</label>
    <div class="col-lg-1">
      <input type="text" name="course" required class="form-control" value="<?php echo $medicalreports->course; ?>" id="course" placeholder="Curso">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Antecedentes</label>
    <div class="col-md-6">
      <textarea name="record" class="form-control" id="record" placeholder="Antecedentes"><?php echo $medicalreports->record; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Alergias</label>
    <div class="col-md-6">
      <textarea name="alergy" class="form-control" id="alergy" placeholder="Alergias"><?php echo $medicalreports->alergy; ?></textarea>
    </div>
  -->
  </div>

<!-- Examen Clínico  -->

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Sat. O2</label>
    <div class="col-lg-1">
      <input type="text" name="so2" required class="form-control" value="<?php echo $medicalreports->so2as; ?>" id="so2" placeholder="Sat. O2">
    </div>
    <label for="inputEmail1" class="col-lg-1 control-label">P.A.</label>
    <div class="col-lg-1">
      <input type="text" name="pa" required class="form-control" value="<?php echo $medicalreports->paas; ?>" id="pa" placeholder="P.A.">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">F.C.</label>
    <div class="col-lg-1">
      <input type="text" name="fc" required class="form-control" value="<?php echo $medicalreports->fcas; ?>" id="fc" placeholder="F.C.">
    </div>
    <label for="inputEmail1" class="col-lg-1 control-label">F.R.</label>
    <div class="col-lg-1">
      <input type="text" name="fr" required class="form-control" value="<?php echo $medicalreports->fras; ?>" id="fr" placeholder="F.R.">
    </div>
    <label for="inputEmail1" class="col-lg-1 control-label">T°</label>
    <div class="col-lg-1">
      <input type="text" name="temperature" required class="form-control" value="<?php echo $medicalreports->temperatureas; ?>" id="temperature" placeholder="T°">
    </div>
  </div>
<!--
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">General</label>
    <div class="col-md-6">
      <textarea value="" name="general" class="form-control" id="general" ><?php echo $medicalreports->general; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Piel</label>
    <div class="col-md-6">
      <textarea value="" name="skin" class="form-control" id="skin" ><?php echo $medicalreports->skin; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ojos</label>
    <div class="col-md-6">
      <textarea value="" name="eyes" class="form-control" id="eyes" ><?php echo $medicalreports->eyes; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Boca</label>
    <div class="col-md-6">
      <textarea value="" name="mouth" class="form-control" id="mouth" ><?php echo $medicalreports->mouth; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Faringe</label>
    <div class="col-md-6">
      <textarea value="" name="pharynx" class="form-control" id="pharynx" ><?php echo $medicalreports->pharynx; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cuello</label>
    <div class="col-md-6">
      <textarea value="" name="neck" class="form-control" id="neck" ><?php echo $medicalreports->neck; ?></textarea>
    </div>
  </div> 

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Torax</label>
    <div class="col-md-6">
      <textarea value="" name="thorax" class="form-control" id="thorax" ><?php echo $medicalreports->thorax; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cardiovascular</label>
    <div class="col-md-6">
      <textarea value="" name="cardiovascular" class="form-control" id="cardiovascular" ><?php echo $medicalreports->cardiovascular; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Abdomen</label>
    <div class="col-md-6">
      <textarea value="" name="abdomen" class="form-control" id="abdomen" ><?php echo $medicalreports->abdomen; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Genito Urinario</label>
    <div class="col-md-6">
      <textarea value="" name="genitourinary" class="form-control" id="genitourinary" ><?php echo $medicalreports->genitourinary; ?></textarea>
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Neurológico</label>
    <div class="col-md-6">
      <textarea value="" name="neurologic" class="form-control" id="neurologic" ><?php echo $medicalreports->neurologic; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Musculo Esquelético</label>
    <div class="col-md-6">
      <textarea value="" name="musculoskeletal" class="form-control" id="musculoskeletal" ><?php echo $medicalreports->musculoskeletal; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Extremidades</label>
    <div class="col-md-6">
      <textarea value="" name="extremities" class="form-control" id="extremities" ><?php echo $medicalreports->extremities; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Diagnóstico</label>
    <div class="col-md-6">
      <textarea value="" name="diagnosis" class="form-control" id="diagnosis" placeholder="Diagnóstico"><?php echo $medicalreports->diagnosis; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tratamiento</label>
    <div class="col-md-6">
      <textarea value="" name="treatment" class="form-control" id="treatment" placeholder="Tratamiento"><?php echo $medicalreports->treatment; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Exámen Complementario</label>
    <div class="col-md-6">
      <textarea value="" name="complementarie_test" class="form-control" id="complementarie_test" placeholder="Exámen Complementario"><?php echo $medicalreports->complementarie_test; ?></textarea>
    </div>
  </div>
-->
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $medicalreports->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Ficha de Atención</button>
    </div>
  </div>

</form>
</div>
</div>
	</div>
</div>