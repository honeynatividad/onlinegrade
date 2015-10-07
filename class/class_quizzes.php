<?php

Class Quizzes{
	
	var $quiz_id,$subject_id,$subject_name,$section_id,$section_name,$teacher_id;
	
	public function __construct() {
		$db = new DB_Class();
	}
    
    public function subjectList($id){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM quizzes WHERE subject_load_id='$id'");
        while($row = mysql_fetch_array($search)){
            $list[$i]['subject_load_id'] = $row['subject_load_id'];

        }
    }
}
?>