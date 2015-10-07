<?php

Class Subjects{
	var $subject_id,$name,$code,$course_id,$status,$unit,$created,$course_name;

	public function __construct() {
		$db = new DB_Class();
	}
	
	public function subjectList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subjects");
		while($row = mysql_fetch_array($search)){
			$list[$i]['subject_id'] = $row['subject_id'];
            $list[$i]['name'] = $row['name'];
			$list[$i]['code'] = $row['code'];
			$list[$i]['course_id'] = $row['course_id'];
			$list[$i]['status'] = $row['status'];
			$list[$i]['unit'] = $row['unit'];
			$i++;
		}
		return $list;
	}
	
	public function subjectAdd(){
		$insert = mysql_query("INSERT INTO subjects (name,code,unit,course_id) VALUES ('$this->name','$this->code','$this->unit','$this->course_id')");
		$_SESSION['success']="You successfully added new subject ".$this->name;
		header("Location: index.php ");
	}
    
    public function subjectEdit($id){
        $update = mysql_query("UPDATE subjects SET name='$this->name',code='$this->code',unit='$this->unit',course_id='$this->course_id' WHERE subject_id='$id'");
        $_SESSION['success']="You successfully updated new subject ".$this->name;
		header("Location: index.php ");
    }
    
    public function subjectData($id){
        $search = mysql_query("SELECT * FROM subjects WHERE subject_id='$id'");
        while($row = mysql_fetch_array($search)){
            $this->name = $row['name'];
            $this->code = $row['code'];
            $this->unit = $row['unit'];
            $this->course_id = $row['course_id'];
            
        }
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
        while($row = mysql_fetch_array($search)){
            $this->course_name = $row['name'];
            $this->course_id = $row['course_id'];
        }
    }
    
    public function subjectActivate($id){
        $update = mysql_query("UPDATE subjects SET status = '1' WHERE subject_id='$id'");
        $_SESSION['success']="You successfully activated a subject information";
		header("Location: index.php ");
    }
    
    public function subjectDeactivate($id){
        $update = mysql_query("UPDATE subjects SET status = '0' WHERE subject_id='$id'");
        $_SESSION['success']="You successfully deactivated a subject information";
		header("Location: index.php ");
    }

}

?>