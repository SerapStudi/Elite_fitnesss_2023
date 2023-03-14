<?php
if(isset($_SESSION['email'])){
$page = 'partenaires';
class User extends Config {
	 
	  public function fetch() {
	    $sql = "SELECT * FROM tbl_users WHERE email = '".$_SESSION['email']."'";
	   
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute();
	    $row = $stmt->fetchAll();
	    return $row;
	  }
	}
	
$user = new User();

$rows = $user->fetch();
foreach ($rows as $row) {
$rol = $row["roleid"];
$username = $row["username"];
}
}
?>