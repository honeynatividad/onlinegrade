<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


session_start();
include('../class/config.php');
include('../class/class_subject_load.php');

$load = new SubjectLoad();

$id = $_GET['id'];
$load->loadActivate($id);


?>