<?php
class aluminum{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='fagan';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_aluminum($name,$desc,$amount){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$name,$desc,$amount,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_aluminum(aluminum_id, aluminum_type, aluminum_thickness, aluminum_width, aluminum_length, aluminum_manufacturer, aluminum_price, aluminum_stock) VALUES (?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}


	public function list_aluminum(){
		$sql="SELECT * FROM tbl_aluminum";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	function get_aluminum_supplier($id){
		$sql="SELECT aluminum_brand FROM tbl_aluminum WHERE aluminum_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$aluminum_brand = $q->fetchColumn();
		return $aluminum_brand;
	}
	function get_aluminum_date($id){
		$sql="SELECT aluminum_date_added FROM tbl_aluminum WHERE aluminum_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$aluminum_date_added = $q->fetchColumn();
		return $aluminum_date_added;
	}
	function get_aluminum_amount($id){
		$sql="SELECT aluminum_amount FROM tbl_aluminum WHERE aluminum_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_aluminum_save($id){
		$sql="SELECT aluminum_saved FROM tbl_aluminum WHERE aluminum_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$aluminum_saved = $q->fetchColumn();
		return $aluminum_saved;
	}
	public function list_aluminum_items($id){
		$sql="SELECT * FROM tbl_aluminum_items WHERE aluminum_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	public function new_aluminum_item($recid,$prodid,$qty){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$recid,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_aluminum_items(rec_id, aluminum_id, rec_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function save_aluminum_items($id){
		
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$status = 1;
		$sql = "UPDATE tbl_aluminum SET aluminum_saved=:aluminum_saved WHERE aluminum_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':aluminum_saved'=>$status));
		return true;
	}


	public function save_to_inventory($id){
		$sql="SELECT * FROM tbl_aluminum_items WHERE aluminum_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_aluminum_inv(rec_id, aluminum_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($aluminum_id,$aluminum_id,$rec_qty));
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
}