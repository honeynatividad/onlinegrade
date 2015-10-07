<?php
session_start();
include('../class/config.php');
include('../class/class_subject_load.php');

$load = new SubjectLoad();
	if(!isset($_SESSION['username'])){
		header("Location: ../login.php");
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
                    <h1 class="page-header">Subject Load Management </h1>
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
                            <?php if($_SESSION['role']=='Admin'){ ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Subject</th>
											<th>Teacher</th>		
											<th>Status</th>
											<th>Action`</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($load->loadList() as $a): ?>
                                    
                                        <tr class="odd gradeX">
                                            <td><?php echo $a['subject_load_id'] ?></td>
                                            <td><?php echo $a['subject_name'] ?></td>
                                            <td><?php echo $a['teacher_first_name'] ?> <?php echo $a['teacher_last_name'] ?></td>																						
                                            <td><?php echo $a['status']; ?></td>											
                                            
											<td><a class="btn btn-primary" href="edit.php?id=<?php echo $a['subject_load_id'] ?>">Edit</a> <a class="btn btn-success" href="activate.php?id=<?php echo $a['subject_load_id'] ?>">Activate</a> <a class="btn btn-success" href="deactivate.php?id=<?php echo $a['subject_load_id'] ?>">Deactivate</a></td>
                                        </tr>
                                       <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <?php }else{ ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Subject</th>
											
											<th>Action`</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($load->loadTeacher($_SESSION['uid']) as $a): ?>
                                    
                                        <tr class="odd gradeX">
                                            <td><?php echo $a['subject_load_id'] ?></td>
                                            <td><?php echo $a['subject_name'] ?></td>
                                            
											<td><a class="btn btn-primary" href="view_load.php?id=<?php echo $a['subject_load_id'] ?>">View Load</a>
                                            <a class="btn btn-primary" href="<?php echo $url ?>quizzes/view.php?t_id=<?php echo $_SESSION['uid'] ?>&s_id=<?php echo $a['subject_load_id'] ?>">Grades</a>
                                             </td>
                                        </tr>
                                       <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <?php } ?>
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