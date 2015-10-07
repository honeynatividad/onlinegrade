<?php

Class Teachers{
	var $teacher_id,$first_name,$last_name,$middle_name,$birthdate,$contact_no,$email_add,$address,$status,$department_id,$d_name,$d_description,$photo;

	public function __construct() {
		$db = new DB_Class();
	}
	
	public function teacherList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM teacher");	
		while($row = mysql_fetch_array($search)){
			$list[$i]['teacher_id'] = $row['teacher_id'];
			$list[$i]['first_name'] = $row['first_name'];
			$list[$i]['last_name'] = $row['last_name'];
			$list[$i]['middle_name'] = $row['middle_name'];
			$list[$i]['birthdate'] = $row['birthdate'];
			$list[$i]['contact_no'] = $row['contact'];
			$list[$i]['address'] = $row['address'];
			$list[$i]['email_add'] = $row['email_add'];
			$list[$i]['status'] = $row['status'];
			$list[$i]['department_id'] = $row['department_id'];
            $list[$i]['photo'] = $row['photo'];
			$i++;
		}
		return $list;
	}
	
	public function teacherAdd(){
	   $lastname = $this->last_name;
		$insert = mysql_query("INSERT INTO teacher (first_name,last_name,middle_name,birthdate,contact,address,email_add,photo) VALUES('$this->first_name','$this->last_name','$this->middle_name','$this->birthdate','$this->contact','$this->address','$this->email_add','$this->photo')");
		$_SESSION['success'] = "You successfully added new teacher ".$this->first_name;
        
        $password = md5('123456');
        $uid = mysql_insert_id();
        $add = mysql_query("INSERT INTO admin (username,password,role,u_id) VALUES('$this->email_add','$password','Teacher','$uid')");
        
		header("Location: index.php");
	}
	
	public function teacherEdit($id){
	   
		$update = mysql_query("UPDATE teacher SET first_name='$this->first_name',last_name='$this->last_name',middle_name='$this->middle_name',birthdate='$this->birthdate',contact='$this->contact_no',address='$this->address',email_add='$this->email_add',department_id='$this->department_id', status='$this->status' WHERE teacher_id='$id'");
		$_SESSION['success'] = "You successfully updated teacher ".$this->first_name;
		header("Location: index.php");
	}
	
	public function teacherData($id){
		$search = mysql_query("SELECT * FROM teacher WHERE teacher_id='$id'");
		while($row = mysql_fetch_array($search)){
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->middle_name = $row['middle_name'];
			$this->birthdate = $row['birthdate'];
			$this->contact_no = $row['contact'];
			$this->address = $row['address'];
			$this->email_add = $row['email_add'];
			$this->status = $row['status'];
			$this->department_id = $row['department_id'];
		}
	}
	
	public function teacherDepartment(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM departments WHERE status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['department_id'] = $row['department_id'];
			$list[$i]['name'] = $row['name'];
			$list[$i]['description'] = $row['description'];
			$i++;
		}
		return $list;
	}
	
	public function teacherDepartmentData($id){
		$search = mysql_query("SELECT * FROM departments WHERE department_id = '$id'");
		while($row = mysql_fetch_array($search)){
			$this->d_name = $row['name'];
			$this->d_description = $row['description'];
			$this->department_id = $row['department_id'];
		}
	}
    
    public function teacherActivate($id){
        $update = mysql_query("UPDATE teacher SET status = '1' WHERE teacher_id='$id' ");
        $_SESSION['success'] = 'You successfully activated a teacher information';
        header("Location: index.php");
    }
	
    public function teacherDeactivate($id){
        $update = mysql_query("UPDATE teacher SET status = '0' WHERE teacher_id='$id' ");
        $_SESSION['success'] = 'You successfully deactivated a teacher information';
        header("Location: index.php");
    }
    
    public function teacherUpload($id){
        $upload = mysql_query("UPDATE teacher SET photo='$this->photo' WHERE teacher_id='$id'");
        $_SESSION['success'] = 'You successfully uploaded new photo';
        header("Location: index.php");
    }
}
?>