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
<div style="background:url(img/banner/banner-2.jpg);">

<div style="min-height:600px;" >

<div>&nbsp;</div>
<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">

<div class="col-md-6 mx-auto" style="margin-top:100px">
<div class="block" style="background:rgba(0,0,0,0.8); padding: 30px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);">
<h2 align="center" style="color:#FFFFFF;">Registration</h2>
<?php if($_REQUEST['msg']==4){?>
<div align="center" style="background:#FFFFFF;">
<div align="center" style="margin:0;padding:0;color:#006600; font-size:18px;"><strong>Your Registration Successfully Completed!</strong></div>
<h6 align="center" style="color:#006600;font-size:18px;">User ID: <?=getMember($conn,$_REQUEST['id'],'userid')?>&nbsp; Password: <?=base64_decode(getMember($conn,$_REQUEST['id'],'password'))?></h6>
</div>
<?php }?>

<?php if($_REQUEST['q']==4){?><div align="center" style="margin:0;padding:0;color:#000066; font-size:14px;"><strong>Invalid/Inactive Sponsor ID!</strong></div><?php }?>  
<?php if($_REQUEST['e']==1){?><p align="center" style="color:#FF0000;">Phone number or email ID  already used!</p><?php }?>

<form name="form1" action="registration-process.php" method="post">
<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<input type="text" class="form-control"  placeholder="Sponsor ID" name="sponsor" id="sponsor" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);" />
</div>

<div class="form-group" style="color:#000000;background:#FFFFFF;border-radius:10px;">
<input type="text" class="form-control"  placeholder="Sponsor Name" name="sponname" id="sponname"  readonly="" style="color:#000000;" required />
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
if($num2>0){
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
          <!--<ul data-aos="fade-right" class="aos-init aos-animate">-->
          <!--  <li><a aria-current="page" class="active" href="index.html">Home</a></li>-->
          <!--              <li><a class="" href="aboutus.html">About Us</a></li>-->
          <!--              <li><a class="" href="market.html">Market</a></li>-->
          <!--              <li><a class="" href="https://fastrack24.in/login.php">Login</a></li>-->
          <!--              <li><a class="" href="https://fastrack24.in/registration.php">Register</a></li>-->
          <!--              <li><a class="" href="contact.html">Contacts</a></li>-->
          <!--</ul>-->
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