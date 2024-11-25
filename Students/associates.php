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

<title>TaskTalk - Associates</title>

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
                    <a href="../s-index.php" class="nav-link icon"><img src="assets/images/home_30px.png"></a>
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
            <?php

                $sql1 = "SELECT AVG(total) AS avg FROM peer_grading WHERE member = '".$_SESSION['userUid']."'";
                $average = mysqli_query($conn, $sql1);

                while ($row = mysqli_fetch_assoc($average)){
                    $output = $row['avg'];
                }

                $sql2 = "SELECT SUM(total) AS sum FROM peer_grading WHERE member = '".$_SESSION['userUid']."'";
                $current = mysqli_query($conn, $sql2);

                while ($row1 = mysqli_fetch_assoc($current)){
                    $output1 = $row1['sum'];
                }

                $percent = $output;
                                    
            ?>
            <div class="d-flex align-items-baseline mt-3">
                <h1 class="mb-0 mr-2"><?php echo $percent;?></h1>
                <p class="mb-0"><span class="text-success"><?php echo round($output,2);?>%<i class="fa fa-arrow-up"></i></span></p>
            </div>
            <div class="progress progress-xs">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percent?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h6 class="text-uppercase font-10 mt-1">Performance Score</h6>
            <hr>
            <p>Activity</p>
            <ul class="new_timeline">
            <?php
                $sql3 = mysqli_query($conn,"SELECT * FROM tasks WHERE (taskmember = '".$_SESSION['userUid']."' OR leader = '".$_SESSION['userUid']."') AND taskstat = 'On-Going' ORDER BY id DESC LIMIT 2");
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
                $sql4 = mysqli_query($conn,"SELECT * FROM projects WHERE (leader  RLIKE '".$_SESSION['userUid']."') AND projstat = 'On-Going' ORDER BY id DESC LIMIT 2");
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
                <li><a href="taskboard.php"><i ></i><img src="assets/images/task-icon.png"><span style="margin-left:10px;"> Taskboard</span></a></li>
                <li><a href="gradebook.php"><i ></i><img src="assets/images/grade-book.png"><span style="margin-left:6px;"> Grade Book</span></a></li>
                <li class="active"><a href="associates.php"><i ></i><img src="assets/images/associates.png"><span style="margin-left:5px;"> Associates</span></a></li>          
                
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
                                    <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/notif_30px.png"> 
                                        <?php
                                        $query = "SELECT * from `notifications` where 
                                        (`uidUsers` != '".$_SESSION['userUid']."' AND `leader` = '".$_SESSION['userUid']."' AND `members` = '')
                                        AND `status` = 'unread' OR
                                        (`uidUsers` != '".$_SESSION['userUid']."' AND `members` = '".$_SESSION['userUid']."' OR ( `uidUsers` != '".$_SESSION['userUid']."' AND `members` = '' AND `action` = 'Post Comment'))

                                        AND `status` = 'unread'
                                        order by `date` DESC";


                                        
                                        if(count(fetchAll($query))>0){
                                        ?>
                                        <span class="badge badge-primary nav-unread"></span>
                                        <?php
                                            }
                                                ?>
                                        </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="dropdown01">
                                                <?php
                                                $query = "SELECT * from `notifications` 
                                                WHERE 
                                                (`uidUsers` != '".$_SESSION['userUid']."' AND `leader` = '".$_SESSION['userUid']."' AND `members` = '')

                                                OR
                                                (`uidUsers` != '".$_SESSION['userUid']."' AND `members` = '".$_SESSION['userUid']."' OR ( `uidUsers` != '".$_SESSION['userUid']."' AND `members` = '' AND `action` = 'Post Comment'))
                                                

                                                
                                                order by `date` DESC";
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
                                                    echo ucfirst($i['uidUsers']). " commented on a post in " .$row['projname'].".";
                                                }
                                                else if($i['action']=='Add Project'){
                                                    echo ucfirst($i['uidUsers'])." added you as a group leader in " .$row['projname'].".";
                                                }
                                                else if($i['action']=='Add Group Member'){
                                                    echo ucfirst($i['uidUsers'])." added you as a group member in "  .$row['projname'].".";
                                                }
                                                // else if($i['action']=='Add Group Members'){.$row1['projname']."."
                                                //     echo ucfirst($i['uidUsers'])." added you as a group member in " .$row['projname'].".";
                                                // }
                                                else if($i['action']=='Post Announcement'){
                                                    echo ucfirst($i['uidUsers'])." posted an announcement in " .$row['projname'].".";
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


<!--======================main page================================================================================================================================================-->

        <div class="section mt-3">
            <div class="section">
                <div class="container-fluid">
                    <section id="services" class="services">
                    <div class="row clearfix row-deck">
                        <div class="col-xl-12 col-lg-14 col-md-14">
                            <div class="container" data-aos="fade-up">

                                <div class="section-title">
                                    <h2>ASSOCIATES</h2>
                                    <p>Students</p>
                                </div>

                                <div class="row">
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM user where userType ='student' AND course='".$_SESSION['course']."' AND section='".$_SESSION['section']."' AND uidUsers != '".$_SESSION['userUid']."'");
                                    $array = array();

                                    while($row = mysqli_fetch_assoc($query)){
                                        $array[] = $row;
                                ?>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center ribbon">
                                            <?php echo'<img id="userDp" class="rounded-circle img-thumbnail w100" alt="" src=../uploads/'.$row["userImg"].'>'?>
                                            <h6 class="mt-3 mb-0"><?php echo $row['f_name']. " " .$row['l_name']; ?></h6>
                                            <?php
                                                $sect = mysqli_query($conn, "SELECT * FROM section where idSection='".$row['section']."'");
                                                $sec = mysqli_fetch_assoc($sect);
                                            ?>
                                            <span><?php echo $sec['section'];?></span>
                                            <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                            </ul>
                                            <form action="page-profile-associates.php?" method='get'>
                                                <input type="hidden" id="id" name="id" value="<?= $row['idUsers']?>">
                                                <!-- <input type="hidden" id="id" name="id" value="<?= $row['uidUsers']?>"> -->
                                                <button class="btn btn-default btn-sm">View Profile</button>
                                            </form>
                                            <!-- <button class="btn btn-default btn-sm">Message</button> -->
                                            <div class="row text-center mt-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <?php
                                        }
                                ?>  
                                </div>
                                <br><br>
                            </div> 
                        </div>      
                    </div>
                    </section>
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
</div>

<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="assets/plugins/dropify/js/dropify.min.js"></script>
<script src="assets/js/core.js"></script>
<script src="assets/js/form/dropify.js"></script>
</body>

<!-- soccer/project/project-clients.php  07 Jan 2020 03:41:29 GMT -->
</html>

<?php
      }
?>