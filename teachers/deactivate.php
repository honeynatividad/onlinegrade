<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


session_start();
include('../class/config.php');
include('../class/class_teachers.php');

$teacher = new Teachers();

$id = $_GET['id'];
$teacher->teacherDeactivate($id);


?>