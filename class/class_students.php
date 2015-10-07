<?php

Class Students{
	var $student_id,$type,$student_no,$first_name,$last_name,$middle_name,$course,$section,$birthdate,$email_address,$address,$contact_no,$photo,$status,$created,$course_id,$course_name;
	
	public function __construct() {
		$db = new DB_Class();
	}
	
	public function studentAdd(){
		$insert = mysql_query("INSERT INTO students (student_no,first_name,last_name,middle_name,course,section,birthdate,email_address,address,contact_no,photo,type) VALUES ('$this->student_no','$this->first_name','$this->last_name','$this->middle_name','$this->course','$this->section','$this->birthdate','$this->email_address','$this->address','$this->contact_no','$this->photo','$this->type' )");
		$_SESSION['success'] = "You successfully added new student ".$this->first_name;
		header("Location: index.php");
	}
	
	public function studentList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM students ");
		while($row = mysql_fetch_array($search)){
			$list[$i]['student_no'] = $row['student_no'];
			$list[$i]['student_id'] = $row['student_id'];
			$list[$i]['first_name'] = $row['first_name'];
			$list[$i]['last_name'] = $row['last_name'];
			$list[$i]['middle_name'] = $row['middle_name'];
			$list[$i]['course'] = $row['course'];
			$list[$i]['section'] = $row['section'];
			$list[$i]['birthdate'] = $row['birthdate'];
			$list[$i]['email_address'] = $row['email_address'];
			$list[$i]['address'] = $row['address'];
			$list[$i]['contact_no'] = $row['contact_no'];
			$list[$i]['photo'] = $row['photo'];
            $list[$i]['status'] = $row['status'];
			$list[$i]['type'] = $row['type'];
			$i++;
		}
		return $list;
	}
	
	public function studentData($id){
		$search = mysql_query("SELECT * FROM students WHERE student_id='$id'");
		while($row = mysql_fetch_array($search)){
			$this->student_no = $row['student_no'];
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->middle_name = $row['middle_name'];
			$this->course = $row['course'];
			$this->section = $row['section'];
			$this->birthdate = $row['birthdate'];
			$this->email_address = $row['email_address'];
			$this->address = $row['address'];
			$this->contact_no = $row['contact_no'];
			$this->type = $row['type'];
		}
	}
	
	public function studentEdit($id){
		$update = mysql_query("UPDATE students SET type='$this->type', student_no = '$this->student_no', first_name='$this->first_name',last_name='$this->last_name',middle_name='$this->middle_name',course='$this->course',section='$this->section',birthdate='$this->birthdate',email_address='$this->email_address',address='$this->address',contact_no='$this->contact_no' WHERE student_id='$id'");
		$_SESSION['success']='You successfully updated student '.$this->first_name;
		header("Location: index.php");
	}
    
    public function courseListData(){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM courses");
        while($row = mysql_fetch_array($search)){
            $list[$i]['course_id'] = $row['course_id'];
            $list[$i]['course_name'] = $row['name'];
            $i++;
        }
        return $list;
    }
    public function courseListName($id){
        $search = mysql_query("SELECT * FROM courses WHERE course_id='$id'");
        while($row=mysql_fetch_array($search)){
            $this->course_name = $row['name'];
            $this->course_id = $row['course_id'];
        }
    }
    
    public function studentActivate($id){
        $update = mysql_query("UPDATE students SET status='1' WHERE student_id='$id'");
        $_SESSION['success'] = 'You successfully updated a student information';
        header("Location: index.php");
    }
    
    public function studentDeactivate($id){
        $update = mysql_query("UPDATE students SET status='0' WHERE student_id='$id'");
        $_SESSION['success'] = 'You successfully updated a student information';
        header("Location: index.php");
    }
}
?>