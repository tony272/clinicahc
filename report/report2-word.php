<?php
/*include "../core/autoload.php";
include "../core/app/model/ReservationData.php";
include "../core/app/model/PacientData.php";
include "../core/app/model/MedicData.php";
include "../core/app/model/StatusData.php";
include "../core/app/model/PaymentDataC.php";
include "../core/app/model/MedicalreportData.php";
session_start();

require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();

$alumns = $_SESSION["report_data"];

$section1 = $word->AddSection();
$section1->addText("REPORTE DE CITAS",array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Asunto");
$table1->addCell()->addText("Paciente");
$table1->addCell()->addText("Medico");
$table1->addCell()->addText("Fecha");
$table1->addCell()->addText("Estado");
$table1->addCell()->addText("Pago");
$table1->addCell()->addText("Costo");

$total = 0;
foreach($alumns as $al){
	$medic = $al->getMedic();
	$pacient = $al->getPacient();
$table1->addRow();
$table1->addCell(3000)->addText($al->title);
$table1->addCell(3000)->addText($pacient->name." ".$pacient->lastname);
$table1->addCell(3000)->addText($medic->name." ".$medic->lastname);
$table1->addCell(3000)->addText($al->date_at." ".$al->time_at);
$table1->addCell(3000)->addText($al->getStatus()->name);
$table1->addCell(3000)->addText($al->getPayment()->name);
$table1->addCell(3000)->addText("$ ".number_format($al->price,2,".",","));
$total += $al->price;
}
$table1->addColumn();
$section1->addText("TOTAL: $ ".number_format($total,2,".",","),array("size"=>18));




$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios
$section1->addText("");
$section1->addText("");
$section1->addText("");
$section1->addText("Generado por Clinica Medical Cusco");
$filename = "report-".time().".docx";
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
//chmod($filename,0444);
header("Content-Disposition: attachment; filename='$filename'");
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file
*/

?>



<?php
include "../core/autoload.php";
include "../core/app/model/PacientData.php";
include "../core/app/model/MedicData.php";
include "../core/app/model/MedicalreportData.php";
//include "../core/app/model/InsuranceData.php";
include "../core/app/model/NationalityData.php";
require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Settings;
//require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('plantilla.docx');
//$pacients = PacientData::getById($report->pacient_id);
//$medics = MedicData::getAll();
$report=MedicalreportData::getById($_POST["id"]);//Ingresar aqui id de reporte aun no se como jalarlo de la url (ya jaló)   $report=MedicalreportData::getById("2");
$pacients = PacientData::getById($report->pacient_id);
$medics = MedicData::getById($report->medic_id);
//$seguro = InsuranceData::getById($pacients->insurance_id);
$nacionalidad = NationalityData::getById($pacients->nationality_id);
//$nombre_paciente = $report->id;
//$motivo_consulta = $report->consultation_reason;
$municipio = "Mrd";
$provincia = "Bdj";
$cp = "02541";
$telefono = "24536784";

//$cumpleanos = $pacients->day_of_birth;
//$hoy = new DateTime();

//$stringcito = $hoy->format('Y-m-d');
//$annos = $hoy->diff($cumpleanos);




// --- Asignamos valores a la plantilla

//$templateWord->setValue('motivo_consulta',$motivo_consulta);

// Ingresando los datos a la plantilla
//Datos del Paciente
$templateWord->setValue('nombre_paciente',$pacients->name." ".$pacients->lastname);
//edad de paciente, apoyandonos en una columna no utilizada de la tabla (columna image)
//$templateWord->setValue('edad_paciente',$pacients->day_of_birth);
$templateWord->setValue('edad_paciente', $pacients->age);
$templateWord->setValue('numero_referencia',$pacients->reference_num);
if($pacients->gender=="h"){
	$templateWord->setValue('genero',"Masculino");
}else
$templateWord->setValue('genero',"Femenino");
$templateWord->setValue('pais_de_origen',$nacionalidad->name);
$templateWord->setValue('fecha_nac',$pacients->day_of_birth);
if($pacients->no==""){
	$templateWord->setValue('pasaporte',"SIN DOCUMENTO");
} else
	$templateWord->setValue('pasaporte',$pacients->no);


//Datos del Medico.
$templateWord->setValue('medico',$medics->name." ".$medics->lastname);
if($medics->cmp==""){
$templateWord->setValue('cmp',"NO TIENE");
}else
	$templateWord->setValue('cmp',$medics->cmp);
//Datos del tipo de Atención
if($report->type_report=="a"){
	$templateWord->setValue('TIPO_INFORME',"ATENCIÓN");
}
elseif ($report->type_report=="p") {
	$templateWord->setValue('TIPO_INFORME',"PROGRESIVO");
}
else
	$templateWord->setValue('TIPO_INFORME',"ALTA");
//Datos del Seguro

$templateWord->setValue('aseguradora'," ".$seguro->name);


// Resto de datos
$templateWord->setValue('fecha_atencion',$report->attention_date);
$templateWord->setValue('hora_atencion',$report->attention_hour);
$templateWord->setValue('motivo_consulta',$report->consultation_reason);
$templateWord->setValue('historia_enfermedad',$report->history_disease);
$templateWord->setValue('TE',$report->sick_time);
$templateWord->setValue('forma_inicio',$report->onset_form);
$templateWord->setValue('curso',$report->course);
$templateWord->setValue('antecedentes',$report->record);
$templateWord->setValue('alerg',$report->alergy);
$templateWord->setValue('sato2',$report->so2);
$templateWord->setValue('pa',$report->pa);
$templateWord->setValue('fc',$report->fc);
$templateWord->setValue('fr',$report->fr);
$templateWord->setValue('t',$report->temperature);
$templateWord->setValue('general',$report->general);
$templateWord->setValue('piel',$report->skin);
$templateWord->setValue('ojos',$report->eyes);
$templateWord->setValue('boca',$report->mouth);
$templateWord->setValue('faringe',$report->pharynx);
$templateWord->setValue('cuello',$report->neck);
$templateWord->setValue('torax',$report->thorax);
$templateWord->setValue('cardiovascular',$report->cardiovascular);
$templateWord->setValue('abdomen',$report->abdomen);
$templateWord->setValue('genitourinario',$report->genitourinary);
$templateWord->setValue('neurologico',$report->neurologic);
$templateWord->setValue('musculoesqueletico',$report->musculoskeletal);
$templateWord->setValue('extremidades',$report->extremities);
$templateWord->setValue('diagnostico',$report->diagnosis);
$templateWord->setValue('tratamiento',$report->treatment);
$templateWord->setValue('exa_complementario',$report->complementarie_test);
$templateWord->setValue('fecha_creacion',$report->created_at);


// datos de medico y paciente

$templateWord->setValue('municipio_empresa',$municipio);
$templateWord->setValue('provincia_empresa',$provincia);
$templateWord->setValue('cp_empresa',$cp);
$templateWord->setValue('telefono_empresa',$telefono);

// --- Guardamos el documento
$filename = "Informe Nº ".date("YmdHis").".docx";
$templateWord->saveAs('$filename');
//$templateWord->saveAs('Documento02.docx');

header("Content-Disposition: attachment; filename=$filename; charset=iso-8859-1");
echo file_get_contents('$filename');
        
?>