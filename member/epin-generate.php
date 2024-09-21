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
<link rel="stylesheet" type="text/css" href="pagination.css">
</head>
<body style="background:#fff;">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">

<div class="col-md-12">

<div class="card">
<div class="card-header">
<div class="card-title">Epin Purchase</div>
</div>
<div class="card-body" style="overflow:auto;background:#FFFFFF;">

<?php if(isset($_REQUEST['m'])==3){?><p align="center" style="color:#FF0000; padding-bottom:8px;">No of epin must be numeric value & greater than 0!</p><?php }?>
<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Insufficient wallet balance!</p><?php }?>

<h2 align="center" style="color:#FF0000; padding-bottom:8px;">Current Wallet: <?=getAvailableWallet($conn,$userid)?></h2>
<div align="center" style="color:#FF0000;">Charge: <?=getSettingsEpin($conn)?> %</div>
<form class="form" action="epin-process.php?case=add" method="post">
<table cellpadding="0" cellspacing="2" border="0" width="80%" style="color:#000000;">

<tr><td>&nbsp;</td><td>&nbsp;</td><td></td></tr>
<tr height="40"><td width="32%">&nbsp;</td>
<td width="14%" align="left">Package<span style="color:#FF0000;">*</span></td>
<td width="54%">
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
</td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td></td></tr>
<tr height="40"><td width="32%">&nbsp;</td>
<td width="14%" align="left">No of Epin<span style="color:#FF0000;">*</span></td>
<td width="54%"><input type="number" name="noofpin" id="noofpin" class="form-control input-line input-medium" value="" required placeholder="Enter Number of Epin" /></td>
</tr>

<tr height="60"><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Generate Now" class="btn btn-success" /></td></tr>
</table>
</form>

<p>&nbsp;</p>
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