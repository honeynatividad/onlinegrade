<?php
session_start();
include('../class/config.php');
include('../class/class_grading_systems.php');

$grading = new GradingSystem();
$sub_id = $_GET['id'];
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
	}
	//echo $_SESSION['admin_login'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = mysql_escape_string($_POST['name']);
    $percentage = mysql_escape_string($_POST['percentage']);
    $period = mysql_escape_string($_POST['period']);
    $sub_id = mysql_escape_string($_POST['sub_id']);
    $term = mysql_escape_string($_POST['term']);
	$grading->name = $name;
    $grading->subject_load_id = $sub_id;
    $grading->period = $period;
    $grading->percentage = $percentage;
    $grading->term = $term;
    $grading->gradeAdd();
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
							<div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="add.php" method="POST">
                                        <input type="hidden" name="sub_id" value="<?php echo $sub_id ?>" />
										
										<div class="form-group">
                                            <label>Name</label>
																						
											<select class="form-control" name="name">
                                            <?php foreach($grading->gradeName() as $a): ?>
                                            <option value="<?php echo $a['name_id'] ?>"><?php echo $a['name'] ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Percentage</label>
											<input type="number" name="percentage" class="form-control">											
											
                                        </div>
                                        <div class="form-group">
                                            <label>Period</label>
											<select class="form-control" name="period">
                                                <option value="1">Prelims</option>
                                                <option value="2">Midterms</option>
                                                <option value="3">Prefinals</option>
                                                <option value="4">Finals</option>
                                            </select>											
											
                                        </div>
										<div class="form-group">
                                            <label>Term</label>
											<select class="form-control" name="term">
                                                <option value="1">First Term</option>
                                                <option value="2">Second Term</option>
                                                
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
    });
    </script>

</body>

</html>