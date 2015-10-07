<?php

Class Sections{
	var $section_id,$name,$course_id,$status,$created,$course_name;
	
	public function __construct() {
		$db = new DB_Class();
	}
	
	public function sectionList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM sections");
		while($row = mysql_fetch_array($search)){
			$list[$i]['name'] = $row['name'];
			$list[$i]['course_id'] = $row['course_id'];
			$list[$i]['section_id'] = $row['section_id'];
			$list[$i]['status'] = $row['status'];
			$i++;
		}
		return $list;
	}
	
	public function sectionAdd(){
		$insert = mysql_query("INSERT INTO sections (name,course_id) VALUES ('$this->name','$this->course_id')");
		$_SESSION['success'] = 'You successfully added new section';
		header("Location: index.php");
	}
	
    public function sectionData($id){
        $search = mysql_query("SELECT * FROM sections WHERE section_id='$id'");
        while($row = mysql_fetch_array($search)){
            $this->name = $row['name'];
            $this->course_id = $row['course_id'];
        }
               
    }
    
	public function courseList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM courses WHERE status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['name'] = $row['name'];
			$list[$i]['course_id'] = $row['course_id'];
			$i++;
		}
		return $list;
	}
	
	public function courseData($id){
		$search = mysql_query("SELECT  * FROM courses WHERE course_id='$id'");
		while($row = mysql_fetch_array($search)){
			$this->course_id = $row['course_id'];
			$this->course_name = $row['name'];
		}
	}
    
    public function sectionEdit($id){
        $update = mysql_query("UPDATE sections SET name='$this->name',course_id='$this->course_id' WHERE section_id='$id'");
        $_SESSION['success'] = 'You successfully updated a section data';
        header("Location: index.php");
    }
	
    public function sectionActivate($id){
        $update = mysql_query("UPDATE sections SET status='1' WHERE section_id='$id'");
        $_SESSION['success'] = 'You successfully updated a section data';
        header("Location: index.php");
    }
    
    public function sectionDeactivate($id){
        $update = mysql_query("UPDATE sections SET status='0' WHERE section_id='$id'");
        $_SESSION['success'] = 'You successfully updated a section data';
        header("Location: index.php");
    }
}
	?>