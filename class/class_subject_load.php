<?php

Class SubjectLoad{
	var $subject_load_id,$teacher_id,$subject_id,$status,$created,$subject_name,$subject_code,$course_id,$course_name,$section_id,$section_name,$student_id,$first_name,$last_name;
	
	public function __construct() {
		$db = new DB_Class();
	}
	
	public function loadAdd(){
//	   echo 'test '.$this->course_id .'sub '.$this->subject_id." sec ".$this->section_id." teacher_id ".$this->teacher_id;
		$add = mysql_query("INSERT INTO subject_load (subject_id,teacher_id,course_id,section_id) VALUES ('$this->subject_id','$this->teacher_id','$this->course_id','$this->section_id')");
		$_SESSION['success'] = 'You successfully added a subject load';
        if(!$add) die ("An error occur during an update to the profile.". mysql_error() );
		header('Location: index.php');
	}
	
	public function loadList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subject_load");
		while($row = mysql_fetch_array($search)){
			$list[$i]['subject_load_id'] = $row['subject_load_id'];
			$list[$i]['status'] = $row['status'];
			$list[$i]['course_id'] = $row['course_id'];
			foreach($this->subjectData($row['subject_id']) as $a){
				$list[$i]['subject_name'] = $a['name'];
				$list[$i]['subject_code'] = $a['code'];
				$list[$i]['subject_id'] = $row['subject_id'];	
			}
			foreach($this->teacherData($row['teacher_id']) as $b){
				$list[$i]['teacher_first_name'] = $b['first_name'];
				$list[$i]['teacher_last_name'] = $b['last_name'];
	
			}
			foreach($this->courseData($row['course_id']) as $b){
				$list[$i]['name'] = $b['name'];
				
			}
			$i++;	
		}
		return $list;
		
	}
    public function loadTeacher($id){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subject_load WHERE teacher_id='$id'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['subject_load_id'] = $row['subject_load_id'];
			$list[$i]['status'] = $row['status'];
			$list[$i]['course_id'] = $row['course_id'];
			foreach($this->subjectData($row['subject_id']) as $a){
				$list[$i]['subject_name'] = $a['name'];
				$list[$i]['subject_code'] = $a['code'];
				$list[$i]['subject_id'] = $row['subject_id'];	
			}
			foreach($this->teacherData($row['teacher_id']) as $b){
				$list[$i]['teacher_first_name'] = $b['first_name'];
				$list[$i]['teacher_last_name'] = $b['last_name'];
	
			}
			foreach($this->courseData($row['course_id']) as $b){
				$list[$i]['name'] = $b['name'];
				
			}
			$i++;	
		}
		return $list;
		
	}
	
	public function loadData($id){
		$search = mysql_query("SELECT * FROM subject_load WHERE subject_load_id = '$id'");
		while($row = mysql_fetch_array($search)){
			$this->subject_id = $row['subject_id'];
			$this->teacher_id = $row['teacher_id'];
            $this->course_id = $row['course_id'];
            $this->section_id = $row['section_id'];
		}
	}
	
	public function subjectList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subjects WHERE status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['subject_id'] = $row['subject_id'];
			$list[$i]['name'] = $row['name'];
			$list[$i]['code'] = $row['code'];
			$i++;
		}
		return $list;
		
	}
	
	public function subjectData($id){		
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subjects WHERE subject_id='$id'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['subject_id'] = $row['subject_id'];
			$list[$i]['name'] = $row['name'];
			$list[$i]['code'] = $row['code'];
			$i++;
		}
		return $list;
		
	}
	
    public function sectionList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM sections WHERE status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['section_id'] = $row['section_id'];
			$list[$i]['name'] = $row['name'];
			
			$i++;
		}
		return $list;
		
	}
	
	public function sectionData($id){		
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM sections WHERE course_id='$id' AND status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['section_id'] = $row['section_id'];
			$list[$i]['name'] = $row['name'];
			
			$i++;
		}
		return $list;
		
	}
    public function sectionInfo($id){		
		
		$search = mysql_query("SELECT * FROM sections WHERE section_id='$id' AND status='1'");
		while($row = mysql_fetch_array($search)){
		      $this->section_id = $row['section_id'];
              $this->section_name = $row['name'];	
		}
		
		
	}
	public function teacherList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM teacher WHERE status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['teacher_id'] = $row['teacher_id'];
			$list[$i]['last_name'] = $row['last_name'];
			$list[$i]['first_name'] = $row['first_name'];
			$list[$i]['photo'] = $row['photo'];
			$i++;
		}
		return $list;
	}
	
	public function teacherData($id){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM teacher WHERE teacher_id='$id'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['last_name'] = $row['last_name'];
			$list[$i]['first_name'] = $row['first_name'];
			$list[$i]['teacher_id'] = $row['teacher_id'];
			$list[$i]['photo'] = $row['photo'];
			$i++;
		}
		return $list;
	}
	
	public function loadActivate($id){
		$update = mysql_query("UPDATE subject_load SET status='1' WHERE subject_load_id='$id'");
		$_SESSION['success'] = 'You successfully updated the status.';
		header("Location: index.php");
	}
	
	public function loadDeactivate($id){
		$update = mysql_query("UPDATE subject_load SET status='0' WHERE subject_load_id='$id'");
		$_SESSION['success'] = 'You successfully updated the status.';
		header("Location: index.php");
	}
	
	public function loadEdit($id){
		$update = mysql_query("UPDATE subject_load SET subject_id = '$this->subject_id', teacher_id='$this->teacher_id',course_id='$this->course_id',section_id='$this->section_id' WHERE subject_load_id='$id'");
		$_SESSION['success'] = 'You successfully updated the status.';
		header("Location: index.php");
	}
	
	public function courseList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM courses WHERE status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['course_id'] = $row['course_id'];
			$list[$i]['name'] = $row['name'];
			$i++;
		}
		return $list;
	}
	
	public function courseData($id){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM courses WHERE course_id='$id'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['name'] = $row['name'];
			$list[$i]['course_id'] = $row['course_id'];
			
			$i++;
		}
		return $list;
	}
}
	
?>