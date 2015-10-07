<?php
session_start();
include('../class/config.php');
include('../class/class_grading_systems.php');

$grading = new GradingSystem();
	if(!isset($_SESSION['username'])){
		header("Location: ../login.php");
	}
$t_id = $_SESSION['uid'];
//$sid = $_GET['sid'];	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = mysql_escape_string($_POST['name']);
	$sid = mysql_escape_string($_POST['sid']);
	$period = mysql_escape_string($_POST['period']);
	$category_no = $grading->gradeCategoryCheck($sid,$name);
	$grade_name = $grading->gradeNameInfo($name);
	//echo 'test '.$category_no;
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<p>Last <?php echo $grade_name ?> : <?php echo $category_no ?> </p>
							<form role="form" action="next.php" method="POST">
							
							<div class="form-group">
							`		<label>Raw Score</label>																						
									<input type="number" name="rawscore" value="<?php echo $rawscore ?>">                                            
                                </div>
								<input type="hidden" name="sid" value="<?php echo $sid ?>" />
								<input type="hidden" name="category" value="<?php echo $category_no ?>" >
								
								<div class="form-group">
									<label><?php echo $grade_name ?> No:</label>																						
									<input type="number" name="category_no">                                            
                                </div>
								<button type="submit" class="btn btn-default">Next</button>
                                
								
							<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                `            <th>Student No</th>
                                            <th>First Name</th>
											<th>Last Name</th>		
											<th>Score</th>
											

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
							//echo '<br>'.$sid;
								$sub_id = $grading->getSubjectId($sid);
								$course_id = $grading->getCourseId($sid);
								$sec_id = $grading->getSectionId($sid);
								
								$x=0;
								foreach($grading->gradeStudent($sub_id,$t_id,$sec_id) as $b){
									
							?>
										<tr>
											<td><?php echo $b['student_id'] ?></td>
											<td><?php echo $b['first_name'] ?></td>
											<td><?php echo $b['last_name']; ?></td>
											<td><input type="text" name="<?php echo "score".$x; ?>"></td>
										</tr>
									
                            
							
								
							<?php
							$x++;		
								}
							?>	
                                		
								</tbody>
										
                            </form>
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