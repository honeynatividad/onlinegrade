<?php

Class Admin{
	
	var $username, $password,$repassword,$admin_id,$role,$created,$status;
	
	public function __construct() {
		$db = new DB_Class();
	}
	
	public function adminAddUser(){
		$check=$this->checkPassword($this->password,$this->repassword);
		if(!$check){
			$_SESSION['password_error']="Please make sure you type same password";
			$_SESSION['add_username'] = $this->username;
			header("Location: register.php");
		}else{
			unset($_SESSION['password_error']);
			unset($_SESSION['add_username']);
			
			$pw = md5($this->password);
			$insert = mysql_query("INSERT INTO admin (username,password,role) VALUES ('$this->username','$pw','$this->role')");
			if(!$insert) die ("An error occur during an update to the profile.". mysql_error() );
				$_SESSION['admin_login']='You successfully added a new admin user';
				header("Location: index.php");
		}
	}
	public function checkPassword($pass,$pass2){
		if($pass!=$pass2)
			return false;
		else
			return true;
	}
	
	public function adminLogin(){
		$pw = md5($this->password);
		$check = mysql_query("SELECT * FROM admin WHERE username='$this->username' AND password = '$pw' AND status='1'");
		$count = mysql_num_rows($check);
		if($count>=1){
			while($row = mysql_fetch_array($check)){
				$adminId = $row['admin_id'];
				$this->admin_id=$adminId;
				$this->role = $row['role'];
                $uid = $row['u_id'];
			}
            $_SESSION['uid'] = $uid;
			$_SESSION['admin_login']='Welcome back '.$this->username;
			$_SESSION['admin_id']=$this->admin_id;
			$_SESSION['username']=$this->username;
			$_SESSION['role'] = $this->role;
			header("Location: index.php");
		}else{
			$_SESSION['admin_login']='An Error Occur. Please check if you type the correct username and password';
			if(!$check) die ("An error occur during an update to the profile.". mysql_error() );
			header("Location: login.php");
		}
	}
    
	public function adminUsers(){
		$i=0;
		$list = array();
		$search = mysql_query("SELECT * FROM admin");
		while($row = mysql_fetch_array($search)){
			$list[$i]['username'] = $row['username'];
			
			$list[$i]['role'] = $row['role'];
			$list[$i]['status'] = $row['status'];
			$list[$i]['admin_id'] = $row['admin_id'];
			$list[$i]['created'] =$row['created'];
			$i++;
		}
		return $list;
	}
    
	public function adminEdit($id){
		$update = mysql_query("UPDATE admin SET username='$this->username',password='$this->password' WHERE admin_id='$id'");
		header("Location: index.php");
	}
	public function adminData($id){
		$search = mysql_query("SELECT * FROM admin WHERE admin_id='$id'");
		while($row = mysql_fetch_array($search)){
			$this->admin_id=$row['admin_id'];
			$this->username = $row['username'];
            $this->password = $row['password'];
			$this->role = $row['role'];
			$this->status = $row['status'];
		}
	}
	
	public function adminDeactivate($id){
		$update = mysql_query("UPDATE admin SET status='0' WHERE admin_id='$id'");
		$_SESSION['admin_success']="You successfully deactivated an admin user";
		header("Location: index.php");
	}

	public function adminActivate($id){
		$update = mysql_query("UPDATE admin SET status='1' WHERE admin_id='$id'");
		$_SESSION['admin_success']="You successfully activated an admin user";
		header("Location: index.php");
	}
	
}
?>