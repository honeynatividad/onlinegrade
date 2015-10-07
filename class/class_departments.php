<?php
Class Departments{
var $department_id,$name,$description,$status,$created;

	public function __construct() {
		$db = new DB_Class();
	}
	
	public function departmentList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM departments");
		while($row = mysql_fetch_array($search)){
			$list[$i]['department_id'] = $row['department_id'];
			$list[$i]['name'] = $row['name'];
			$list[$i]['description'] = $row['description'];
			$list[$i]['status'] = $row['status'];
			$list[$i]['created'] = $row['created'];
			$i++;
		}
		return $list;
	}
	
	public function departmentData($id){
		$search = mysql_query("SELECT * FROM departments WHERE department_id='$id'");
		while($row = mysql_fetch_array($search)){
			$this->name = $row['name'];
			$this->description = $row['description'];
		}
	}
	
	public function departmentAdd(){
		$insert = mysql_query("INSERT INTO departments (name,description) VALUES ('$this->name','$this->description')");
		$_SESSION['success'] = "You successfully added new department ".$this->name;
		header("Location: index.php");
	}
	
	public function departmentEdit($id){
		$update = mysql_query("UPDATE departments SET name = '$this->name', description = '$this->description' WHERE department_id='$id'");
		$_SESSION['success'] = 'You successfully updated the deparment '.$this->name;
		header("Location: index.php");
	}
	
	public function departmentActivate($id){
		$update = mysql_query("UPDATE departments SET status='1' WHERE department_id='$id'");
		$_SESSION['success']='You successfully activated a department';
		header("Location: index.php");
	}
	
	public function departmentDeactivate($id){
		$update = mysql_query("UPDATE departments SET status='0' WHERE department_id='$id'");
		$_SESSION['success']='You successfully deactivated a department';
		header("Location: index.php");
	}
	
	public function departmentDelete($id){
		$update = mysql_query("DELETE from departments WHERE department_id='$id'");
		$_SESSION['success']='You successfully deleted a department';
		header("Location: index.php");
	}
}
?>