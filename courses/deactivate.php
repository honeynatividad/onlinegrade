<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


include('../class/config.php');
include('../class/class_courses.php');

$course = new Courses();

$id = $_GET['id'];
$course->courseDeactivate($id);



?>