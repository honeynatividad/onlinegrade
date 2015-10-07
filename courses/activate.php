<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


session_start();
include('../class/config.php');
include('../class/class_courses.php');

$course = new Courses();

$id = $_GET['id'];
$course->courseActivate($id);


?>