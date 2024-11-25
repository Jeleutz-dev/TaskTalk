<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link href="assets/img/LOGO 3.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/trial.css">
  </head>
  <body>
    <section>
    
      <div class="container">
        <div class="user signinBx">
          <div class="imgBx"> 
            <div class="box"><header style="font-size: 30px; color:white; margin-top: 25%; text-align: center; font-family: Gloucester MT Extra Condensed;"></header>
              <div class="col-xxxxl-12 col-lg-25">
                <h1><img src="assets/img/Logo12.png" class="img-fluid" alt=""></h1></div>
              </div>
          </div>

          <div class="formBx">
            <form action="includes/a-login.inc.php" method="post">
              <h1></h1>
              <h2></h2>
              <br>
              <h2>ADMIN</h2>
              <br>

              <?php 
            
                  if(isset($_SESSION['userId']))
                  {
                      echo'<div style="text-align: center;">
                              <img id="userDp" src=./uploads/'.$_SESSION["userImg"].'>
                              <h3>' . strtoupper($_SESSION['userUid']) . '</h3>
                              <a href="profile.php" class="button login">Profile</a> 
                              <a href="includes/a-logout.inc.php" class="button login">Logout</a>
                          </div>';
                  }
                  else
                  {
                      if(isset($_GET['error']))
                      {
                          if($_GET['error'] == 'emptyfields')
                          {
                              
                          }
                          else if($_GET['error'] == 'nouser')
                          {
                              
                          }
                          else if ($_GET['error'] == 'wrongpwd')
                          {
                              
                          }
                          else if ($_GET['error'] == 'sqlerror')
                          {
                              echo '<p class="closed">*website error. contact admint to have it fixed</p>';
                          }
                      }

                      echo '<form method="post" action="includes/a-login.inc.php" id="login-form">
                          <input type="text" id="name" name="mailuid" placeholder="Username...">
                          <input type="password" id="password" name="pwd" placeholder="Password...">
                          <input type="submit" class="button next login" name="adminlogin" value="Login">
                          <input type="hidden" id="name" name="uid" placeholder="Username" value="<?php echo $userName; ?>">
                          <input type="hidden" id="action" name="action" value="Login" readonly>
                          
                          </form>';
                      
                  }
              ?>
               
              
            <!-- errors will appear on the form -->
              <?php
              if (isset($_GET["error"])) {
                  if ($_GET["error"] == "emptyinput") {
                    echo '<span style="color: black; font-size: 12px; font-family: Poppins; 
                    color: #806c00; margin-left: 20px; letter-spacing: 1px;">FILL IN ALL FIELDS!';
                  }
                  else if ($_GET["error"] == "wronglogin") {
                    echo '<span style="color: black; font-size: 10px; font-family: Poppins; 
                    color: #806c00; margin-left: 20px; letter-spacing: 1px;">INCORRECT LOGIN INFORMATION!';
                  }
              }
          ?>
          
              <?php 
                if (isset($_GET["newpwd"])){
                  if ($_GET["newpwd"] == "passwordupdated") {
                    echo '<span style="color: black; font-size: 10px; font-family: Poppins; 
                    color: #806c00; margin-left: 20px; letter-spacing: 1px;>Your password has been reset!</p>';
                  }
                }
              
              ?>
            <!-- <a href="http://localhost/tasktalk2/admin/Dashboard.php?login=success" class="btn btn-dark"  role="button"> </a> -->
            </form>
          </div>
        </div>
        
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/LOGIN.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>            
  </section>
  
  <?php
  if(isset($_GET['error']))
  {
    if($_GET['error'] == 'emptyfields')
    {
        ?>
        <script>
            swal({
                title: "Error!",
                text: "Please fill in all the fields!",
                icon: "warning",
                button: "Close",
                });
        </script>
        <?php
    }

    else if($_GET['error'] == 'nouser')
    {
      ?>
      <script>
          swal({
              title: "Error!",
              text: "Username does not exist!",
              icon: "warning",
              button: "Close",
              });
      </script>
      <?php
  }
                             
    else if ($_GET['error'] == 'wrongpwd')
    {
      ?>
      <script>
          swal({
              title: "Error!",
              text: "Wrong password!",
              icon: "warning",
              button: "Close",
              });
      </script>
      <?php
    }
  }
    ?>
  </body>
</html>