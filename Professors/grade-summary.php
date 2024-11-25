<?php

    session_start();
    require '../includes/dbh.inc.php';

    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }

    if (strlen($_SESSION['userUid'])==0) {
        header('location:../includes/logout.inc.php');
      } 
  
      else{
?>  
<!doctype html>
<html lang="en" dir="ltr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="simple-logo2.ico" type="image/x-icon"/>

<title>TaskTalk - Grade Summary</title>

<!--Notification using PHP Ajax Bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Plugins css -->
<link rel="stylesheet" href="assets/plugins/charts-c3/c3.min.css"/>

<!-- Core css -->
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/theme1.css"/>
<link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="font-montserrat sidebar_dark iconcolor gradient">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">

    <div id="header_top" class="header_top dark">
        <div class="container">
           <div class="hleft">
           <a class="header-brand" href="dashboard.php" ><img src="assets/images/simple-logo2.png"></a>  
                <a href="javascript:void(0)" class="nav-link user_btn"><?php echo'<img id="userDp1" class="avatar" alt="" data-toggle="tooltip" data-placement="right" title="User Menu" src=../uploads/'.$_SESSION["userImg"].'>'?></a>

            </div>
            <div class="hright">
                <div class="dropdown">
                    <a href="../p-index.php" class="nav-link icon"><img src="assets/images/home_30px.png"></a>
                    <a href="javascript:void(0)" class="nav-link icon menu_toggle"><img src="assets/images/leftarrow_30px.png"></a>
                </div>            
            </div>
        </div>
    </div>

    <div id="rightsidebar" class="right_sidebar">
        <a href="javascript:void(0)" class="p-3 settingbar float-right"><i class="fa fa-close"></i></a>
        <div class="p-4">
            <div class="mb-4">
                <h6 class="font-14 font-weight-bold text-muted">Font Style</h6>
                <div class="custom-controls-stacked font_setting">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-opensans">
                        <span class="custom-control-label">Open Sans Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-montserrat" checked="">
                        <span class="custom-control-label">Montserrat Google Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-roboto">
                        <span class="custom-control-label">Robot Google Font</span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <h6 class="font-14 font-weight-bold text-muted">Dropdown Menu Icon</h6>
                <div class="custom-controls-stacked arrow_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-a">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-c" checked="">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
                <h6 class="font-14 font-weight-bold mt-4 text-muted">SubMenu List Icon</h6>
                <div class="custom-controls-stacked list_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-a" checked="">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-c">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
            </div>
            <hr>
            <div>
                <h6 class="font-14 font-weight-bold mt-4 text-muted">General Settings</h6>
                <ul class="setting-list list-unstyled mt-1 setting_switch">
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Night Mode</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-darkmode" checked="">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Fix Navbar top</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-fixnavbar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Header Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-pageheader" checked="">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Min Sidebar Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-min_sidebar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Sidebar Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-sidebar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Icon Color</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-iconcolor">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Gradient Color</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-gradient">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Box Shadow</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxshadow">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">RTL Support</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-rtl">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Box Layout</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxlayout">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="form-group">
                <label class="d-block">Storage <span class="float-right">77%</span></label>
                <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                </div>
                <button type="button" class="btn btn-primary btn-block mt-3">Upgrade Storage</button>
            </div>
        </div>
    </div>

    <div class="user_div">
        <h5 class="brand-name mb-4">TASKTALK<a href="javascript:void(0)" class="user_btn"><img src="assets/images/sidebtn.png"></a></h5>
        <div class="card-body">
            <a href="page-profile.php"><?php echo'<img id="userDp" class="card-profile-img" alt="" src=../uploads/'.$_SESSION["userImg"].'>'?></a>
            <h6 class="mb-0"><?php echo strtoupper($_SESSION['f_name']) . " " . strtoupper($_SESSION['l_name']); ?></h6>
            <span><?php echo ($_SESSION['emailUsers']); ?></span>
            <hr>
            <p>Activity</p>
            <ul class="new_timeline">
            <?php
                $sql3 = mysqli_query($conn,"SELECT * FROM tasks WHERE createdby = '".$_SESSION['userUid']."' AND taskstat = 'On-Going' ORDER BY id DESC LIMIT 2");
                while($task = mysqli_fetch_assoc($sql3)){
            ?>
                <li>
                    <div class="bullet pink"></div>
                    <div class="time"><?php echo $task['tend']?></div>
                    <div class="desc">
                        <h3><?php echo $task['taskname']?></h3>
                        <h4><?php echo substr($task['taskdesc'],0,10) . '...'?></h4>
                    </div>
                </li>
            <?php
                }
            ?>
            <?php
                $sql4 = mysqli_query($conn,"SELECT * FROM projects WHERE createdby  = '".$_SESSION['userUid']."' AND projstat = 'On-Going' ORDER BY id DESC LIMIT 2");
                while($proj = mysqli_fetch_assoc($sql4)){
            ?>
                <li>
                    <div class="bullet pink"></div>
                    <div class="time"><?php echo $proj['duedate']?></div>
                    <div class="desc">
                        <h3><?php echo $proj['projname']?></h3>
                        <h4><?php echo substr($proj['projdesc'],0,10) . '...'?></h4>
                    </div>
                </li>
            <?php
                }
            ?>
            </ul>
        </div>
    </div>

    <div id="left-sidebar" class="sidebar-dark">
        <div id="brandname"><h3>TASKTALK</h3></div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
                <li class="g_heading">Project</li>
                <li><a href="dashboard.php"><i ></i><img src="assets/images/dashboard.png"><span style="margin-left:5px;">  Dashboard</span></a></li>
                <li><a href="project-list.php"><i ></i><img src="assets/images/subjects.png"><span style="margin-left:5px;"> Project List</span></a></li> 
                <li class="active"><a href="grade-book.php"><i ></i><img src="assets/images/grade-book.png"><span style="margin-left:5px;">  Grade Book</span></a></li>
                <li><a href="associates.php"><i ></i><img src="assets/images/associates.png"><span style="margin-left:5px;"> Associates</span></a></li>          
                
                <li class="g_heading">App</li>
                <li><a href="app-calendar.php"><i></i><img src="assets/images/calendar.png"><span style="margin-left:5px;"> My Calendar</span></a></li>
                <li><a href="chat/app-chat.php"><i></i><img src="assets/images/messages.png"><span style="margin-left:5px;"> Chat Room</span></a></li>
                <a><img src="assets/images/hi.gif" class="img-fluid" ></i></a>
            </ul>
        </nav>        
    </div>


    <!-----page--------------------------------------------------=========================================================== ====------------->


    <div class="page">
        <div id="page_top" class="section-body top_dark">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="left">
                        <a href="javascript:void(0)" class="icon menu_toggle mr-3"><img src="assets/images/burgir.png"></a>
                        <h1 class="page-title"></h1>                        
                    </div>
                    <div class="right">
                        <div class="input-icon xs-hide mr-4">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-icon-addon"></span>
                        </div>
                        
                        <div class="notification d-flex">
                            <!-- Notification button  -->
                            <?php
                                include("functions.php");

                            ?>
                            <div class="dropdown d-flex">
                                <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/notif_30px.png"> 
                                        <?php
                                        $query = "SELECT * from `notifications` where `status` = 'unread' AND `createdby` = '".$_SESSION['userUid']."' AND NOT `members` = '' order by `id` DESC";
                                        if(count(fetchAll($query))>0){
                                        ?>
                                        <span class="badge badge-primary nav-unread"></span>
                                        <?php
                                            }
                                                ?>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="dropdown01">
                                            <?php
                                            $query = "SELECT * from `notifications` WHERE `createdby` = '".$_SESSION['userUid']."' AND NOT `members` = '' order by `id` DESC";
                                            if(count(fetchAll($query))>0){
                                                foreach(fetchAll($query) as $i){
                                              
                                                    $query = mysqli_query($conn, "SELECT * FROM projects WHERE id='".$i['projid']."' ");
                                                    $row = mysqli_fetch_assoc($query);
                                        
                                            
                                            ?>
                                        <a style ="
                                                <?php
                                                    if($i['status']=='unread'){
                                                        echo "font-weight:bold;";
                                                    }
                                                ?>
                                                " class="dropdown-item" href="view.php?course=<?php echo $i['course']; ?>&section=<?php echo $i['section']; ?>&subject=<?php echo $i['subject']; ?>&id=<?php echo $i['projid']; ?>&projname=<?php echo $row['projname']; ?>&grpno=<?php echo $i['grpno']; ?>&grpid=<?php echo $i['grpid']; ?>&leader=<?php echo $i['leader']; ?>&idn=<?php echo $i['id'] ?>">

                                        <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                                        <?php 
                                        
                                        
                                        
                                        if($i['action']=='Post Comment'){
                                            echo ucfirst($i['uidUsers']). " commented on your post in " .$row['projname'].".";
                                        }
                                        ?>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <?php
                                            }
                                        }else{
                                            echo "No notification yet.";
                                        }
                                            ?>
                                    </div>
                                </li>
                                </ul>
                                
                            </div>

                            <!-- notification button  -->
                            <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/signout_30px.png"></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="../Students/page-profile.php"> Profile</a>             
                                <form method="post" action="../includes/p-logout.php" id="logout-form">
                                        <input type="submit" class="dropdown-item" name="logout-submit" value="Sign Out">
                                        <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                        <input type="hidden" id="action" name="action" value="Logout" readonly>
                                </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main page =============================================================================================================================================-->
        <div class="section mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="mb-4" >

                        </div>                        
                    </div>
                </div>
                <br>
                <div class="row clearfix">
                    <div class="col-12 col-sm-12">
                        <div class="table-responsive"> <!-- style= "background-color: #ad8875a3;" -->
                            <?php
                                if($_GET['type'] == 'Individual'){
                            ?>
                            <div class="card-header" style= "background-color: #57b2cb;">
                                <h4 class="card-title">GRADE SUMMARY</h4>
                            </div>
                            <table class="table table-hover table-vcenter mb-0  text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Grade</th>
                                        <th>Grading Type</th>
                                        <th>Graded By</th>
                                        <th>Date Graded</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // run query
                                        $query = mysqli_query($conn, "SELECT * FROM gradedproject where projid='".$_GET['id']."' AND grpid='".$_GET['grpid']."' AND grpno='".$_GET['grpno']."' AND gradetype='Individual'");
                                        $array = array();
                                        while($row = mysqli_fetch_assoc($query)){
                                            $array[] = $row;
                                                $query1 = mysqli_query($conn, "select * from user where uidUsers='".$row['member']."'") or die(mysql_error());
                                                while($que = mysqli_fetch_assoc($query1)){
                                    ?>
                                    <tr>
                                        <td><?php echo ($que['f_name']. " " .$que['l_name']);?></td>
                                        <td><?php echo $row['grade'];?></td>
                                        <td><?php echo $row['gradetype'];?></td>
                                        <td><?php echo $row['uploadedby'];?></td>
                                        <td><?php echo $row['uploaded_at'];?></td>
                                        <td><a data-id="<?php echo $row['id'];?>" title="Edit Individual Grade" class="tag tag-danger ml-0 mr-0 open-EditIndiv" href="#editIndiv" style="font-color:#000;">Edit</a></td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>

                            <br>
                            <br>
                            <?php
                                }
                                elseif($_GET['type'] == 'Group'){
                            ?>
                            <div class="card-header" style= "background-color: #57b2cb;">
                                <h4 class="card-title">GRADE SUMMARY</h4>
                            </div>
                            <table class="table table-hover table-vcenter mb-0  text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Grade</th>
                                        <th>Grading Type</th>
                                        <th>Graded By</th>
                                        <th>Date Graded</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // run query
                                        $query = mysqli_query($conn, "SELECT * FROM gradedproject where projid='".$_GET['id']."' AND grpid='".$_GET['grpid']."' AND grpno='".$_GET['grpno']."' AND gradetype='Group'");
                                        $array = array();
                                        while($row = mysqli_fetch_assoc($query)){
                                            $array[] = $row;
                                            $pr_name = mysqli_query($conn, "SELECT * FROM projects WHERE id='".$row['projid']."' order by id DESC");
                                            $prname = mysqli_fetch_assoc($pr_name);
                                    ?>
                                    <tr>
                                        <td><?php echo $prname['projname']?> - Group <?php echo $row['grpid']?></td>
                                        <td><?php echo $row['grade'];?></td>
                                        <td><?php echo $row['gradetype'];?></td>
                                        <td><?php echo $row['uploadedby'];?></td>
                                        <td><?php echo $row['uploaded_at'];?></td>
                                        <td><a data-id="<?php echo $row['id'];?>" title="Edit Group Grade" class="tag tag-danger ml-0 mr-0 open-EditGrp" href="#editGrp" style="font-color:#000;">Edit</a></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>

                            <br>
                            <br>
                            <?php
                                }
                                else{
                            ?>
                            <div class="card-header" style= "background-color: #57b2cb;">
                                <h4 class="card-title">GRADE SUMMARY</h4>
                            </div>
                            <table class="table table-hover table-vcenter mb-0  text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Grade</th>
                                        <th>Grading Type</th>
                                        <th>Graded By</th>
                                        <th>Date Graded</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // run query
                                        $query = mysqli_query($conn, "SELECT * FROM gradedproject where projid='".$_GET['id']."' AND grpid='".$_GET['grpid']."' AND grpno='".$_GET['grpno']."' AND gradetype='Both'");
                                        $array = array();
                                        while($row = mysqli_fetch_assoc($query)){
                                            $array[] = $row;

                                            if($row['member']== 'Group'){ 
                                                $pr_name = mysqli_query($conn, "SELECT * FROM projects WHERE id='".$row['projid']."' order by id DESC");
                                                $prname = mysqli_fetch_assoc($pr_name);
                                    ?> 
                                    <tr>
                                        <td><?php echo $prname['projname']?> - Group <?php echo $row['grpid']?></td>
                                        <td><?php echo $row['grade'];?></td>
                                        <td><?php echo $row['gradetype'];?></td>
                                        <td><?php echo $row['uploadedby'];?></td>
                                        <td><?php echo $row['uploaded_at'];?></td>
                                        <td><a data-id="<?php echo $row['id'];?>" title="Edit Group Grade" class="tag tag-danger ml-0 mr-0 open-EditGrp1" href="#editGrp1" style="font-color:#000;">Edit</a></td>
                                    </tr>
                                    <?php
                                            }
                                            else{
                                                $query1 = mysqli_query($conn, "select * from user where uidUsers='".$row['member']."'") or die(mysql_error());
                                                while($que = mysqli_fetch_assoc($query1)){
                                    ?>
                                    <tr>
                                        <td><?php echo ($que['f_name']. " " .$que['l_name']);?></td>
                                        <td><?php echo $row['grade'];?></td>
                                        <td><?php echo $row['gradetype'];?></td>
                                        <td><?php echo $row['uploadedby'];?></td>
                                        <td><?php echo $row['uploaded_at'];?></td>
                                        <td><a data-id="<?php echo $row['id'];?>" title="Edit Individual Grade" class="tag tag-danger ml-0 mr-0 open-EditIndiv1" href="#editIndiv1" style="font-color:#000;">Edit</a></td>
                                    </tr>
                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>

                            <br>
                            <br>
                            <?php
                                }
                            ?>
                            
                            <div class="card-header" style= "background-color: #57b2cb;">
                                <h4 class="card-title">PROJECT SUMMARY</h4>
                            </div>
                            <table class="table table-hover table-vcenter mb-0  text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Due Date</th>
                                        <th>Members</th>
                                        <th>Leader</th>
                                        <th>Date Submitted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // run query
                                        $query = mysqli_query($conn, "SELECT * FROM projsubmit where projid='".$_GET['id']."' AND grpid='".$_GET['grpid']."' AND grpno='".$_GET['grpno']."' ");

                                        // set array
                                        $array = array();

                                        // look through query
                                        while($row = mysqli_fetch_assoc($query)){

                                            // add each row returned into an array
                                            $array[] = $row;
                                    ?>
                                    <tr>
                                        <?php
                                            $p_name = mysqli_query($conn, "SELECT * FROM projects WHERE id='".$row['projid']."' order by id DESC");
                                            $projname = mysqli_fetch_assoc($p_name);
                                        ?>
                                        <td><?php echo $projname['projname'];?></td>
                                        <?php
                                            $q1 = mysqli_query($conn, "SELECT * FROM projects where id='".$_GET['id']."'");
                                            $row1 = mysqli_fetch_assoc($q1);
                                        ?>
                                        <td><?php echo $row1['duedate'];?></td>
                                        <td>
                                            <ul class="list-unstyled team-info sm margin-0 w150">
                                            <?php
                                                $result = mysqli_query($conn, "SELECT * FROM groups WHERE projid='".$_GET['id']."' and idGroups='".$_GET['grpid']."' AND groupno = '".$_GET['grpno']."' and leader='".$_GET['leader']."'") or die(mysql_error());
                                                while ($list = mysqli_fetch_assoc($result)) {
                                                    $lead = explode(',',$list['members']);  
                                                    foreach($lead as $c) {
                                            ?>

                                            <?php 
                                                $query = mysqli_query($conn, "select * from user where uidUsers='".$c."'") or die(mysql_error());
                                                while ($que = mysqli_fetch_assoc($query)) {
                                            ?>

                                            
                                            <?php echo'<li><img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'></li>'?>
                                            <?php } } }?>
                                            </ul>
                                        </td>
                                        <?php
                                            $q2 = mysqli_query($conn, "SELECT * FROM user where uidUsers='".$_GET['leader']."'");
                                            $row2 = mysqli_fetch_assoc($q2);
                                        ?>
                                        <td><?php echo ($row2['f_name']. " " .$row2['l_name']);?></td>
                                        <td><span class="tag tag-success"><?php echo $row['completed_at'];?></span></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <br>
                            <br>
                            
                            <div class="card-header" style= "background-color: #57b2cb;">
                                <h4 class="card-title">TASK SUMMARY</h4>
                            </div>
                            <table class="table table-hover table-vcenter mb-0 text-nowrap">
                            <!-- <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap"> -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Task</th>
                                        <th>Team</th>
                                        <th>Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM tasks where projid='".($_GET['id'])."'  and leader='".($_GET['leader'])."'  ");

                                    $array = array();
                                    $x = 0;

                                    while($row = mysqli_fetch_assoc($query)){

                                        $x++;
                                        $array[] = $row;

                                    ?>
                                    <tr>
                                        <td><?php echo $x;?></td>
                                        <td>
                                            

                                            <h6 class="mb-0"><?php echo $row['taskname'];?></h6>
                                            <span><?php echo $row['taskdesc']?></span>
                                        </td>
                                        <td>
                                            <?php 
                                                $qu = mysqli_query($conn, "select * from user where uidUsers='".$row['taskmember']."'") or die(mysql_error());
                                                $q = mysqli_fetch_assoc($qu);
                                            ?>
                                            <span"><?php echo ($q['f_name']. " " .$q['l_name']);?></span>
                                        </td>
                                        <td>
                                            <div class="text-teal"><?php echo $row['tduration']?></div>
                                            <div class="text-pink"><?php echo $row['tend']?></div>
                                        </td>
                                        <td>
                                            <span class="tag tag-danger ml-0 mr-0"><?php echo $row['taskstat'];?></span>
                                        </td>
                                    </tr>
                                    <!-- ----------------------------------------------- Subtask Loop --------------------------------------------  -->
                                    <tr>
                                    <?php
                                        $query1 = mysqli_query($conn, "SELECT * FROM subtasks where projid='".($_GET['id'])."'  and leader='".($_GET['leader'])."' and taskid='".$row['id']."' ");

                                        $array1 = array();

                                        while($row1 = mysqli_fetch_assoc($query1)){

                                            $array1[] = $row1;

                                        ?>
                                        <td></td>
                                        <td>
                                            <h6 class="mb-0"><?php echo $row1['subtaskname']?></h6>
                                            <span><?php echo $row1['taskdesc']?></span>
                                        </td>
                                        <td>
                                            <?php 
                                                $q1 = mysqli_query($conn, "select * from user where uidUsers='".$row1['taskmember']."'") or die(mysql_error());
                                                $qu1 = mysqli_fetch_assoc($q1);
                                            ?>
                                            <span"><?php echo ($qu1['f_name']. " " .$qu1['l_name']);?></span>
                                        </td>
                                        <td>
                                            <div class="text-teal"><?php echo $row1['tduration']?></div>
                                            <div class="text-pink"><?php echo $row1['tend']?></div>
                                        </td>
                                        <td>
                                            <span class="tag tag-danger ml-0 mr-0"><?php echo $row1['status']?></span>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>

                            <br>
                            <br>
                            
                            <div class="card-header" style= "background-color: #57b2cb;">
                                <h4 class="card-title">CLASS PERFORMANCE GRADING SHEET (STUDENTS)</h4>
                            </div>
                            <table class="table table-hover table-vcenter mb-0 text-nowrap">
                                <!-- <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap"> -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Members</th>
                                        <th>Q1</th>
                                        <th>Q2</th>
                                        <th>Q3</th>
                                        <th>Q4</th>
                                        <th>Q5</th>
                                        <th>Q6</th>
                                        <th>Q7</th>
                                        <th>Q8</th>
                                        <th>Q9</th>
                                        <th>Q10</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query1 = mysqli_query($conn, "SELECT * FROM peer_grading where member = '".$_GET['leader']."' AND projid='".($_GET['id'])."'  AND grpid = '".($_GET['grpid'])."' AND grpno ='".($_GET['grpno'])."' ");

                                    $row = mysqli_fetch_assoc($query1);

                                    ?>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <?php 
                                                $query2 = mysqli_query($conn, "select * from user where uidUsers='".$_GET['leader']."'") or die(mysql_error());
                                                $que2 = mysqli_fetch_assoc($query2);
                                            ?>
                                            <span><?php echo ($que2['f_name']. " " .$que2['l_name']);?></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                    </tr>
                                    <?php
                                        $query1 = mysqli_query($conn, "SELECT * FROM peer_grading WHERE member='".$_GET['leader']."' AND projid='".($_GET['id'])."'  AND grpid = '".($_GET['grpid'])."' AND grpno ='".($_GET['grpno'])."' ");
                                        
                                        // $query = mysqli_query($conn, "SELECT * FROM peer_grading ");
                                        $array1 = array();
                                        $x = 1;

                                        while($row1 = mysqli_fetch_assoc($query1)){

                                            $x++;
                                            $array[] = $row1;
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                        <?php 
                                                $query3 = mysqli_query($conn, "select * from user where uidUsers='".$row1['leader']."'") or die(mysql_error());
                                                $que3 = mysqli_fetch_assoc($query3);
                                            ?>
                                            <span><?php echo ($que3['f_name']. " " .$que3['l_name']);?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q1']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q2']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q3']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q4']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q5']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q6']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q7']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q8']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q9']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q10']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['total']?>%</span>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php
                                    $query1 = mysqli_query($conn, "SELECT * FROM groups WHERE projid='".($_GET['id'])."'  AND idGroups = '".($_GET['grpid'])."' AND groupno ='".($_GET['grpno'])."' ");
                                    
                                    $array = array();
                                    $x = 1;
                                    
                                    while($row = mysqli_fetch_assoc($query1)){
                                        $list = explode(",",$row['members']);
                                        foreach($list as $grp){
                                            $x++;

                                    ?>
                                    <tr>
                                        <td><?php echo $x?></td>
                                        <td>
                                            <?php 
                                                $query2 = mysqli_query($conn, "select * from user where uidUsers='".$grp."'") or die(mysql_error());
                                                $que2 = mysqli_fetch_assoc($query2);
                                            ?>
                                            <span><?php echo ($que2['f_name']. " " .$que2['l_name']);?></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                        <td>
                                            <span></span>
                                        </td>
                                    </tr>
                                    <?php
                                        $query1 = mysqli_query($conn, "SELECT * FROM peer_grading WHERE member ='".$grp."' AND projid='".($_GET['id'])."'  AND grpid = '".($_GET['grpid'])."' AND grpno ='".($_GET['grpno'])."' ");
                                        
                                        // $query = mysqli_query($conn, "SELECT * FROM peer_grading ");
                                        $array1 = array();
                                        $x = 0;

                                        while($row1 = mysqli_fetch_assoc($query1)){

                                            $x++;
                                            $array[] = $row1;
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                        <?php 
                                                $query3 = mysqli_query($conn, "select * from user where uidUsers='".$grp."'") or die(mysql_error());
                                                $que3 = mysqli_fetch_assoc($query3);
                                            ?>
                                            <span><?php echo ($que3['f_name']. " " .$que3['l_name']);?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q1']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q2']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q3']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q4']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q5']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q6']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q7']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q8']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q9']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['q10']?></span>
                                        </td>
                                        <td>
                                            <span"><?php echo $row1['total']?>%</span>
                                        </td>
                                    </tr>
                                    <?php } } }?>
                                </tbody>
                            </table>

                            <br>
                            <br>

                            <div class="card-header" style= "background-color: #57b2cb;">
                                <h3 class="card-title">CRITERIA</h3>
                            </div>

                            <?php

                                $sql = mysqli_query($conn,"SELECT * FROM projects WHERE id = '".$_GET['id']."'");
                                $nsql = mysqli_fetch_assoc($sql);

                            ?>
                            <iframe src="../uploads/Criteria/<?php echo $nsql['criteria'];?>" width="100%" style="height:900px;"></iframe>
                            <!-- <input type="submit"  class="btn btn-primary" style="float: right;" name="Add-Task" value="Save"> -->
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <div class="section">
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-md-right">
                            <ul class="list-inline mb-0">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>    
</div>

<form action="../includes/p-editindividual.inc.php" method='post' id="contact-form" enctype="multipart/form-data" onSubmit="return confirm('Do you want to continue?') ">
<div class="modal fade" id="editIndiv" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Grade</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">                                    
                            <!-- <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="subtask" name="subtask" placeholder="Subtask Name"> -->
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo ($_SESSION['userUid']); ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Subtask Status Changed" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="number" name="grade" id="grade" class="form-control" required>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Grade" value="Edit Status">
                    <input type="hidden" name="gradeid" id="gradeid" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditIndiv", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myGradeId = _self.data('id');
        $("#gradeid").val(myGradeId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<form action="../includes/p-editgrading.inc.php" method='post' id="contact-form" enctype="multipart/form-data" onSubmit="return confirm('Do you want to continue?') ">
<div class="modal fade" id="editGrp" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Grade</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">                                    
                            <!-- <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="subtask" name="subtask" placeholder="Subtask Name"> -->
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo ($_SESSION['userUid']); ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Subtask Status Changed" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="number" name="grade" id="grade" class="form-control" required>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Grade" value="Edit Status">
                    <input type="hidden" name="grp" id="grp" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditGrp", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myGrpId = _self.data('id');
        $("#grp").val(myGrpId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<form action="../includes/p-editindivgrp.inc.php" method='post' id="contact-form" enctype="multipart/form-data" onSubmit="return confirm('Do you want to continue?') ">
<div class="modal fade" id="editGrp1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Grade</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">                                    
                            <!-- <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="subtask" name="subtask" placeholder="Subtask Name"> -->
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo ($_SESSION['userUid']); ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Subtask Status Changed" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="number" name="grade" id="grade" class="form-control" required>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Grade" value="Edit Status">
                    <input type="hidden" name="grp1" id="grp1" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditGrp1", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myGrp1Id = _self.data('id');
        $("#grp1").val(myGrp1Id);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<form action="../includes/p-editindivgrp1.inc.php" method='post' id="contact-form" enctype="multipart/form-data" onSubmit="return confirm('Do you want to continue?') ">
<div class="modal fade" id="editIndiv1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Grade</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">                                    
                            <!-- <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="subtask" name="subtask" placeholder="Subtask Name"> -->
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo ($_SESSION['userUid']); ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Subtask Status Changed" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="number" name="grade" id="grade" class="form-control" required>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Grade" value="Edit Status">
                    <input type="hidden" name="indiv" id="indiv" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditIndiv1", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myIndivId = _self.data('id');
        $("#indiv").val(myIndivId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>


<script src="assets/bundles/lib.vendor.bundle.js"></script>

<script src="assets/bundles/apexcharts.bundle.js"></script>
<script src="assets/bundles/counterup.bundle.js"></script>
<script src="assets/bundles/knobjs.bundle.js"></script>
<script src="assets/bundles/c3.bundle.js"></script>

<script src="assets/js/core.js"></script>
<script src="assets/js/page/project-index.js"></script>



<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>

</html>

<?php
      }
?>