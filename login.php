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
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="vendors/animate-css/animate.css">
<!-- main css -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<!--================Header Menu Area =================-->
<?php include('header.php')?>
<!--================Header Menu Area =================-->


<div style="background:url(img/banner/bb.jpg);">

<div style="min-height:500px;">

<div>&nbsp;</div>
<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">

<div class="col-md-6 mx-auto" >

<div class="block" style="background:rgba(0,0,0,0.8); padding: 30px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);">

<h2 align="center" style="color:#FFFFFF;">Login</h2>

<?php if($_REQUEST['e']==1){?>
<div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Invalid User ID or Password.</strong></div>
<?php }?>

<form name="form1" class="text-left clearfix mt-50" action="login-process.php" method="post" >
<div class="form-group" style=" background:#FFFFFF;">
<input type="text" class="form-control"  name="userid" id="userid"  placeholder="Enter User ID" style="height:42px" required>
</div>
<div class="form-group" style="background:#FFFFFF;">
<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" style="height:42px; background:#FFFFFF;" required>
</div>
<div align="center"><input type="submit" class="btn btn-primary p-3 px-xl-5 py-xl-1" style="width:100%;"  value="Sign In" /></div>
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
<?php include('footer.php')?>
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
</html>