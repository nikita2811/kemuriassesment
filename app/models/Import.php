<?php



Class Import { 
 private $db;


 public function __construct() { 
   $this->db = new Database();
 }

 public function insert_csv($csv){
  //for ($i=0; $i <count($csv) ; $i++) {
 	$this->db->query('INSERT INTO company_data (company_name, stock_price, created_at) VALUES(:company_name, :price, :created_at)');
 	$this->db->bind(':company_name', $csv['company_name']);
  $this->db->bind(':stock_price', $csv['price']);
  $this->db->bind(':created_at', $csv['created_at']);
  if ($this->db->execute()) {
    return true;
  } else {
    return false;

  }
 }

 		


 

}














