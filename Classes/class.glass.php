<?php
class glass{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='fagan';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_glass($gtype, $gthick, $gdimension, $gcolor, $gmanufacturer, $gprice, $gstock){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$gtype, $gthick, $gdimension, $gcolor, $gmanufacturer, $gprice, $gstock],];
		$stmt = $this->conn->prepare("INSERT INTO tbl_glass(glass_type, glass_thickness, glass_dimension, glass_color, glass_manufacturer, glass_price, glass_stock) VALUES (?,?,?,?,?,?,?)");
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


	public function list_glass(){
		$sql="SELECT * FROM tbl_glass";
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

	function get_glass_supplier($id){
		$sql="SELECT glass_id FROM tbl_glass WHERE glass_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$glass_id = $q->fetchColumn();
		return $glass_id;
	}
	function get_glass_date($id){
		$sql="SELECT glass_thickness FROM tbl_glass WHERE glass_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$glass_thickness = $q->fetchColumn();
		return $glass_thickness;
	}
	function get_glass_price($id){
		$sql="SELECT glass_price FROM tbl_glass WHERE glass_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}

	}
	function list_glass_items($id){
		$sql="SELECT * FROM tbl_glass_items WHERE glass_id=$id";
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

function new_glass_item($recid,$prodid,$qty){
		
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$recid,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_glass_items(rec_id, glass_id, rec_qty) VALUES (?,?,?)");
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




	function save_to_inventory($id){
		$sql="SELECT * FROM tbl_glass_items WHERE glass_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_glass_inv(rec_id, glass_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($glass_id,$glass_id,$rec_qty));
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
