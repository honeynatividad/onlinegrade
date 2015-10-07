<?php
session_start();
include('../class/config.php');
include('../class/class_admin.php');
$id = $_GET['id'];
$admin = new Admin();

$admin->adminActivate($id);
?>