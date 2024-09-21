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
<body>
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

<div class="col-md-12" >

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title">Epin Statement</div>
</div>
<div class="card-body" style="overflow:auto;">

<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th>Sl_No.</th>
<th>Package</th>
<th>Epin</th>
<th>Status</th>
<th>Used_By</th>
<th>Name</th>
<th>Used_On</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
$tname='ee_epin';
$lim=100;
$tpage='epin.php';
$where="WHERE `toid`='".getMember($conn,$_SESSION['mid'],'userid')."' ORDER BY `id` DESC";
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<script>
function copyToClipboard<?=$i?>(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).text()).select();
document.execCommand("copy");
$temp.remove();
document.getElementById('cpbutton<?=$i?>').innerHTML='COPIED';
}
</script>
<tr>
<td align="center" style="padding:2px;"><?=$i?></td>
<td align="center" style="padding:2px;"><?=getSettingsPackage($conn,$fetch['package'],'package')?> (<?=getSettingsPackage($conn,$fetch['package'],'amount')?>)</td>
<td align="center" style="padding:2px;"><span id="p1<?=$i?>"><?=$fetch['epin']?></span>&nbsp;&nbsp;<i class="fa fa-copy" onClick="copyToClipboard<?=$i?>('#p1<?=$i?>')" id="cpbutton<?=$i?>" style="cursor:pointer;"></i></td>
<td align="center" style="padding:2px;"><?php if($fetch['status']=='A'){?><span style="color:#00CC00;background:#FFFFFF;padding:3px 10px;font-weight:bold;">Available</span><?php }else{?><span style="color:#FF0000;background:#FFFFFF;padding:3px 10px;font-weight:bold;">Used</span><?php }?></td>
<td align="center" style="padding:2px;"><?php if($fetch['usedby']){?><?=$fetch['usedby']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:2px;"><?php if($fetch['usedby']){?><?=getMemberUserid($conn,$fetch['usedby'],'name')?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:2px;"><?php if($fetch['usedon']){?><?=$fetch['usedon']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:2px;"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
<div align="center"><?=$pagination?></div>

<p>&nbsp;</p>
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