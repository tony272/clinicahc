<?php
class PacientData {
	public static $tablename = "pacient";
	public function PacientData(){
		$this->title = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (no,image,name,lastname,gender,day_of_birth,address,phone,email,reference_num,policy_num,age,insurance_id,nationality_id,admissiondate,departuredate,regplace,password,sick,medicaments,alergy,created_at) ";
		$sql .= "value (\"$this->no\",\"$this->image\",\"$this->name\",\"$this->lastname\",\"$this->gender\",\"$this->day_of_birth\",\"$this->address\",\"$this->phone\",\"$this->email\",\"$this->reference_num\",\"$this->policy_num\",\"$this->age\",\"$this->insurance_id\",\"$this->nationality_id\",\"$this->admissiondate\",\"$this->departuredate\",\"$this->regplace\",\"$this->password\",\"$this->sick\",\"$this->medicaments\",\"$this->alergy\",$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PacientData previamente utilizamos el contexto
	public function update_active(){
		$sql = "update ".self::$tablename." set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tablename." set no=\"$this->no\",image=\"$this->image\",name=\"$this->name\",lastname=\"$this->lastname\",address=\"$this->address\",phone=\"$this->phone\",email=\"$this->email\",reference_num=\"$this->reference_num\",policy_num=\"$this->policy_num\",age=\"$this->age\",insurance_id=\"$this->insurance_id\",nationality_id=\"$this->nationality_id\",admissiondate=\"$this->admissiondate\",departuredate=\"$this->departuredate\",regplace=\"$this->regplace\",password=\"$this->password\",gender=\"$this->gender\",day_of_birth=\"$this->day_of_birth\",sick=\"$this->sick\",medicaments=\"$this->medicaments\",alergy=\"$this->alergy\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PacientData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}

	public static function getAllActive(){
		$sql = "select * from client where last_active_at>=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}

	public static function getAllUnActive(){
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}


	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PacientData());
	}


}

?>