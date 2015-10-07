<?php
session_start();
include('../class/config.php');
include('../class/class_departments.php');

$department = new Departments();
$id = $_GET['id'];
$department->departmentDeactivate($id);
?>