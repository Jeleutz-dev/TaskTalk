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
    $record_per_page = 10;
    $page = '';
    if(isset($_GET["page"]))
    {
     $page = $_GET["page"];
    }
    else
    {
     $page = 1;
    }
    
    $start_from = ($page-1)*$record_per_page;
    
    $query = "SELECT * FROM activity_log order by activity_log_id LIMIT $start_from, $record_per_page";
    $result = mysqli_query($conn, $query);


?>  
<!doctype html>
<html lang="en" dir="ltr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="simple-logo2.ico" type="image/x-icon"/>

<title>Welcome to TaskTalk</title>

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
                <li><a href="dashboard.php"><i ></i><img src="assets/images/dashboard.png"><span>  Dashboard</span></a></li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:30px;"><img src="assets/images/features_25px.png"> Features</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="addup.php">Add Up</a>
                            <a class="dropdown-item" href="subjects.php">Subjects</a>
                            <a class="dropdown-item" href="sections.php">Sections</a>
                            <a class="dropdown-item" href="projects.php">Projects</a>
                            <a class="dropdown-item" href="groups.php">Groups</a>
                            <a class="dropdown-item" href="tasks.php">Tasks</a>
                    </div>
                    
                </div>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:30px;"><img src="assets/images/users_25px.png">  Users</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="admin.php">Admin</a>
                            <a class="dropdown-item" href="faculty.php">Faculty</a>
                            <a class="dropdown-item" href="students.php">Students</a>
                    </div>
                    
                </div>
                <li><a href="audit-trail.php"><i ></i><img src="assets/images/audit_25px.png"><span>  Audit Trail</span></a></li> 
                
                
                <li class="g_heading">App</li>
                <li><a href="app-calendar.php"><i></i><img src="assets/images/calendar.png"><span> My Calendar</span></a></li>
                <li><a href="app-chat.php"><i></i><img src="assets/images/messages.png"><span> Chat Room</span></a></li>
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
                            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/task_30px.png"></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="project-list.php">Project List</a>
                                <a class="dropdown-item" href="app-calendar.php">My Calender</a>
                            </div> 
                        </div>
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
    <!-- ======= Hero Section ======= -->
    
    <div class="section mt-3">
        <div class="section">
            <div class="container-fluid">
                <section id="services" class="services">
                    <div class="row clearfix row-deck">
                        <div class="col-xl-12 col-lg-14 col-md-14">
                            <div class="container" data-aos="fade-up">

                                <div class="section-title">
                                    <h2>USER</h2>
                                    <p>Admin</p>
                                </div>

                                <div class="row">
                                </div>

                                <div class="col-md-7" style="float: right;">

                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div> 
                    </div> 

                    <!-- <div class="row clearfix">
                        <div class="col-12 col-sm-12"> -->
                    <?php 
                        if(isset($_GET['search']))
                        {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap" style="width: 80%; margin-left: 150px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th>Date & Time</th>
                                        <th>Audit #</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM activity_log WHERE CONCAT(uidUsers,action) LIKE '%$filtervalues%' order by activity_log_id LIMIT $start_from, $record_per_page";
                                        $query_run = mysqli_query($conn, $query);
                                        // $query1 = mysqli_fetch_assoc($query_run);

                                        if(mysqli_num_rows($query_run) > 0)
                                        { 
                                            $x = 0;
                                            foreach($query_run as $items)
                                            {
                                                $x++;
                                            
                                                ?>
                                                <tr>
                                                    <td><?php echo $x;?></td>
                                                    <td>
                                                        <h6 class="mb-0"><?=$items['uidUsers'] ?></h6>
                                                        <span>Something</span>
                                                    </td>
                                                    <td><?= $items['action']; ?></td>
                                                    <td><div class="text"><?= $items['date']; ?></div></td>
                                                    <td><?= $items['activity_log_id']; ?></td>
                                                    <form action="" method="GET">
                                                    <td><a data-id="<?= $items['activity_log_id']?>" title="Add Subtask" class="open-EditLog" href="#editLog" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Edit</button></a></td>
                                                    </form>
                                                    <td><a data-id="<?= $items['activity_log_id']?>" title="Add Subtask" class="open-DeleteLog" href="#deleteLog" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Delete</button></a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="7" style="text-align:center;">No Records Found</td>
                                                </tr>
                                            <?php
                                        }
                                            ?>

                                </tbody>
                            </table>
                            <div align="center">
                                <br />
                                <?php
                                    $page_query = "SELECT * FROM activity_log WHERE CONCAT(uidUsers,action) LIKE '%$filtervalues%' ORDER BY activity_log_id DESC";
                                    $page_result = mysqli_query($conn, $page_query);
                                    $total_records = mysqli_num_rows($page_result);
                                    $total_pages = ceil($total_records/$record_per_page);
                                    $start_loop = $page;
                                    $difference = $total_pages - $page;

                                        if($difference <= 5)
                                        {
                                            $start_loop = $total_pages - 3;
                                        }
                                            $end_loop = $start_loop + 3;
                                        if($page > 1)
                                        {
                                            echo "<a href='audit-trail.php?page=1&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>First</a>";
                                            echo "<a href='audit-trail.php?page=".($page - 1)."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'><<</a>";
                                        }
                                            for($i=$start_loop; $i<=$end_loop; $i++)
                                        {     
                                            echo "<a href='audit-trail.php?page=".$i."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>".$i."</a>";
                                        }
                                        if($page <= $end_loop)
                                        {
                                            echo "<a href='audit-trail.php?page=".($page + 1)."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>>></a>";
                                            echo "<a href='audit-trail.php?page=".$total_pages."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>Last</a>";
                                        }
                                ?>
                            </div>
                            <?php
                                }
                                else{  
                            ?>
                            <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap" style="width: 80%; margin-left: 150px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th>Date & Time</th>
                                        <th>Audit #</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 0;
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $x++;
                                    ?>
                                        <tr>
                                            <td><?php echo $x;?></td>
                                            <td>
                                                <h6 class="mb-0"><?php echo $row["uidUsers"]; ?></h6>
                                                <span>Something</span>
                                            </td>
                                            <td>
                                                <?php echo $row["action"]; ?>
                                            </td>
                                            <td>
                                                <div class="text"><?php echo $row["date"]; ?></div>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-left"><strong><?php echo $row["activity_log_id"]; ?></strong></div>
                                                </div>
                                                </div>
                                            </td>
                                            <td><a data-id="<?= $row['activity_log_id']?>" title="Add Subtask" class="open-EditLogs" href="#editLogs" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Edit</button></a></td>
                                            <td><a data-id="<?= $row['activity_log_id']?>" title="Add Subtask" class="open-DeleteLogs" href="#deleteLogs" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Delete</button></a></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                            <div align="center">
                                <br />
                                <?php
                                    $page_query = "SELECT * FROM activity_log ORDER BY activity_log_id DESC";
                                    $page_result = mysqli_query($conn, $page_query);
                                    $total_records = mysqli_num_rows($page_result);
                                    $total_pages = ceil($total_records/$record_per_page);
                                    $start_loop = $page;
                                    $difference = $total_pages - $page;

                                        if($difference <= 5)
                                        {
                                            $start_loop = $total_pages - 5;
                                        }
                                            $end_loop = $start_loop + 4;
                                        if($page > 1)
                                        {
                                            echo "<a href='audit-trail.php?page=1' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>First</a>";
                                            echo "<a href='audit-trail.php?page=".($page - 1)."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'><<</a>";
                                        }
                                            for($i=$start_loop; $i<=$end_loop; $i++)
                                        {     
                                            echo "<a href='audit-trail.php?page=".$i."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>".$i."</a>";
                                        }
                                        if($page <= $end_loop)
                                        {
                                            echo "<a href='audit-trail.php?page=".($page + 1)."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>>></a>";
                                            echo "<a href='audit-trail.php?page=".$total_pages."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>Last</a>";
                                        }
                                    }
                                ?>
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

<!-- Edit Audit Trail -->
<form action="../includes/a-editaudit.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="editLog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Audit Trail</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="uid" name="uid" placeholder="Edit User">
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="action" name="action" placeholder="Edit Action"></textarea>
                        </div>
                    </div>
                             
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Edit-Audit" value="Edit">
                <input type="hidden" name="task" id="task" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Edit Audit Trail" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditLog", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myTaskId = _self.data('id');
        $("#task").val(myTaskId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Edit Audit Trail 2 -->
<form action="../includes/a-editaudit2.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="editLogs" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Audit Trail</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="uid" name="uid" placeholder="Edit User">
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="action" name="action" placeholder="Edit Action"></textarea>
                        </div>
                    </div>
                             
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Edit-Audit" value="Edit">
                <input type="hidden" name="log" id="log" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Edit Audit Trail" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditLogs", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myLogId = _self.data('id');
        $("#log").val(myLogId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Delete Audit Trail -->
<form action="../includes/a-deleteaudit.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteLog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Audit Trail</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group" style ="text-align: center;">
                            <img src="assets/images/warning.png" alt="Girl in a jacket" width="100" height="100">
                            <br>
                            <br>
                            <div style="font: montserrat; font-size: 16px;">Are you sure you want to delete this item?</div>
                            <!-- <div style="font-size: 12px;">There are subtasks included in this item that would be affected.</div> -->
                            <i class="bi bi-x-octagon-fill" style="font-size: 12px; color: red;">You will not be able to undo this.</i>
                            
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Delete-Audit" value="Delete">
                <input type="hidden" name="del" id="del" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Delete Audit Trail" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-DeleteLog", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myDelId = _self.data('id');
        $("#del").val(myDelId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Delete Audit Trail 2 -->
<form action="../includes/a-deleteaudit2.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteLogs" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Audit Trail </h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group" style ="text-align: center;">
                            <img src="assets/images/warning.png" alt="Girl in a jacket" width="100" height="100">
                            <br>
                            <br>
                            <div style="font: montserrat; font-size: 16px;">Are you sure you want to delete this item?</div>
                            <!-- <div style="font-size: 12px;">There are subtasks included in this item that would be affected.</div> -->
                            <i class="bi bi-x-octagon-fill" style="font-size: 12px; color: red;">You will not be able to undo this.</i>
                            
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                <input type="submit"  class="btn btn-primary"  name="Delete-Audit" value="Delete">
                <input type="hidden" name="dellg" id="dellg" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Delete Audit Trail" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-DeleteLogs", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myDellgId = _self.data('id');
        $("#dellg").val(myDellgId);

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
