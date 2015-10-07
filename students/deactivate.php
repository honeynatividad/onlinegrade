<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


include('../class/config.php');
include('../class/class_students.php');
$student = new Students();
$id = $_GET['id'];
$student->studentDeactivate($id);

?>