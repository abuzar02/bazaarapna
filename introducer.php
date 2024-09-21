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
<script src="js/ajax.js" type="text/javascript"></script>

<script>
function getUserIDcheck(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequest;
xmlhttp.send();
}
function getUserIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{

var response=xmlhttp.responseText;
document.getElementById('sponname').value=response;
}
}
}
</script>
<script>
function getCharecter()
{

var textEntered,counter;          
textEntered = document.getElementById('phone').value;  
counter =textEntered.length;
if(parseInt(counter)<10)
{
alert('Phone No is Invalid');
return false;

}else{
return true;
}
}
</script>


</head>
<body>

<!--================Header Menu Area =================-->
<?php include('header.php')?>
<!--================Header Menu Area =================-->
<section class="hero-banner hero-banner-sm">
<div class="container text-center">
<h2>Registration </h2>
<nav aria-label="breadcrumb" class="banner-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Registration </li>
</ol>
</nav>
</div>
</section>

<div style="min-height:600px;">

<div>&nbsp;</div>
<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">

<div class="col-md-6 mx-auto" >
<div class="block" style="background-image: linear-gradient(to bottom, #ff6e2e, #ff8c29, #ffa92b, #ffc437, #fbde4b, #f9e54f, #f7eb54, #f5f259, #f7e848, #fade36, #fcd322, #ffc800); padding: 30px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);">

<h2 align="center" style="color:#FFFFFF;">Registration</h2>

<?php if($_REQUEST['msg']==4){?>
<div align="center" style="background:#FFFFFF;">
<div align="center" style="margin:0;padding:0;color:#006600; font-size:18px;"><strong>Your Registration Successfully Completed!</strong></div>
<h6 align="center" style="color:#006600;font-size:18px;">User ID: <?=getMember($conn,$_REQUEST['id'],'userid')?>&nbsp; Password: <?=base64_decode(getMember($conn,$_REQUEST['id'],'password'))?></h6>
</div>
<?php }?>

<?php if($_REQUEST['q']==4){?><div align="center" style="margin:0;padding:0;color:#000066; font-size:14px;"><strong>Invalid/Inactive Sponsor ID!</strong></div><?php }?>  
<?php if($_REQUEST['e']==1){?><p align="center" style="color:#FF0000;">Phone number or email ID  already used!</p><?php }?>

<form name="form1" action="registration-process.php?case=introducer&intr=<?=$_REQUEST['intr']?>" method="post">

<div class="form-group" style="color:#000000;">
<input type="text" class="form-control"  placeholder="Sponsor ID" name="sponsor" id="sponsor" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);" value="<?=$_REQUEST['intr']?>" />
</div>

<div class="form-group" style="color:#000000;">
<input type="text" class="form-control"  placeholder="Sponsor Name" name="sponname" id="sponname"  readonly="" style="color:#000000;" value="<?=getMemberUserID($conn,$_REQUEST['intr'],'name')?>" required />
</div>

<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<select type="text" class="form-control" name="position" id="position" required>
<option value="">Select Position</option>
<option value="Left">Left</option>
<option value="Right">Right</option>
</select>
</div>
<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<select name="package" id="package" class="form-control  border-primary" required>
<option value="">Select Package</option>
<?php
$sql2="SELECT * FROM `ee_settings_package` ORDER BY `amount`";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
?>
<option value="<?=$fetch2['id']?>"><?=ucwords(strtolower($fetch2['package']))?> (<?=$fetch2['amount']?>)</option>
<?php }}?>
</select>
</div>
<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<input type="text" class="form-control" placeholder="Name" name="name" id="name" required />
</div>

<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<input type="password" class="form-control" placeholder="Password" name="password" id="password" required />
</div>

<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<input type="text" class="form-control" placeholder="Phone No" name="phone" id="phone" required pattern="[6-9]{1}[0-9]{9}" maxlength="10" />
</div>

<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required />
</div>

<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<input type="text" class="form-control" placeholder="Enter Address" name="address" id="address" required />
</div>

<div align="center"><input type="submit" class="btn btn-primary p-3 px-xl-5 py-xl-1" style="width:100%;"  value="Register Now" /></div>

</form>

</div>
</div>
</div>
</div>

</div>

</div>

<div>&nbsp;</div>


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