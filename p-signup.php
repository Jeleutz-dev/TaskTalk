<?php
    define('TITLE',"Signup | Franklin's Fine Dining");
    
    if(isset($_SESSION['userId']))
    {
        header("Location: index.php");
        exit();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link href="assets/img/LOGO 3.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/signup1.css">
  </head>

  <body>
    <?php
    
        $userName = '';
        $email = '';
    

    ?>
     <!-- errors will appear on the form --> 

    
    <section>
    <div class="container">
      <div class="user signupBx">
        <div class="formBx">

        <form action="includes/p-signup.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
            
            <input type="text" id="name" name="uid" placeholder="Username" value=<?php echo $userName; ?>>
            <input type="email" id="email" name="mail" placeholder="email" value=<?php echo $email; ?>>
            <input type="password" id="pwd" name="pwd" placeholder="password">
            <input type="password" id="pwd-repeat" name="pwd-repeat" placeholder="repeat password">
            <br>
            <div class="upload-btn-wrapper">
                <h2>Profile Picture</h2>
                <input type="file" name='dp'>
            </div>
            
            <h2>Gender</h2>
            <label for="gender-m">Male
            <input type="radio" checked="checked" name="gender" value="Male" id="gender-m">
            <span class="checkmark"></span>
            </label>
            <label for="gender-f">Female
            <input type="radio" name="gender" value="Female" id="gender-f">
            <span class="checkmark"></span>
            </label> 
    
            <input style="text-transform:capitalize" type="text" id="f-name" name="f-name" placeholder="First Name" >
            <input style="text-transform:capitalize" type="text" id="l-name" name="l-name" placeholder="Last Name" >
            <input style="text-transform:capitalize" type="text" id="headline" name="headline" placeholder="Your Profile Headline">
            <textarea id="bio" name="bio" style="text-transform:capitalize" placeholder="What you want to tell people about yourself"></textarea>
            <br>
            <input type="submit" class="button next" name="signup-submit" value="signup">
            <input type="hidden" id="action" name="action" value="New Sign-Up" readonly>
            
            <p class="signup" style="font-size:10px;">
                        By signing up, you agree to the 
                        <a href="tos.php">Terms of Service</a> 
                        <br>and <a href="PrivacyPolicy.php">Privacy Policy</a>, including <a href="CookieUse.php">Cookie Use.</a>
            </p>
            <p class="signup">
                        Already have an account ?
                        <a href="p-login.php">LOGIN.</a>
            </p>
            
        </form>
        </div>
            <div class="imgBx">
              <p style="text-align: center; font-family: Gloucester MT Extra Condensed;
              color: rgb(197, 193, 193); font-size: 17px; margin-top: 30%; margin-left: 10%; margin-right: 10%;"></p>   
              <h1><img src="assets/img/hi.gif" class="img-fluid" alt=""></h1></div>           
            </div>
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
    if ($_GET['error'] == 'invalidmailuid')
    {
        ?>
        <script>
            swal({
                title: "Error!",
                text: "Please enter a valid email and user name!",
                icon: "warning",
                button: "Close",
                });
        </script>
        <?php
    }

    else if ($_GET['error'] == 'invalidmail')
    {
        ?>
        <script>
            swal({
                title: "Error!",
                text: "Please enter a valid email!",
                icon: "warning",
                button: "Close",
                });
        </script>
        <?php
    }
    else if ($_GET['error'] == 'invaliduid')
    {
        
        ?>
        <script>
            swal({
                title: "Error!",
                text: "Invalid user name! Only use letters and numbers.",
                icon: "warning",
                button: "Close",
                });
        </script>
        <?php
    }
    else if ($_GET['error'] == 'invalidpassword')
    {
        ?>
            <script>
                    swal({
                        title: "Error!",
                        text: "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.",
                        icon: "warning",
                        button: "Close",
                        });
                </script>
                <?php
            }
    else if ($_GET['error'] == 'passwordcheck')
    {
        ?>
                <script>
                    swal({
                        title: "Error!",
                        text: "Password did not match",
                        icon: "warning",
                        button: "Close",
                        });
                </script>
                <?php
            }

    else if ($_GET['error'] == 'usertaken')
            {
                ?>
                <script>
                    swal({
                        title: "Error!",
                        text: "This User name is already taken",
                        icon: "warning",
                        button: "Close",
                        });
                </script>
                <?php
            }
        }
   else if (isset($_GET['signup']) == 'success')
    {
        ?>
    <script>
        swal({
            title: "Success!",
            text: "You have successfully created an account!",
            icon: "success",
            button: "Close",
            });
    </script>
    <?php
    }
    ?>  
  </body>
</html>