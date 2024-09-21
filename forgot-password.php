<?php 
include('administrator/includes/function.php');
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?=$title?></title>
<!-- Bootstrap CSS -->
  <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css"
    />
    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css"
    />
    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css"
    />
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="vendors/animate-css/animate.css">
<!-- main css -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<!--================Header Menu Area =================-->
<header>
        <nav id="nav" class="">
          <div>
            <img
              src="images/logo-b7ec1ff5.png"
              alt=""
              class="Logo aos-init aos-animate"
              data-aos="fade"
            />
          </div>
          <div class="on">
            <ul class="nav-ul" id="menulist">
              <li>
                <a aria-current="page" class="active" href="index.html">Home</a>
              </li>
              <li><a class="" href="about.html">About Us</a></li>
              <li><a class="" href="market.html">Market</a></li>
              <li>
                <a class="" href="https://fastrack24.in/login.php">Login</a>
              </li>
              <li>
                <a class="" href="https://fastrack24.in/registration.php"
                  >Register</a
                >
              </li>
              <li><a class="" href="contact.html">Contacts</a></li>
              <a href="contact.html"
                ><button class="nav-btn">GET IN TOUCH</button></a
              >
            </ul>
          </div>
          <div id="menu"><i class="fa-solid fa-bars"></i></div>
          <div id="menucls">
            <i class="fa-solid fa-xmark"></i>
          </div>
        </nav>
      </header>
<!--================Header Menu Area =================-->


<div style="background:url(img/banner/bb.jpg);">

<div style="min-height:500px;">

<div>&nbsp;</div>
<div class="container">
<div class="col-md-12 mx-auto" style="margin-top:100px" >
<div class="row">

<div class="col-md-6 mx-auto" >

<div class="block" style="background:rgba(0,0,0,0.8); padding: 30px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);">

<?php if($_REQUEST['m']==2){?>
<div align="center" style="color:#FF0000; font-size:16px;"><strong>Invalid Email or User ID .</strong></div><?php }?>
<?php if($_REQUEST['m']==1){?>
<div align="center" style="color:#00CC33; font-size:16px;"><strong>Your password has been sent!</strong></div>
<?php }?>
<form name="form1" class="text-left clearfix mt-50" action="forgot-password-process.php" method="post" >

<div class="form-group">
<input type="text" class="form-control" name="userid" id="userid"  placeholder="Enter User ID" required>
</div>
<div class="form-group">
<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
</div>
<button type="submit"  class="btn btn-primary p-3 px-xl-5 py-xl-3" >Continue</button>
</form>
<p class="mt-20" style="text-align:center; color:#fff;">Create an account? <a href="registration.php" style="color:#fff;"> Registration</a></p>
<p style="text-align:center;"><a href="forgot-password.php"> Forgot your password?</a></p>

</div>
</div>
</div>
</div>
</div>
</div>


</div>


<!--================ start footer Area =================-->
 <div class="footer-bg">
      <div class="footer-content">
        <div class="footer-content-box">
          <h2 data-aos="fade-right" class="aos-init aos-animate">About</h2>
          <p data-aos="fade-left" class="aos-init aos-animate">
            We focus on the needs of small to middle market businesses to
            improve and grow their return.
          </p>
          <div class="footer-icons aos-init" data-aos="fade-right">
            <i class="fa-brands fa-twitter"></i
            ><i class="fa-brands fa-facebook"></i
            ><i class="fa-brands fa-google-plus-g"></i
            ><i class="fa-brands fa-pinterest"></i
            ><i class="fa-brands fa-linkedin-in"></i>
          </div>
        </div>
        <div class="footer-content-box">
          <ul data-aos="fade-left" class="aos-init aos-animate">
            <h2>Business Hours</h2>
            <li>
              <a href="#"
                >Monday-Friday : &nbsp; &nbsp; &nbsp; 9:00 am - 18:00 pm</a
              >
            </li>
            <li>
              <a href="#"
                >Staurday : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; 9:00 am - 16:00 pm</a
              >
            </li>
            <br />
            <li><a href="#">We Work all the holidays!</a></li>
          </ul>
        </div>
        <div class="footer-content-box">
          <ul data-aos="fade-right" class="aos-init aos-animate">
            <h2>Community</h2>
            <li><a href="#">Our Product</a></li>
            <li><a href="#">Documentation</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">What We Do?</a></li>
          </ul>
        </div>
        <div class="footer-content-box">
          <ul data-aos="fade-right" class="aos-init aos-animate">
            <h2>Quick Links</h2>
             <li><a aria-current="page" class="active" href="index.html">Home</a></li>
                        <li><a class="" href="aboutus.html">About Us</a></li>
                        <li><a class="" href="market.html">Market</a></li>
                        <li><a class="" href="https://fastrack24.in/login.php">Login</a></li>
                        <li><a class="" href="https://fastrack24.in/registration.php">Register</a></li>
                        <li><a class="" href="contact.html">Contacts</a></li>
          </ul>
        </div>
      </div>
    </div>
<!--================ End footer Area =================-->






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>

</body>
<script>
    const menu = document.getElementById("menu");
    const menucls = document.getElementById("menucls");
    const menulist = document.getElementById("menulist");
    menu.addEventListener("click", function () {
      menulist.classList.add("munuactive");
      menu.classList.add("menuhide");
      menucls.classList.add("closehide");
    });
    menucls.addEventListener("click", function () {
      menulist.classList.remove("munuactive");
      menu.classList.remove("menuhide");
      menucls.classList.remove("closehide");
    });
  </script>
</html>