<?php
class Database {
	public static $db;
	public static $con;
	function Database(){
		/*$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="u384819047_cmc";/////cmc_pos*/ 
		$this->user="u384819047_uscms";$this->pass="-7dprJ5(tqDX=KD<";$this->host="localhost";$this->ddbb="u384819047_bdcmc";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
