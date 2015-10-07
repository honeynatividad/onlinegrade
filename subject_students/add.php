<?php
@session_start();
include('../class/config.php');
include('../class/class_subject_students.php');
$load = new SubjectStudents();

$t_id = $_GET['t_id'];
$sec_id = $_GET['sec_id'];
$sub_id = $_GET['sub_id'];

	if(!isset($_SESSION['username'])){
		header("Location: ../login.php");
	}

	//echo $_SESSION['admin_login'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = mysql_escape_string($_POST['student_id']);
	$teacher_id = mysql_escape_string($_POST['teacher_id']);
	$subject_id = mysql_escape_string($_POST['subject_id']);
    $course_id = mysql_escape_string($_POST['course_id']);
    $section_id = mysql_escape_string($_POST['section_id']);
    $load->student_id = $student_id;
	$load->subject_id = $subject_id;
	$load->teacher_id = $teacher_id;
    $load->course_id = $course_id;
    $load->section_id = $section_id;
    //echo $load->student_id;
	$load->subAdd();
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
<style type="text/css"><!--
#other{
    display: none;
}
--></style>

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
                <a class="navbar-brand" href="<?php echo $url ?>index.php">E-Blast</a>
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
                    <h1 class="page-header">Enrollment </h1>
                </div>
				<?php
					if(isset($_SESSION['success'])){
						echo '<p>'.$_SESSION['success'].'</p>';
					}
				?>
				<div class="col-lg-12">
                    <h1 class="page-header">Enrollment </h1>
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
                                    <form role="form" action="add.php" method="POST">
                                        <input type="hidden" name="subject_id" value="<?php echo $sub_id ?>" /> 
                                        <input type="hidden" name="section_id" value="<?php echo $sec_id ?>" />
                                        <input type="hidden" name="teacher_id" value="<?php echo $t_id ?>" />                                       
										<div class="form-group">
                                            <label>Student</label>                                            
											<select name="student_id" class="form-control">
											<?php foreach($load->subjectStudents($sec_id) as $a): ?>
												<option value="<?php echo $a['student_id'] ?>"><?php echo $a['first_name'] ?> <?php echo $a['last_name'] ?></option>
											<?php endforeach; ?>
											</select>                                            
                                        </div>
										
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                   
                            </div>	
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
        $("#course_id").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "section.php?id="+id,
data: dataString,
cache: false,
success: function(html)
{
$("#section_id").html(html);
} 
});

});

    });
    </script>
</body>

</html>
