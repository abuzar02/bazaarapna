<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');

$left=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!--<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>-->

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script src="js/ajax.js"></script>
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
<body>
<div class="wrapper">
<!--
Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
-->
<?php include('header.php')?>

<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card">
<div class="card-header">
<div class="card-title">Member Upgrade</div>
</div>
<div class="card-body">

<?php if($_REQUEST['m']==1){?><div align="center" style="margin:0;padding:0;color:#00CC00; font-size:15px;"><strong>Your upgradation successfully completed!</strong></div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:15px;"><strong>Epin & package does not match!</strong></div><?php }?>
<div align="center">&nbsp;</div>

<?php
$lastdt=getLatestPackageUpgrade($conn,$userid,'date');
if($lastdt!='')
{
$now=time();
$your_date=strtotime($lastdt);
$datediff=($now-$your_date);

$nodays=round($datediff / (60 * 60 * 24));

$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
if($nodays>=50)
{
?>
<form class="form" action="member-upgrade-process.php" method="post">
<div class="col-md-8">
<div class="form-group form-group-default">
<label>Package<span style="color:#CC0000;">*</span></label>
<select name="package" id="package" class="form-control  border-primary" required>
<option value="">Select Package</option>
<?php
$sql2="SELECT * FROM `ee_settings_package` WHERE `package`>(SELECT `pvalue` FROM `ee_member_package` WHERE `userid`='".$userid."' ORDER BY `pvalue` DESC LIMIT 1 ) ORDER BY `package`";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
?>
<option value="<?=$fetch2['id']?>"><?=ucwords(strtolower($fetch2['title']))?></option>
<?php }}?>
</select>
</div>
</div>

<div class="col-md-8">
<div class="form-group form-group-default">
<label>Epin<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="epin" placeholder="Epin" value="" required>
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-success">Upgrade Now</button>
</div>
</div>
</div>
</form>
<?php }else{?>
<div align="center" style="margin:0;padding:0;color:#FF0000; font-size:15px;"><strong>You cant upgrade account now. Minimum 50 days need to over since joining or last upgrade!</strong></div>
<?php }}else{?>
<div align="center" style="margin:0;padding:0;color:#FF0000; font-size:15px;"><strong>Your account is still Inactive! <br />Click here <a href="activation.php">Activation</a> to activate your account!</strong></div>
<?php }?>
<?php }else{?>
<form class="form" action="member-upgrade-process.php" method="post">
<div class="col-md-8">
<div class="form-group form-group-default">
<label>Package<span style="color:#CC0000;">*</span></label>
<select name="package" id="package" class="form-control  border-primary" required>
<option value="">Select Package</option>
<?php
$sql2="SELECT * FROM `ee_settings_package` WHERE `package`>(SELECT `pvalue` FROM `ee_member_package` WHERE `userid`='".$userid."' ORDER BY `pvalue` DESC LIMIT 1 ) ORDER BY `package`";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
?>
<option value="<?=$fetch2['id']?>"><?=ucwords(strtolower($fetch2['title']))?></option>
<?php }}?>
</select>
</div>
</div>

<div class="col-md-8">
<div class="form-group form-group-default">
<label>Epin<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="epin" placeholder="Epin" value="" required>
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-success">Upgrade Now</button>
</div>
</div>
</div>
</form>
<?php }?>
<div align="center">&nbsp;</div>
<div align="center">&nbsp;</div>
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

</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script><!-- DateTimePicker -->
<script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script>
$('#datepicker').datetimepicker({
format: 'MM/DD/YYYY',
});
</script>
</body>
</html>