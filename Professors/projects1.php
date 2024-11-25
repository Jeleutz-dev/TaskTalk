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

<title>TaskTalk - Projects</title>

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
<!-- <div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div> -->

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
            <div class="d-flex align-items-baseline mt-3">
                <h3 class="mb-0 mr-2">9.8</h3>
                <p class="mb-0"><span class="text-success">1.6% <i class="fa fa-arrow-up"></i></span></p>
            </div>
            <div class="progress progress-xs">
                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-orange" role="progressbar" style="width: 5%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-indigo" role="progressbar" style="width: 13%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h6 class="text-uppercase font-10 mt-1">Performance Score</h6>
            <hr>
            <p>Activity</p>
            <ul class="new_timeline">
                <li>
                    <div class="bullet pink"></div>
                    <div class="time">11:00am</div>
                    <div class="desc">
                        <h3>Attendance</h3>
                        <h4>Computer Class</h4>
                    </div>
                </li>
                <li>
                    <div class="bullet pink"></div>
                    <div class="time">11:30am</div>
                    <div class="desc">
                        <h3>Added an interest</h3>
                        <h4>“Volunteer Activities”</h4>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">12:00pm</div>
                    <div class="desc">
                        <h3>Developer Team</h3>
                        <h4>Hangouts</h4>
                        <ul class="list-unstyled team-info margin-0 p-t-5">                                            
                            <li><img src="assets/images/xs/Aldous.jpg" alt="Avatar"></li>
                            <li><img src="assets/images/xs/cosmok.png" alt="Avatar"></li>
                            <li><img src="assets/images/xs/joey.png" alt="Avatar"></li>
                            <li><img src="assets/images/xs/jose.png" alt="Avatar"></li>                                            
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">2:00pm</div>
                    <div class="desc">
                        <h3>Responded to need</h3>
                        <a href="javascript:void(0)">“In-Kind Opportunity”</a>
                    </div>
                </li>
                <li>
                    <div class="bullet orange"></div>
                    <div class="time">1:30pm</div>
                    <div class="desc">
                        <h3>Lunch Break</h3>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">2:38pm</div>
                    <div class="desc">
                        <h3>Finish</h3>
                        <h4>Go to Home</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div id="left-sidebar" class="sidebar-dark">
        <h5 class="brand-name">TASKTALK</h5>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
                <li class="g_heading">Project</li>
                <li><a href="dashboard.php"><i ></i><img src="assets/images/dashboard.png"><span style="margin-left:5px;">  Dashboard</span></a></li>
                <li class="active"><a href="project-list.php"><i ></i><img src="assets/images/subjects.png"><span style="margin-left:5px;"> Project List</span></a></li>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM projects WHERE createdby='".$_SESSION['userUid']."'");
                    // $query = mysqli_query($conn, "SELECT * FROM projects ");
                    $array = array();
                                                                        
                    $x=0;
                        while($row = mysqli_fetch_assoc($query)){                            
                        $array[] = $row;
                        $x++;
                ?>
                <li style="margin-left:30px;"><a href="project-board.php?course=<?php echo $row["course"]?>&section=<?php echo $row["section"]?>&subject=<?php echo $row["subj_name"]?>&id=<?php echo $row["id"]?>&projname=<?php echo $row["projname"]?>"><i ></i><span><?php echo $row["projname"];?></span></a></li> 
                
                <?php } ?>                      
                <li><a href="grade-book.php"><i ></i><img src="assets/images/grade-book.png"><span style="margin-left:5px;">  Grade Book</span></a></li>
                <li><a href="associates.php"><i ></i><img src="assets/images/associates.png"><span style="margin-left:5px;"> Associates</span></a></li>  
                
                <li class="g_heading">App</li>
                <li><a href="app-calendar.php"><i></i><img src="assets/images/calendar.png"><span style="margin-left:5px;"> My Calendar</span></a></li>
                <li><a href="chat/app-chat.php"><i></i><img src="assets/images/messages.png"><span style="margin-left:5px;"> Chat Room</span></a></li>
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
                            <div class="dropdown d-flex">
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
                            </div>
                            <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/notif_30px.png"></a><span class="badge badge-primary nav-unread"></span>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="list-unstyled feeds_widget">
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                            <h4 class="title">Task Completed <small class="float-right text-muted"></small></h4>
                                                <small>IT elective 2 (Team Infante)</small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">Project Added Successfully <small class="float-right text-muted"></small></h4>
                                                <small>Database Admin</small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">A Leader updated a description <small class="float-right text-muted"></small></h4>
                                                <small>Principles of Management</small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">You Have an Unfinished Project <small class="float-right text-muted"></small></h4>
                                                <small></small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">Warning<small class="float-right text-muted">1 </small></h4>
                                                <small>Please verify your email</small>
                                            </div>
                                        </li>                                   
                                    </ul>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                </div>
                            </div>
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
        
        <div class="section mt-3">
            <div class="section">
                <div class="container-fluid">
                
                    <!-- Start of Row -->
                    <div class="row clearfix row-deck">
                        <!-- Group Section -->
                        <div class="col-xl-8 col-lg-14 col-md-14">
                            <section id="groups" class="groups overflow-auto" >
                                <div class="container" data-aos="fade-up">

                                    <div class="section-title">
                                        <h2>Section</h2>
                                        <p>Projects</p>
                                    </div>
                                
                                    <div class="row">
                                        <div class="swiper-wrapper">
                                        <?php
                                                $query = mysqli_query($conn, "SELECT * FROM projects WHERE createdby='".$_SESSION['userUid']."' AND course='".$_GET['course']."' AND section='".$_GET['section']."' AND subj_name='".$_GET['subject']."' order by id DESC");
                                                // $query = mysqli_query($conn, "SELECT * FROM projects ");
                                                $array = array();
                                                                        
                                                $x=0;
                                                while($row = mysqli_fetch_assoc($query)){                            
                                                    $array[] = $row;
                                                    $x++;
                                            ?>

                                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                                <div class="member" data-aos="fade-up" data-aos-delay="100">

                                                    <form method="get" action="project-board.php?">
                                                    <div class="member-img"></form>
                                                        <button type="submit" class="btn" data-target="#editProject">
                                                        <input type="hidden" class="card-title"name="course" value="<?php echo $row['course'];?>">
                                                        <input type="hidden" class="card-title"name="section" value="<?php echo $row['section'];?>">
                                                        <input type="hidden" class="card-title"name="subject" value="<?php echo $row['subj_name'];?>">
                                                        <input type="hidden" class="card-title"name="id" value="<?php echo $row['id'];?>">
                                                        <input type="hidden" class="card-title"name="projname" value="<?php echo $row['projname'];?>"><img src="assets/images/project-2.0.png" class="img-fluid" alt=""></button>
                                                    
                                                    <div class="social">
                                                        <a data-id="<?php echo $row['id'];?>" title="Edit Project" class="open-editProject" href="#editproject" style="font-color:#000;"><i class="bi bi-pencil-square"></i></a>
                                                      
                                                        <a data-id="<?php echo $row['id'];?>" title="Delete Project" class="open-deleteProject" href="#deleteproject" style="font-color:#000;"><i class="bi bi-trash"></i></a> 
                                                        
                                                        <a class="formtitellink" title="See Criteria" style="font-color:#000;" href="seecriteria.php?id=<?php echo $row['id'];?>"><i class="bi bi-journals"></i></a>

                                                    
                                                    </div>

                                                </div>
                                                <div class="member-info">
                                                    <div class="progress progress-xs">
                                                        <?php
                                                            $result1 = mysqli_query($conn, "SELECT * FROM projects WHERE projstat='Done' AND id = '".$row['id']."'") or die(mysql_error());
                                                            $list1 = mysqli_num_rows($result1);
                                                                if ($list1 != 0) {
                                                                    $result2 = mysqli_query($conn, "SELECT * FROM projects WHERE id = '".$row['id']."'") or die(mysql_error());
                                                                    $list2 = mysqli_num_rows($result2);

                                                                    $finalstat = $list1_ * 100 / $list2;
                                                        ?>
                                                                    <div class="progress-bar bg-orange" role="progressbar" style="width: <?php echo $finalstat;?>%" aria-valuenow="<?php echo $finalstat;?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    
                                                        <?php
                                                                }
                                                                else{
                                                        ?>
                                                                    <div class="progress-bar bg-orange" role="progressbar" style="width: 5%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <?php
                                                                }
                                                        ?>
                                                        
                                                    </div>
                                                    <!-- <div class="float-left"><strong><?php echo round($finalstat,2);?>%</strong></div> -->
                                                    <br>
                                                    <h4><?php echo $row['projname'];?></h4>
                                                    <span><?php echo $row['projdesc'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                            <div class="member d-flex align-items-center" data-aos="fade-up" data-aos-delay="100" data-toggle="modal" data-target="#addProject">
                                                <div class="member-img">
                                                    <a href="#"><img src="assets/images/proj-icon.png" class="img-fluid"  data-toggle="modal" data-target="#addProject"alt=""></i></a>
                                                <div class="member-info" style="text-align:center;">
                                                    <h4>Add Project</h4>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div> 
                        <!-- End of Group Section -->
                       
                        <!-- Start of Recent Task -->
                        <div class="col-xl-4 col-lg-12 col-md-12">
                            <div class="tab-pane fade show active" id="todo-list" role="tabpanel">
                                <div class="card-body">
                                    <section id="project" class="project">
                                        <div class="container" data-aos="fade-up">
                                            <div class="section-title">
                                                <h2>Post</h2>
                                                <p>Announcement</p>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="new_post">
                                                        <form action="../includes/ppl-announcements.php" method='post' id="contact-form" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            
                                                            <!-- script for textarea formatting -->
                                                            
                                                            <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                                                            <script>tinymce.init({selector:'textarea'});</script> -->

                                                            <input type="text" class="form-control" style="margin-left: 0px; text-align: left;" id="title" name="title" placeholder="Title" required/>
                                                            <br>
                                                        
                                                            <textarea class="form-control no-resize"  id="annoucements" name="announcements" placeholder="Type your announcement" required></textarea>
                                                            
                                                        </div>
                                                        <div class="mt-4 text-right"> 
                                                        
                                                                <button type="submit" id="post-announcement" class="btn btn-primary" name="post-announcement">
                                                                <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>">
                                                                <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>">
                                                                <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>">
                                                                <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                                                Post</button>
                                                            
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- <button type="button" class="block">Add Task</button> -->
                                            <!-- <button type="button" class="block" data-toggle="modal" data-target="#addtask">Add Task to Leaders</button> -->
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- End of Recent Task -->
                    </div>   
                    <!-- End of Row -->
                </div>
            </div>  

            <div class="section">
            <div class="container-fluid">
                <div class="row clearfix row-deck">
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="card" style="background-color:#bcb8d456">
                            <div class="section" style="margin-left:20px; margin-right:20px; margin-top:20px;">
                                <h8>Recent Tasks</h8>
                                <!-- <p>Recent</p> -->
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM tasks WHERE createdby='".$_SESSION['userUid']."' AND course='".$_GET['course']."' AND section='".$_GET['section']."' AND subj_name='".$_GET['subject']."' AND leader!='All' order by id DESC LIMIT 1");

                                    $array = array();
                                    while($row = mysqli_fetch_assoc($query)){
                                        $array[] = $row;

                                ?>
                                
                                <form method="get" action="collaboration-board.php?">
                                <div class="card" style="margin-top:20px;"></form>
                                    <div class="card-body">
                                        <div class="table-responsive todo_list">
                                            <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap"> 
                                                <thead>
                                                <tr>
                                                    <th>Task Name</th>
                                                    <th class="w150 text-right">Due</th>
                                                    <th class="w100">Priority</th>
                                                    <th class="w80">User</th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        <h3 class="card-title">
                                                            <button type="submit" class="btn" data-target="#editProject">
                                                                <input type="hidden" class="card-title"name="course" value="<?php echo $row['course'];?>">
                                                                <input type="hidden" class="card-title"name="section" value="<?php echo $row['section'];?>">
                                                                <input type="hidden" class="card-title"name="subject" value="<?php echo $row['subj_name'];?>">
                                                                <input type="hidden" class="card-title"name="id" value="<?php echo $row['projid'];?>">
                                                                <?php
                                                                    $proj = mysqli_query($conn, "SELECT * FROM projects WHERE id='".$row['projid']."'");
                                                                    $qproj = mysqli_fetch_assoc($proj);
                                                                ?>
                                                                <input type="hidden" class="card-title"name="projname" value="<?php echo $qproj['projname'];?>">
                                                                <input type="hidden" class="card-title"name="grpno" value="<?php echo $row['grpno'];?>">
                                                                <input type="hidden" class="card-title"name="grpid" value="<?php echo $row['grpid'];?>">
                                                                <input type="hidden" class="card-title"name="leader" value="<?php echo $row['leader'];?>">
                                                                <?php echo $row['taskname'];?>
                                                            </button>
                                                        </h3>
                                                    </td>
                                                    <td class="text-right"><?php echo $row['tend'];?></td>
                                                    <td><span class="tag tag-danger ml-0 mr-0"><?php echo $row['taskstat'];?></span></td>
                                                    <td>
                                                            <?php
                                                                $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND  uidUsers = '".$row['taskmember']."'");
                                                                $que = mysqli_fetch_assoc($qry1);
                                                            ?>

                                                                <?php echo'<img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" class="avatar avatar-pink"  data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'>'?>
                                                                <span"></span>
                                                        
                                                        <!-- <span class="avatar avatar-pink"  data-toggle="tooltip" data-placement="top" title="<?php echo ($que['f_name']. " " .$que['l_name']);?>" data-original-title="<?php echo ($que['f_name']. " " .$que['l_name']);?>"><img src="../uploads/<?php echo $que['userImg'];?>" alt=""></span> -->
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <form method="get" action="collaboration-board.php?">
                                    <button type="submit" class="button-block2" style="width:90%; margin-inline:auto;">
                                    <input type="hidden" class="card-title"name="course" value="<?php echo $row['course'];?>">
                                    <input type="hidden" class="card-title"name="section" value="<?php echo $row['section'];?>">
                                    <input type="hidden" class="card-title"name="subject" value="<?php echo $row['subj_name'];?>">
                                    <input type="hidden" class="card-title"name="id" value="<?php echo $row['projid'];?>">
                                    <?php
                                        $proj = mysqli_query($conn, "SELECT * FROM projects WHERE id='".$row['projid']."'");
                                        $qproj = mysqli_fetch_assoc($proj);
                                    ?>
                                    <input type="hidden" class="card-title"name="projname" value="<?php echo $qproj['projname'];?>">
                                    <input type="hidden" class="card-title"name="grpno" value="<?php echo $row['grpno'];?>">
                                    <input type="hidden" class="card-title"name="grpid" value="<?php echo $row['grpid'];?>">
                                    <input type="hidden" class="card-title"name="leader" value="<?php echo $row['leader'];?>">
                                    View All</button>
                                </form>
                                <?php } ?>
                            </div>
                            
                            

                            <!-- <button type="submit" class="button-block2" style="width:90%; margin-inline:auto;" href="grade-book.php">View All</button> -->
                            
                            <br>

                        </div>
                            
                    </div>

                    <!-- --------------------- Messages ----------------- -->

                    <div class="col-xl-8 col-lg-12 col-md-12">
                        <div class="section" style="margin-left:20px; margin-top:20px;">
                            <h8>Recent Announcements</h8>
                            <!-- <p>Recent</p> -->
                        </div>
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM announcements WHERE course='".$_GET['course']."' AND section='".$_GET['section']."' AND subject='".$_GET['subject']."' ORDER BY datetime DESC Limit 3");
                            $array = array();

                            while($row = mysqli_fetch_assoc($query)){
                                $array[] = $row;
                        ?>
                        <div class="hover-state rounded-20 rounded-top-20 py-3 card border-bottom" style="width:95%; margin-inline: auto; margin-top:10px; ">
                            <div class="d-flex align-items-center flex-wrap flex-lg-nowrap py-0 card-body">
                                    
                                <div class="ps-0 ps-lg-3 pe-lg-3 col-lg-3 col-10">
                                    <a class="d-flex align-items-center card-link" href="#/message">
                                        <?php
                                            $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE  uidUsers = '".$row['user']."'");
                                            $que = mysqli_fetch_assoc($qry1);
                                        ?>
                                        <img src="../uploads/<?php echo $que['userImg'];?>" class="avatar-sm rounded-circle me-3">
                                        &nbsp;&nbsp;
                                        <h6 class=""><?php  echo ($que['f_name']. " " .$que['l_name']);?></h6>
                                    </a>
                                </div>
                                    
                                <div class="d-flex align-items-center justify-content-end px-0 order-lg-4 col-lg-2 col-2">
                                    <div class=""><?php echo $row['datetime'];?></div>
                                </div>
                                    
                                <div class="d-flex align-items-center mt-3 mt-lg-0 ps-0 col-lg-7 col-12">
                                    <a class="fw-normal text-gray truncate-text card-link" href="#/message">
                                        <span class="fw-bold ps-lg-3"><?php echo $row['title'];?> - <?php echo substr($row['text'],0,30) . '...';?></span>
                                    </a>
                                </div>
                            </div>
                        </div>  
                        <?php
                        }
                        ?> 
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
</div>

<form action="../includes/ppl-projects.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
    <div class="modal fade" id="addProject" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel1">Add New Project</h6>
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
                        <input type="hidden" name="sect" id="sect" value="<?= $_GET['section']?>" />
                        <input type="hidden" name="co" id="co" value="<?= $_GET['course']?>" />
                        <input type="hidden" name="subj" id="subj" value="<?= $_GET['subject']?>" />
                        <input type="submit"  class="btn btn-primary"  name="Add-Button" value="Add Project">
                        <input type="hidden" id="uid" name="uid" value="<?php echo ($_SESSION['userUid']);?>" readonly>
                        <input type="hidden" id="action" name="action" value="Add Project" readonly>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Add task -->
<form action="../includes/ppb-task.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
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
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="taskname" name="taskname" placeholder="Task name" required>
                            <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>" readonly>
                            <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>" readonly>
                            <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>" readonly>
                            <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>" readonly>
                            <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>" readonly>
                            <!-- <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>"> -->
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo ($_SESSION['f_name']) . " " . ($_SESSION['l_name']); ?>" readonly>
                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>" readonly>
                            <input type="hidden" id="action" name="action" value="Add Task" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder="Task Description" required></textarea>
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
                            <?php

                                $query = mysqli_query($conn, "SELECT * FROM projects where id='".($_GET['id'])."'");

                                while ($list = mysqli_fetch_assoc($query)) {
                                    $i=0;
                                    $lead = explode(',',$list['leader']);
                                    foreach($lead as $c) {
                                        $i++;
                                        $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers='".$c."'");
                                        $data = mysqli_fetch_assoc($query);
                            ?>
                            <option selected hidden value="">Assign To Group Leader</option>
                            <option value="<?php echo $c; ?>"><?php echo "Group ".$i." - ".($data['f_name']. " " .$data['l_name']).""  ; ?></option>
                            <?php } }?> 
                            <option value="All">All</option>
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
                <input type="submit"  class="btn btn-primary"  name="Add-Task" value="Add">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
</form>

<!-- Add Group Member -->
<form action="../includes/p-addmembers.inc.php" method='post' id="contact-form" enctype="multipart/form-data">

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
                                    <select multiple="multiple" name="members[]" class="form-control" required>
                                    
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
                                    
                                    <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>" readonly>
                                    <input type="hidden" id="createdby" name="createdby" value="<?php echo ($_SESSION['f_name']) . " " . ($_SESSION['l_name']);?>" readonly>
                                    <input type="hidden" id="subject" name="subject" value="<?php echo $_GET['subject'];?>" readonly>
                                    <input type="hidden" id="projname" name="projname" value="<?php echo $_GET['projname'];?>" readonly>
                                    <input type="hidden" id="projId" name="projId" value="<?php echo $_GET['id'];?>" readonly>
                                    <input type="hidden" id="course" name="course" value="<?php echo $_GET['course'];?>" readonly>
                                    <input type="hidden" id="section" name="section" value="<?php echo $_GET['section'];?>" readonly>
                                    <input type="hidden" id="action" name="action" value="Add Group Members" readonly>
                                    <input type="hidden" name="id" id="id" value="" readonly/>
                                    <input type="hidden" name="lead" id="lead" value="" readonly/>
                                    <input type="hidden" name="grp" id="grp" value="" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-primary"  name="Add-Member" value="Add">
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
                <h6 class="title" id="defaultModalLabel1">View Members</h6>
            </div>

            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="hidden" name="group" id="group" value="" readonly/>
                            <input type="hidden" name="leader" id="leader" value="" readonly/>
                            <input type="hidden" name="idgroup" id="idgroup" value="" readonly/>
                        </div>
                        <div id="insert">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <input type="submit"  class="btn btn-primary"  name="Add-Member" value="Add-Member"> -->
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
                let newinput = document.getElementById("insert");
                let inserthtml = "";
                e.preventDefault();

                var _self = $(this);

                var myGroupId = _self.data('id');
                $("#group").val(myGroupId);

                var myLeaderId = _self.data('lead-id');
                $("#leader").val(myLeaderId);

                var myGrpId = _self.data('group-id');
                $("#idgroup").val(myGrpId);

                $(_self.attr('href')).modal('show');

                // if (myGrpId in groupmembers){
                //     var members = groupmembers[myGrpId].split(",");
                //     for(let i = 0; i < members.length; i++) {
                //         insert.append("<div>"+ members[i] +"</div>");
                //     }
                // }
                
                if (myGrpId in groupmembers){
                    var members = groupmembers[myGrpId]; 
                    console.log(members);
                    for(let i = 0; i < members.length; i++) {

                        // insert.append("<div>"+ members[i]['f_name'] + " " + members[i]['l_name'] +"</div>");
                        inserthtml += `<div>${members[i]['f_name']} ${members[i]['l_name']}<div>`;
                        
                        // insert.empty();
                    }
                    
                    newinput.innerHTML = inserthtml;
                } 
            });

            $("#close-btn").on("click", function() {
                let newinput = document.getElementById("insert");
                let inserthtml = "";
                // insert.empty();
                newinput.innerHTML = inserthtml;
            });

            // if($("#viewMembers").is(":hidden")) {
            //         insert.empty();
            //     }

            // $('#viewMembers').on('hidden.bs.modal', function () {
            //     var input = document.querySelector('#insert');
            //     input.parentNode.removeChild(input);
            //     // input.empty();
            // })

        });

</script>

<!-- Update Member -->
<form action="../includes/p-addmembersupdate.inc.php" method='post' id="contact-form" enctype="multipart/form-data">

    <div class="modal fade" id="updateMembers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel1">Update Members</h6>
                </div>

                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                    <label for='members[]'>Select multiple members using the ctrl + click command:</label><br>
                                    <select multiple="multiple" id="members" name="members[]" class="form-control" required>

                                    </select><br>
                                </form> 
                                    <input type="text" name="upid" id="upid" value="" readonly/>
                                    <input type="text" name="idlead" id="idlead" value="" readonly/>
                                    <input type="text" name="idgrp" id="idgrp" value="" readonly/>
                                    <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>" readonly>
                                    <input type="hidden" id="createdby" name="createdby" value="<?php echo ($_SESSION['f_name']) . " " . ($_SESSION['l_name']);?>" readonly>
                                    <input type="hidden" id="subject" name="subject" value="<?php echo $_GET['subject'];?>" readonly>
                                    <input type="hidden" id="projname" name="projname" value="<?php echo $_GET['projname'];?>" readonly>
                                    <input type="hidden" id="projid" name="projid" value="<?php echo $_GET['id'];?>" readonly>
                                    <input type="hidden" id="course" name="course" value="<?php echo $_GET['course'];?>" readonly>
                                    <input type="hidden" id="section" name="section" value="<?php echo $_GET['section'];?>" readonly>
                                    <input type="hidden" id="action" name="action" value="Add Group Members" readonly>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-primary"  name="Update-Member" value="Update">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
        $(document).on("click", ".open-UpdateMembers", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myUpidId = _self.data('id');
        $("#upid").val(myUpidId);

        var myIdleadId = _self.data('lead-id');
        $("#idlead").val(myIdleadId);

        var myIdgrpId = _self.data('grp-id');
        $("#idgrp").val(myIdgrpId);

        $(_self.attr('href')).modal('show');

        $.ajax({
            url: '../addMembers.php',
            type: 'post',
            data: {"grpid" : myIdgrpId, "grpno" : myUpidId},
            dataType: 'json',
            success:function(response){
                console.log(response);
                let members = document.getElementById("members");
                let memberhtml = "";

                var len = response.length;

                // $("#members[]").empty();
                    for( var i = 0; i<len; i++){
                        var uidUsers = response[i]['uidUsers'];
                        var f_name = response[i]['f_name'];
                        var l_name = response[i]['l_name'];

                        memberhtml += `<option value="${uidUsers}">${f_name} ${l_name}</option>`;

                        // $("#members").append("<option value='"+uidUsers+"'>"+f_name+' '+l_name+"</option>");
                        
                    }
                // }
                members.innerHTML = memberhtml;
            }
        });


        });
    </script>
</form>

<!-- Delete Group -->
<form action="../includes/p-groupdelete.inc.php" method='post' id="contact-form" enctype="multipart/form-data">

    <div class="modal fade" id="deleteMembers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel1">Delete Group</h6>
                </div>

                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name="groupno" id="groupno" value="" readonly/>
                                <input type="hidden" name="leaders" id="leaders" value="" readonly/>
                                <input type="hidden" name="gpdid" id="gpdid" value="" readonly/>
                                <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>" readonly>
                                <input type="hidden" id="createdby" name="createdby" value="<?php echo ($_SESSION['f_name']) . " " . ($_SESSION['l_name']);?>" readonly>
                                <input type="hidden" id="subject" name="subject" value="<?php echo $_GET['subject'];?>" readonly>
                                <input type="hidden" id="projname" name="projname" value="<?php echo $_GET['projname'];?>" readonly>
                                <input type="hidden" id="projid" name="projid" value="<?php echo $_GET['id'];?>" readonly>
                                <input type="hidden" id="course" name="course" value="<?php echo $_GET['course'];?>" readonly>
                                <input type="hidden" id="section" name="section" value="<?php echo $_GET['section'];?>" readonly>
                                <input type="hidden" id="action" name="action" value="Delete Group" readonly>
                                
                                </div>
                            </div>
                        </div>            
                        <div class="col-12">
                            <div class="form-group" style ="text-align: center;">
                                <img src="assets/images/warning.png" alt="Girl in a jacket" width="100" height="100">
                                <br>
                                <br>
                                <div style="font: montserrat; font-size: 16px;">Are you sure you want to delete this item?</div>
                                <div style="font-size: 12px;">There are other items included that would be affected in this action.</div>
                                <i class="bi bi-x-octagon-fill" style="font-size: 12px; color: red;">You will not be able to undo this.</i>
                                
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-primary"  name="Delete-Group" value="Delete">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
        $(document).on("click", ".open-deleteMembers", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myGroupnoId = _self.data('id');
        $("#groupno").val(myGroupnoId);

        var myLeadersId = _self.data('lead-id');
        $("#leaders").val(myLeadersId);

        var myGpdidId = _self.data('group-id');
        $("#gpdid").val(myGpdidId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Add New Group-->
<form action="../includes/p-addgroups.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="addgroup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Add New Group</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">

                    <input type="hidden" class="form-control" id="subject" name="subject" value="<?php  echo $_GET['subject']; ?>" readonly>
                    <input type="hidden" class="form-control" id="course" name="course" value="<?php  echo $_GET['course']; ?>" readonly>
                    <input type="hidden" class="form-control" id="section" name="section" value="<?php  echo $_GET['section']; ?>" readonly> 
                    <input type="hidden" class="form-control" id="projid" name="projid" value="<?php  echo $_GET['id']; ?>" readonly>
                    <input type="hidden" class="form-control" id="projname" name="projname" value="<?php  echo $_GET['projname']; ?>" readonly>
                    <!-- <input type="hidden" class="form-control" id="leader" name="leader" value="<?php  echo $_GET['leader']; ?>"> -->
                    <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php  echo $_SESSION['userUid'] ?>" readonly>
                    <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>" readonly>
                    <input type="hidden" id="action" name="action" value="Added a Group" readonly>

                    <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM groups where projid = '".$_GET['id']."'");
                        $count = mysqli_num_rows($sql);

                        $grpno = $count;
                    ?>
                    <input type="hidden" id="grpno" name="grpno" value="<?php echo $grpno;?>">

                    <div class="col-12">
                        <div class="form-group">   
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                <label for='leaders[]'>Select multiple members using the ctrl + click command:</label><br>
                                <select multiple="multiple" name="leaders[]" class="form-control" required>
                                <?php
                                        $query = mysqli_query($conn, "SELECT DISTINCT user.uidUsers, projects.leader from user,projects where projects.leader NOT RLIKE user.uidUsers AND user.userType='student' AND projects.id = '".$_GET['id']."';");
                                        while($data = mysqli_fetch_assoc($query)){

                                            $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$data['uidUsers']."'");
                                            $data1 = mysqli_fetch_assoc($query1);
                                            
                                ?>
                                    <option value="<?php echo $data['uidUsers'];?>"><?php echo ($data1['f_name']. " " .$data1['l_name']);?></option>
                                    <?php } ?>
                                </select><br>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Add-Button" value="Add">
                    <input type="hidden" id="uid" name="uid" value="<?php echo ($_SESSION['userUid']);?>" readonly>
                    <input type="hidden" id="action" name="action" value="Add Project" readonly>
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
<script src="../helpers/v2/app.js?v=2021.4.5156"></script>

</body>
</html>

<?php
      }
?>