<?php
class ReservationData {
	public static $tablename = "reservation";


	public function ReservationData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getPacient(){ return PacientData::getById($this->pacient_id); }
	public function getMedic(){ return MedicData::getById($this->medic_id); }
	public function getStatus(){ return StatusData::getById($this->status_id); }
	public function getPayment(){ return PaymentDataC::getById($this->paymentc_id); }

	public function add(){
		$sql = "insert into reservation (no,title,note,medic_id,date_at,time_at,pacient_id,user_id,price,status_id,paymentc_id,sick,symtoms,medicaments,created_at) ";
		$sql .= "value (\"$this->no\",\"$this->title\",\"$this->note\",\"$this->medic_id\",\"$this->date_at\",\"$this->time_at\",$this->pacient_id,$this->user_id,\"$this->price\",$this->status_id,$this->payment_id,\"$this->sick\",\"$this->symtoms\",\"$this->medicaments\",$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto ReservationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set no=\"$this->no\",title=\"$this->title\",pacient_id=\"$this->pacient_id\",medic_id=\"$this->medic_id\",date_at=\"$this->date_at\",time_at=\"$this->time_at\",note=\"$this->note\",sick=\"$this->sick\",symtoms=\"$this->symtoms\",medicaments=\"$this->medicaments\",status_id=\"$this->status_id\",paymentc_id=\"$this->payment_id\",price=\"$this->price\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}

	public static function getRepeated($pacient_id,$medic_id,$date_at,$time_at){
		$sql = "select * from ".self::$tablename." where pacient_id=$pacient_id and medic_id=$medic_id and date_at=\"$date_at\" and time_at=\"$time_at\" and status_id=1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}



	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getPendings(){
		$sql = "select * from ".self::$tablename." where status_id=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getEveryByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getEveryByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) and status_id=1 and paymentc_id=1 order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}


	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getAllByMedicIdS($id,$s){
		$sql = "select * from ".self::$tablename." where medic_id=$id and status_id=$s order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getGroupByDate($start,$end){
  $sql = "select count(*) as s from ".self::$tablename." where date_at >= \"$start\" and date_at <= \"$end\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getByDT($d,$t){
		$sql = "select * from ".self::$tablename." where date_at=\"$d\" and time_at=\"$t\" ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}

	public static function getByMDT($m,$d,$t){
		$sql = "select * from ".self::$tablename." where medic_id and date_at=\"$d\" and time_at=\"$t\" ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}

}

?>