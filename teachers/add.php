<?php
session_start();
include('../class/config.php');
include('../class/class_teachers.php');

$teacher = new Teachers();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = mysql_escape_string($_POST['first_name']);
	$last_name = mysql_escape_string($_POST['last_name']);
	$middle_name = mysql_escape_string($_POST['middle_name']);
	$birthdate = mysql_escape_string($_POST['birthdate']);
	$email_add = mysql_escape_string($_POST['email_address']);
	$address = mysql_escape_string($_POST['address']);
	$contact = mysql_escape_string($_POST['contact']);
    
	$teacher->first_name = $first_name;
	$teacher->last_name = $last_name;
	$teacher->middle_name = $middle_name;
	$teacher->birthdate = $birthdate;
	$teacher->email_add = $email_add;
	$teacher->address = $address;
	$teacher->contact = $contact;
    
    $file_upload_1="true";
    $file_up_size_1=$_FILES['photo']['size'];
    
    
    if ($_FILES['photo']['size']>10000000){
        $msg=$msg."Your uploaded file size is more than 10MB so please reduce the file size and then upload.<BR>";
        $file_upload_1="false";
    }
    
    if (!($_FILES['photo']['type'] =="image/jpeg" OR $_FILES['photo'][type] =="image/gif")){
        $msg=$msg."Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
        $file_upload_1="false";
    }
    
    $file_name_1=$_FILES['photo']['name'];
    $add_1="images/".$file_name_1; // the path with the file name where the file will be stored
    
    if($file_upload_1=="true"){

        if(move_uploaded_file ($_FILES['photo']['tmp_name'], $add_1)){
            //$update = mysql_query("UPDATE products SET photo_1='$add_1' WHERE product_id='$id'");
        }else{
            //echo "Failed to upload file Contact Site admin to fix the problem";
        }

    }else{
 //       echo $msg;
    }
    
    $teacher->photo = $add_1;
	$teacher->teacherAdd();
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
                    <h1 class="page-header">Update Teacher Information </h1>
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
                                <div class="col-lg-6">
                                    <form role="form" action="add.php" method="POST" enctype="multipart/form-data">
                                        

										 <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name='last_name'>
                                            
                                        </div>

										 <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="first_name" >
                                            
                                        </div>                                        
										 <div class="form-group">
                                            <label>Middle Name</label>
                                            <input class="form-control" name="middle_name" >
                                            
                                        </div>
										 <div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" name="contact" >
                                            
                                        </div>
										 <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="form-control" name="email_address" type="email" >
                                            
                                        </div>
										 <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" >
                                            
                                        </div>
										 <div class="form-group">
                                            <label>Birth Day</label>
                                            <input class="form-control" name="birthdate" >
                                            
                                        </div>
										 
										<div class="form-group">
                                            <label>Department</label>
											<select name="department" class="form-control">
												
												<?php foreach($teacher->teacherDepartment() as $a): ?>
												<option value="<?php echo $a['department_id'] ?>"><?php echo $a['name'] ?></option>
												<?php endforeach; ?>
											</select>                                            
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Student Picture</label>
											
                                            <input type="file" name="photo">
									       </div>
										
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    
                                </div>
                                
                                </form>
                                   
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