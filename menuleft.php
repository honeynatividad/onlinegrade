<?php
if($_SESSION['role']=='Admin'){
    

?>
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Main</a>
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url ?>admin/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>admin/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Teachers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url ?>teachers/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>teachers/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Departments<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>departments/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>departments/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Students<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>students/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>students/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Courses<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>courses/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>courses/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Subjects<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>subjects/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>subjects/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Subject Load<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>subject_load/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>subject_load/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Quizzes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo $url; ?>quizzes/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>quizzes/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Enrollment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							
                                <li>
                                    <a href="<?php echo $url; ?>subject_students/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Sections<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo $url; ?>sections/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>sections/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo $url; ?>categories/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>categories/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                                            </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <?php
            }else{
            ?>
            
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Main</a>
                        </li>
                        
                        
                      
					
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Departments<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>departments/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Students<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>students/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Courses<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>courses/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Subjects<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>subjects/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Subject Load<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url; ?>subject_load/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Quizzes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo $url; ?>quizzes/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>quizzes/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Enrollment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							
                                <li>
                                    <a href="<?php echo $url; ?>subject_students/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Sections<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo $url; ?>sections/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>sections/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Grading System<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="<?php echo $url; ?>grading_systems/add.php">Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>grading_systems/index.php">List</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                                            </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <?php    
            }
            ?>