<?php

Class SubjectStudents{
	var $subject_student_id,$subject_id,$student_id,$teacher_id,$status,$created;
	
	public function __construct() {
		$db = new DB_Class();
	}

	public function subList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subject_students ");
		while($row = mysql_fetch_array($search)){
			$list[$i]['subject_student_id'] = $row['subject_student_id'];
			$list[$i]['subject_id'] = $row['subject_id'];
			$list[$i]['teacher_id'] = $row['teacher_id'];
			$list[$i]['status'] = $row['status'];
			$i++;
		}
		return $list;
	}
		
	public function subAdd(){
		$insert = mysql_query("INSERT INTO subject_students (subject_id,student_id,teacher_id,section_id) VALUES ('$this->subject_id','$this->student_id','$this->teacher_id','$this->section_id')");
		$_SESSION['success'] = 'You successfully enrolled a student';
        //echo '<script> alert("You successfully enrolled a student to a subject")</script>';
        
		header("Location: add.php?t_id=".$this->teacher_id."&sec_id=".$this->section_id."&sub_id=".$this->subject_id."");
	}
	
	public function teacherList(){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM teacher WHERE status='1'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['first_name'] = $row['first_name'];
			$list[$i]['last_name'] = $row['last_name'];
			$list[$i]['teacher_id'] = $row['teacher_id'];
			$i++;
		}
		return $list;
	}
	
	public function subjectList($id){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subject_load WHERE status='1' AND teacher_id='$id'");
		while($row = mysql_fetch_array($search)){
			$sub_id = $row['subject_id'];
			$s = mysql_query("SELECT * FROM subjects WHERE subject_id='$sub_id'");
			while($r = mysql_fetch_array($s)){
				$list[$i]['name'] = $r['name'];
				$list[$i]['code'] = $r['code'];
				$list[$i]['subject_id'] = $r['subject_id'];
				
			}
            $s_id = $row['section_id'];
            $t = mysql_query("SELECT * FROM sections WHERE section_id='$s_id'");
            while($rT = mysql_fetch_array($t)){
                $list[$i]['section_name'] = $rT['name'];
                $list[$i]['section_id'] = $rT['section_id'];
            }
			$i++;
		}
		return $list;
	}
    
    public function subjectListStudents($sub_id,$sec_id){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM subject_students WHERE subject_id='$sub_id' AND section_id='$sec_id'");
        while($row = mysql_fetch_array($search)){
            $sec_id = $row['section_id'];
            $student_id = $row['student_id'];
            $search_student = mysql_query("SELECT * FROM students WHERE student_id='$student_id'");
            while($rowS = mysql_fetch_array($search_student)){
                $list[$i]['student_id'] = $rowS['student_id'];
                $list[$i]['first_name'] = $rowS['first_name'];
                $list[$i]['last_name'] = $rowS['last_name'];
                $list[$i]['course_id'] = $rowS['course'];
                $c_id = $rowS['course'];   
                $courses = mysql_query("SELECT * FROM courses WHERE course_id='$c_id' AND status='1'");
                while($rowC = mysql_fetch_array($courses)){
                    $list[$i]['course_name'] = $rowC['name'];
                } 
            }
            
            
            $i++;
        }
        return $list;
    }
    
    public function subjectStudents($id){
        $i = 0;
        $list = array();
            $search_student = mysql_query("SELECT * FROM students WHERE section='$id'");
            while($rowS = mysql_fetch_array($search_student)){
                $list[$i]['student_id'] = $rowS['student_id'];
                $list[$i]['first_name'] = $rowS['first_name'];
                $list[$i]['last_name'] = $rowS['last_name'];
                $list[$i]['course_id'] = $rowS['course'];    
				$i++;
            }
            
            
        
        return $list;
    }
}
?>