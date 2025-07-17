<?php
class AttentionsheetData {
	public static $tablename = "attention_sheet";


	public function AttentionsheetData(){
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
		$sql = "insert into ".self::$tablename." (pacient_id, medic_id, attentionas_date, attentionas_hour, consultationas_reason, so2as, paas, fcas, fras, temperatureas, created_at) ";

		$sql .= "values (\"$this->pacient_id\",\"$this->medic_id\",\"$this->attentionas_date\",\"$this->attentionas_hour\",\"$this->consultationas_reason\",\"$this->so2as\",\"$this->paas\",\"$this->fcas\",\"$this->fras\",\"$this->temperatureas\",$this->created_at)";
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
		$sql = "update ".self::$tablename." set pacient_id=\"$this->pacient_id\",medic_id=\"$this->medic_id\",attentionas_date=\"$this->attentionas_date\",attentionas_hour=\"$this->attentionas_hour\",consultationas_reason=\"$this->consultationas_reason\",so2as=\"$this->so2as\",paas=\"$this->paas\",fcas=\"$this->fcas\",fras=\"$this->fras\",temperatureas=\"$this->temperatureas\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AttentionsheetData());
	}

	public static function getRepeated($pacient_id,$medic_id,$attention_date,$attention_hour){
		$sql = "select * from ".self::$tablename." where pacient_id=$pacient_id and medic_id=$medic_id and attentionas_date=\"$attentionas_date\" and attentionas_hour=\"$attentionas_hour\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}
	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AttentionsheetData());
	}


	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by attentionas_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AttentionsheetData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by attentionas_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AttentionsheetData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new AttentionsheetData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where consultationas_reason like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AttentionsheetData());
	}
	public function getReport(){ 
		//return MedicalreportData::getById($this->id); 
		$sql = "select id from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AttentionsheetData());
	}
}

?>