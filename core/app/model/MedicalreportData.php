<?php
class MedicalreportData {
	public static $tablename = "medicalreport";


	public function MedicalreportData(){
		$this->type_report="";
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getPacient(){ return PacientData::getById($this->pacient_id); }
	public function getMedic(){ return MedicData::getById($this->medic_id); }
	//public function getStatus(){ return StatusData::getById($this->status_id); }
	//public function getPayment(){ return PaymentDataC::getById($this->payment_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (type_report, pacient_id, medic_id, attention_date, attention_hour, consultation_reason, age, sick_time, onset_form, course, history_disease, record, alergy, so2, pa, fc, fr, temperature, general, skin, eyes, mouth, pharynx, neck, thorax, cardiovascular, abdomen, genitourinary, neurologic, musculoskeletal, extremities, diagnosis, treatment, complementarie_test, created_at) ";

		$sql .= "values (\"$this->type_report\",\"$this->pacient_id\",\"$this->medic_id\",\"$this->attention_date\",\"$this->attention_hour\",\"$this->consultation_reason\",\"$this->age\",\"$this->sick_time\",\"$this->onset_form\",\"$this->course\",\"$this->history_disease\",\"$this->record\",\"$this->alergy\",\"$this->so2\",\"$this->pa\",\"$this->fc\",\"$this->fr\",\"$this->temperature\",\"$this->general\",\"$this->skin\",\"$this->eyes\",\"$this->mouth\",\"$this->pharynx\",\"$this->neck\",\"$this->thorax\",\"$this->cardiovascular\",\"$this->abdomen\",\"$this->genitourinary\",\"$this->neurologic\",\"$this->musculoskeletal\",\"$this->extremities\",\"$this->diagnosis\",\"$this->treatment\",\"$this->complementarie_test\",$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto MedicalreportData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set type_report=\"$this->type_report\",pacient_id=\"$this->pacient_id\",medic_id=\"$this->medic_id\",attention_date=\"$this->attention_date\",attention_hour=\"$this->attention_hour\",consultation_reason=\"$this->consultation_reason\",age=\"$this->age\", sick_time=\"$this->sick_time\",onset_form=\"$this->onset_form\",course=\"$this->course\",history_disease=\"$this->history_disease\",record=\"$this->record\",alergy=\"$this->alergy\", so2=\"$this->so2\",pa=\"$this->pa\",fc=\"$this->fc\",fr=\"$this->fr\",temperature=\"$this->temperature\",general=\"$this->general\", skin=\"$this->skin\",eyes=\"$this->eyes\",mouth=\"$this->mouth\",pharynx=\"$this->pharynx\",neck=\"$this->neck\",thorax=\"$this->thorax\", cardiovascular=\"$this->cardiovascular\",abdomen=\"$this->abdomen\",genitourinary=\"$this->genitourinary\",neurologic=\"$this->neurologic\",musculoskeletal=\"$this->musculoskeletal\",extremities=\"$this->extremities\", diagnosis=\"$this->diagnosis\",treatment=\"$this->treatment\",complementarie_test=\"$this->complementarie_test\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MedicalreportData());
	}

	public static function getRepeated($pacient_id,$medic_id,$attention_date,$attention_hour){
		$sql = "select * from ".self::$tablename." where pacient_id=$pacient_id and medic_id=$medic_id and attention_date=\"$attention_date\" and attention_hour=\"$attention_hour\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}
	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new MedicalreportData());
	}


	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by attention_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MedicalreportData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by attention_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MedicalreportData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new MedicalreportData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where consultation_reason like '%$q%' or course like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MedicalreportData());
	}
	public function getReport(){ 
		//return MedicalreportData::getById($this->id); 
		$sql = "select id from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new MedicalreportData());
	}
}

?>