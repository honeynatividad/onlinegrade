<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


session_start();
include('../class/config.php');
include('../class/class_categories.php');

$category = new Categories();

$id = $_GET['id'];
$category->categoryActivate($id);


?>