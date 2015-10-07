<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


Class Courses{
    
    var $course_id,$name,$description,$status,$created;
    
    public function __construct() {
		$db = new DB_Class();
	}
    
    public function courseList(){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM courses ");
        while($row = mysql_fetch_array($search)){
            $list[$i]['course_id'] = $row['course_id'];
            $list[$i]['name'] = $row['name'];
            $list[$i]['description'] = $row['description'];
            $list[$i]['status'] = $row['status'];
            $list[$i]['created'] = $row['created'];
            $i++;
        }
        return $list;
    }
    
    public function courseAdd(){
        $insert = mysql_query("INSERT INTO courses (name,description) VALUES ('$this->name','$this->description')");
        $_SESSION['success'] = 'You successfully added new course';
        header("Location: index.php");
    }
    
    public function courseEdit($id){
        $update = mysql_query("UPDATE courses SET name='$this->name',description='$this->description' WHERE course_id='$id' ");
        $_SESSION['success'] = 'You successfully updated '.$this->name;
        header("Location: index.php");
    }
    
    public function courseData($id){
        
        $search = mysql_query("SELECT * FROM courses WHERE course_id='$id'");
        while($row=mysql_fetch_array($search)){
            $this->course_id = $row['course_id'];
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->status = $row['status'];
            $this->created = $row['created'];  
        }
    }
    
    public function courseActivate($id){
        $update = mysql_query("UPDATE courses SET status='1' WHERE course_id='$id'");
        $_SESSION['success'] = 'You successfully activated a course information.';
        header("Location: index.php");
    }
    
    public function courseDeactivate($id){
        $update = mysql_query("UPDATE courses SET status='0' WHERE course_id='$id'");
        $_SESSION['success'] = 'You successfully deactivated a course information.';
        header("Location: index.php");
    }
    
}
?>