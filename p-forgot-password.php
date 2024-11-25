<!doctype html>
<html lang="en">
  <head>
    <title>Reset Password</title>
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
                <h1><img src="assets/img/TT-LOGO2.png" class="img-fluid" alt=""></h1></div>
              </div>
          </div>

          <div class="formBx">
            <form action="p-password-reset-token.php" method="post">
            <h1><img src="assets/img/reset.png" width="50" height="40" alt="LOGO" ></h1>
              <h2>Reset your Password</h2>
              <small class="form-text text-muted">An email will be sent to you with instructions on how to reset your password.</small>
              <br>
              <input type="text" id="email" name="email" placeholder="Enter your email">
                          <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
                          <input type="submit" class="button next login" name="password-reset-token" value="Send Code">
                          <?php
                             if (isset($_GET["reset"])) {
                                if ($_GET["reset"] == "success") {
                                   echo '<span style="color: black; font-size: 12px; font-family: Poppins; 
                                   color: #806c00; margin-left: 20px; letter-spacing: 1px;">CHECK YOUR EMAIL!';
                  }
               /*   else if ($_GET["error"] == "wronglogin") {
                    echo '<span style="color: black; font-size: 10px; font-family: Poppins; 
                    color: #806c00; margin-left: 20px; letter-spacing: 1px;">INCORRECT LOGIN INFORMATION!';
                  } */
              }
          ?>
                          <p class="signup">
                          Go back to 
                          <a href="p-login.php">LOGIN.</a>
                          </p>
            </form>
    

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
  
  </body>
</html>