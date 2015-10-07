<?php
session_start();
include('../class/config.php');
include('../class/class_students.php');
$id = $_GET['id'];
$student = new Students();
$student->studentData($id);
?>

<p>First Name:<?php echo $student->first_name; ?></p>
<p>Last Name:<?php echo $student->last_name; ?></p>
<p>Middle Name:<?php echo $student->middle_name; ?></p>
<p>Course:<?php echo $student->course; ?></p>
<p>Section:<?php echo $student->section; ?></p>
<p>Birthdate:<?php echo $student->birthdate; ?></p>
<p>Email Address:<?php echo $student->email_address; ?></p>
<p>Address:<?php echo $student->address; ?></p>
<p>Contact No:<?php echo $student->contact_no; ?></p>