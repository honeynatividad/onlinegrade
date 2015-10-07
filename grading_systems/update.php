<?php
session_start();
include('../class/config.php');
include('../class/class_grading_systems.php');
$grading = new GradingSystem();

	if(!isset($_SESSION['username'])){
		header("Location: ../login.php");
	}
	//echo $_SESSION['admin_login'];
$t_id = $_SESSION['uid'];
$sub_id = $_GET['sid'];
$grading->gradingLoad($sub_id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$teacher_id = mysql_escape_string($_POST['teacher_id']);
	$subject_id = mysql_escape_string($_POST['subject_id']);
    $course_id = mysql_escape_string($_POST['course_id']);
    $section_id = mysql_escape_string($_POST['section_id']);
	$load->subject_id = $subject_id;
	$load->teacher_id = $teacher_id;
    $load->course_id = $course_id;
    $load->section_id = $section_id;
	$load->loadAdd();
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
                    <h1 class="page-header">Grading System Management </h1>
                </div>
                <div class="col-lg-12">
                <p>Course: <?php echo $grading->getCourseName() ?></p>
                <p>Section: <?php echo $grading->getSectionName() ?></p>
                <p>Subject: <?php echo $grading->getSubjectName() ?></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php
                        $count = $grading->getData($sub_id);
                     ?>   
                        <a class="btn btn-primary" href="<?php echo $url ?>grading_systems/add.php?id=<?php echo $sub_id ?>">Add</a>
                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<div class="row">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Type</th>
											<th>Percentage</th>		
											<th>Period</th>
											<th>Action`</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($grading->getGrading($sub_id) as $a): ?>
                                    
                                        <tr class="odd gradeX">
                                            <td><?php echo $a['grading_id'] ?></td>
                                            <td><?php
                                            echo $grading->gradeNameInfo($a['name']); 
                                             ?></td>
                                            <td><?php 
												echo $a['percentage'];
											?> </td>																						
                                            <td><?php
                                            $period = $a['period']; 
                                            if($period==1){
                                                echo 'Prelims';
                                            }elseif($period==2){
                                                echo 'Midterms';
                                            }elseif($period==3){
                                                echo 'Prefinals';
                                            }elseif($period==4){
                                                echo 'Finals';
                                            } ?></td>											
                                            
											<td><a class="btn btn-primary" href="edit.php?sid=<?php echo $a['grading_id'] ?>">Update</a> <a class="btn btn-success" href="activate.php?id=<?php echo $a['section_id'] ?>">Activate</a> <a class="btn btn-success" href="deactivate.php?id=<?php echo $a['section_id'] ?>">Deactivate</a></td>
                                        </tr>
                                       <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
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