<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


session_start();
include('../class/config.php');
include('../class/class_subjects.php');

$subject = new Subjects();

$id = $_GET['id'];
$subject->subjectDeactivate($id);


?>