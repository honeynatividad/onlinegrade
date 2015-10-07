<?php

Class Categories{
	var $category_id,$name,$status,$created;
	
	public function __construct() {
		$db = new DB_Class();
	}
    
    public function categoryList(){
        $i = 0;
        $list = array();
        $search = mysql_query("SELECT * FROM category_grades ");
        while($row = mysql_fetch_array($search)){
            $list[$i]['category_id'] = $row['category_id'];
            $list[$i]['name'] = $row['name'];
            $list[$i]['status'] = $row['status'];
            $i++;
        }
        return $list;
    }
    
    public function categoryAdd(){
        $insert = mysql_query("INSERT INTO category_grades (name) VALUES ('$this->name')");
        $_SESSION['success'] = 'You successfully added a category grade';
        header("Location: index.php");
    }
    
    public function categoryData($id){
        $search = mysql_query("SELECT * FROM category_grades WHERE category_id='$id'");
        while($row = mysql_fetch_array($search)){
            $this->name = $row['name'];
            $this->category_id = $row['category_id'];
        }
    }
    
    public function categoryEdit($id){
        $update = mysql_query("UPDATE category_grades SET name='$this->name' WHERE category_id='$id'");
        $_SESSION['success'] = 'You successfully updated a category grade';
        header("Location: index.php");
    }
    
    public function categoryActivate($id){
        $update = mysql_query("UPDATE category_grades SET status='1' WHERE category_id = '$id'");
        $_SESSION['success'] = 'You successfully activated a category grade';
        header("Location: index.php");
    }
    
    public function categoryDeactivate($id){
        $update = mysql_query("UPDATE category_grades SET status='0' WHERE category_id='$id'");
        $_SESSION['success'] = 'You successfully added a category grade';
        header("Location: index.php");
        
    }
}
?>