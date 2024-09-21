<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Fund Trade</title>
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
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title">Other Member Upgrades</div>
</div>
<div>&nbsp;</div>
<?php if($_REQUEST['case']=='check'){?>

<?php if($_REQUEST['s']=='1'){?><div align="center" style="color:#009900;font-weight:bold;">Member account is successfully upgraded!</div><?php } ?>
<?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;">Invalid User ID OR User ID is still inactive!</div><?php } ?>
<?php if($_REQUEST['e']=='3'){?><div align="center" style="color:#FF0000;">Invalid Epin. Enter valid Epin!</div><?php } ?>
<?php if($_REQUEST['e']=='4'){?><div align="center" style="color:#FF0000;">Package already exists. Please choose next package to upgrade!</div><?php } ?>

<div class="card-body">
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='I')
{
?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br />Click here <a href="activation.php">Activation</a> to activate your account!</h3>
<p>&nbsp;</p>
<?php }else{?>
<form class="form" action="check-upgrade-process.php?case=check" method="post">

<div class="form-group">
<label for="pillInput">User ID</label>
<input type="text" class="form-control input-pill" id="userid" name="userid" placeholder="Enter User ID" required>
</div>

<div class="card-action">
<button class="btn btn-success">Check</button>
</div>
</form>
<?php }?>
</div>

<?php }else if($_REQUEST['case']=='add'){?>
<?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;">Invalid User ID OR User ID is still inactive!</div><?php } ?>
<?php if($_REQUEST['m']=='1'){?><div align="center" style="color:#009900;font-weight:bold;">Member account is successfully upgraded!</div><?php } ?>

<div class="card-body">

<div align="center" style="color:#FF0000; padding-bottom:8px;font-size:24px;"><?=ucwords(getMemberUserid($conn,trim($_REQUEST['userid']),'name'))?></div>

<form class="form" action="upgrade-others-process.php?case=add" method="post">
<input type="hidden" name="userid" id="userid" class="form-control"  placeholder="Enter Userid" required value="<?=trim($_REQUEST['userid'])?>" />

<div class="form-group">
<label for="pillInput"><strong style="color:#000000;">Package</strong></label>
<select class="form-control" name="package" id="package" required>
<option value="">Select Package</option>
<?php
$sql="SELECT * FROM `ee_settings_package` WHERE `amount`>(SELECT `pvalue` FROM `ee_member_package` WHERE `userid`='".trim($_REQUEST['userid'])."' ORDER BY `id` DESC LIMIT 1)";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=$fetch['package']?> (<?=$fetch['amount']?>)</option>
<?php }}?>
</select>
</div>

<div class="form-group">
<label for="pillInput"><strong style="color:#000000;">Epin</strong></label>
<input type="text" class="form-control input-pill" id="epin" name="epin" placeholder="Enter Epin" required>
</div>

<div class="card-action">
<button class="btn btn-success">Activation Now</button>
</div>
</form>
</div>

<?php }else{?>

<div class="row">
<div class="col-md-12">
<div class="card-body" style="overflow:auto;">									
<table class="table table-head-bg-primary mt-0">
<thead bgcolor="#177dff">
<tr style="color:#FFFFFF;">
<td align="center" style="color:#FFFFFF;"><strong>Sl_No</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>User_ID</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>Topup_ID</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>Package</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>Epin</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>Date</strong></td>
</tr>
</thead>
<tbody>
<?php
$tname='ee_member_topup';
$lim=100;
$tpage='topup.php';
$where="WHERE `userid`='".getMember($conn,$_SESSION['mid'],'userid')."'";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center"><?=$i?></td>
<td align="center"><?=$fetch['userid']?></td>
<td align="center"><?=$fetch['topupid']?></td>
<td align="center"><?=getSettingsPackage($conn,getMemberUserID($conn,$fetch['topupid'],'package'),'package')?> (<?=getSettingsPackage($conn,getMemberUserID($conn,$fetch['topupid'],'package'),'amount')?>)</td>
<td align="center"><?=$fetch['epin']?></td>
<td align="center"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="6" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</div>
</div></div>
<?php }?>
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