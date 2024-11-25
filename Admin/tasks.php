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
    
    $query = "SELECT * FROM tasks order by id LIMIT $start_from, $record_per_page";
    $result = mysqli_query($conn, $query);

    if(isset($_POST['pdf-submit'])){

        function generateRow(){
            $contents = '';
            // include_once('../includes/dbh.inc.php');
            $serverName = "localhost";
            $dBUsername = "root";
            $dBPassword = "";
            $dBName = "tasktalk";

            $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

            $sql = "SELECT * FROM tasks";
     
            $query = mysqli_query($conn, $sql);
            $x=0;
            while($row = mysqli_fetch_assoc($query)){
                $x++;

                $sql1 = mysqli_query($conn,"SELECT * FROM course where idCourse = '".$row['course']."'");
                $q1 = mysqli_fetch_assoc($sql1);

                $sql2 = mysqli_query($conn,"SELECT * FROM section where idSection = '".$row['section']."'");
                $q2 = mysqli_fetch_assoc($sql2);

                $sql3 = mysqli_query($conn,"SELECT * FROM users where uidUsers = '".$row['leader']."'");
                $q3 = mysqli_fetch_assoc($sql3);

                $sql4 = mysqli_query($conn,"SELECT * FROM users where uidUsers = '".$row['createdby']."'");
                $q4 = mysqli_fetch_assoc($sql4);

                $sql5 = mysqli_query($conn,"SELECT * FROM projects where id = '".$row['projid']."'");
                $q5 = mysqli_fetch_assoc($sql5);

                $sql6 = mysqli_query($conn,"SELECT * FROM users where uidUsers = '".$row['taskmember']."'");
                $q6 = mysqli_fetch_assoc($sql6);

                
                    $contents .= "
                    <tr>
                        <td>".$row['projid']."</td>
                        <td>".$q5['projname']."</td>
                        <td>".$row['subj_name']."</td>
                        <td>".$q2['section']."</td>
                        <td>".$row['grpid']."</td>
                        <td>".$row['grpno']."</td>
                        <td>".$row['taskname']."</td>
                        <td>".$row['taskdesc']."</td>
                        <td>".($q6['f_name']. " " .$q6['l_name'])."</td>
                        <td>".$row['tduration']."</td>
                        <td>".$row['tend']."</td>
                        <td>".$row['taskstat']."</td>
                        <td>".$row['statdate']."</td>
                        <td>".($q3['f_name']. " " .$q3['l_name'])."</td>
                        <td>".($q4['f_name']. " " .$q4['l_name'])."</td>
                        <td>".$row['created_at']."</td>
                    </tr>
                    ";
            }
     
            return $contents;
        }
    
    require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Available Tasks Table");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage('L');  
    $content = '';  
    $content .= '
        <div>
        <h2 align="center">TaskTalk</h2>
        <h4 align="center"><i>JJJAM Corporation.</i></h4>
        <h4 align="center" style="font: arial;">Generated PDF for TaskTalk System Available Tasks</h4>
        </div>
      	<h4>Available Tasks Table</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th>Project ID</th>
				<th>Project</th>
				<th>Subject</th>
                <th>Section</th> 
                <th>Group ID</th>
                <th>Group #</th> 
                <th>Task</th> 
                <th>Description</th> 
                <th>Member</th> 
                <th>Start</th> 
                <th>End</th> 
                <th>Status</th> 
                <th>Update</th> 
                <th>Leaders</th> 
                <th>Created By</th> 
                <th>Created</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('tasktalk-tasks.pdf', 'I');
    }

    if(isset($_POST['pdf-submit-sub'])){

        function generateRow(){
            $contents = '';
            // include_once('../includes/dbh.inc.php');
            $serverName = "localhost";
            $dBUsername = "root";
            $dBPassword = "";
            $dBName = "tasktalk";

            $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

            $sql = "SELECT * FROM subtasks";
     
            $query = mysqli_query($conn, $sql);
            $x=0;
            while($row = mysqli_fetch_assoc($query)){
                $x++;

                $sql1 = mysqli_query($conn,"SELECT * FROM course where idCourse = '".$row['course']."'");
                $q1 = mysqli_fetch_assoc($sql1);

                $sql2 = mysqli_query($conn,"SELECT * FROM section where idSection = '".$row['section']."'");
                $q2 = mysqli_fetch_assoc($sql2);

                $sql3 = mysqli_query($conn,"SELECT * FROM users where uidUsers = '".$row['leader']."'");
                $q3 = mysqli_fetch_assoc($sql3);

                $sql4 = mysqli_query($conn,"SELECT * FROM users where uidUsers = '".$row['createdby']."'");
                $q4 = mysqli_fetch_assoc($sql4);

                $sql5 = mysqli_query($conn,"SELECT * FROM projects where id = '".$row['projid']."'");
                $q5 = mysqli_fetch_assoc($sql5);

                $sql6 = mysqli_query($conn,"SELECT * FROM users where uidUsers = '".$row['taskmember']."'");
                $q6 = mysqli_fetch_assoc($sql6);

                
                    $contents .= "
                    <tr>
                        <td>".$row['projid']."</td>
                        <td>".$q5['projname']."</td>
                        <td>".$row['subj_name']."</td>
                        <td>".$q2['section']."</td>
                        <td>".$row['grpid']."</td>
                        <td>".$row['grpno']."</td>
                        <td>".$row['subtaskname']."</td>
                        <td>".$row['taskdesc']."</td>
                        <td>".($q6['f_name']. " " .$q6['l_name'])."</td>
                        <td>".$row['tduration']."</td>
                        <td>".$row['tend']."</td>
                        <td>".$row['status']."</td>
                        <td>".($q3['f_name']. " " .$q3['l_name'])."</td>
                        <td>".($q4['f_name']. " " .$q4['l_name'])."</td>
                        <td>".$row['created_at']."</td>
                    </tr>
                    ";
            }
     
            return $contents;
        }
    
    require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Available Subtasks Table");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage('L');  
    $content = '';  
    $content .= '
        <div>
        <h2 align="center">TaskTalk</h2>
        <h4 align="center"><i>JJJAM Corporation.</i></h4>
        <h4 align="center" style="font: arial;">Generated PDF for TaskTalk System Available Subtasks</h4>
        </div>
      	<h4>Available Subtasks Table</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th>Project ID</th>
				<th>Project</th>
				<th>Subject</th>
                <th>Section</th> 
                <th>Group ID</th>
                <th>Group #</th> 
                <th>Subtask</th> 
                <th>Description</th> 
                <th>Member</th> 
                <th>Start</th> 
                <th>End</th> 
                <th>Status</th> 
                <th>Leader</th> 
                <th>Created By</th> 
                <th>Created</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('tasktalk-subtasks.pdf', 'I');
    }


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
                                    <h2>PROJECTS</h2>
                                    <p>Tasks & Subtasks</p>
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

                                <form method="post">
                                    <input type="submit" class="btn btn-primary" value="Convert To PDF" name="pdf-submit" >
                                </form>

                                <form method="post">
                                    <input type="submit" class="btn btn-primary" value="Convert To PDF (Sub)" name="pdf-submit-sub" >
                                </form>

                            </div>
                        </div> 
                    </div> 

                    <?php 
                        if(isset($_GET['search']))
                        {
                    ?>

                    <div class="row clearfix">
                        <div class="col-12 col-sm-12">
                            <div class="table-responsive" style="width: 80%; margin-left: 150px; margin-right: 150px;">
                                <table class="table table-hover table-vcenter mb-0 table_custom spacing8  text-nowrap" style="width: 80%;">
                                <!-- "table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap" -->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course & Section</th>
                                            <th>Subject</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Group ID</th>
                                            <th>Group No.</th>
                                            <th>Leader</th>
                                            <th>Task</th>
                                            <th>Description</th>
                                            <th>Assigned To</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th>Updated</th>
                                            <th>Created By</th>
                                            <th>Date Created</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM tasks WHERE CONCAT(subj_name,leader,taskmember,grpno,grpid,projid,createdby,taskname,taskdesc) LIKE '%$filtervalues%' order by id LIMIT $start_from, $record_per_page";
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
                                                        <?php
                                                            $sql = mysqli_query($conn,"SELECT * FROM section where idSection = '".$items['section']."'");
                                                            $sec = mysqli_fetch_assoc($sql);
                                                            $sql1 = mysqli_query($conn,"SELECT * FROM course where idCourse = '".$items['course']."'");
                                                            $dpt = mysqli_fetch_assoc($sql1);
                                                        ?>
                                                        <?php echo ($dpt['depart_name']. " " .$sec['section']); ?>
                                                    </td>
                                                    
                                                    <td><span><?= $items['subj_name'];?></span></td>
                                                    <td><span><?= $items['projid'];?></span></td>
                                                        <?php
                                                            $prsql = mysqli_query($conn,"SELECT * FROM projects where id = '".$items['projid']."'");
                                                            $proj = mysqli_fetch_assoc($prsql);
                                                        ?>
                                                    <td><span><?= $proj['projname'];?></span></td>
                                                    <td><span><?= $items['grpid'];?></span></td>
                                                    <td><span><?= $items['grpno'];?></span></td>
                                                    <td><span><?= $items['leader'];?></span></td>
                                                    <td><span><?= $items['taskname'];?></span></td>
                                                    <td><span><?= $items['taskdesc'];?></span></td>
                                                    <td><span><?= $items['taskmember'];?></span></td>
                                                    <td>
                                                        <div class="text-info"><?= $items['tduration'];?></div>
                                                        <div class="text-pink"><?= $items['tend'];?></div>
                                                    </td>
                                                    <td><span><?= $items['taskstat'];?></span></td>
                                                    <td><span><?= $items['statdate'];?></span></td>
                                                    <td><span><?= $items['createdby'];?></span></td>
                                                    <td><span><?= $items['created_at'];?></span></td>
                                                    <td><a data-id="<?= $items['id']?>" title="Add Subtask" class="open-EditLog" href="#editLog" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Edit</button></a></td>
                                                    </form>
                                                    <td><a data-id="<?= $items['id']?>" title="Add Subtask" class="open-DeleteLog" href="#deleteLog" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Delete</button></a></td>
                                                </tr>
                                                <!-- ----------------------------------------------- Subtask Loop --------------------------------------------  -->
                                                <tr>
                                                <?php
                                                    $query1 = mysqli_query($conn, "SELECT * FROM subtasks where taskid='".($items['id'])."'  ");

                                                    $array1 = array();

                                                    while($row1 = mysqli_fetch_assoc($query1)){

                                                        $array1[] = $row1;

                                                    ?>
                                                    <td><i class="bi bi-arrow-right-short"></i></td>
                                                    <td>
                                                        <?php
                                                            $sql = mysqli_query($conn,"SELECT * FROM section where idSection = '".$items['section']."'");
                                                            $sec = mysqli_fetch_assoc($sql);
                                                            $sql1 = mysqli_query($conn,"SELECT * FROM course where idCourse = '".$items['course']."'");
                                                            $dpt = mysqli_fetch_assoc($sql1);
                                                        ?>
                                                        <?php echo ($dpt['depart_name']. " " .$sec['section']); ?>
                                                    </td>
                                                    
                                                    <td><span><?= $items['subj_name'];?></span></td>
                                                    <td><span><?= $items['projid'];?></span></td>
                                                        <?php
                                                            $prsql = mysqli_query($conn,"SELECT * FROM projects where id = '".$items['projid']."'");
                                                            $proj = mysqli_fetch_assoc($prsql);
                                                        ?>
                                                    <td><span><?= $proj['projname'];?></span></td>
                                                    <td><span><?= $items['grpid'];?></span></td>
                                                    <td><span><?= $items['grpno'];?></span></td>
                                                    <td><span><?= $items['leader'];?></span></td>
                                                    <td><span><?= $row1['subtaskname'];?></span></td>
                                                    <td><span><?= $row1['taskdesc'];?></span></td>
                                                    <td><span><?= $row1['taskmember'];?></span></td>
                                                    <td>
                                                        <div class="text-info"><?= $row1['tduration'];?></div>
                                                        <div class="text-pink"><?= $row1['tend'];?></div>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-danger ml-0 mr-0"><?php echo $row1['status']?></span>
                                                    </td>
                                                    <td><span><?= $items['statdate'];?></span></td>
                                                    <td><span><?= $row1['createdby'];?></span></td>
                                                    <td><span><?= $row1['created_at'];?></span></td>
                                                    <td><a data-id="<?= $row1['id']?>" title="Add Subtask" class="open-EditSubtask" href="#editSubtask" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Edit</button></a></td>
                                                    </form>
                                                    <td><a data-id="<?= $row1['id']?>" title="Add Subtask" class="open-DeleteSubtask" href="#deleteSubtask" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Delete</button></a></td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="18" style="text-align:center;">No Records Found</td>
                                                </tr>
                                            <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <div align="center">
                                <br />
                                <?php
                                    $page_query = "SELECT * FROM tasks WHERE CONCAT(subj_name,leader,taskmember,grpno,grpid,projid,createdby,taskname,taskdesc) LIKE '%$filtervalues%' ORDER BY id DESC";
                                    $page_result = mysqli_query($conn, $page_query);
                                    $total_records = mysqli_num_rows($page_result);
                                    $total_pages = ceil($total_records/$record_per_page);
                                    $start_loop = $page;
                                    $difference = $total_pages - $page;

                                    if($difference < 1)
                                    {
                                        $start_loop = $total_pages ;
                                         $end_loop = $start_loop -1;
                                         
                                         if($page > 1)
                                        {
                                            echo "<a href='tasks.php?page=1&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>First</a>";
                                            echo "<a href='tasks.php?page=".($page - 1)."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'><<</a>";
                                        }
                                            for($i=$start_loop; $i<=$end_loop; $i++)
                                        {     
                                            echo "<a href='tasks.php?page=".$i."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>".$i."</a>";
                                        }
                                        if($page <= $end_loop)
                                        {
                                            echo "<a href='tasks.php?page=".($page + 1)."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>>></a>";
                                            echo "<a href='tasks.php?page=".$total_pages."&search=".$_GET['search']."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'>Last</a>";
                                        }
                                    }

                                    else{
                                            if($difference <= 5)
                                        {
                                            $start_loop = $total_pages - 3;
                                        }
                                            $end_loop = $start_loop + 2;
                                        if($page > 1)
                                        {
                                            echo "<a href='tasks.php?page=1' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>First</a>";
                                            echo "<a href='tasks.php?page=".($page - 1)."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'><<</a>";
                                        }
                                            for($i=$start_loop; $i<=$end_loop; $i++)
                                        {     
                                            echo "<a href='tasks.php?page=".$i."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>".$i."</a>";
                                        }
                                        if($page <= $end_loop)
                                        {
                                            echo "<a href='tasks.php?page=".($page + 1)."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>>></a>";
                                            echo "<a href='tasks.php?page=".$total_pages."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>Last</a>";
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                                }
                                else{  
                            ?>
                            <div class="table-responsive" style="width: 80%; margin-left: 150px; margin-right: 150px;">
                                <table class="table table-hover table-vcenter mb-0 table_custom spacing8  text-nowrap" style="width: 80%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course & Section</th>
                                            <th>Subject</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Group ID</th>
                                            <th>Group No.</th>
                                            <th>Leader</th>
                                            <th>Task</th>
                                            <th>Description</th>
                                            <th>Assigned To</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th>Updated</th>
                                            <th>Created By</th>
                                            <th>Date Created</th>
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
                                                        <?php
                                                            $sql = mysqli_query($conn,"SELECT * FROM section where idSection = '".$row['section']."'");
                                                            $sec = mysqli_fetch_assoc($sql);
                                                            $sql1 = mysqli_query($conn,"SELECT * FROM course where idCourse = '".$row['course']."'");
                                                            $dpt = mysqli_fetch_assoc($sql1);
                                                        ?>
                                                        <?php echo ($dpt['depart_name']. " " .$sec['section']); ?>
                                                    </td>
                                                    
                                                    <td><span><?= $row['subj_name'];?></span></td>
                                                    <td><span><?= $row['projid'];?></span></td>
                                                        <?php
                                                            $prsql = mysqli_query($conn,"SELECT * FROM projects where id = '".$row['projid']."'");
                                                            $proj = mysqli_fetch_assoc($prsql);
                                                        ?>
                                                    <td><span><?= $proj['projname'];?></span></td>
                                                    <td><span><?= $row['grpid'];?></span></td>
                                                    <td><span><?= $row['grpno'];?></span></td>
                                                    <td><span><?= $row['leader'];?></span></td>
                                                    <td><span><?= $row['taskname'];?></span></td>
                                                    <td><span><?= $row['taskdesc'];?></span></td>
                                                    <td><span><?= $row['taskmember'];?></span></td>
                                                    <td>
                                                        <div class="text-info"><?= $row['tduration'];?></div>
                                                        <div class="text-pink"><?= $row['tend'];?></div>
                                                    </td>
                                                    <td><span><?= $row['taskstat'];?></span></td>
                                                    <td><span><?= $row['statdate'];?></span></td>
                                                    <td><span><?= $row['createdby'];?></span></td>
                                                    <td><span><?= $row['created_at'];?></span></td>
                                                    <td><a data-id="<?= $row['id']?>" title="Add Subtask" class="open-EditLog" href="#editLog" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Edit</button></a></td>
                                                    </form>
                                                    <td><a data-id="<?= $row['id']?>" title="Add Subtask" class="open-DeleteLog" href="#deleteLog" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Delete</button></a></td>
                                                </tr>
                                                <!-- ----------------------------------------------- Subtask Loop --------------------------------------------  -->
                                                <tr>
                                                <?php
                                                    $query1 = mysqli_query($conn, "SELECT * FROM subtasks where taskid='".($row['id'])."'  ");

                                                    $array1 = array();

                                                    while($row1 = mysqli_fetch_assoc($query1)){

                                                        $array1[] = $row1;

                                                    ?>
                                                    <td><i class="bi bi-arrow-right-short"></i></td>
                                                    <td>
                                                        <?php
                                                            $sql = mysqli_query($conn,"SELECT * FROM section where idSection = '".$row['section']."'");
                                                            $sec = mysqli_fetch_assoc($sql);
                                                            $sql1 = mysqli_query($conn,"SELECT * FROM course where idCourse = '".$row['course']."'");
                                                            $dpt = mysqli_fetch_assoc($sql1);
                                                        ?>
                                                        <?php echo ($dpt['depart_name']. " " .$sec['section']); ?>
                                                    </td>
                                                    
                                                    <td><span><?= $row['subj_name'];?></span></td>
                                                    <td><span><?= $row['projid'];?></span></td>
                                                        <?php
                                                            $prsql = mysqli_query($conn,"SELECT * FROM projects where id = '".$row['projid']."'");
                                                            $proj = mysqli_fetch_assoc($prsql);
                                                        ?>
                                                    <td><span><?= $proj['projname'];?></span></td>
                                                    <td><span><?= $row['grpid'];?></span></td>
                                                    <td><span><?= $row['grpno'];?></span></td>
                                                    <td><span><?= $row['leader'];?></span></td>
                                                    <td><span><?= $row1['subtaskname'];?></span></td>
                                                    <td><span><?= $row1['taskdesc'];?></span></td>
                                                    <td><span><?= $row1['taskmember'];?></span></td>
                                                    <td>
                                                        <div class="text-info"><?= $row1['tduration'];?></div>
                                                        <div class="text-pink"><?= $row1['tend'];?></div>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-danger ml-0 mr-0"><?php echo $row1['status']?></span>
                                                    </td>
                                                    <td><span><?= $row['statdate'];?></span></td>
                                                    <td><span><?= $row1['createdby'];?></span></td>
                                                    <td><span><?= $row1['created_at'];?></span></td>
                                                    <td><a data-id="<?= $row1['id']?>" title="Add Subtask" class="open-EditSubtask2" href="#editSubtask2" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Edit</button></a></td>
                                                    </form>
                                                    <td><a data-id="<?= $row1['id']?>" title="Add Subtask" class="open-DeleteSubtask2" href="#deleteSubtask2" style="font-color:#000;"><button type="button" class="btn btn-primarytab">Delete</button></a></td>
                                                </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <div align="center">
                                <br />
                                <?php
                                    $page_query = "SELECT * FROM tasks ORDER BY id DESC";
                                    $page_result = mysqli_query($conn, $page_query);
                                    $total_records = mysqli_num_rows($page_result);
                                    $total_pages = ceil($total_records/$record_per_page);
                                    $start_loop = $page;
                                    $difference = $total_pages - $page;

                                        if($difference <= 5)
                                        {
                                            $start_loop = $total_pages - 5;
                                        }
                                            $end_loop = $start_loop - 4;
                                        if($page > 1)
                                        {
                                            echo "<a href='tasks.php?page=1' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>First</a>";
                                            echo "<a href='tasks.php?page=".($page - 1)."' style='padding: 8px 16px; border-width: 2px; color:#333; font-weight:bold;'><<</a>";
                                        }
                                            for($i=$start_loop; $i<=$end_loop; $i++)
                                        {     
                                            echo "<a href='tasks.php?page=".$i."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>".$i."</a>";
                                        }
                                        if($page <= $end_loop)
                                        {
                                            echo "<a href='tasks.php?page=".($page + 1)."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>>></a>";
                                            echo "<a href='tasks.php?page=".$total_pages."' style='padding: 8px 16px;  border-width: 2px; color:#333; font-weight:bold;'>Last</a>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>     
                </section>
            </div>
        </div>   
    </div>  
</div>


<!-- Edit Task-->
<form action="../includes/a-edittask.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="editLog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Task</h6>
            </div>
            <div class="modal-body">
            <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="taskname" name="taskname" placeholder="Edit Task name">
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder="Edit Task Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    
                    <div class="form-group">
                        <select id="leader" name="leader" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <select id="taskmember" name="taskmember" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
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
                <input type="submit"  class="btn btn-primary"  name="Edit-Task" value="Edit">
                <input type="hidden" name="task" id="task" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Edit Task" />
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
<form action="../includes/a-edittask2.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
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
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="taskname" name="taskname" placeholder="Edit Task name">
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder=" Edit Task Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    
                    <div class="form-group">
                        <select id="leader" name="leader" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <select id="taskmember" name="taskmember" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
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
                <input type="submit"  class="btn btn-primary"  name="Edit-Task2" value="Edit">
                <input type="hidden" name="log" id="log" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Edit Task" />
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

<!-- Delete Task -->
<form action="../includes/a-deletetask.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteLog" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Task</h6>
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
                <input type="submit"  class="btn btn-primary"  name="Delete-Task" value="Delete">
                <input type="hidden" name="del" id="del" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Delete Task" />
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

<!-- Delete Task 2 -->
<form action="../includes/a-deletetask2.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteLogs" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Task </h6>
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
                <input type="submit"  class="btn btn-primary"  name="Delete-Task2" value="Delete">
                <input type="hidden" name="dellg" id="dellg" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Delete Task" />
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

<!-- Edit Subtask-->
<form action="../includes/a-editsubtask.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="editSubtask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Subtask</h6>
            </div>
            <div class="modal-body">
            <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="taskname" name="taskname" placeholder="Edit Task name">
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder="Edit Task Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    
                    <div class="form-group">
                        <select id="leader" name="leader" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <select id="taskmember" name="taskmember" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
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
                <input type="submit"  class="btn btn-primary"  name="Edit-Subtask" value="Edit">
                <input type="hidden" name="subtask" id="subtask" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Edit Subtask" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditSubtask", function (e) {

        e.preventDefault();

        var _self = $(this);

        var mySubtaskId = _self.data('id');
        $("#subtask").val(mySubtaskId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Edit Subtask 2 -->
<form action="../includes/a-editsubtask2.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="editSubtask2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Edit Subtask</h6>
            </div>
            <div class="modal-body">
            <div class="row clearfix">
                        <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" style="margin-left: 0px; text-align:left;" class="form-control" id="taskname" name="taskname" placeholder="Edit Task name">
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <textarea class="form-control" id="taskdesc" name="taskdesc" placeholder=" Edit Task Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    
                    <div class="form-group">
                        <select id="leader" name="leader" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <select id="taskmember" name="taskmember" class="form-control" required>
                            <option selected hidden value="">Edit Group Member</option>
                     
                            <?php

                                $query1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                while ($data = mysqli_fetch_assoc($query1)){
                            ?>
                            
                            <option value="<?php echo $data['uidUsers']; ?>"><?php echo ($data['f_name']. " " .$data['l_name']) ; ?></option>
                            <?php  }?> 
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
                <input type="submit"  class="btn btn-primary"  name="Edit-Subtask2" value="Edit">
                <input type="hidden" name="subtask2" id="subtask2" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Edit Task" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-EditSubtask2", function (e) {

        e.preventDefault();

        var _self = $(this);

        var mySubtask2Id = _self.data('id');
        $("#subtask2").val(mySubtask2Id);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Delete Subtask -->
<form action="../includes/a-deletesubtask.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteSubtask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Subtask</h6>
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
                <input type="submit"  class="btn btn-primary"  name="Delete-Subtask" value="Delete">
                <input type="hidden" name="delst" id="delst" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Delete Task" />
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

        var myDelstId = _self.data('id');
        $("#delst").val(myDelstId);

        $(_self.attr('href')).modal('show');
        });
    </script>
</form>

<!-- Delete Subtask 2 -->
<form action="../includes/a-deletesubtask2.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="deleteSubtask2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Delete Subtask </h6>
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
                <input type="submit"  class="btn btn-primary"  name="Delete-Subtask2" value="Delete">
                <input type="hidden" name="delst2" id="delst2" value="" />
                <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userUid']?>" />
                <input type="hidden" name="actions" id="actions" value="Delete Task" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click", ".open-DeleteSubtask2", function (e) {

        e.preventDefault();

        var _self = $(this);

        var myDelst2Id = _self.data('id');
        $("#delst2").val(myDelst2Id);

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
