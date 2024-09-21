<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
} 
$userid=getMember($conn,$_SESSION['mid'],'userid');
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
$lpack=getLatestPackage($conn,$userid,'package');

include('calculate-matching-bonus.php');
include('calculate-roi-release.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">

<style>
.graph_content {
display: none;
position: fixed;
top: 5%;
left: 10%;
width: 80%;
height: 90%;
z-index: 9999;
background-color:#FFFFFF;
overflow:auto;

}
.black_overlay {
display: none;
position: fixed;
top: 0%;
left: 0%;
width: 100%;
height: 100%;
background-color: #000000;
z-index: 9998;
-moz-opacity: 0.9;
opacity: 0.9;
filter: alpha(opacity=50);
}

.box{background:url(images/jlk.png) no-repeat;
z-index:9999;
}
</style>
<script type="text/javascript" src="assets/js/ajax.js"></script>
<script type="text/javascript">
function getPopup()
{
document.getElementById('popup1').style.display='inline';
document.getElementById('popup2').style.display='inline';
}
function popupBox()
{
document.getElementById('popup1').style.display='inline';
document.getElementById('popup2').style.display='inline';
}
function closeBox()
{
document.getElementById('popup1').style.display='none';
document.getElementById('popup2').style.display='none';
}
</script>
</head>
<body style="min-height:950px;background:#FFFFFF;">
<div class="wrapper">
<?php include('header.php');?>
<!-- Sidebar -->
<?php include('leftmenu.php');?>
<!-- End Sidebar --> 

<div class="main-panel"> 
<div class="content">
<div class="page-inner">

<?php
$sql="SELECT * FROM `ee_announcement` ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{?>
<div style="background:#03a15f;padding:5px 15px;border-radius:10px;">
<marquee scrollamount="2"  align="center" style="text-align:center;color:#0000F2;" direction="left">
	<?php 
	while($fetch=fetcharray($res))
	{
	?>
	<h6 style="font-size:16px;color:#FFFFFF;"><?=strip_tags(stripslashes($fetch['announcement']))?></h6>
	<?php }?>
</marquee>
</div>
<?php }?>

<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC00; padding-bottom:8px; font-size:16px;"><strong>Your account is successfully activated!</strong></p><?php }?>

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='I')
{
?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br /><a href="activation.php">Click here</a> to activate your account!</h3>
<?php }?>
<div align="center">&nbsp;</div>
<!-- Blue/Green 1 -->
<div class="row">
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-primary bubble-shadow-small">
<img src="assets/img/user.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">User ID</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getUserID($conn,$_SESSION['mid'],'userid')?> <?php if($paystatus=='A'){?><span style="background:#FFFFFF;color:#009900;padding:2px 10px;border-radius:10px;">Active</span><?php }else{?><span style="background:#FFFFFF;color:#FF0000;padding:2px 10px;border-radius:10px;">Inactive</span><?php }?></h4>
<?php if(getSettingsPackage($conn,$lpack,'package')){?>
<div class="card-category" style="color:#fff; font-size:14px;"><?=getSettingsPackage($conn,$lpack,'package')?> (<?=getSettingsPackage($conn,$lpack,'amount')?>)</div>
<?php }?>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Orange 2 -->

<?php if(getMember($conn,$_SESSION['mid'],'sponsor')){?>
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body"  style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/referalid.png" height="50" width="50"/></div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Sponsor ID</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getMember($conn,$_SESSION['mid'],'sponsor')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }?>
<!-- Blue 3 -->


<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#fff2d6;min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-primary bubble-shadow-small">
<img src="assets/img/referal.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers"><p class="card-category" style="color:black; font-size:14px;">Direct Income</p>
<h4 class="card-title" style="font-size:14px; color:black;"><?=getDirectIncomeReleased($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Blue/Vilate 4-->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#aad6a3; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-primary bubble-shadow-small">
<img src="assets/img/Binary.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers"><p class="card-category" style="color:#fff; font-size:14px;">Binary Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getBinaryIncomeReleased($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Orange 5 -->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body"  style="background-color:#d1b2d5; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/roi.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">BDA Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getROIIncomeReleased($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body"  style="background-color:#03c3ec; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/roi.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Reward & Award</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getRewardIncome($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Blue/Green 6 -->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-secondary bubble-shadow-small">
<img src="assets/img/waiting_tranfer.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Pending Withdrawal</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getPendingWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Blue /Vilate 7 -->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#aad6a3;min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-primary bubble-shadow-small">
<img src="assets/img/success.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers"><p class="card-category" style="color:#fff; font-size:14px;">Success Withdrawals</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getApprovedWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Blue 8 -->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0;  min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-success bubble-shadow-small">
<img src="assets/img/indianwallet.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Total Income</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getTotalIncomeMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Blue/green 9-->


<!-- Blue 10 -->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body"  style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/wallet.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">E-Wallet</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getAvailableWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Orange 11-->

<!-- Blue/Vilate 12-->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0;min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-primary bubble-shadow-small">
<img src="assets/img/left_member.png" height="50" width="50"/>

</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers"><p class="card-category" style="color:#fff; font-size:14px;">Team A</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getDownlineCount($conn,$userid,'left')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Blue 13-->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-primary bubble-shadow-small">
<img src="assets/img/rigtmember.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers"><p class="card-category" style="color:#fff; font-size:14px;">Team B</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getDownlineCount($conn,$userid,'right')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!--Blue/Vialet 14-->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body"  style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-info bubble-shadow-small">
<img src="assets/img/graphsaleL.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Left Sales</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getSales($conn,$userid,'left')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Blue/Green-->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-secondary bubble-shadow-small">
<img src="assets/img/graphsaleR.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Right Sales</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getSales($conn,$userid,'right')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Ornage -->

<!-- Blue/Green-->

<!-- Orange -->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0; min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-success bubble-shadow-small">
<img src="assets/img/userwait.png" height="50" width="50"/></div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Left Waiting</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getSalesCount($conn,$userid,'left')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Blue Last One-->
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round">
<div class="card-body" style="background-color:#8f9bf0;min-height:110px;border-radius:10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-primary bubble-shadow-small">
<img src="assets/img/userwaitr.png" height="50" width="50"/>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers"><p class="card-category" style="color:#fff; font-size:14px;">Right Waiting</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getSalesCount($conn,$userid,'right')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

<?php if($paystatus=='A'){?>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="card" style="background:#FFFFFF;">
<h5 align="center" style="background-color:#007CB9;height:25px; color:#FFFFFF;font-size:18px;"><strong>Referral Link</strong></h5>
<div class="card-body">
<div align="center">
<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://<?=$domain?>/introducer.php?intr=<?=$userid?>&choe=UTF-8" title="Fund Trade" />
</div>

<h5 align="center" id="p1">http://<?=$domain?>/introducer.php?intr=<?=$userid?></h5>
<div align="center"><button onClick="copyToClipboard('#p1')" id="cpbutton" class="btn btn-primary">COPY LINK</button></div>
<div>&nbsp;</div>

<div class="footer_social" align="center">
<table width="100">
<tr><td ><a href="https://www.facebook.com/sharer/sharer.php?u=http://<?=$domain?>/introducer.php?intr=<?=$userid?>" target="_blank"><i class="fab fa-facebook-f" style="color:#003366;"></i></a></td>
<td><a href="https://twitter.com/home?status=http://<?=$domain?>/introducer.php?intr=<?=$userid?>" target="_blank"><i class="fab fa-twitter"></i></a></td>
<td><a href="https://plus.google.com/share?url=http://<?=$domain?>/introducer.php?intr=<?=$userid?>" target="_blank"><i class="fab fa-google" style="color:#CC0000;"></i></a></td>
<td><a href="https://whatsapp.com://send?text=http://<?=$domain?>/introducer.php?intr=<?=$userid?>" target="_blank"><i class="fab fa-whatsapp " style="color:#66CC66;"></i></a></td>
</tr>
</table>
</div>
<div>&nbsp;</div>
</div>
</div>
</div>
<div class="col-md-3"></div>

<div class="col-md-6"></div>
</div>
<?php }?>


</div>
</div>


</div>
</div>

<!-- End Custom template -->

<!--   Core JS Files   -->

<script>
function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).text()).select();
document.execCommand("copy");
$temp.remove();
document.getElementById('cpbutton').innerHTML='COPIED';
}
</script>

<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>


<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>