<?php

    session_start();
    require 'includes/dbh.inc.php';

    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }

    if (strlen($_SESSION['userUid'])==0) {
      header('location:includes/logout.inc.php');
    } 

    else{
?>  

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TaskTalk: Collaborative Website for Project Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/LOGO 3.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
    <h1><?php echo'<img id="userDp" src=./uploads/'.$_SESSION["userImg"].'>'?> <a href="Students/page-profile.php" style="text-align:center;"><?php echo'<h5>' . strtoupper($_SESSION['userUid']) . '</h5>'?></a></h1>
   
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href='Students/dashboard.php'>Dashboard</a></li>
          
        </ul>
      </nav>
      
    <!--- ===== Logout database for audit trail ===== ---->
    <form method="post" action="includes/s-logout.php" id="logout-form">
      <input type="submit" class="btn btn-primary" name="logout-submit" value="Logout">
      <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
      <input type="hidden" id="action" name="action" value="Logout" readonly>
                          
  </form>
      </a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1><img src="assets/img/TASKTALK-LOGO.png" class="img-fluid" alt=""></h1>
          <h2>An Online Collaborative Tool</h2>
        </div>
      </div>

      <div class="row mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4 col-6">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="#cta">Mission</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 ">
          <div class="icon-box">
            <i class="ri-paint-brush-line"></i>
            <h3><a href="#cta">Vision</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

 
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/pup.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Know a little bit about our objectives and goals!</h3>
            <p class="font-italic">
            TaskTalk aims to have efficient communication between students and professors to properly organize and plan the given tasks effortlessly online.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>   TaskTalk is a website that help students remain in touch with their peers to retain a classroom like atmosphere design a communication tool for synchronous and asynchronous conversation. </li>
              <li><i class="ri-check-double-line"></i> Provide Transparency to team members about tasks and the overall project progress and have an accountability to task members in doing project tasks and to Organize and properly manage projects using only one app.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="image col-lg-6" style = "background-image: url('assets/img/class.jpg');" data-aos="fade-right"></div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-receipt"></i>
              <h4>Create An Account! </h4>
              <p>Create A Professor/Student Role Account</p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-cube-alt"></i>
              <h4>Track Live Project Updates</h4>
              <p>See Live Project Updates</p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-images"></i>
              <h4>Assign Task</h4>
              <p>Assign Tasks To Group Members</p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-shield"></i>
              <h4>Organize and Plan</h4>
              <p>Organize, Plan and Manage Your Projects Here at TaskTalk!</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

   

 
    <!-- ======= Mission Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
        <br>
        <br>
        <br>
        <br>
          <h3>Mission</h3>
          <br>
          <p> To develop a communication tool for synchronous and asynchronous communication. To share files with ease and orderly. For students to easily organize and manage the class while also tracking its projects. The admin of the group gives roles to people by the feature called task management.</p>
          <br>
          <br>
          <h3>Vision</h3>
          <br>
          <p> TaskTalk aims to have efficient communication between students and professors to properly organize and plan the given tasks effortlessly online. It would be of help and assistance with regards to organizing, planning and managing different kinds of group projects, hoping it would lead to the projects success!</p>
          <br>
          <br>
          <br>
          <br>

        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Check our Team</p>
        </div>

        <div class="row">
<div></div>
          <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team_1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://twitter.com/tinatamadie"target="_blank"><i class="icofont-twitter"></i></a>
                  <a href="https://www.facebook.com/maddiemrcdo"target="_blank"><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  
                </div>
              </div>
              <div class="member-info">
                <h4>Madelaine Mercado</h4>
                <span>Main Programmer and Database Programmer</span>
              </div>
            </div>
          </div>

          
          <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/team_3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://twitter.com/JeffersonUy11"target="_blank"><i class="icofont-twitter"></i></a>
                  <a href="https://www.facebook.com/jeffersonmatthew.uy"target="_blank"><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  
                </div>
              </div>
              <div class="member-info">
                <h4>Jefferson Matthew Uy</h4>
                <span>Main Graphic Artist and Co Programmer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://www.facebook.com/joseenrico.leuterio"target="_blank"><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  
                </div>
              </div>
              <div class="member-info">
                <h4>Jose Enrico Leuterio</h4>
                <span>Co Programmer and Co Graphic Artist</span>
              </div>
            </div>
          </div>


          <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="assets/img/team/team_4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://twitter.com/AdrianAceCarbo1" target="_blank"><i class="icofont-twitter"></i></a>
                  <a href="https://www.facebook.com/ace.carbon/"target="_blank"><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  
                </div>
              </div>
              <div class="member-info">
                <h4>Adrian Ace Carbon</h4>
                <span>Main Researcher</span>
              </div>
            </div>
          </div>


          <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team_6.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href="https://www.facebook.com/jerusaeden.dionco"target="_blank"><i class="icofont-facebook"></i> </a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  
                </div>
              </div>
              <div class="member-info">
                <h4>Jerusa Eden Dionco</h4>
                <span>Co Programmer and Database Programmer</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://maps.google.com/maps?q=San%20Juan%20City,%20Philippines&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Pinaglabanan Street, cor Dr.P.A.Narciso, Street, San Juan, Metro Manila</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>jjjam_2021@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+63 925 666 9090</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
             <h3><img src="assets/img/LOGO 3.png" width="50" height="40" alt="LOGO" ></h3>
              <p>
                Pinaglabanan Street, cor Dr.P.A.Narciso, Street, <br>
                San Juan City, Philippines<br><br>
                <strong>Phone:</strong> +63 925 666 9090<br>
                <strong>Email:</strong> jjjam_2021@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact Us</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="tasktalk/newtasktalk/index-2.php">Dashboard</a></li>
              
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Search</h4>
            <p>Search specific information here:</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Search">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>TaskTalk - Collaborative Website for Project Management</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
          Designed by JJJAM</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php
    }
?>