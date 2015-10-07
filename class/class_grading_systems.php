<?php

Class GradingSystem{
	var $grading_id,$name,$percentage,$period,$term,$subject_load_id,$teacher_id,$subject_id,$status,$created,$subject_name,$subject_code,$course_id,$course_name,$section_id,$section_name,$student_id,$first_name,$last_name;
	
	public function __construct() {
		$db = new DB_Class();
	}
    
    public function gradingSubject($id){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM subject_load WHERE teacher_id='$id'");
        while($row = mysql_fetch_array($search)){
            $list[$i]['subject_load_id'] = $row['subject_load_id'];
            $subj_id = $row['subject_id'];
            $sec_id = $row['section_id'];
            $course_id = $row['course_id'];
            $subject = mysql_query("SELECT * FROM subjects WHERE subject_id='$subj_id'");
            while($rowS = mysql_fetch_array($subject)){
                $list[$i]['subject_id'] = $rowS['subject_id'];
                $list[$i]['subject_name'] = $rowS['name'];
            }
            
            $section = mysql_query("SELECT * FROM sections WHERE section_id = '$sec_id'");
            while($rowSS = mysql_fetch_array($section)){
                $list[$i]['section_id'] = $rowSS['section_id'];
                $list[$i]['section_name'] = $rowSS['name'];
            }
            
            $course = mysql_query("SELECT * FROM courses WHERE course_id='$course_id'");
            while($rowC = mysql_fetch_array($course)){
                $list[$i]['course_id'] = $rowC['course_id'];
                $list[$i]['course_name'] = $rowC['name'];
            }
            
            $i++;
        }
        return $list;
        
    } 
    
    public function getData($id){
        $search = mysql_query("SELECT * FROM grading_systems WHERE subject_load_id='$id'");
        $count = mysql_num_rows($search);
        if($count>0){
            $c = 1;
        }else{
            $c = 0;
        }
        return $c;
        
    }
    public function gradingLoad($id){
      $search = mysql_query("SELECT * FROM subject_load WHERE subject_load_id='$id'");
      while($row = mysql_fetch_array($search)){
        $this->course_id = $row['course_id'];
        $this->section_id = $row['section_id'];
        $this->subject_id = $row['subject_id'];  
      }  
        
    }
    
    public function getSubjectName(){
        $search = mysql_query("SELECT * FROM subjects WHERE subject_id = '$this->subject_id'");
        while($row = mysql_fetch_array($search)){
            $name = $row['name'];
        }        
        return $name;
    }
    
    public function getCourseName(){
        $search = mysql_query("SELECT * FROM courses WHERE course_id = '$this->course_id'");
        while($row = mysql_fetch_array($search)){
            $name = $row['name'];
        }        
        return $name;
    }
    
    public function getSectionName(){
        $search = mysql_query("SELECT * FROM sections WHERE section_id = '$this->section_id'");
        while($row = mysql_fetch_array($search)){
            $name = $row['name'];
        }        
        return $name;
    }
    
    public function getGrading($id){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM grading_systems WHERE subject_load_id='$id'");
        while($row = mysql_fetch_array($search)){
            $list[$i]['name'] = $row['name'];
            $list[$i]['percentage'] = $row['percentage'];
            $list[$i]['period'] = $row['period'];
            $list[$i]['subject_load_id'] = $row['subject_load_id'];
            $list[$i]['grading_id'] = $row['grading_id'];
            $list[$i]['term'] = $row['term'];
            $i++;
        }
        return $list;
    }
    
    public function gradeAdd(){
        $insert =  mysql_query("INSERT INTO grading_systems (subject_load_id,name,percentage,period,term) VALUES ('$this->subject_load_id','$this->name','$this->percentage','$this->period','$this->term')");
        $_SESSION['success'] = 'You successfully added a grading system';
        header("Location: update.php?sid=$this->subject_load_id");
    }
    
    public function gradeName(){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM category_grades WHERE status='1'");
        while($row = mysql_fetch_array($search)){
            $list[$i]['name_id'] = $row['category_id'];
            $list[$i]['name'] = $row['name'];
            $i++;
        }
        return $list;
    }
    public function gradeNameInfo($id){
        $search = mysql_query("SELECT * FROM category_grades WHERE category_id='$id'");
        while($row = mysql_fetch_array($search)){
            $name = $row['name'];
        }
        return $name;
    }
	
	public function gradePeriod($id){
		$i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM grading_systems WHERE subject_load_id='$id' GROUP BY subject_load_id");
        while($row = mysql_fetch_array($search)){
            $list[$i]['period'] = $row['period'];            
            $i++;
        }
        return $list;
	}
	
	public function gradeCategoryCheck($id){
		$no = 0;
		$search = mysql_query("SELECT * FROM grades WHERE  subject_load_id='$id' GROUP BY category_no ORDER BY created DESC LIMIT 1 ");
		while($row = mysql_fetch_array($search)){
			$no= $row['category_no'];
		}
		
		return $no;
	}
	
	public function getStudentId($id){
		$student = 0;
		$search = mysql_query("SELECT * FROM subject_students WHERE subject_id='$s_id' AND teacher_id='$t_id' AND ");
		while($row = mysql_fetch_array($search)){
			$student = $row['student_id'];
		}
		return $student;
	}
	
	public function gradeSubjectLoad($id){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM subject_load WHERE  subject_load_id='$id'  ");
		while($row = mysql_fetch_array($search)){
			$list[$i]['subject_id'] = $row['subject_id'];
			$list[$i]['course_id'] = $row['$course_id'];
			$list[$i]['section_id'] = $row['section_id'];
			
		}
	}
	
	public function getSubjectId($id){
		$name = 0;
		$search = mysql_query("SELECT * FROM subject_load WHERE subject_load_id='$id'");
		while($row = mysql_fetch_array($search)){
			$name = $row['subject_id'];
		}
		return $name;
	}
	
	public function getCourseId($id){
		$name = 0;
		$search = mysql_query("SELECT * FROM subject_load WHERE subject_load_id='$id'");
		while($row = mysql_fetch_array($search)){
			$name = $row['course_id'];
		}
		return $name;
	}
	
	public function getSectionId($id){
		$name = 0;

		$search = mysql_query("SELECT * FROM subject_load WHERE subject_load_id='$id'");
		while($row = mysql_fetch_array($search)){
			$name = $row['section_id'];
		}
		return $name;
	}
	
	public function gradeStudent($sub_id,$teacher_id,$sec_id){
		$i = 0 ;
		$list = array();
		$search = mysql_query("SELECT * FROM subject_students WHERE subject_id='$sub_id' AND teacher_id='$teacher_id' AND section_id='$sec_id'");
		while($row = mysql_fetch_array($search)){
			$a = $row['student_id'];
			$search2 = mysql_query("SELECT * FROM students WHERE student_id='$a'");
			while($row2 = mysql_fetch_array($search2)){
				$list[$i]['student_id'] = $row2['student_id'];
				$list[$i]['student_no'] = $row2['student_no'];
				$list[$i]['first_name'] = $row2['first_name'];
				$list[$i]['last_name'] = $row2['last_name'];
				$i++;
			}
			
		}
		return $list;
	}
	
	public function gradeStudentList($id){
		$i = 0;
		$list = array();
		$search = mysql_query("SELECT * FROM students WHERE student_id='$id'");
		while($row = mysql_fetch_array($search)){
			$list[$i]['student_id'] = $row['student_id'];
			$list[$i]['student_no'] = $row['student_no'];
			$list[$i]['first_name'] = $row['first_name'];
			$list[$i]['last_name'] = $row['last_name'];
			$i++;
		}
		return $list;
	}
}
?>