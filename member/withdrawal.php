<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
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
</head>
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-3">&nbsp;</div>
<div class="col-md-6">

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title">Withdrawal From E-Wallet</div>
</div>

<div class="card-body">
<?php if($_REQUEST['m']==4){?><p align="center" style="color:#00CC00; padding-bottom:8px;font-size:16px;">Your withdrawal request sent to administrator!</p><?php }?>
<?php if($_REQUEST['e']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Amount must be greater than 0!</p><?php }?>
<?php if($_REQUEST['e']==2){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Insufficient wallet balance!</p><?php }?>
<?php if($_REQUEST['e']==3){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Minimum withdrawal amount is &nbsp;<?=getSettingsWithdrawalMinimum($conn)?> & Maximum withdrawal amount is &nbsp;<?=getSettingsWithdrawalMaximum($conn)?></p><?php }?>

<div class="row">
<div class="col-md-12">
<h3 class="form-section" style="color:#009900" align="center"><i class="icon-wallet"></i>E-Wallet:&nbsp;<?=getAvailableWallet($conn,getMember($conn,$_SESSION['mid'],'userid'))?></h3>
</div>
</div>

<?php 
$leftmem=getDownlineCount($conn,$userid,'left');
$rightmem=getDownlineCount($conn,$userid,'right');

if($leftmem>0 && $rightmem>0)
{
$day=date('l',strtotime(date('Y-m-d')));
if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday')
{

$userid=getMember($conn,$_SESSION['mid'],'userid');
$avabal=getAvailableWallet($conn,$userid);
$min=getSettingsWithdrawalMinimum($conn);
$max=getSettingsWithdrawalMaximum($conn);

if($avabal>=$min)
{
if(getMember($conn,$_SESSION['mid'],'bname') && getMember($conn,$_SESSION['mid'],'branch') && getMember($conn,$_SESSION['mid'],'accname') && getMember($conn,$_SESSION['mid'],'accno') && getMember($conn,$_SESSION['mid'],'ifscode')){?>

<form class="form" action="withdrawal-process.php?case=add&wallet=current" method="post">

<div class="form-group">
<label for="pillSelect"><strong style="color:#000;">Type</strong></label>
<select class="form-control input-pill" id="type" name="type" required>
<option value="">Type</option>
<option value="Bank">Bank</option>
<!--<option value="Payeer">Payeer</option>-->
<!--<option value="Paypal">Paypal</option>-->
<!--<option value="PerfectMoney">Perfect Money</option>-->
<!--<option value="Paytm">PayTM</option>-->
<!--<option value="UPI">UPI</option>-->

<!--<option value="Bitcoin">Bitcoin</option>-->
<!--<option value="Bitcoincash">Bitcoincash</option>-->
<!--<option value="Ethereum">Ethereum</option>-->
<!--<option value="Dash">Dash</option>-->
<!--<option value="Dogecoin">Dogecoin</option>-->
<!--<option value="Litecoin">Litecoin</option>-->
<!--<option value="Monero">Monero</option>-->
<!--<option value="Ripple">Ripple</option>-->
<!--<option value="Troncoin">Troncoin</option>-->
<!--<option value="Zcash">Zcash</option>-->

</select>
</div>

<div class="form-group">
<label for="pillInput"><strong style="color:#660033;">Amount</strong></label>
<input type="number" class="form-control input-pill" id="amount" name="amount" placeholder="Enter Amount" required>
</div>

<div class="card-action" align="center">
<button class="btn btn-success">Transfer Now</button>
</div>
</form>
<?php }else{?>
<div align="center"><a href="edit-profile.php" style="text-decoration:none; color:#FF3300;" title="Go to Bank Details">
<span style="height:30px; border:1px solid #FF6600; padding:10px;font-size:16px;">
<strong>Please click here to and fill bank details for payment</strong>
</span>
</a></div>
<div>&nbsp;</div>
<?php }}else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>You don't have minimum balance for withdrawal!</strong></h5>
<?php }?>

<?php }else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>Withdrawal request only available Monday To Friday!</strong></h5>
<?php }?>
<?php }else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>Withdrawal request can available once you achieved 1:1!</strong></h5>
<?php }?>

<div>&nbsp;</div>
<div align="center" style="color:#FF0000;">Withdrawal request is availble Monday To Friday.</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

</div>

</div>

</div>


</div>
</div>
</div>
</div>

<!-- Custom template | don't include it in your project! -->
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
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