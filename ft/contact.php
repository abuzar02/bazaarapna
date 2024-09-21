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


<!--================Hero Banner Area Start =================-->
<section class="hero-banner hero-banner-sm">
<div class="container text-center">
<h2>Contact Us</h2>
<nav aria-label="breadcrumb" class="banner-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
</ol>
</nav>
</div>
</section>
<!--================Hero Banner Area End =================-->


<!-- ================ contact section start ================= -->
<section class="contact-section area-padding">
<div class="container">
<div class="d-none d-sm-block mb-5 pb-4">


</div>


<div class="row">

<div class="col-12">
<h2 class="contact-title">Get in Touch</h2>
</div>


<div class="col-lg-8">

<?php if($_REQUEST['m']=='1'){?><div align="center" style="color:#009933;padding-bottom:8px;"><strong>Your Message Successfully Sent!</strong></div><?php }?>
<form class="form-contact contact_form" action="contact-process.php" method="post">
<div class="row">
<div class="col-12">
<div class="form-group">
<textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message' required></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input class="form-control" name="name" id="name" type="text" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter your name'" placeholder = 'Enter Your Name' required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input class="form-control" name="phone" id="phone" type="text" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter Phone '" placeholder = 'Enter Phone' required maxlength="10">
</div>
</div>
<div class="col-sm-12">
<div class="form-group">
<input class="form-control" name="email" id="email" type="email" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter email address'" placeholder = 'Enter Email Address' required>
</div>
</div>
<div class="col-12">
<div class="form-group">
<input class="form-control" name="subject" id="subject" type="text" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter Subject'" placeholder = 'Enter Subject' required>
</div>
</div>
</div>
<div class="form-group mt-3">
<button type="submit" class="button button-contactForm">Send Message</button>
</div>
</form>
</div>

<?php
$sql="SELECT * FROM `ee_contact` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0){
$fetch=fetcharray($res);
?>

<div class="col-lg-4">
<div class="media contact-info">
<span class="contact-info__icon"><i class="ti-home"></i></span>
<div class="media-body">
<h3>Address:<?=$fetch['address1']?>,<?=stripslashes($fetch['address2'])?></h3>

</div>
</div>
<div class="media contact-info">
<span class="contact-info__icon"><i class="ti-tablet"></i></span>
<div class="media-body">
<h3>Phone:<span>+ <?=$fetch['phone1']?>/  <?=$fetch['phone2']?></span></h3>

</div>
</div>
<div class="media contact-info">
<span class="contact-info__icon"><i class="ti-email"></i></span>
<div class="media-body">
<h3>Email:<span><?=$fetch['email1']?>, <?=$fetch['email2']?></span></h3>

</div>
</div>
</div>

<?php } ?>
</div>
</div>
</section>
<!-- ================ contact section end ================= -->

<!--================ start footer Area =================-->
<?php include('footer.php')?>
<!--================ End footer Area =================-->


<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times"></i>
</button>
<h2>Thank you</h2>
<p>Your message is successfully sent...</p>
</div>
</div>
</div>
</div>

<!-- Modals error -->

<div id="error" class="modal modal-message fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times"></i>
</button>
<h2>Sorry !</h2>
<p> Something went wrong </p>
</div>
</div>
</div>
</div>
<!--================End Contact Success and Error message Area =================-->






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