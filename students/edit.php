<?php
/**
	add courses table for database
	add cms for courses
**/
session_start();
include('../class/config.php');
include('../class/class_students.php');
$student  = new Students();
$id = $_GET['id'];
$student->studentData($id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$student_no = mysql_escape_string($_POST['student_no']);
	$first_name = mysql_escape_string($_POST['first_name']);
	$last_name = mysql_escape_string($_POST['last_name']);
	$middle_name = mysql_escape_string($_POST['middle_name']);
	$course = mysql_escape_string($_POST['course']);
	$section = mysql_escape_string($_POST['section']);
	$birthdate = mysql_escape_string($_POST['birthdate']);
	$email_address = mysql_escape_string($_POST['email_address']);
	$address = mysql_escape_string($_POST['address']);
	$contact_no = mysql_escape_string($_POST['contact_no']);
	//$photo = mysql_escape_string($_POST['photo']);
	$student->student_no = $student_no;
	$student->first_name = $first_name;
	$student->last_name = $last_name;
	$student->middle_name = $middle_name;
	$student->course = $course;
	$student->section = $section;
	$student->birthdate = $birthdate;
	$student->email_address = $email_address;
	$student->address = $address;
	$student->contact_no = $contact_no;
    $student_id = mysql_escape_string($_POST['student_id']);
	//$student->photo = $photo;
    
	$student->studentEdit($student_id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Blast</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $url ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $url ?>css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo $url ?>css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $url ?>css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $url ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">E-Blast</a>
            </div>
            <!-- /.navbar-header -->

            <?php include('../menutop.php') ?>
            <!-- /.navbar-top-links -->

            <?php include('../menuleft.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
				<div class="col-lg-12">
                    <h1 class="page-header">Courses Information </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="edit.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="student_id" value="<?php echo $id ?>" />
										<div class="form-group">
                                            <label>Student No</label>
                                            <input class="form-control" name='student_no' value="<?php echo $student->student_no ?>">
                                            
                                        </div>
										 <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name='first_name' value="<?php echo $student->first_name ?>">
                                            
                                        </div>

										 <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name='last_name' value="<?php echo $student->last_name ?>">
                                        </div>                                        
										 
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input class="form-control" name='middle_name' value="<?php echo $student->middle_name ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            <input class="form-control" name='contact_no' value="<?php echo $student->contact_no ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="form-control" name='email_address' value="<?php echo $student->email_address ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Birthdate</label>
                                            <input class="form-control" name='birthdate' value="<?php echo $student->birthdate ?>">
                                        </div>                                   
                                        <div class="form-group">
                                            <label>Course</label>
                                            <select name="course">
                                            <?php
                                             $student->courseListName($student->course);
                                             ?>
                                            <option value="<?php echo $student->course_id ?>"><?php echo $student->course_name ?></option>
                                            <?php foreach($student->courseListData() as $a): ?>
                                            <option value="<?php echo $a['course_id'] ?>"><?php echo $a['course_name'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>                                        
										     
                                        <div class="form-group">
                                            <label>Section</label>
                                            <input class="form-control" name='section' value="<?php echo $student->section ?>">
                                        </div>     
										
										<div class="form-group">
                                            <label>Status</label>
                                            <select name="type" id="section_id" class="form-control" required>
												<option value="<?php echo $student->type ?>">
													<?php
													if($student->type==1){
													echo 'Regular';
													}else{
													echo 'Irregular';
													}
													?>
												</option>
                                                <option selected="selected">--Select Section--</option>
												<option value="1">Regular</option>
												<option value="2">Irregular</option>
                                            </select>
                                        </div>
										 
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                    
                                </div>
                                
                                
                                   
                            </div>	
                            <!-- /.table-responsive -->
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                  <!-- /.panel -->
				</div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                  <!-- /.panel -->
				</div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <!-- /.panel -->
				</div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include('../jscript.php') ?>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>