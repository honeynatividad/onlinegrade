<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


session_start();
include('../class/config.php');
include('../class/class_sections.php');

$section = new Sections();

$id = $_GET['id'];
$section->sectionDeactivate($id);


?>