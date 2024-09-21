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

<?php if($_REQUEST['case']=='add'){?>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card">
<div class="card-header">
<div class="card-title">Upgrade Package</div>
</div>
<div class="card-body" style="overflow:auto;background:#FFFFFF;">

<?php if($_REQUEST['e']==3){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Invalid epin code!</strong></div><?php }?> 
<?php if($_REQUEST['e']==2){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:16px;"><strong>Package is already upgraded!</strong></div><?php }?> 
<?php if($_REQUEST['s']==1){?><div align="center" style="margin:0;padding:0;color:#00CC00; font-size:16px;"><strong>You have successfully upgraded package!</strong></div><?php }?>

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='I')
{
?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br />Click here <a href="activation.php">Activation</a> to activate your account!</h3>
<p>&nbsp;</p>
<?php }else{?>
<form class="form" action="upgrade-process.php" method="post" enctype="multipart/form-data">

<div class="col-md-8">
<div class="form-group">
<label for="pillInput"><strong style="color:#000000;">Package</strong></label>
<select class="form-control input-pill" name="package" id="package" required>
<option value="">Select Package</option>
<?php
$sql="SELECT * FROM `ee_settings_package` WHERE `amount`>(SELECT `pvalue` FROM `ee_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1)";
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

<div class="form-group">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success">Upgrade Now</button>
</div>
</div>

</div>
</form>
<?php }?>

</div>
</div>
</div>

</div>

<?php }else{?>
<div class="row">
<div class="col-md-12">

<div class="card">
<div class="card-header">
<div class="card-title">Upgrade Package Statement</div>
</div>
<div class="card-body" style="overflow:auto;background:#FFFFFF;">

<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Package</th>
<th align="center">Epin</th>
<th align="center">Upgrade_By</th>
<th align="center">Date</th>
</tr>
</thead>
<tbody>
<?php
$tname='ee_member_upgrade';
$lim=100;
$tpage='upgrade.php';
$where="WHERE `upgradeby`='".getMember($conn,$_SESSION['mid'],'userid')."' ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center"><?=$i?></th>
<td align="center"><?=$fetch['userid']?></td>
<td align="center"><?=getMemberUserID($conn,$fetch['userid'],'name')?></td>
<td align="center"><?=getSettingsPackage($conn,$fetch['package'],'package')?> (<?=getSettingsPackage($conn,$fetch['package'],'amount')?>)</td>
<td align="center"><?=$fetch['epin']?></td>
<td align="center"><?=$fetch['upgradeby']?></td>
<td align="center"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
<div align="center"><?=$pagination?></div>


</div>
</div>
</div>

</div>
<?php }?>
</div>
</div>
</div>
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