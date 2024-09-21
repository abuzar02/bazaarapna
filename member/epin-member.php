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
<script src="js/ajax.js" type="text/javascript"></script>
<script>
function getUserIDcheck(val)
{
if(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequestEPIN;
xmlhttp.send();
}
}

function getUserIDRequestEPIN()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;

document.getElementById('sponname').innerHTML=response;
}
}
}
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background:#fff;">
	<div class="wrapper">
<!--
Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
-->
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
<div class="card-title">Transfer Epin</div>
</div>

<?php if($_REQUEST['case']=='add'){?>
<div>&nbsp;</div>
<?php if($_REQUEST['m']==1){?><div align="center" style="color:#009900; font-size:14px; padding-bottom:5px;"><strong>Epin transfer successfully completed!</strong></div><?php }?>
<?php if($_REQUEST['e']==2){?><div align="center" style="color:#FF0000; font-size:14px; padding-bottom:5px;"><strong>Please enter others User ID!</strong></div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center" style="color:#FF0000; font-size:14px; padding-bottom:5px;"><strong>Invalid User ID!</strong></div><?php }?>

<?php 
$sql="SELECT * FROM `ee_epin` WHERE `toid`='".getMember($conn,$_SESSION['mid'],'userid')."' AND `status`='A' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{?>
<div style="overflow:auto;">
<form class="form" action="epin-member-process.php" method="post">
<table class="table table-head-bg-primary mt-1">
<tr>
<td align="left"><input type="text" class="form-control input-pill" id="toid" name="toid" placeholder="Enter To ID" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);" style="width:200px;" />&nbsp;&nbsp;<span id="sponname" style="color:#FF0000;"></span>
</td><td><button class="btn btn-success">Transfer Now</button>
</td>
</tr>
</table>
<?php }?>
<table class="table" width="100%">
<thead>
<tr align="center" style="background:#0066FF;color:#FFFFFF;">
<td align="center" style="color:#FFFFFF;"><?php if($num>0){?><strong>Select All<br><input type="checkbox" name="check" id="check" onClick="check_uncheck(document.form1.emp_name);" /></strong><?php }else{ ?><strong>Sl_No.</strong><?php }?></td>
<td align="center" style="color:#FFFFFF;"><strong>Package</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>Epin</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>Status</strong></td>
<td align="center" style="color:#FFFFFF;"><strong>Date</strong></td>
</tr>
</thead>
<tbody>
<?php
$tname='ee_epin';
$lim=100;
$tpage='epin-member.php';
$where="WHERE `toid`='".getMember($conn,$_SESSION['mid'],'userid')."' AND `status`='A' ORDER BY `id` DESC";
include('pagination.php');

$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center">
<input type="hidden" name="emp_name1[]" id="emp_name1" value="<?=$fetch['id']?>" />
<input type="checkbox" name="emp_name[]" id="emp_name" value="<?=$fetch['id']?>" />
</td>
<td align="center"><?=getSettingsPackage($conn,$fetch['package'],'package')?> (<?=getSettingsPackage($conn,$fetch['package'],'amount')?>)</td>
<td align="center"><?=$fetch['epin']?></td>
<td align="center"><?php if($fetch['status']=='A'){?><span style="color:#009900;">Available</span><?php }else{?><span style="color:#FF0000;">Used</span><?php }?></td>
<td align="center"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="5" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</form>
</div>
  
<?php }else{ ?>

<div class="row">
<div class="col-md-12">
<div class="card-body">
<div style="overflow:auto;">

<table class="table table-head-bg-primary mt-1" style="overflow:auto;">
<thead>
<tr align="center">
<th>Sl_No</th>
<th>To_ID</th>
<th>Name</th>
<th>Package</th>
<th>Epin</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
$tname='ee_epin_transfer';
$lim=100;
$tpage='epin-member.php';
$where="WHERE `userid`='".getMember($conn,$_SESSION['mid'],'userid')."' ORDER BY `id` DESC";

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
<td align="center"><?=$fetch['toid']?></td>
<td align="center"><?=getMemberUserID($conn,$fetch['toid'],'name')?></td>
<td align="center"><?=getSettingsPackage($conn,$fetch['package'],'package')?> (<?=getSettingsPackage($conn,$fetch['package'],'amount')?>)</td>
<td align="center"><?=$fetch['epin']?></td>
<td align="center"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="6" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</div>

</div>
</div>
</div>

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