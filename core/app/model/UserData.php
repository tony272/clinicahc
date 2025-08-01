<?php
class UserData {
	public static $tablename = "user";

	public function UserData(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->status = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,username,email,password,status,is_admin,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->email\",\"$this->password\",$this->status,$this->is_admin,$this->created_at)";


		$sql1 = "insert into almacenclinica.user (name,lastname,username,email,password,status,is_admin,created_at) ";
		$sql1 .= "value (\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->email\",\"$this->password\",$this->status,$this->is_admin,$this->created_at)";

		Executor::doit($sql);
		Executor::doit($sql1);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",email=\"$this->email\",username=\"$this->username\",password=\"$this->password\",status=$this->status,is_admin=$this->is_admin where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>