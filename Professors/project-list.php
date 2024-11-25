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

<title>TaskTalk - Project List</title>

<!--Notification using PHP Ajax Bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">

<!-- Plugins css -->
<link rel="stylesheet" href="assets/plugins/charts-c3/c3.min.css"/>

<!-- Core css -->
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/main1.css"/>
<link rel="stylesheet" href="assets/css/theme1.css"/>
<link href="../assets/css/style.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    $("#course").change(function(){
        var deptid = $(this).val();

        $.ajax({
            url: '../getSection.php',
            type: 'post',
            data: {depart:deptid},
            dataType: 'json',
            success:function(response){

            var len = response.length;

            $("#section").empty();
                for( var i = 0; i<len; i++){
                    var idSection = response[i]['idSection'];
                    var section = response[i]['section'];

                    $("#section").append("<option value='"+idSection+"'>"+section+"</option>");
                    
                }
            }
        });
    });
});
</script>


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
                <li class="active"><a href="project-list.php"><i ></i><img src="assets/images/subjects.png"><span style="margin-left:5px;"> Project List</span></a></li> 
                <li><a href="grade-book.php"><i ></i><img src="assets/images/grade-book.png"><span style="margin-left:5px;">  Grade Book</span></a></li>
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
                            <!-- <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/message_30px.png"><span class="badge badge-success nav-unread"></span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="right_chat list-unstyled w350 p-0">
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object" src="assets/images/xs/jose.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Jose Enrico Leuterio</span>
                                                    <div class="message">Nagawa mo na ba task mo?</div>
                                                    <small>11 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/ron.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Ronron pog</span>
                                                    <div class="message">Gawin mo na yung binigay sayong task tangek</div>
                                                    <small>18 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/cosmok.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Guian Cosmok</span>
                                                    <div class="message">Ikikick na talaga kita pag di mo yan ginawa.</div>
                                                    <small>27 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/bucs.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Vincent Bucao</span>
                                                    <div class="message">Pre. Patulong naman ako sa task ko.</div>
                                                    <small>33 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>                        
                                    </ul>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                </div>
                            </div> -->
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
                                            <input type="submit" class="dropdown-item" name="logout-submit" value="Sign Out" style="padding-right: 100px;">
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
        <!-- ======= Hero Section ======= -->

        <div class="section mt-3">
            <div class="section">
                <div class="container-fluid">
                    
                    <section id="services" class="services">
                        <div class="row clearfix row-deck">
                            <div class="col-xl-12 col-lg-14 col-md-14">
                                <div class="container" data-aos="fade-up">

                                    <div class="section-title">
                                        <br><br>
                                        <h2>Collaboration</h2>
                                        <p>Project List</p>
                                    </div>
                            
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-md-flex justify-content-between align-items-center">
                                                <ul class="nav nav-tabs page-header-tab">
                                                    <li class="nav-item" ><a class="nav-link active" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-list"><i class="bi bi-list"></i></a></li>
                                                    <li class="nav-item"><a class="nav-link" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-grid"><i class="bi bi-grid-fill"></i></a></li>
                                                </ul>
                                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtask">Add</button> -->
                                            </div>
                                            
                                            <span style="float: right;">
                                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addsubj"><img src="assets/images/add-subject.png">Add Subject</button>
                                                &nbsp;&nbsp;  
                                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addproject"><img src="assets/images/add-subject.png">Add Collaboration</button></span>
                                        </div>
                                    </div>
                                    
                                    <!--------------------------------------------------------------------------- Tasks ------------------------------------------------------------------>
                                    <section id="services" class="services">
                                        <div class="row clearfix row-deck">
                                            <div class="col-xl-12 col-lg-14 col-md-14">
                                                <div class="container" data-aos="fade-up">
                                                    <div class="tab-content taskboard">
                                                        <div class="tab-pane fade show active" id="TaskBoard-list" role="tabpanel">

                                                        <?php
                                                                $query = mysqli_query($conn, "SELECT distinct subject FROM subj_add where uidUsers='".($_SESSION['userUid'])."' order by idSubjects");
                                                                $array = array();

                                                                    while($row = mysqli_fetch_assoc($query)){
                                                                        $array[] = $row;
                                                            ?>
                                                            <br><br>
                                                            <div class="section-title">
                                                                <div class="header-action d-md-flex"  style="float:right;">
                                                                    <a data-id="<?php echo $row['subject'];?>" title="Add Section" class="btn btn-primary open-AddSec" href="#addSection" style="font-color:#000;"><img src="assets/images/add-section.png">Add Section</a>
                                                                </div>
                                                                <!-- <br> -->
                                                                <h2><?php echo $row['subject'];?></h2>
                                                            </div>

                                                            <div class="row">
                                                                <?php
                                                                    $quer = mysqli_query($conn, "SELECT distinct section,course FROM section_add where uidUsers='".($_SESSION['userUid'])."' and subject='".($row['subject'])."'");
                                                                    $arrs = array();

                                                                        while($row1 = mysqli_fetch_assoc($quer)){
                                                                            $arrs[] = $row1;
                                                                ?>   
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="card border-left-warning shadow h-100 py-2" style="width: 1050px;">
                                                                        <form method="GET" action="projects.php?">
                                                                            <div class="card-body"></form>
                                                                                <div class="row no-gutters align-items-center">
                                                                                    <div class="col mr-2">
                                                                                        
                                                                                        <!-- <div class="text-xs font-weight-bold text-uppercase mb-1">shdkhsdkj</div> -->
                                                                                        
                                                                                        <?php
                                                                                            $sql_que = mysqli_query($conn, "SELECT distinct * FROM section where idSection='".($row1['section']). "'");
                                                                                            $qu = mysqli_fetch_assoc($sql_que);
                                                                                        ?>

                                                                                        <?php
                                                                                        $result = mysqli_query($conn, "SELECT distinct * FROM course where idCourse='".($row1['course']). "'");
                                                                                        $res = mysqli_fetch_assoc($result);
                                                                                        ?>

                                                                                        <button type="submit" class="btn">
                                                                                            <div class="text-xs font-weight-bold text-uppercase mb-1"><a><?php echo $res['depart_name'];?></a></div>
                                                                                            <input type="hidden" class="card-title"name="course" value="<?php echo $row1['course'];?>">
                                                                                            <input type="hidden" class="card-title"name="section" value="<?php echo $row1['section'];?>">
                                                                                            <input type="hidden" class="card-title"name="subject" value="<?php echo $row['subject'];?>">
                                                                                        </button>

                                                                                        <!-- <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo $res['depart_name'];?></div> -->
                                                                                        <!-- <div class="h5 mb-0 font-weight-100" style="font-size:18px;"><?php echo $res['depart_name'];?></div> -->
                                                                                        <div class="h5 mb-0 font-weight-lighter" style="font-size:15px; margin-left: 12px;"><?php echo $qu['section'];?></div>
                                                                                    </div>

                                                                                    <!-- <a data-id="<?php echo $row1['section'];?>" data-course-id="<?php echo $row1['course'];?>" data-subj-id="<?php echo $row['subject'];?>" title="Add Project" class="btn btn-primarydone open-AddProject" href="#addProject" style="font-color:#000;"><i class="bi bi-pencil-square"></i></a> -->
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>   
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                            </div>   
                                                            <?php  }?>  
                                                        </div>

                                                        <!------------------------------------------------------------- Task Grid --------------------------------------------------------------- -->
                                                        <div class="tab-pane fade" id="TaskBoard-grid" role="tabpanel">
                                                            <section id="services" class="services">
                                                                <div class="row clearfix row-deck">
                                                                    <div class="col-xl-12 col-lg-14 col-md-14">
                                                                        <div class="container" data-aos="fade-up"> 
                                                                            <div class="row">
                                                                                <?php
                                                                                    $query = mysqli_query($conn, "SELECT * FROM projects WHERE createdby='".$_SESSION['userUid']."' order by id DESC");
                                                                                    // $query = mysqli_query($conn, "SELECT * FROM projects ");
                                                                                    $array = array();
                                                                                                                
                                                                                    $x=0;
                                                                                    while($row = mysqli_fetch_assoc($query)){                            
                                                                                        $array[] = $row;
                                                                                        $x++;
                                                                                ?>
                                                                                <div class="col-lg-4 col-md-6 " data-aos="zoom-in" data-aos-delay="100">
                                                                                    <form method="GET" action="project-board.php?">
                                                                                    <div class="icon-box"></form>
                                                                                        <div class="icon"><i class="bx bx-file"></i></div>
                                                                                            <button type="submit" class="btn">
                                                                                                <h4><a><?php echo $row['projname'];?></a></h4>
                                                                                                <input type="hidden" class="card-title"name="course" value="<?php echo $row['course'];?>">
                                                                                                <input type="hidden" class="card-title"name="section" value="<?php echo $row['section'];?>">
                                                                                                <input type="hidden" class="card-title"name="subject" value="<?php echo $row['subj_name'];?>">
                                                                                                <input type="hidden" class="card-title"name="id" value="<?php echo $row['id'];?>">
                                                                                                <input type="hidden" class="card-title"name="projname" value="<?php echo $row['projname'];?>">
                                                                                            </button>

                                                                                            <?php 
                                                                                                $query3 = mysqli_query($conn, "SELECT * FROM section WHERE idSection='".$row['section']."'");
                                                                                                $row3= mysqli_fetch_assoc($query3);
                                                                                            ?>
                                                                                            <p title="<?php echo $row['subj_name']." - ". $row3['section'] ;?>"><?php echo substr($row['subj_name'],0,10) . '...'." - ". $row3['section'] ;?></p>
                                                                                            <p>Total Grade: <?php echo $row['score'];?></p>
                                                                                            <p>Due Date: <?php echo $row['duedate'];?></p>
                                                                                            <p>Project Code: <?php echo $row['projcode'];?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div><br><br>
                                                    </div>                
                                                </div>
                                            </div>                
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>                
                    </section>
                </div>
            </div>  
        </div>  
    </div>
</div>

<form action="../includes/p-projectspl.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="addproject" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Add Collaborative Project</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">

                    <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" id="projn" name="projn" placeholder="Project Name" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" id="projd" name="projd" placeholder="Project Description" required></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">                            
                            <select id="subject" name="subject" class="form-control" required>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM subject");
                                    $array = array();

                                    while($data = mysqli_fetch_assoc($query)){
                                        $array[] = $data;
                                ?>
                                
                                <option selected hidden value="">Select Subject</option>
                                <option value="<?php echo $data['subject_title']; ?>"><?php echo $data['subject_title']; ?></option>
                                <?php
                                    }
                                ?>
                            </select> 
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">                                    
                            <select id="course" name="course" class="form-control" required>
                            <option selected hidden value="">Course</option>
                                <?php
                                // Fetch Department
                                    $sql_course = "SELECT * FROM course";
                                    $course_data = mysqli_query($conn,$sql_course);
                            
                                    while($row = mysqli_fetch_assoc($course_data) ){
                                        $departid = $row['idCourse'];
                                        $depart_name = $row['depart_name'];
                                                        
                                        // Option
                                        echo "<option value='".$departid."' >".$depart_name."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">                                    
                            <select id="section" name="section" class="form-control" required>
                                <option selected hidden value="" >Choose a course first</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <div class="form-group">
                            <input type="number" class="form-control" id="grpno" name="grpno" placeholder="Number of Groups">
                        </div>
                    </div> -->

                    <div class="col-12">
                        <div class="form-group">   
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                <label for='leader[]'>Select multiple leaders using the ctrl + click command:</label><br>
                                <select multiple="multiple" name="leader[]" class="form-control" required>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                    $array = array();

                                    while($data = mysqli_fetch_assoc($query)){
                                    $array[] = $data;
                                ?>
                                    <option value="<?php echo $data['uidUsers'];?>"><?php echo ($data['f_name']. " " .$data['l_name']);?></option>
                                <?php } ?>
                                </select><br>
                            </form>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">                                
                            <input type="number" class="form-control" id="score" name="score" placeholder="Overall Score" required>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <h7>Criteria : </h7>
                        <div class="form-group">    
                            <input type="file" class="form-control" name="file" size="40" multiple required>                                
                            <input type="hidden" class="form-control" id="uploadedby" name="uploadedby" value="<?php  echo $_SESSION['userUid']; ?>" readonly>
                        </div>
                    </div>
                    

                    <div class="col-12">
                        <h7>Due : </h7>
                        <div class="form-group">                                 
                             <input type="date" id="due" name="due" class="form-control" required>
                        </div>

                        <div class="form-group">                                    
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php echo $_SESSION['userUid']; ?>" readonly>
                        </div>
                    </div>
                      
                </div>

                <div class="modal-footer">
                    <input type="submit" onclick="myFunction()" class="btn btn-primary"  name="Add-Button" value="Add Project">
                    <input type="hidden" id="uid" name="uid" value="<?php echo ($_SESSION['userUid']);?>" readonly>
                    <input type="hidden" id="action" name="action" value="Add Project" readonly>
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form> 

<!-- Add Subject -->
<form action="../includes/p-subj.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
    <div class="modal fade" id="addsubj" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel1">Add Subject</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                                                        
                                <div class="form-group">                            
                                    <select id="subject" name="subject" class="form-control" required>
                                        <?php
                                            $query = mysqli_query($conn, "SELECT * FROM subject");
                                            $array = array();

                                            while($data = mysqli_fetch_assoc($query)){
                                                $array[] = $data;
                                            ?>
                                                <option selected hidden value="">Select Subject</option>
                                                <option value="<?php echo $data['subject_title']; ?>"><?php echo $data['subject_title']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select> 
                                </div>

                                            
                                <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                <input type="hidden" id="action" name="action" value="Add Subject" readonly>
                            </div>
                        </div>             
                    </div>
                    <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Add-Subject" value="Add">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</form>

<!-- Add Section -->
<form action="../includes/p-sect.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){

        $("#course1").change(function(){
            var deptid1 = $(this).val();

            $.ajax({
                url: '../getSection1.php',
                type: 'post',
                data: {depart1:deptid1},
                dataType: 'json',
                success:function(response){

                var len = response.length;

                $("#section1").empty();
                    for( var i = 0; i<len; i++){
                        var idSection1 = response[i]['idSection'];
                        var section1 = response[i]['section'];

                        $("#section1").append("<option value='"+idSection1+"'>"+section1+"</option>");
                        
                    }
                }
            });
        });
    });
    </script>

    <div class="modal fade" id="addSection" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel1">Add Section</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">

                                <h6 class="title" id="defaultModalLabel">Course</h6>
                                    
                                <div class="form-group">                                    
                                    <select id="course1" name="course1" class="form-control">
                                        <option value="0">-Select Course-</option>
                                        <?php
                                        // Fetch Department
                                        $sql_course = "SELECT * FROM course";
                                        $course_data = mysqli_query($conn,$sql_course);
                                        while($row = mysqli_fetch_assoc($course_data) ){
                                            $departid = $row['idCourse'];
                                            $depart_name = $row['depart_name'];
                                        
                                            // Option
                                            echo "<option value='".$departid."' >".$depart_name."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                                    
                                <h6 class="title" id="defaultModalLabel">Year and Section</h6>
                                    
                                <div class="form-group">                                    
                                    <select id="section1" name="section1" class="form-control">
                                        <option value="0">-Select Year and Section-</option>
                                    </select>
                                </div>
                    
                                <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                <input type="hidden" id="action" name="action" value="Add-Section" readonly>
                            </div>
                        </div>       
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="sub" id="sub" value="" />
                        <input type="submit"  class="btn btn-primary"  name="Add-Section" value="Add Section">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on("click", ".open-AddSec", function (e) {

        e.preventDefault();

        var _self = $(this);

        var mySubId = _self.data('id');
        $("#sub").val(mySubId);

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

<!-- Vendor JS Files -->
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/purecounter/purecounter.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main1.js"></script>

</body>
</html>

<?php
      }
?>