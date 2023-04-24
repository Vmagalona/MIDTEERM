<?php
class installation{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='fagan';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_installation($customer_name, $phone_numeber, $customer_email, $job_details){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$customer_name, $phone_numeber, $customer_email, $job_details],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_installation(customer_name, phone_number, customer_email, job_details) VALUES (?,?,?,?)");
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


	public function list_installation(){
		$sql="SELECT * FROM tbl_installation";
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

	function get_installation_supplier($id){
		$sql="SELECT installation_brand FROM tbl_installation WHERE installation_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$installation_brand = $q->fetchColumn();
		return $installation_brand;
	}
	function get_installation_date($id){
		$sql="SELECT installation_date_added FROM tbl_installation WHERE installation_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$installation_date_added = $q->fetchColumn();
		return $installation_date_added;
	}
	function get_installation_amount($id){
		$sql="SELECT installation_amount FROM tbl_installation WHERE installation_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_installation_save($id){
		$sql="SELECT installation_saved FROM tbl_installation WHERE installation_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$installation_saved = $q->fetchColumn();
		return $installation_saved;
	}
	public function list_installation_items($id){
		$sql="SELECT * FROM tbl_installation_items WHERE installation_id=$id";
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

	public function new_installation_item($recid,$prodid,$qty){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$recid,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_installation_items(rec_id, installation_id, rec_qty) VALUES (?,?,?)");
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

	public function save_installation_items($id){
		
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$status = 1;
		$sql = "UPDATE tbl_installation SET installation_saved=:installation_saved WHERE installation_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':installation_saved'=>$status));
		return true;
	}


	public function save_to_inventory($id){
		$sql="SELECT * FROM tbl_installation_items WHERE installation_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_installation_inv(rec_id, installation_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($installation_id,$installation_id,$rec_qty));
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