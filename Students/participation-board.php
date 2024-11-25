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

<title>Participation Board - Group <?php echo $_GET['grpno'];?></title>

<!--Notification using PHP Ajax Bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
<!-- <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" /> -->
<link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="assets/plugins/nestable/jquery-nestable.css"/>

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
<!-- <link rel="stylesheet" href="assets/css/main2.css"/> -->
<link rel="stylesheet" href="assets/css/noscript2.css"/>
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
                <li class="active"><a href="project-list.php"><i></i><img src="assets/images/subjects.png"><span style="margin-left:5px;"> Project List</span></a></li>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:60px;"><span>Leader</span></a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php
                            $user_id = $_SESSION['userUid'];
                            $query = mysqli_query($conn, "SELECT * FROM projects WHERE leader RLIKE '[[:<:]]".$user_id."[[:>:]]'");
                            // $query = mysqli_query($conn, "SELECT * FROM projects ");
                            $array = array();
                                                                                
                            $x=0;
                                while($row = mysqli_fetch_assoc($query)){                            
                                $array[] = $row;
                                $x++;
                        ?>
                        <?php
                            $query1 = mysqli_query($conn, "SELECT * FROM groups WHERE leader='".$_SESSION['userUid']."' AND projid= '".$row['id']."'") or die(mysql_error());
                            $list1 = mysqli_fetch_assoc($query1);
                        ?>
                            <a class="dropdown-item" href="collaboration-board.php?course=<?php echo $row["course"]?>&section=<?php echo $row["section"]?>&subject=<?php echo $row["subj_name"]?>&id=<?php echo $row["id"]?>&projname=<?php echo $row["projname"]?>&grpno=<?php echo $list1["groupno"]?>&grpid=<?php echo $list1["idGroups"]?>&leader=<?php echo $list1['leader'];?>"><span><?php echo $row["projname"];?></span></a>
                        <?php }?>  
                    </div>
                </div>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:60px;"><span>Member</span></a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php
                            $user_id = $_SESSION['userUid'];
                            $query = mysqli_query($conn, "SELECT * FROM groups WHERE members RLIKE '[[:<:]]".$user_id."[[:>:]]'");
                            $arr = array();

                            while ($row = mysqli_fetch_assoc($query)){
                                $arr[] = $row;
                                $proj = mysqli_query($conn, "SELECT * FROM projects WHERE id ='".$row['projid']."'");
                                $projr = mysqli_fetch_assoc($proj);
                        ?>
                            <a class="dropdown-item" href="participation-board.php?course=<?php echo $row["course"]?>&section=<?php echo $row["section"]?>&subject=<?php echo $row["subject"]?>&id=<?php echo $row["projid"]?>&projname=<?php echo $projr["projname"]?>&grpno=<?php echo $row["groupno"]?>&grpid=<?php echo $row["idGroups"]?>&leader=<?php echo $row['leader'];?>"><span><?php echo $projr["projname"];?></span></a>
                        <?php }?>  
                    </div>
                </div>

                <li><a href="taskboard.php"><i ></i><img src="assets/images/task-icon.png"><span style="margin-left:10px;"> Taskboard</span></a></li>
                <li><a href="gradebook.php"><i ></i><img src="assets/images/grade-book.png"><span style="margin-left:6px;"> Grade Book</span></a></li>
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
                            <input type="text" class="form-control" style="text-align:left; margin-top:0px; margin-left:0px;" placeholder="Search for...">
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



        <!-- main page =============================================================================================================================================-->
        
        <!-- Wrapper -->
		<div id="wrapper">

        <!-- Header -->
            <header id="header" class="alt">
                
            <?php
                    $result1 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid='".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'") or die(mysql_error());
                    $list1 = mysqli_num_rows($result1);

                    if ($list1 == 0) {
                ?>
                    <p><i style="color: #b79696d1;">This project is not eligible for submission yet, kindly finish your tasks first.</i></p>
                <?php
                    }
                    else{
                            
                        $taskcomp = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'Done' AND grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                        $taskcomp_ = mysqli_num_rows($taskcomp);
                        $alltask = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                        $alltask_ = mysqli_num_rows($alltask);

                        $finals = $taskcomp_ * 100 / $alltask_;
                        // echo $finals;

                        if ($finals == 100){
                            $qstmt = mysqli_query($conn, "SELECT * FROM projsubmit where projid = '".$_GET['id']."' and grpid = '".$_GET['grpid']."'  ");
                            $rowstmt = mysqli_num_rows($qstmt);

                            if ($rowstmt ==0){
                ?>
                             <p><i style="color: #622d2df5;"><b>The project is now available for submission! Grade your peers first.</b></i></p>
                             <!-- <button type="submit" id="post-announcement" class="btn btn-primarydone" name="post-announcement" style="float: right" data-toggle="modal" data-target="#submitproj"><i style="float: right; color: #622d2df5;"><b>The project is now available for submission!</b></i></button> -->
                <?php     
                            }
                            else {
                ?>
                            <p><i style="color: #b79696d1;">The project is already submitted.</i></p>
                <?php
                            }
                        }
                        else{
                ?>
                        <p><i style="color: #b79696d1;">This project is not eligible for submission yet, kindly finish your tasks first.</i></p>
                <?php             
                        }
                    }
                    
                ?> 
                <br><br><br>
                <h1><?php echo $_GET['projname']?> - Group <?php echo $_GET['grpno'];?></h1>

                <?php
                    $qy = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$_GET['leader']."'  ");
                    $row1 = mysqli_fetch_assoc($qy);
                ?>

                <p>Leader: <?php echo ($row1['f_name']) . " " . ($row1['l_name']);?><br />

                <ul class="list-unstyled team-info mb-0">

                    <?php
                        
                        $result = mysqli_query($conn, "SELECT distinct * FROM groups WHERE projid='".$_GET['id']."' and idGroups='".$_GET['grpid']."'") or die(mysql_error());
                            while ($list = mysqli_fetch_assoc($result)) {
                                if (empty($list['members'])) {

                    ?>

                    <!-- <a data-id="<?php echo $_GET['grpno'];?>" data-lead-id="<?php echo $_GET['leader'];?>" data-grp-id="<?php echo $_GET['grpid'];?>"  title="Add this item" class="open-AddMembers" href="#addMembers" style="font-color:#000;"><i class="bi bi-person-plus-fill">  Add Members First</i></a> -->
                    
                    <?php       
                    
                                }
                                $lead = explode(',',$list['members']);  
                                foreach($lead as $c) {
                                    $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$c."'") or die(mysql_error());
                                    while ($que = mysqli_fetch_assoc($query)) {
                    ?>

                    <?php echo'<li><img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'></li>'?>
                    <?php } } } ?>
                </ul></p>
            </header>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM groups WHERE projid='".$_GET['id']."' AND idGroups='".$_GET['grpid']."'") or die(mysql_error());
            $list = mysqli_fetch_assoc($result);
                if (empty($list['members'])) {
            ?>
                    <p><a data-id="<?php echo $_GET['grpno'];?>" data-lead-id="<?php echo $_GET['leader'];?>" data-grp-id="<?php echo $_GET['grpid'];?>"  title="Add this item" class="open-AddMembers" href="#addMembers" style="font-color:#000;"><i class="bi bi-person-plus-fill">  Add Members First</i></a></p>
             <?php
                    echo "Project is empty because there are no recorded groups yet, please add your team members first";                    
                }
                else{
            ?>

        <!-- Nav -->
        
        
        <nav id="nav">
            <ul class="nav">
                <li class="nav-item"><a class="active" data-toggle="tab" href="#Announcement" style="color: #ffb224;">Announcement</a></li>
                <li class="nav-item"><a class="" data-toggle="tab" href="#Tasks" style="color: #ffb224;">Tasks</a></li>
                <li class="nav-item" style="text-align: right;"><a class="" data-toggle="tab" href="#Files" style="color: #ffb224;">Files</a></li>
                <?php
                    $result1 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid='".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'") or die(mysql_error());
                    $list1 = mysqli_num_rows($result1);

                    if ($list1 == 0) {
                ?>
                    <li class="nav-item"></li>
                <?php
                    }
                    else{
                            
                        $taskcomp = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'Done' AND grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                        $taskcomp_ = mysqli_num_rows($taskcomp);
                        $alltask = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                        $alltask_ = mysqli_num_rows($alltask);

                        $finals = $taskcomp_ * 100 / $alltask_;
                        // echo $finals;

                        if ($finals == 100){
                            $qstmt = mysqli_query($conn, "SELECT * FROM projsubmit where projid = '".$_GET['id']."' and grpid = '".$_GET['grpid']."'  ");
                            $rowstmt = mysqli_num_rows($qstmt);

                            if ($rowstmt ==0){
                ?>
                             <li class="nav-item"><a class="" data-toggle="tab" href="#Submit" style="color:#dbffaa;">Submit Form</a></li>
                <?php     
                            }
                            else {
                ?>
                            <li class="nav-item"></li>
                <?php
                            }
                        }
                        else{
                ?>
                        <li class="nav-item"></li>
                <?php             
                        }
                    }
                    
                ?>
            </ul> 
        </nav>

        <!-- Main -->
        <div id="main">
            <!-- --------------------------------------Announcement Page---------------------------------------- -->
            <div class="section-body">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Announcement" role="tabpanel">
                            <div class="row">
                                <br>
                                <div class="tab-pane fade show active" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="new_post">
                                                <form action="../includes/s-announcements-m.php" method='post' id="contact-form" enctype="multipart/form-data">
                                                <div class="form-group">

                                                    <!-- <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea> -->

                                                    <!-- script for textarea formatting -->
                                                    
                                                    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                                                    <script>tinymce.init({selector:'textarea'});</script>

                                                    <input type="text" class="form-control" style="margin-left: 0px; text-align: left;" id="title" name="title" placeholder="Title"/>
                                                    <br>
                                               
                                                    <textarea class="form-control no-resize" style="width: 860px;" id="annoucements" name="announcements" placeholder="Type your announcement"></textarea>
                                                    
                                                </div>
                                                <div class="mt-4 text-right">
                                                <button type="submit" id="post-announcement" class="btn btn-primary" name="post-announcement">
                                                     <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                                                     <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                                                     <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                                                     <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                                                     <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                                                     <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                                                     <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                                                     <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo $_SESSION['userUid']; ?>">
                                                     <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                                                     <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                                     Post</button>
                                                    
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $query = mysqli_query($conn, "SELECT * FROM announcements WHERE projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."' AND grpid = '".$_GET['grpid']."'  ORDER BY datetime DESC");
                                        $array = array();

                                        while($row = mysqli_fetch_assoc($query)){
                                         $array[] = $row;
                                    ?>

<div class="card blog_single_post">
                                        <ul class="list-group card-list-group" >
                                            <li class="list-group-item py-5" style="background:linear-gradient(120deg, #6bbbc7, #5a4cd4cc);">
                                            <!-- background: linear-gradient(120deg, #e2fffa, #30508b); -->
                                                <div class="media">
                                                    <div class="card-body">                                    
                                                        <span></span>
                                                        <h4><a href="#"><?php echo $row['title']?></a></h4>
                                                        <p><?php echo $row['datetime'] ?></p>
                                                        <div class="actions">
                                                            <?php
                                                                $query1 = mysqli_query($conn, "SELECT * FROM user where uidUsers = '".$row['user']."'");
                                                                $name = mysqli_fetch_assoc($query1);
                                                            ?>
                                                            <p><?php echo $row['text'] ?><br><i style="font-size:11px;"><?php echo ($name['f_name']) . " " . ($name['l_name']);?></i></p>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <?php
                                            $query1 = mysqli_query($conn, "SELECT * FROM comments where (postid = '".$row['id']."' AND projid='".$_GET['id']."' AND grpid='".$_GET['grpid']."')  OR (course='".$_GET['course']."' AND section='".$_GET['section']."' AND subject='".$_GET['subject']."') ORDER BY datetime DESC");
                                            $array1 = array();

                                            while($row1 = mysqli_fetch_assoc($query1)){
                                            $array1[] = $row1;
                                        ?>
                                        <div>
                                            <ul class="list-group card-list-group">
                                                <li class="list-group-item py-5">
                                                    <div class="media">
                                                    <?php
                                                            $query2 = mysqli_query($conn, "SELECT * FROM user where uidUsers = '".$row1['user']."'");
                                                            $row2 = mysqli_fetch_assoc($query2);
                                                        ?>
                                                        <?php echo'<img class="media-object avatar avatar-md mr-4" title="'.($row2['f_name']. " " .$row2['l_name']).'" src=../uploads/'.$row2['userImg'].'>'?> 
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <small class="float-right text-muted"><?php echo $row1['datetime']?></small>
                                                                <h5><?php  echo ($row2['f_name']) . " " . ($row2['l_name']); ?></h5>
                                                            </div>
                                                            <div>
                                                                <?php echo $row1['comment']?>
                                                            </div>
                                                            <!-- <ul class="media-list">
                                                                <li class="media mt-4">
                                                                    <img class="media-object avatar mr-4" src="assets/images/xs/bucs.png" alt=""/>
                                                                    <div class="media-body">
                                                                        <strong>Vincent Bucao: </strong>
                                                                        Omsimize. ♥
                                                                    </div>
                                                                </li>
                                                            </ul> -->
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php } ?>
                                        <div style="border-top: 3px solid #bbb;">
                                            <form action="../includes/s-comments-m.php" method='post' id="contact-form" enctype="multipart/form-data">
                                                <div class="form-group">

                                                    <input type="text" class="form-control" style="margin-left: 20px; width: 860px; text-align: left;" id="comment" name="comment" placeholder="Add a comment"/>
                                                    <br>
                                                    <button type="submit" id="post-comments" name="post-comments" style="margin-right: 20px; float: right;"  class="btn btn-outline-secondary">
                                                        <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                                                        <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                                                        <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                                                        <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                                                        <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                                                        <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                                                        <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                                                        <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo $row['createdby']; ?>">
                                                        <input type="hidden" class="form-control" id="postid" name="postid" value="<?php  echo $row['id']; ?>">
                                                        <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                                                        <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                                    Comment</button>
                                                    <br>
                                                    <br>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                        <!-- ----------------------------------------------Tasks----------------------------------------------- -->
                        <div class="tab-pane fade" id="Tasks" role="tabpanel">
                            
                            <div class="section-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-md-flex justify-content-between align-items-center">
                                                <ul class="nav nav-tabs page-header-tab">
                                                    <li class="nav-item" ><a class="nav-link active" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-list"><i class="bi bi-list"></i></a></li>
                                                    <li class="nav-item"><a class="nav-link" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-grid"><i class="bi bi-grid-fill"></i></a></li>
                                                </ul>
                                                <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addtask">Add Task</button> -->
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $result1 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid='".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'") or die(mysql_error());
                                        $list1 = mysqli_num_rows($result1);
                                        $result2 = mysqli_query($conn, "SELECT * FROM subtasks WHERE grpid='".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'") or die(mysql_error());
                                        $list2 = mysqli_num_rows($result2);
                                            if ($list1 == 0) {
                                    ?>
                                    <div class="row clearfix mt-2">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h6>Planned</h6>
                                                    <input type="text" class="knob" value="0" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h6>In progress</h6>
                                                    <input type="text" class="knob" value="0" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h6>Completed</h6>
                                                    <input type="text" class="knob" value="0" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h6>Incomplete</h6>
                                                    <input type="text" class="knob" value="0" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                            elseif ($list2 == 0) {
                                           
                                    ?>
                                    <div class="row clearfix mt-2">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <?php
                                                        $stat = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'Pending' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'");
                                                        $stat_ = mysqli_num_rows($stat);
                                                        $stat1 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'");
                                                        $stat1_ = mysqli_num_rows($stat1);

                                                        $finalstat = $stat_ * 100 / $stat1_;
                                                    ?>
                                                    <h6>Planned</h6>
                                                    <input type="text" class="knob" value="<?php echo round($finalstat,0);?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <?php
                                                        $stat2 = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'On-Going' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                        $stat2_ = mysqli_num_rows($stat2);
                                                        $stat3 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                        $stat3_ = mysqli_num_rows($stat3);

                                                        $finalstat1 = $stat2_ * 100 / $stat3_;
                                                    ?>
                                                    <h6>In progress</h6>
                                                    <input type="text" class="knob" value="<?php echo round($finalstat1,0);?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <?php
                                                        $stat4 = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'Done' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                        $stat4_ = mysqli_num_rows($stat4);
                                                        $stat5 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                        $stat5_ = mysqli_num_rows($stat5);

                                                        $finalstat2 = $stat4_ * 100 / $stat5_;
                                                        
                                                    ?>
                                                    <h6>Completed</h6>
                                                    <input type="text" class="knob" value="<?php echo round($finalstat2,0);?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <?php
                                                        $stat6 = mysqli_query($conn, "SELECT * FROM tasks WHERE (taskstat = 'On-Going' OR taskstat = 'Pending' OR taskstat = 'On-Hold') AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'");
                                                        $stat6_ = mysqli_num_rows($stat6);

                                                        $stat7 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'");
                                                        $stat7_ = mysqli_num_rows($stat7);

                                                        $finalstat3 = $stat6_ * 100 / $stat7_;
                                                    ?>
                                                    <h6>Incomplete</h6>
                                                    <input type="text" class="knob" value="<?php echo round($finalstat3,0);?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                            else{
                                    ?>
                                    <div class="row clearfix mt-2">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                <?php
                                                    $sql1 = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'Pending' AND grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                    $numerator = mysqli_num_rows($sql1);
                                                    $sql2 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                    $denominator = mysqli_num_rows($sql2);

                                                    $sum = $numerator * 100 / $denominator;
                                                ?>
                                                    <h6>Planned</h6>
                                                    <input type="text" class="knob" value="<?php echo round($sum,0); ?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                <?php
                                                    $sql3 = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'On-Going' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                    $sql3_ = mysqli_num_rows($sql3);
                                                    $sql4 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                    $sql4_ = mysqli_num_rows($sql4);
                                                    $sql5 = mysqli_query($conn, "SELECT * FROM subtasks WHERE status = 'On-Going' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."'AND grpno = '".$_GET['grpno']."'");
                                                    $sql5_ = mysqli_num_rows($sql5);
                                                    $sql6 = mysqli_query($conn, "SELECT * FROM subtasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                    $sql6_ = mysqli_num_rows($sql6);

                                                    $sum1 = $sql3_ + $sql5_; 
                                                    $sum2 = $sql4_ + $sql6_; 

                                                    $finalsum = $sum1 * 100 / $sum2;
                                                ?>
                                                    <h6>In progress</h6>
                                                    <input type="text" class="knob" value="<?php echo round($finalsum,0); ?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                <?php
                                                    $sql7 = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'Done' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                    $sql7_ = mysqli_num_rows($sql7);
                                                    $sql8 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                    $sql8_ = mysqli_num_rows($sql8);

                                                    $finalsum1 = $sql7_ * 100 / $sql8_;
                                                ?>
                                                    <h6>Completed</h6>
                                                    <input type="text" class="knob" value="<?php echo round($finalsum1,0); ?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                <?php
                                                    $sql9 = mysqli_query($conn, "SELECT * FROM tasks WHERE (taskstat = 'On-Going' OR taskstat = 'Pending' OR taskstat = 'On-Hold') AND grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                    $sql9_ = mysqli_num_rows($sql9);
                                                    $sql10 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'");
                                                    $sql10_ = mysqli_num_rows($sql10);
                                                    
                                                    $finalsum2 = $sql9_ * 100 / $sql10_;

                                                ?>
                                                    <h6>Incomplete</h6>
                                                    <input type="text" class="knob" value="<?php echo round($finalsum2,0);?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#6e7687">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <!--------------------------------------------------------------------------- Tasks ------------------------------------------------------------------>

                            <div class="section-body">
                                <div class="container-fluid">
                                    <div class="tab-content taskboard">

                                        <div class="tab-pane fade show active" id="TaskBoard-list" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Task</th>
                                                                    <th>Team</th>
                                                                    <th>Duration</th>
                                                                    <th>Action</th>
                                                                    <th class="w200">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php

                                                                    //run query
                                                                    $query = mysqli_query($conn, "SELECT * FROM tasks where projid='".($_GET['id'])."'  and (leader='".($_GET['leader'])."' or leader = 'ALL') ");

                                                                    $array = array();
                                                                    $x = 0;

                                                                    while($row = mysqli_fetch_assoc($query)){

                                                                        $x++;
                                                                        $array[] = $row;

                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $x;?></td>
                                                                    <td>
                                                                        <h6 class="mb-0"><?php echo $row['taskname']?></h6>
                                                                        <span title="<?php echo $row['taskdesc'];?>"><?php echo substr($row['taskdesc'],0,10) . '...';?></span>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$row['taskmember']."'");
                                                                            $que = mysqli_fetch_assoc($qry1);
                                                                        ?>

                                                                        <!-- <ul class="list-unstyled team-info mb-0">
                                                                            <?php echo'<li><img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'></li>'?>
                                                                            <span"><?php echo ($que['f_name']. " " .$que['l_name']);?></span>
                                                                        </ul> -->
                                                                        
                                                                        <?php
                                                                            $qry2 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$_GET['leader']."'");
                                                                            $que1 = mysqli_fetch_assoc($qry2);
                                                                            if($row['leader'] == 'All'){
                                                                        ?>
                                                                        <span"><?php echo ($que1['f_name']. " " .$que1['l_name']);?> (All)</span>
                                                                        <?php
                                                                            }
                                                                            else{
                                                                        ?>
                                                                        <span"><?php echo ($que['f_name']. " " .$que['l_name']);?></span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-teal"><?php echo $row['tduration']?></div>
                                                                        <div class="text-pink"><?php echo $row['tend']?></div>
                                                                    </td>

                                                                    <?php
                                                                        $sub = mysqli_query($conn, "SELECT * FROM projsubmit WHERE projid = '".$_GET['id']."' AND grpid='".$_GET['grpid']."'");
                                                                        $psub = mysqli_num_rows($sub);

                                                                        if ($psub != 0){
                                                                    ?>
                                                                    <td></td>
                                                                    <?php
                                                                        }
                                                                        else{
                                                                    ?>
                                                                    <td>
                                                                        <?php
                                                                             if($row['taskmember'] != $_SESSION['userUid']){
                                                                        ?>
                                                                            
                                                                        <?php
                                                                             }
                                                                             else{
                                                                        ?>
                                                                            <a data-id="<?php echo $row['taskname'];?>"  data-task-id="<?php echo $row['id'];?>" title="Upload File" class="open-UploadFile" href="#uploadFile" style="font-color:#000;"><i class="bi bi-upload"></i></a>
                                                                        <?php
                                                                             }
                                                                        ?>
                                                                    </td>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    
                                                                    <td>
                                                                        <?php
                                                                            $sql1 = mysqli_query($conn, "SELECT * FROM subtasks WHERE taskid = '".$row['id']."' AND status = 'Done';");
                                                                            $numerator = mysqli_num_rows($sql1);
                                                                            $sql2 = mysqli_query($conn, "SELECT * FROM subtasks WHERE taskid = '".$row['id']."'");
                                                                            $denominator = mysqli_num_rows($sql2);

                                                                            if ($denominator != 0) {

                                                                            $sum1 = $numerator * 100 / $denominator;
                                                                            
                                                                        ?>
                                                                        <div class="clearfix">
                                                                            <?php
                                                                                if($sum1 != 100){
                                                                            ?>
                                                                                <div class="float-left"><strong><?php echo round($sum1,2);?>%</strong></div>
                                                                                <div class="float-right"><small class="text-muted">Progress</small></div>
                                                                                <br>
                                                                                <div class="progress progress-xs">
                                                                                    <div class="progress-bar bg-azure" role="progressbar" style="width: <?php echo $sum1;?>%" aria-valuenow="42" aria-valuemin="<?php echo $sum1;?>" aria-valuemax="100"></div>
                                                                                </div>
                                                                            <?php
                                                                                }

                                                                                else{
                                                                                    if($row['taskstat'] != 'Done'){
                                                                                        $status = 'Done';
                                                                                        $taskid = $row['id'];
                                                                                        $query = "UPDATE `tasks` SET `taskstat`='".$status."' WHERE `id` = $taskid";
                                                                                        $result = mysqli_query($conn, $query);
                                                                                        $secondsWait = 1;
                                                                                        echo date('Y-m-d H:i:s');
                                                                                        echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';
                                                                                    }
                                                                                    else {
                                                                            ?>
                                                                                <div class="float-left"><strong><?php echo $sum1;?>%</strong></div>
                                                                                <div class="float-right"><small class="text-muted">Progress</small></div>
                                                                                <br>
                                                                                <div class="progress progress-xs">
                                                                                    <div class="progress-bar bg-azure" role="progressbar" style="width: <?php echo $sum1;?>%" aria-valuenow="42" aria-valuemin="<?php echo $sum1;?>" aria-valuemax="100"></div>
                                                                                </div>
                                                                                <a data-id="<?php echo $row['id'];?>" title="Task is Complete" class="open-AddTaskstatw" href="#addTaskstatw" style="font-color:#000;">Done</a>
                                                                            <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                        <?php 
                                                                            }
                                                                            else{

                                                                                if($row['taskmember'] == $_SESSION['userUid']){
                                                                        ?>
                                                                        <?php
                                                                            $date1 = strtotime($row['tend']);
                                                                            $date2 = strtotime("now");
                                                                            
                                                                        
                                                                            if ($date1 < $date2){
                                                                        ?>
                                                                            <a data-id="<?php echo $row['id'];?>" title="Edit Status" class="tag tag-success ml-0 mr-0 open-TaskstatMember" href="#taskstatMember">Overdue (<?php echo $row['taskstat'];?>)</a>
                                                                        <?php
                                                                            }
                                                                            else{
                                                                                if($row['taskstat'] == 'Done'){
                                                                        ?>
                                                                                <a data-id="<?php echo $row['id'];?>" title="Edit Status" class="tag tag-green ml-0 mr-0 open-TaskstatMember" href="#taskstatMember"><?php echo $row['taskstat'];?></a>
                                                                        <?php
                                                                                }
                                                                                elseif($row['taskstat'] == 'Pending'){
                                                                        ?>
                                                                                <a data-id="<?php echo $row['id'];?>" title="Edit Status" class="tag tag-danger ml-0 mr-0 open-TaskstatMember" href="#taskstatMember"><?php echo $row['taskstat'];?></a>
                                                                        <?php
                                                                                }
                                                                                elseif($row['taskstat'] == 'On-Going'){
                                                                        ?>
                                                                                <a data-id="<?php echo $row['id'];?>" title="Edit Status" class="tag tag-orange ml-0 mr-0 open-TaskstatMember" href="#taskstatMember"> <?php echo $row['taskstat'];?></a>
                                                                        <?php
                                                                                }
                                                                                else{
                                                                        ?>
                                                                                <span class="tag tag-info ml-0 mr-0"><?php echo $row['taskstat'];?></span>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                        <?php
                                                                                }
                                                                                else{
                                                                        ?>
                                                                        <?php
                                                                            $date1 = strtotime($row['tend']);
                                                                            $date2 = strtotime("now");
                                                                            
                                                                          
                                                                            if ($date1 < $date2){
                                                                        ?>
                                                                            <span class="tag tag-success ml-0 mr-0">Overdue (<?php echo $row['taskstat'];?>)</span>
                                                                        <?php
                                                                            }
                                                                            else{
                                                                                if($row['taskstat'] == 'Done'){
                                                                        ?>
                                                                                <span class="tag tag-green ml-0 mr-0"><?php echo $row['taskstat'];?></span>
                                                                        <?php
                                                                                }
                                                                                elseif($row['taskstat'] == 'Pending'){
                                                                        ?>
                                                                                <span class="tag tag-danger ml-0 mr-0"><?php echo $row['taskstat'];?></span>
                                                                        <?php
                                                                                }
                                                                                elseif($row['taskstat'] == 'On-Going'){
                                                                        ?>
                                                                                <span class="tag tag-orange ml-0 mr-0"><?php echo $row['taskstat'];?></span>
                                                                        <?php
                                                                                }
                                                                                else{
                                                                        ?>
                                                                                <span class="tag tag-info ml-0 mr-0"><?php echo $row['taskstat'];?></span>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
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
                                                                        <span title="<?php echo $row['taskdesc'];?>"><?php echo substr($row1['taskdesc'],0,10) . '...';?></span>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$row1['taskmember']."'");
                                                                            $que = mysqli_fetch_assoc($qry1);
                                                                        ?>

                                                                        <!-- <ul class="list-unstyled team-info mb-0">
                                                                            <?php echo'<li><img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'></li>'?>
                                                                            <span"><?php echo ($que['f_name']. " " .$que['l_name']);?></span>
                                                                        </ul> -->

                                                                        <span"><?php echo ($que['f_name']. " " .$que['l_name']);?></span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-teal"><?php echo $row1['tduration']?></div>
                                                                        <div class="text-pink"><?php echo $row1['tend']?></div>
                                                                    </td>
                                                                    <?php
                                                                        $sub1 = mysqli_query($conn, "SELECT * FROM projsubmit WHERE projid = '".$_GET['id']."' AND grpid='".$_GET['grpid']."'");
                                                                        $psub1 = mysqli_num_rows($sub1);

                                                                        if ($psub1 != 0){
                                                                    ?>
                                                                    <td></td>
                                                                    <?php
                                                                        }
                                                                        else{
                                                                            if($row1['taskmember'] == $_SESSION['userUid']){
                                                                    ?>
                                                                        <td><a data-id="<?php echo $row1['id'];?>" title="Upload File" class="open-SuploadFile" href="#suploadFile" style="font-color:#000;"><i class="bi bi-upload"></i></a>

                                                                        <a data-id="<?php echo $row['id'];?>" data-subtask-id="<?php echo $row1['id'];?>" title="Edit Subtask Status" class="open-SubstatMember" href="#substatMember" style="font-color:#000;"><i class="bi bi-pencil-square"></i></a>

                                                                        </td>
                                                                    <?php
                                                                            }
                                                                            else {
                                                                    ?> 
                                                                        <td></td>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                                    <td>
                                                                        <?php
                                                                            $date1 = strtotime($row1['tend']);
                                                                            $date2 = strtotime("now");
                                                                            
                                                                          
                                                                            if ($date1 < $date2){
                                                                        ?>
                                                                            <span class="tag tag-success ml-0 mr-0">Overdue (<?php echo $row1['status'];?>)</span>
                                                                        <?php
                                                                            }
                                                                            else{
                                                                                if($row1['status'] == 'Done'){
                                                                        ?>
                                                                                <span class="tag tag-green ml-0 mr-0"><?php echo $row1['status'];?></span>
                                                                        <?php
                                                                                }
                                                                                elseif($row1['status'] == 'Pending'){
                                                                        ?>
                                                                                <span class="tag tag-danger ml-0 mr-0"><?php echo $row1['status'];?></span>
                                                                        <?php
                                                                                }
                                                                                elseif($row1['status'] == 'On-Going'){
                                                                        ?>
                                                                                <span class="tag tag-orange ml-0 mr-0"><?php echo $row1['status'];?></span>
                                                                        <?php
                                                                                }
                                                                                else{
                                                                        ?>
                                                                                <span class="tag tag-info ml-0 mr-0"><?php echo $row1['status'];?></span>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                </form> 
                                                                </tr>
                                                                <?php } 
                                                            } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php
                                                        $result1 = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid='".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."' AND projid = '".$_GET['id']."'") or die(mysql_error());
                                                        $list1 = mysqli_num_rows($result1);

                                                        if ($list1 == 0) {
                                                    ?>
                                                        <p><i style="color: #b79696d1;">This project is not eligible for submission yet, kindly finish your tasks first.</i></p>
                                                    <?php
                                                        }
                                                        else{
                                                                
                                                            $taskcomp = mysqli_query($conn, "SELECT * FROM tasks WHERE taskstat = 'Done' AND grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                            $taskcomp_ = mysqli_num_rows($taskcomp);
                                                            $alltask = mysqli_query($conn, "SELECT * FROM tasks WHERE grpid = '".$_GET['grpid']."' AND projid = '".$_GET['id']."' AND grpno = '".$_GET['grpno']."'");
                                                            $alltask_ = mysqli_num_rows($alltask);

                                                            $finals = $taskcomp_ * 100 / $alltask_;
                                                            // echo $finals;

                                                            if ($finals == 100){

                                                                $qstmt = mysqli_query($conn, "SELECT * FROM projsubmit where projid = '".$_GET['id']."' and grpid = '".$_GET['grpid']."'  ");
                                                                $rowstmt = mysqli_num_rows($qstmt);
                
                                                                if ($rowstmt ==0){


                                                    ?>
                                                                <!-- <button type="submit" id="post-announcement" class="btn btn-primarydone" name="post-announcement" style="float: right" data-toggle="modal" data-target="#submitproj">Submit</button> -->
                                                                <p><i style="color: #b79696d1;">Grade your peers first before submission.</i></p>
                                                    <?php     
                                                                }
                                                                else {
                                                    ?>
                                                                <p><i style="color: #b79696d1;">The project is already submitted.</i></p>
                                                    <?php
                                                                }
                                                            }
                                                            else{
                                                    ?>
                                                            <p><i style="color: #b79696d1;">This project is not eligible for submission yet, kindly finish your tasks first.</i></p>
                                                    <?php             
                                                            }
                                                        }
                                                        
                                                    ?>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                         <!------------------------------------------------------------- Task Grid --------------------------------------------------------------- -->
                                        <div class="tab-pane fade" id="TaskBoard-grid" role="tabpanel">
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card planned_task">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Planned</h3>
                                                            <div class="card-options">
                                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="maximize"><i class="bi bi-arrows-expand"></i></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="dd" data-plugin="nestable">
                                                                <ol class="dd-list">

                                                                    <?php
                                                                        //run query
                                                                        $qu = mysqli_query($conn, "SELECT * FROM tasks where projid='".($_GET['id'])."'  and (leader='".($_GET['leader'])."' or leader = 'ALL') AND taskstat = 'Pending' ");

                                                                        $array = array();
                                                                        $x = 0;

                                                                        while($row = mysqli_fetch_assoc($qu)){

                                                                            $x++;
                                                                            $array[] = $row;

                                                                    ?>
                                                                    <li class="dd-item" data-id="1">
                                                                        <div class="dd-handle">
                                                                            <h6><?php echo $row['taskname']?></h6>
                                                                            <span class="time"><span><?php echo $row['tduration']?></span> to <span><?php echo $row['tend']?></span></span>
                                                                            <p><?php echo $row['taskdesc'];?></p>
                                                                            <ul class="list-unstyled team-info">
                                                                                
                                                                                <?php
                                                                                    if($row['taskmember'] == 'All'){
                                                                                ?>
                                                                                    <span"><i>ALL</i></span>
                                                                                <?php
                                                                                    }
                                                                                    else{ 
                                                                                        $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$row['taskmember']."'");
                                                                                        $que = mysqli_fetch_assoc($qry1);
                                                                                ?>
                                                                                    <?php echo'<li><img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'></li>'?>
                                                                                    <span"><i><?php echo ($que['f_name']. " " .$que['l_name']);?></i></span>
                                                                                <?php
                                                                                    }
                                                                                   
                                                                                ?>

                                                                            </ul>                                            
                                                                        </div>
                                                                    </li>
                                                                    <?php } ?>

                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card progress_task">
                                                        <div class="card-header">
                                                            <h3 class="card-title">In progress</h3>
                                                            <div class="card-options">
                                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="maximize"><i class="bi bi-arrows-expand"></i></i></a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card-body">
                                                            <div class="dd" data-plugin="nestable">
                                                                <ol class="dd-list">
                                                                    <?php
                                                                        //run query
                                                                        $qu = mysqli_query($conn, "SELECT * FROM tasks where projid='".($_GET['id'])."'  and (leader='".($_GET['leader'])."' or leader = 'ALL') AND taskstat = 'On-Going' ");

                                                                        $array = array();
                                                                        $x = 0;

                                                                        while($row = mysqli_fetch_assoc($qu)){

                                                                            $x++;
                                                                            $array[] = $row;

                                                                    ?>
                                                                    <li class="dd-item" data-id="1">
                                                                        <div class="dd-handle">
                                                                            <h6><?php echo $row['taskname']?></h6>
                                                                            <span class="time"><span><?php echo $row['tduration']?></span> to <span><?php echo $row['tend']?></span></span>
                                                                            <p><?php echo $row['taskdesc'];?></p>
                                                                            <ul class="list-unstyled team-info">
                                                                                
                                                                                <?php
                                                                                    if($row['taskmember'] == 'All'){
                                                                                ?>
                                                                                    <span"><i>ALL</i></span>
                                                                                <?php
                                                                                    }
                                                                                    else{ 
                                                                                        $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$row['taskmember']."'");
                                                                                        $que = mysqli_fetch_assoc($qry1);
                                                                                ?>
                                                                                    <?php echo'<li><img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'></li>'?>
                                                                                    <span"><i><?php echo ($que['f_name']. " " .$que['l_name']);?></i></span>
                                                                                <?php
                                                                                    }
                                                                                   
                                                                                ?>

                                                                            </ul>                                            
                                                                        </div>
                                                                    </li>
                                                                    <?php } ?>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card completed_task">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Completed</h3>
                                                            <div class="card-options">
                                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="maximize"><i class="bi bi-arrows-expand"></i></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="dd" data-plugin="nestable">
                                                                <ol class="dd-list">                                   
                                                                    <?php
                                                                        //run query
                                                                        $qu = mysqli_query($conn, "SELECT * FROM tasks where projid='".($_GET['id'])."'  and (leader='".($_GET['leader'])."' or leader = 'ALL') AND taskstat = 'Done' ");

                                                                        $array = array();
                                                                        $x = 0;

                                                                        while($row = mysqli_fetch_assoc($qu)){

                                                                            $x++;
                                                                            $array[] = $row;

                                                                    ?>
                                                                    <li class="dd-item" data-id="1">
                                                                        <div class="dd-handle">
                                                                            <h6><?php echo $row['taskname']?></h6>
                                                                            <span class="time"><span><?php echo $row['tduration']?></span> to <span><?php echo $row['tend']?></span></span>
                                                                            <p><?php echo $row['taskdesc'];?></p>
                                                                            <ul class="list-unstyled team-info">
                                                                                
                                                                                <?php
                                                                                    if($row['taskmember'] == 'All'){
                                                                                ?>
                                                                                    <span"><i>ALL</i></span>
                                                                                <?php
                                                                                    }
                                                                                    else{ 
                                                                                        $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$row['taskmember']."'");
                                                                                        $que = mysqli_fetch_assoc($qry1);
                                                                                ?>
                                                                                    <?php echo'<li><img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'></li>'?>
                                                                                    <span"><i><?php echo ($que['f_name']. " " .$que['l_name']);?></i></span>
                                                                                <?php
                                                                                    }
                                                                                   
                                                                                ?>

                                                                            </ul>                                            
                                                                        </div>
                                                                    </li>
                                                                    <?php } ?>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                
                                </div>
                            </div>
                        </div>

                        <!-- --------------------------------------------------- Files ----------------------------------------  -->
                        <div class="tab-pane fade" id="Files" role="tabpanel">
                            <!-- <form action="" method='post' id="contact-form" enctype="multipart/form-data"> -->
                            
                            <div class="section-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <style>
                                                input {
                                                    border-style: dotted;
                                                    margin-top: 20px;
                                                    margin-left: 40px;
                                                    text-align: center;
                                                    padding-block: 40px;
                                                    padding-left: 200px;
                                                    padding-right: 200px;

                                                    h2 {
                                                    font-family: "Roboto", sans-serif;
                                                    font-size: 26px;
                                                    line-height: 1;
                                                    color: $theme;
                                                    margin-bottom: 0;
                                                    }
                                                    p {
                                                    font-family: "Roboto", sans-serif;
                                                    font-size: 18px;
                                                    color: $dark-text;
                                                    }
                                                    // Upload Demo
                                                    // 
                                                    .uploader {
                                                    display: block;
                                                    clear: both;
                                                    margin: 0 auto;
                                                    width: 100%;
                                                    max-width: 600px;

                                                    label {
                                                        float: left;
                                                        clear: both;
                                                        width: 100%;
                                                        padding: 2rem 1.5rem;
                                                        text-align: center;
                                                        background: #fff;
                                                        border-radius: 7px;
                                                        border: 3px solid #eee;
                                                        transition: all .2s ease;
                                                        user-select: none;

                                                        &:hover {
                                                        border-color: $theme;
                                                        }
                                                        &.hover {
                                                        border: 3px solid $theme;
                                                        box-shadow: inset 0 0 0 6px #eee;
                                                        
                                                        #start {
                                                            i.fa {
                                                            transform: scale(0.8);
                                                            opacity: 0.3;
                                                            }
                                                        }
                                                        }
                                                    }

                                                    #start {
                                                        float: left;
                                                        clear: both;
                                                        width: 100%;
                                                        &.hidden {
                                                        display: none;
                                                        }
                                                        i.fa {
                                                        font-size: 50px;
                                                        margin-bottom: 1rem;
                                                        transition: all .2s ease-in-out;
                                                        }
                                                    }
                                                    #response {
                                                        float: left;
                                                        clear: both;
                                                        width: 100%;
                                                        &.hidden {
                                                        display: none;
                                                        }
                                                        #messages {
                                                        margin-bottom: .5rem;
                                                        }
                                                    }

                                                    #file-image {
                                                        display: inline;
                                                        margin: 0 auto .5rem auto;
                                                        width: auto;
                                                        height: auto;
                                                        max-width: 180px;
                                                        &.hidden {
                                                        display: none;
                                                        }
                                                    }
                                                    
                                                    #notimage {
                                                        display: block;
                                                        float: left;
                                                        clear: both;
                                                        width: 100%;
                                                        &.hidden {
                                                        display: none;
                                                        }
                                                    }

                                                    progress,
                                                    .progress {
                                                        // appearance: none;
                                                        display: inline;
                                                        clear: both;
                                                        margin: 0 auto;
                                                        width: 100%;
                                                        max-width: 180px;
                                                        height: 8px;
                                                        border: 0;
                                                        border-radius: 4px;
                                                        background-color: #eee;
                                                        overflow: hidden;
                                                    }

                                                    .progress[value]::-webkit-progress-bar {
                                                        border-radius: 4px;
                                                        background-color: #eee;
                                                    }

                                                    .progress[value]::-webkit-progress-value {
                                                        background: linear-gradient(to right, darken($theme,8%) 0%, $theme 50%);
                                                        border-radius: 4px; 
                                                    }
                                                    .progress[value]::-moz-progress-bar {
                                                        background: linear-gradient(to right, darken($theme,8%) 0%, $theme 50%);
                                                        border-radius: 4px; 
                                                    }

                                                    input[type="file"] {
                                                        display: none;
                                                    }

                                                    div {
                                                        margin: 0 0 .5rem 0;
                                                        color: $dark-text;
                                                    }
                                                    .btn {
                                                        display: inline-block;
                                                        margin: .5rem .5rem 1rem .5rem;
                                                        clear: both;
                                                        font-family: inherit;
                                                        font-weight: 700;
                                                        font-size: 14px;
                                                        text-decoration: none;
                                                        text-transform: initial;
                                                        border: none;
                                                        border-radius: .2rem;
                                                        outline: none;
                                                        padding: 0 1rem;
                                                        height: 36px;
                                                        line-height: 36px;
                                                        color: #fff;
                                                        transition: all 0.2s ease-in-out;
                                                        box-sizing: border-box;
                                                        background: $theme;
                                                        border-color: $theme;
                                                        cursor: pointer;
                                                    }
                                                    }
                                                }
                                            </style>

                                            <form action="../includes/spb-upload-file.inc.php" method="POST" enctype="multipart/form-data">
                                                 
                                                <label for="file-upload" id="file-drag"></label>
                                                <input type="file" name="file" size="40" multiple> 
                                                    <!-- <p>Drag your files here or click in this area.</p> -->
                                                    <button type="submit" class="button-block" name="file-submit" style="margin-top:10px; margin-left:40px;">
                                                        <input type="hidden" class="card-title"name="course" value="<?php echo $_GET['course'];?>">
                                                        <input type="hidden" class="card-title"name="section" value="<?php echo $_GET['section'];?>">
                                                        <input type="hidden" class="card-title"name="subject" value="<?php echo $_GET['subject'];?>">
                                                        <input type="hidden" class="card-title"name="projname" value="<?php echo $_GET['projname'];?>">
                                                        <input type="hidden" class="card-title"name="grpno" value="<?php echo $_GET['grpno'];?>">
                                                        <input type="hidden" class="card-title"name="grpid" value="<?php echo $_GET['grpid'];?>">
                                                        <input type="hidden" class="card-title"name="leader" value="<?php echo $_GET['leader'];?>">
                                                        <input type="hidden" class="card-title"name="projid" value="<?php echo $_GET['id'];?>">
                                                        <input type="hidden" class="card-title"name="uploadedby" value="<?php echo $_SESSION['userUid'];?>">
                                                    Upload</button>
                                            </form>
                                            <div class="section-body mt-3">
                                                <div class="container-fluid">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12">
                                                            <!-- <div class="card">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Recently Accessed Files</h3>
                                                                    <div class="card-options">                                
                                                                        <a href="javascript:void(0)"><i class="fa fa-plus" data-toggle="tooltip" data-placement="right" title="Upload New"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="file_folder">
                                                                        <a href="javascript:void(0);">
                                                                            <div class="icon">
                                                                                <i class="fa fa-folder text-success"></i>
                                                                            </div>
                                                                            <div class="file-name">
                                                                                <p class="mb-0 text-muted">Family</p>
                                                                                <small>3 File, 1.2GB</small>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <div class="icon">
                                                                                <i class="fa fa-file-word-o text-primary"></i>
                                                                            </div>
                                                                            <div class="file-name">
                                                                                <p class="mb-0 text-muted">Report2017.doc</p>
                                                                                <small>Size: 68KB</small>
                                                                            </div>
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <div class="icon">
                                                                                <i class="fa fa-file-pdf-o text-danger"></i>
                                                                            </div>
                                                                            <div class="file-name">
                                                                                <p class="mb-0 text-muted">Report2017.pdf</p>
                                                                                <small>Size: 68KB</small>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="card bg-none b-none">
                                                                <div class="card-body pt-0">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-hover table-vcenter table_custom text-nowrap spacing5 text-nowrap mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Name</th>
                                                                                    <th>Owner</th>
                                                                                    <th>Updated By</th>
                                                                                    <th>Task Name</th>
                                                                                    <th>Subtask Name</th>
                                                                                    <th>Last Update</th>
                                                                                    <th>File Size</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            <?php

                                                                            // run query
                                                                                $query = mysqli_query($conn, "SELECT * FROM fileupload where (projid='".($_GET['id'])."'  and leader='".($_GET['leader'])."') OR (course='".($_GET['course'])."'  AND section='".($_GET['section'])."'  AND subject='".($_GET['subject'])."'  AND id='".($_GET['id'])."'  )  ");

                                                                                    $array = array();

                                                                                    while($row = mysqli_fetch_assoc($query)){

                                                            
                                                                                        $array[] = $row;
                                                                                    ?>
                                                                                

                                                                                <tr>
                                                                                    <td class="width45">
                                                                                        <i class="bi bi-file-earmark-check-fill"></i>
                                                                                    </td>
                                                                                    <td class="width100">
                                                                                        <span><a href="../includes/download.inc.php?file=<?php echo $row['filename'] ?>"><?php echo $row['filename'] ?></a></span>  
                                                                                    </td>
                                                                                    <?php
                                                                                        if(!empty($row['updatedby'])){
                                                                                        $name = mysqli_query($conn, "SELECT * FROM user where uidUsers='".$row['uploadedby']."'");
                                                                                        $name1 = mysqli_fetch_assoc($name);
                                                                                    ?>
                                                                                    <td class="width100">
                                                                                        <span><?php echo $name1['f_name']." ".$name1['l_name']?></span>
                                                                                    </td>
                                                                                    <?php
                                                                                        $uname = mysqli_query($conn, "SELECT * FROM user where uidUsers='".$row['updatedby']."'");
                                                                                        $name2 = mysqli_fetch_assoc($uname);
                                                                                    ?>
                                                                                    <td class="width100">
                                                                                        <span><?php echo $name2['f_name']." ".$name2['l_name']?></span>
                                                                                    </td>  
                                                                                    <?php
                                                                                        }
                                                                                        else{
                                                                                            $names = mysqli_query($conn, "SELECT * FROM user where uidUsers='".$row['uploadedby']."'");
                                                                                            $names1 = mysqli_fetch_assoc($names);
                                                                                    ?>
                                                                                    <td class="width100">
                                                                                        <span><?php echo $names1['f_name']." ".$names1['l_name']?></span>
                                                                                    </td>
                                                                                    <td class="width100">
                                                                                        <span></span>
                                                                                    </td>  
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                    <?php
                                                                                        $taskname = mysqli_query($conn, "SELECT * FROM tasks where id='".$row['taskid']."'");
                                                                                        $task = mysqli_fetch_assoc($taskname);
                                                                                        $taskexist = mysqli_num_rows($taskname);
                                                                                        // echo $taskexist;

                                                                                        if($taskexist > 0){
                                                                                            $tname = mysqli_query($conn, "SELECT * FROM subtasks where id='".$row['subtaskid']."'");
                                                                                            $tname_ = mysqli_fetch_assoc($tname);
                                                                                            $tasknum = mysqli_num_rows($tname);
                                                                                            if($tasknum > 0){
                                                                                    ?>
                                                                                            <td class="width100">
                                                                                                <span><?php echo $task['taskname']?></span>
                                                                                            </td>    
                                                                                            <td class="width100">
                                                                                                <span><?php echo $tname_['subtaskname']?></span>
                                                                                            </td> 
                                                                                    <?php
                                                                                            }
                                                                                            else{
                                                                                    ?>
                                                                                        <td class="width100">
                                                                                            <span><?php echo $task['taskname']?></span>
                                                                                        </td>    
                                                                                        <td class="width100">
                                                                                            <span></span>
                                                                                        </td>  
                                                                                    <?php
                                                                                            }
                                                                                        }
                                                                                        else{
                                                                                            $subtaskname = mysqli_query($conn, "SELECT * FROM subtasks where id='".$row['subtaskid']."'");
                                                                                            $subtask = mysqli_fetch_assoc($subtaskname);
                                                                                            $subtaskexist = mysqli_num_rows($subtaskname);

                                                                                            if($subtaskexist > 0){
                                                                                    ?>
                                                                                    <td class="width100">
                                                                                        <span><?php echo $subtask['taskname']?></span>
                                                                                    </td>  
                                                                                    
                                                                                    <td class="width100">
                                                                                        <span><?php echo $subtask['subtaskname']?></span>
                                                                                    </td>  

                                                                                    <?php
                                                                                        }
                                                                                        else{
                                                                                    ?>
                                                                                    <td class="width100">
                                                                                        <span></span>
                                                                                    </td>  
                                                                                    
                                                                                    <td class="width100">
                                                                                        <span></span>
                                                                                    </td>  
                                                                                    <?php
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                    <td class="width100">
                                                                                        <span><?php echo $row['uploaded_at']?></span>
                                                                                    </td>
                                                                                    <td class="width100">
                                                                                        <span><?php echo round($row['filesize'],2)?> MB</span>
                                                                                    </td>
                                                                                    <td class="width100">
                                                                                        <a data-id="<?php echo $row['id'];?>" title="Edit File" class="open-UpdateFile" href="#updateFile" style="font-color:#000; text-align:center;"><i class="bi bi-pencil-square"></i></a>
                                                                                        <a data-id="<?php echo $row['id'];?>" title="Delete File" class="open-DeleteFile" href="#deleteFile" style="font-color:#000;"><i class="bi bi-trash-fill"></i></a>
                                                                                    </td>  
                                                                                </tr> 
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- --------------------------------------------------- Submit Form ----------------------------------------  -->
                        <div class="tab-pane fade" id="Submit" role="tabpanel">
                            <!-- <form action="" method='post' id="contact-form" enctype="multipart/form-data"> -->
                            
                            <div class="section-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="section-body mt-3">
                                                <div class="container-fluid">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <p style="text-align: center"> Peer-to-Peer Grading System </p>
                                                                    <p style="text-align: center; color: #b79696d1 "><i> Grade your teammates individually based on how they performed on this project.</i></p>
                                                                </div>
                                                            </div>

                                                            <div class="card bg-none b-none">
                                                                <div class="card-body pt-0">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Team Members</th>
                                                                                    <th>Action</th>
                                                                                    <th>Status</th>
                                                                                    <!-- <th class="w200">Team Action</th> -->
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <td>1</td>
                                                                                    <?php 
                                                                                        $que1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$_GET['leader']."'") or die(mysql_error());
                                                                                        $que2 = mysqli_fetch_assoc($que1);
                                                                                    ?>
                                                                                    <td>
                                                                                        <h6 class="mb-0"><?php echo ($que2['f_name']. " " .$que2['l_name'])?></h6>
                                                                                    </td>

                                                                                    <?php
                                                                                        if($_GET['leader'] == $_SESSION['userUid']){
                                                                                    ?>
                                                                                    <td>
                                                                                        <span><i></i></span>
                                                                                    </td>
                                                                                    <?php
                                                                                        }
                                                                                        else{
                                                                                            $nsq = mysqli_query($conn,"SELECT * FROM peer_grading where member = '".$_GET['leader']."' AND user = '".$_SESSION['userUid']."' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                                                            $nsq_ = mysqli_num_rows($nsq);

                                                                                            if($nsq_ == 0){
                                                                                    ?>
                                                                                    <td>
                                                                                        <form method="get" action="peer-grading.php?">
                                                                                            <button type="submit" class="btn" style="color:#b79696d1;">
                                                                                            <input type="hidden" class="card-title"name="course" value="<?php echo $_GET['course'];?>">
                                                                                            <input type="hidden" class="card-title"name="section" value="<?php echo $_GET['section'];?>">
                                                                                            <input type="hidden" class="card-title"name="subject" value="<?php echo $_GET['subject'];?>">
                                                                                            <input type="hidden" class="card-title"name="id" value="<?php echo $_GET['id'];?>">
                                                                                            <input type="hidden" class="card-title"name="projname" value="<?php echo $_GET['projname'];?>">
                                                                                            <input type="hidden" class="card-title"name="grpno" value="<?php echo $_GET['grpno'];?>">
                                                                                            <input type="hidden" class="card-title"name="grpid" value="<?php echo $_GET['grpid'];?>">
                                                                                            <input type="hidden" class="card-title"name="leader" value="<?php echo $_GET['leader'];?>"><input type="hidden" class="card-title"name="member" value="<?php echo $_GET['leader'];?>"><span><i>Grading Form</i></span></button>
                                                                                        </form>
                                                                                    </td>
                                                                                    <?php
                                                                                            }
                                                                                            else{
                                                                                    ?>
                                                                                            <td><span><i>Graded</i></span></td>
                                                                                    <?php
                                                                                            }
                                                                                        }
                                                                                        if($_GET['leader'] == $_SESSION['userUid']){
                                                                                    ?>
                                                                                     <td>
                                                                                        <span><i></i></span>
                                                                                    </td>
                                                                                    <?php
                                                                                        }
                                                                                        else{
                                                                                    ?>
                                                                                    <td>
                                                                                        <?php
                                                                                            $nsql = mysqli_query($conn,"SELECT * FROM peer_grading where user = '".$_SESSION['userUid']."' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                                                            $nsql_ = mysqli_num_rows($nsql);

                                                                                                if($nsql_ > 0){
                                                                                        ?>
                                                                                            <span><i>Graded</i></span>
                                                                                        <?php
                                                                                                }
                                                                                                else{
                                                                                        ?>
                                                                                                <span><i>Not graded</i></span>
                                                                                        <?php
                                                                                                }
                                                                                        ?>
                                                                                    </td>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </tr>
                                                                                    
                                                                                
                                                                                <!-------------------------- members ----------------------------->
                                                                                <?php
                                                                                    $result = mysqli_query($conn, "SELECT * FROM groups WHERE projid='".$_GET['id']."' and idGroups='".$_GET['grpid']."' AND groupno = '".$_GET['grpno']."' and leader='".$_GET['leader']."'") or die(mysql_error());
                                                                                    $array = array();
                                                                                    $x = 1;
                                                                                    while ($list = mysqli_fetch_assoc($result)) {
                                                                                        
                                                                                        $array[] = $list;
                                                                                        $lead = explode(',',$list['members']);
                                                                                        foreach($lead as $c) {
                                                                                            $x++;
                                                                                ?>

                                                                                <?php 
                                                                                    $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$c."'") or die(mysql_error());
                                                                                    while ($que = mysqli_fetch_assoc($query)) {
                                                                                ?>
                                                                                
                                                                                <tr>
                                                                                    <td><?php echo $x;?></td>
                                                                                    <td>
                                                                                        <h6 class="mb-0"><?php echo ($que['f_name']. " " .$que['l_name'])?></h6>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                            if($que['uidUsers'] == $_SESSION['userUid']){
                                                                                        ?>
                                                                                            <span><i></i></span>
                                                                                        <?php
                                                                                            }
                                                                                            else{
                                                                                                $nsq = mysqli_query($conn,"SELECT * FROM peer_grading where member = '".$c."' AND user = '".$_SESSION['userUid']."' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                                                                $nsq_ = mysqli_num_rows($nsq);

                                                                                                if($nsq_ == 0){
                                                                                        ?>
                                                                                            
                                                                                            <form method="get" action="peer-grading.php?">
                                                                                                <button type="submit" class="btn" style="color:#b79696d1;">
                                                                                                <input type="hidden" class="card-title"name="course" value="<?php echo $_GET['course'];?>">
                                                                                                <input type="hidden" class="card-title"name="section" value="<?php echo $_GET['section'];?>">
                                                                                                <input type="hidden" class="card-title"name="subject" value="<?php echo $_GET['subject'];?>">
                                                                                                <input type="hidden" class="card-title"name="id" value="<?php echo $_GET['id'];?>">
                                                                                                <input type="hidden" class="card-title"name="projname" value="<?php echo $_GET['projname'];?>">
                                                                                                <input type="hidden" class="card-title"name="grpno" value="<?php echo $_GET['grpno'];?>">
                                                                                                <input type="hidden" class="card-title"name="grpid" value="<?php echo $_GET['grpid'];?>">
                                                                                                <input type="hidden" class="card-title"name="leader" value="<?php echo $_GET['leader'];?>"><input type="hidden" class="card-title"name="member" value="<?php echo $que['uidUsers'];?>"><span><i>Grading Form</i></span></button>
                                                                                            </form>
                                                                                        <?php
                                                                                                }
                                                                                                else{
                                                                                        ?>
                                                                                                <span><i>Graded</i></span>
                                                                                        <?php
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                        
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                            $nsql = mysqli_query($conn,"SELECT * FROM peer_grading where member = '".$c."' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                                                            $nsql_ = mysqli_num_rows($nsql);

                                                                                            if($nsql_ != 0){
                                                                                                if($que['uidUsers'] == $_SESSION['userUid']){
                                                                                        ?>
                                                                                                    <span><i></i></span>
                                                                                        <?php
                                                                                                }
                                                                                                else{
                                                                                        ?>
                                                                                                    <span><i>Graded</i></span>
                                                                                        <?php
                                                                                                }
                                                                                            }
                                                                                            else{
                                                                                                if($que['uidUsers'] == $_SESSION['userUid']){
                                                                                        ?>
                                                                                                    <span><i></i></span>
                                                                                        <?php
                                                                                                }
                                                                                                else{
                                                                                        ?>
                                                                                                    <span><i>Not Graded</i></span>
                                                                                        <?php
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                </tr>
                                                                                <?php } } }?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                    $gstmt  = mysqli_query($conn, "SELECT * FROM groups WHERE projid='".$_GET['id']."' and idGroups='".$_GET['grpid']."' AND groupno = '".$_GET['grpno']."' and leader='".$_GET['leader']."'") or die(mysql_error());
                                                                    $array = array();
                                                                    $x=1;
                                                                        while ($list = mysqli_fetch_assoc($gstmt)) {
                                                                            $array[] = $list;
                                                                            $lead = explode(',',$list['members']);
                                                                            foreach($lead as $c) {
                                                                                $x++;

                                                                                $nsql1 = mysqli_query($conn,"SELECT * FROM peer_grading where user = '".$c."' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                                                $nsql1_ = mysqli_num_rows($nsql1);
                                                                                $nsql2 = mysqli_query($conn,"SELECT * FROM peer_grading where user = '".$_GET['leader']."' AND projid = '".$_GET['id']."' AND grpid = '".$_GET['grpid']."' AND grpno = '".$_GET['grpno']."'");
                                                                                $nsql2_ = mysqli_num_rows($nsql2);
                                                                                $num = $nsql1_ + $nsql2_;
                                                                            }
                                                                                    if ($num != $x){
                                                            
                                                            ?>                       
                                                                       
                                                                        <!-- <p><i style="color: #b79696d1;">Grade your peers first before submission.</i></p> --> 
                                                                        <p><i style="color: #b79696d1;">Grade Your Peers First.</i></p>
                                                            <?php     
                                                                                    }
                                                                                    else {
                                                                                        if($_SESSION['userUid'] != $_GET['leader']){
                                                            ?>
                                                                        <p><i style="color: #b79696d1;">To be submitted by the leader.</i></p>
                                                            <?php
                                                                                        }
                                                                                        else{
                                                            ?>
                                                                        <button type="submit" id="post-announcement" class="btn btn-primarydone" name="post-announcement" style="float: right" data-toggle="modal" data-target="#submitproj">Submit</button>
                                                            <?php
                                                                                    }
                                                                                }
                                                                        }
                                                            ?>
                                                            <p><i style="color: #b79696d1;">Total members who graded: <?php echo $num?>/<?php echo $x?></i></p>
                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
            <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
    </div>
</div>
<!-- Delete Task and Subtask-->
<form action="../includes/spb-deletefile.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteFile" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete File</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
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
                            <input type="hidden" id="action" name="action" value="Delete Task" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" style ="text-align: center;">
                            <img src="assets/images/warning.png" alt="Girl in a jacket" width="100" height="100">
                            <br>
                            <br>
                            <div style="font: montserrat; font-size: 16px;">Are you sure you want to delete this item?</div>
                            <div style="font-size: 12px;">There are subtasks included in this item that would be affected.</div>
                            <i class="bi bi-x-octagon-fill" style="font-size: 12px; color: red;">You will not be able to undo this.</i>
                            
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Delete-Task" value="Delete">
                <input type="hidden" name="delfile" id="delfile" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-DeleteFile", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myDelfileId = _self.data('id');
        $("#delfile").val(myDelfileId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- File Section Upload File -->
<form action="../includes/spb-editfile-upload.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="updateFile" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Update File</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">    
                            <input type="file" class="form-control" name="file" size="40" style="margin-left: 0px;" multiple>                                
                            <input type="hidden" class="form-control" id="uploadedby" name="uploadedby" value="<?php  echo $_SESSION['userUid']; ?>">
                            <input type="hidden" id="action" name="action" value="Subtask Upload File" readonly>
                        </div>
                        <div class="form-group">                                    
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                        </div>
                    </div>         
                    <div class="col-12">
                        <div class="form-group">    
                            <select name="task" id="task" class="form-control" required>
                                <option selected hidden value="">Add To Task</option>
                                <option value="">-null-</option>
                                <?php
                                    $task = mysqli_query($conn, "SELECT * FROM tasks WHERE projid='".$_GET['id']."' AND grpid='".$_GET['grpid']."' AND grpno='".$_GET['grpno']."'");
                                    $array = array();
            
                                    while($tasks = mysqli_fetch_assoc($task)){
                                        $array[] = $tasks;
                                ?>
                                <option value="<?php echo $tasks['id'];?>"><?php echo $tasks['taskname'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>      
                    <div class="col-12">
                        <div class="form-group">    
                            <select name="subtask" id="subtask" class="form-control" required>
                                <option selected hidden value="">Add To Subtask</option>
                                <option value="">-null-</option>
                                <?php
                                    $subtask = mysqli_query($conn, "SELECT * FROM subtasks WHERE projid='".$_GET['id']."' AND grpid='".$_GET['grpid']."' AND grpno='".$_GET['grpno']."'");
                                    $array = array();
            
                                    while($subtasks = mysqli_fetch_assoc($subtask)){
                                        $array[] = $subtasks;
                                ?>
                                <option value="<?php echo $subtasks['id'];?>"><?php echo $subtasks['subtaskname'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>    
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Upload-File" value="Update">
                <input type="hidden" name="editf" id="editf" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-UpdateFile", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myEditfId = _self.data('id');
        $("#editf").val(myEditfId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Task Upload File -->
<form action="../includes/s-taskfile-upload.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Upload File</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">    
                            <input type="file" class="form-control" name="file" size="40" style="width: 380px;" multiple>                                
                            <input type="hidden" class="form-control" id="uploadedby" name="uploadedby" value="<?php  echo $_SESSION['userUid']; ?>">
                            <input type="hidden" id="action" name="action" value="Task Upload File" readonly>
                        </div>
                        <div class="form-group">                                    
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                        </div>
                    </div>              
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Upload-File" value="Upload">
                <input type="hidden" name="tnm" id="tnm" value="" />
                <input type="hidden" name="tkid" id="tkid" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-UploadFile", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myTnmId = _self.data('id');
        $("#tnm").val(myTnmId);

        var myTkidId = _self.data('task-id');
        $("#tkid").val(myTkidId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Subtask Upload File -->
<form action="../includes/s-subtaskfile-upload.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="suploadFile" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Upload File</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">    
                            <input type="file" class="form-control" name="file" size="40" style="width: 380px;" multiple>                                
                            <input type="hidden" class="form-control" id="uploadedby" name="uploadedby" value="<?php  echo $_SESSION['userUid']; ?>">
                            <input type="hidden" id="action" name="action" value="Subtask Upload File" readonly>
                        </div>
                        <div class="form-group">                                    
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                        </div>
                    </div>              
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Upload-File" value="Upload">
                <input type="hidden" name="stkid" id="stkid" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-SuploadFile", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myStkidId = _self.data('id');
        $("#stkid").val(myStkidId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Edit Status Member-->
<form action="../includes/s-task-status-m.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="taskstatMember" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Status</h6>
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
                            <input type="hidden" id="action" name="action" value="Task Status Changed" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <select id="status" name="status" class="form-control" required>
                                <option selected hidden value="">Set Status</option>
                                <option value="Pending">Pending</option>
                                <option value="On-Hold">On-Hold</option>
                                <option value="On-Going">On-Going</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Status" value="Edit Status">
                    <input type="hidden" name="tskidm" id="tskidm" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-TaskstatMember", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myTskidmId = _self.data('id');
        $("#tskidm").val(myTskidmId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>


<!-- Edit Subtask Status Member -->
<form action="../includes/s-subtask-status-m.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="substatMember" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Status</h6>
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
                            <select id="status" name="status" class="form-control" required>
                                <option selected hidden value="">Set Status</option>
                                <option value="Pending">Pending</option>
                                <option value="On-Hold">On-Hold</option>
                                <option value="On-Going">On-Going</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Status" value="Edit Status">
                    <input type="hidden" name="statmid" id="statmid" value="" />
                    <input type="hidden" name="statmsid" id="statmsid" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-SubstatMember", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myStatmidId = _self.data('id');
        $("#statmid").val(myStatmidId);

        var myStatmsidId = _self.data('subtask-id');
        $("#statmsid").val(myStatmsidId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>


<!-- Add task -->
<form action="../includes/s-task.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="addtask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Add New Task</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="taskname" name="taskname" placeholder="Task name">
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php echo $_SESSION['userUid']?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Add Task" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder="Task Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                        $array = array();

                        while($row = mysqli_fetch_assoc($query)){
                            $array[] = $row;
                    ?>
                    
                    <div class="form-group">
                        <select id="taskmember" name="taskmember" class="form-control" required>
                            <option selected hidden value="">Assign To Group Member</option>
                            <?php
                                $stud = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$_GET['leader']."'");
                                $studl = mysqli_fetch_assoc($stud);
                            ?>
                            <option value="<?php echo $_GET['leader']; ?>"><?php echo ($studl['f_name']. " " .$studl['l_name']) ; ?></option>
                            <?php

                                $query = mysqli_query($conn, "SELECT * FROM groups where projid='".($_GET['id'])."' and idGroups='".($_GET['grpid'])."'");

                                while ($list = mysqli_fetch_assoc($query)) {
                                    $i=0;
                                    $lead = explode(',',$list['members']);
                                    foreach($lead as $c) {
                                        $i++;
                                        $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$c."'");
                                        $data = mysqli_fetch_assoc($query1);
                            ?>
                            
                            <option value="<?php echo $c; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php } }?> 
                        </select>
                    </div>
                    <?php }?> 

                       <h5>Task Duration : </h5>  
                       <h7>Start : </h7>
                        <div class="form-group">                                 
                             <input type="date" style="margin-left: 0px; text-align:left;" id="tduration" name="tduration" class="form-control" required>
                        </div>
                        <h7>End : </h7>
                        <div class="form-group">                                 
                             <input type="date" style="margin-left: 0px; text-align:left;" id="tend" name="tend" class="form-control" required>
                        </div>
                    </div>               
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Add-Task" value="Add Task">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<!-- Edit task -->
<form action="../includes/s-taskedit.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="editTask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Task</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="taskname" name="taskname" placeholder="Task name">
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php echo $_SESSION['userUid']?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Add Task" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder="Task Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                        $array = array();

                        while($row = mysqli_fetch_assoc($query)){
                            $array[] = $row;
                    ?>
                    
                    <div class="form-group">
                        <select id="taskmember" name="taskmember" class="form-control" required>
                            <option selected hidden value="">Assign To Group Member</option>
                            <?php
                                $stud = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$_GET['leader']."'");
                                $studl = mysqli_fetch_assoc($stud);
                            ?>
                            <option value="<?php echo $_GET['leader']; ?>"><?php echo ($studl['f_name']. " " .$studl['l_name']) ; ?></option>
                            <?php

                                $query = mysqli_query($conn, "SELECT * FROM groups where projid='".($_GET['id'])."' and idGroups='".($_GET['grpid'])."'");

                                while ($list = mysqli_fetch_assoc($query)) {
                                    $i=0;
                                    $lead = explode(',',$list['members']);
                                    foreach($lead as $c) {
                                        $i++;
                                        $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$c."'");
                                        $data = mysqli_fetch_assoc($query1);
                            ?>
                            
                            <option value="<?php echo $c; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php } }?> 
                        </select>
                    </div>
                    <?php }?> 

                       <h5>Task Duration : </h5>  
                       <h7>Start : </h7>
                        <div class="form-group">                                 
                             <input type="date" style="margin-left: 0px; text-align:left;" id="tduration" name="tduration" class="form-control" required>
                        </div>
                        <h7>End : </h7>
                        <div class="form-group">                                 
                             <input type="date" style="margin-left: 0px; text-align:left;" id="tend" name="tend" class="form-control" required>
                        </div>
                    </div>               
                </div>
                <div class="modal-footer">
                    <input type="text" name="etask" id="etask" value="" />
                    <input type="submit"  class="btn btn-primary"  name="Edit-Task" value="Edit Task">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", ".open-EditTask", function (e) {

    e.preventDefault();

    var _self = $(this);

    var myEtaskId = _self.data('id');
    $("#etask").val(myEtaskId);

    $(_self.attr('href')).modal('show');
    });
</script>
</form>

<!-- Delete Task and Subtask-->
<form action="../includes/s-taskdelete.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteTask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Task and Subtasks</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
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
                            <input type="hidden" id="action" name="action" value="Delete Task" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" style ="text-align: center;">
                            <img src="assets/images/warning.png" alt="Girl in a jacket" width="100" height="100">
                            <br>
                            <br>
                            <div style="font: montserrat; font-size: 16px;">Are you sure you want to delete this item?</div>
                            <div style="font-size: 12px;">There are subtasks included in this item that would be affected.</div>
                            <i class="bi bi-x-octagon-fill" style="font-size: 12px; color: red;">You will not be able to undo this.</i>
                            
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Delete-Task" value="Delete Task">
                <input type="text" name="dtask" id="dtask" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-DeleteTask", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myDtaskId = _self.data('id');
        $("#dtask").val(myDtaskId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Delete Task Only-->
<form action="../includes/s-taskdelete1.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteTask1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Task </h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
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
                            <input type="hidden" id="action" name="action" value="Delete Task" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" style ="text-align: center;">
                            <img src="assets/images/warning.png" alt="Girl in a jacket" width="100" height="100">
                            <br>
                            <br>
                            <div style="font: montserrat; font-size: 16px;">Are you sure you want to delete this item?</div>
                            <i class="bi bi-x-octagon-fill">You will not be able to undo this.</i>
                            
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Delete-Task" value="Delete Task">
                <input type="text" name="deltask" id="deltask" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-DeleteTask1", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myDeltaskId = _self.data('id');
        $("#deltask").val(myDeltaskId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Edit Status-->
<form action="../includes/s-task-status.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="addTaskstat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Status</h6>
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
                            <input type="hidden" id="action" name="action" value="Task Status Changed" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <select id="status" name="status" class="form-control" required>
                                <option selected hidden value="">Set Status</option>
                                <option value="Pending">Pending</option>
                                <option value="On-Hold">On-Hold</option>
                                <option value="On-Going">On-Going</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Status" value="Edit Status">
                    <input type="text" name="tasksid" id="tasksid" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-AddTaskstat", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myTasksidId = _self.data('id');
        $("#tasksid").val(myTasksidId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Add Subtask -->
<form action="../includes/s-subtasks.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="addSub" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Add New Subtask</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="subtask" name="subtask" placeholder="Subtask Name">
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="text" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>"> 
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo ($_SESSION['userUid']); ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Add Subtask" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder="Subtask Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    <div class="form-group">
                        <select id="taskmember" name="taskmember" class="form-control" required>
                            <option selected hidden value="">Assign To Group Member</option>
                            <?php
                                $stud = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$_GET['leader']."'");
                                $studl = mysqli_fetch_assoc($stud);
                            ?>
                            <option value="<?php echo $_GET['leader']; ?>"><?php echo ($studl['f_name']. " " .$studl['l_name']) ; ?></option>
                            <?php

                                $query = mysqli_query($conn, "SELECT * FROM groups where projid='".($_GET['id'])."' and idGroups='".($_GET['grpid'])."'");

                                while ($list = mysqli_fetch_assoc($query)) {
                                    $i=0;
                                    $lead = explode(',',$list['members']);
                                    foreach($lead as $c) {
                                        $i++;
                                        $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$c."'");
                                        $data = mysqli_fetch_assoc($query1);
                            ?>
                            
                            <option value="<?php echo $c; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php } }?> 
                        </select>
                    </div>

                       <h5>Task Duration : </h5>  
                       <h7>Start : </h7>
                        <div class="form-group">                                 
                             <input type="date" style="margin-left: 0px; text-align:left;" id="tduration" name="tduration" class="form-control" required>
                        </div>
                        <h7>End : </h7>
                        <div class="form-group">                                 
                             <input type="date" style="margin-left: 0px; text-align:left;" id="tend" name="tend" class="form-control" required>
                        </div>
                    </div>
                    
                   
                                       
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Add-Subtask" value="Add Subtask">
                <input type="text" name="task" id="task" value="" />
                <input type="text" name="taskid" id="taskid" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-AddSub", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myTaskId = _self.data('id');
        $("#task").val(myTaskId);

        var myTaskidId = _self.data('task-id');
        $("#taskid").val(myTaskidId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Add Subtask Status-->
<form action="../includes/s-subtask-status.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="addSubstat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Status</h6>
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
                            <select id="status" name="status" class="form-control" required>
                                <option selected hidden value="">Set Status</option>
                                <option value="Pending">Pending</option>
                                <option value="On-Hold">On-Hold</option>
                                <option value="On-Going">On-Going</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                    </div>       
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Save-Status" value="Edit Status">
                    <input type="text" name="idtask" id="idtask" value="" />
                    <input type="text" name="subtaskid" id="subtaskid" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-AddSubstat", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myIdtaskId = _self.data('id');
        $("#idtask").val(myIdtaskId);

        var mySubtaskidId = _self.data('subtask-id');
        $("#subtaskid").val(mySubtaskidId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Delete Subtask -->
<form action="../includes/s-subtaskdelete.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteSubtask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Subtask </h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
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
                            <input type="hidden" id="action" name="action" value="Delete Subtask" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" style ="text-align: center;">
                            <img src="assets/images/warning.png" alt="Delete Task Warning" width="100" height="100">
                            <br>
                            <br>
                            <div style="font: montserrat; font-size: 16px;">Are you sure you want to delete this item?</div>
                            <i class="bi bi-x-octagon-fill">You will not be able to undo this.</i>
                            
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Delete-Subtask" value="Delete Task">
                <input type="text" name="dsubtask" id="dsubtask" value="" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-DeleteSubtask", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myDsubtaskId = _self.data('id');
        $("#dsubtask").val(myDsubtaskId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Add Group Member -->
<form action="../includes/scb-addmembers.inc.php" method='post' id="contact-form" enctype="multipart/form-data">

    <div class="modal fade" id="addMembers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel1">Add Members</h6>
                </div>

                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">

                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                    <label for='members[]'>Select multiple members using the ctrl + click command:</label><br>
                                    <select multiple="multiple" name="members[]" class="form-control">
                                    
                                    <?php
                                        // $grpid = "<input type=hidden id=\"idgrp\" name=\"idgrp\" value=\"\"/>";
                                        // echo $grpid;
                                        // $query = mysqli_query($conn, "SELECT DISTINCT students.uidUsers, groups.idGroups, groups.groupno, concat(groups.leader, ',', groups.members) from students,groups where concat(groups.leader, ',', groups.members) NOT RLIKE students.uidUsers and groups.projid = '".$_GET['id']."' and groupno = 1");

                                        // while($data = mysqli_fetch_assoc($query)){
                                        // $array[] = $data;
                                            $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                            while($data1 = mysqli_fetch_assoc($query1)){
                                    ?>
                                        <option value="<?php echo $data1['uidUsers'];?>"><?php echo ($data1['f_name']. " " .$data1['l_name']);?></option>
                                    <?php } ?>
                                    </select><br>
                                </form> 
                                    <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                    <input type="hidden" id="createdby" name="createdby" value="<?php echo $_SESSION['userUid']?>">
                                    <input type="hidden" id="subject" name="subject" value="<?php echo $_GET['subject'];?>">
                                    <input type="hidden" id="projname" name="projname" value="<?php echo $_GET['projname'];?>">
                                    <input type="hidden" id="projId" name="projId" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" id="course" name="course" value="<?php echo $_GET['course'];?>">
                                    <input type="hidden" id="section" name="section" value="<?php echo $_GET['section'];?>">
                                    <input type="hidden" id="action" name="action" value="Add Group Member" readonly>
                                    <input type="text" name="id" id="id" value="" />
                                    <input type="text" name="lead" id="lead" value="" />
                                    <input type="text" name="grp" id="grp" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-primary"  name="Add-Member" value="Add-Member">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
        $(document).on("click", ".open-AddMembers", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myGrpId = _self.data('id');
        $("#id").val(myGrpId);

        var myLeadId = _self.data('lead-id');
        $("#lead").val(myLeadId);

        var myGroupId = _self.data('grp-id');
        $("#grp").val(myGroupId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>


<!-- View Group Member -->
<div class="modal fade" id="viewMembers" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">      
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Add Members</h6>
            </div>

            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="hidden" name="group" id="group" value="" />
                            <input type="text" name="leader" id="leader" value="" />
                            <input type="text" name="idgroup" id="idgroup" value="" />
                        </div>
                        <div id="insert">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Add-Member" value="Add-Member">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="close-btn">Close</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function() {

        <?php 
            $jsarray=json_encode($groupmembers);
            echo "var groupmembers = ".$jsarray;
        ?>

        var insert = $("#insert");


        $(".open-viewMembers").on("click", function(e) {
            e.preventDefault();

            var _self = $(this);

            var myGroupId = _self.data('id');
            $("#group").val(myGroupId);

            var myLeaderId = _self.data('lead-id');
            $("#leader").val(myLeaderId);

            var myGrpId = _self.data('group-id');
            $("#idgroup").val(myGrpId);

            $(_self.attr('href')).modal('show');

            if (myGrpId in groupmembers){
                var members = groupmembers[myGrpId].split(",");
                for(let i = 0; i < members.length; i++) {
                    insert.append("<li>"+ members[i] +"</li>");
                }
            }

                // if (myGrpId in groupmembers){
                //     var members = groupmembers[myGrpId];
                //     // console.log(groupmembers[myGrpId][0]['f_name']);
                //     for(let i = 0; i < members.length; i++) {
                //         insert.append("<li>"+ members[i]['f_name'] + " " + members[i]['l_name'] +"</li>");
                //     }
                // }
        });

        $("#close-btn").on("click", function() {
            insert.empty();
        });

            // if($("#viewMembers").is(":hidden")) {
            //         insert.empty();
            //     }

        $('#viewMembers').on('hidden.bs.modal', function () {
        insert.empty()
        })
    });

</script>

<!-- Submit Grading Sheet task -->
<form action="../includes/s-submit.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="submitproj" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Congratulations! You've completed the assigned project!</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">                                    
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>">
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>">
                            <input type="hidden" class="form-control" id="grpno" name="grpno" value="<?php  echo $_GET['grpno']; ?>">
                            <input type="hidden" class="form-control" id="grpid" name="grpid" value="<?php  echo $_GET['grpid']; ?>">
                            <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>">
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo $_SESSION['userUid']; ?>">
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                            <input type="hidden" id="action" name="action" value="Add Task" readonly>
                            <?php
                                $sqlstmt = mysqli_query($conn,"SELECT * FROM projects where id='".$_GET['id']."'");
                                $sqlstmt_ = mysqli_fetch_assoc($sqlstmt);
                            ?>
                            <input type="hidden" class="form-control" id="submitted_to" name="submitted_to" value="<?php  echo $sqlstmt_['createdby']; ?>">
                            <?php
                                $sqlstmt1 = mysqli_query($conn,"SELECT * FROM groups WHERE projid='".$_GET['id']."' AND idGroups='".$_GET['grpid']."' AND groupno = '".$_GET['grpno']."'");
                                $sqlstmt1_ = mysqli_fetch_assoc($sqlstmt1);
                            ?>
                            <input type="hidden" class="form-control" id="members" name="members" value="<?php  echo $sqlstmt1_['members']; ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group" style ="text-align: center;">
                            <img src="assets/images/addproject-2.0.png" alt="Submit Project" >
                            <br>
                            <br>
                            <div style="font: montserrat; font-size: 16px;">Are you sure to submit this project?</div>
                            <i class="bi bi-x-octagon-fill">The submitted project will be duly graded, you will not be able to undo this action.</i>
                            
                        </div>
                    </div> 

                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Submit-Project" value="Submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>


<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="assets/bundles/apexcharts.bundle.js"></script>
<script src="assets/bundles/counterup.bundle.js"></script>
<script src="assets/bundles/knobjs.bundle.js"></script>
<script src="assets/bundles/c3.bundle.js"></script>
<script src="assets/js/core.js"></script>
<script src="assets/js/page/project-index.js"></script>


<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/bundles/nestable.bundle.js"></script>
<script src="assets/js/page/sortable-nestable.js"></script>
<script src="assets/js/chart/knobjs.js"></script>
</body>

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