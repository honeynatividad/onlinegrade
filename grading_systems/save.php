<?php

session_start();
include('../class/config.php');
include('../class/class_grading_systems.php');

$grading = new GradingSystem();
	if(!isset($_SESSION['username'])){
		header("Location: ../login.php");
	}
$t_id = $_SESSION['uid'];
//$sid = $_GET['sid'];	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$sid = mysql_escape_string($_POST['sid']);
	$category = mysql_escape_string($_POST['category']);
	$category_no = mysql_escape_string($_POST['category_no']);
	$rawscore = mysql_escape_string($_POST['rawscore']);
	$no = mysql_escape_string($_POST['nu']);
	echo '<br>ttt '.$no;
	for($x=0;$x<$no;$x++){
		$s[$x]= mysql_escape_string($_POST['score'.$x]);
		$stud[$x] = mysql_escape_string($_POST['student'.$x]);
		//echo '<br>ss'.$s[$x];
		$insert = mysql_query("INSERT INTO grades (category_id,category_no,subject_load_id,subject_student_id,score,raw_score) VALUES ('$category','$category_no','$sid','".$stud[$x]."','".$s[$x]."','$rawscore')");
		
	}
}

?>