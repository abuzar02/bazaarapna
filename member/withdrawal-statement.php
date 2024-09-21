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

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
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
<div class="card-title">Withdrawal Statement</div>
</div>
<div class="card-body" style="overflow:auto;background:#FFFFFF;">
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th>Sl_No.</th>
<th>Request</th>
<th>TDS</th>
<th>Charge</th>
<th>Payout</th>
<th>Type</th>
<th>Account/Wallet_Details</th>
<th>Status</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
$tname='ee_withdrawal';
$lim=100;
$tpage='withdrawal.php';
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
<td align="center"><?=$fetch['request']?></td>
<td align="center"><?=$fetch['tds']?></td>
<td align="center"><?=$fetch['service']?></td>
<td align="center"><?=$fetch['payout']?></td>
<td align="center"><?=$fetch['type']?></td>
<td align="center">
<?php if($fetch['type']=='Bank'){?><?=$fetch['bname']?><br /><?=$fetch['branch']?><br /><?=$fetch['accname']?><br /><?=$fetch['accno']?><br /><?=$fetch['ifscode']?><?php }?>
<?php if($fetch['type']=='Payeer'){?><?=$fetch['payeer']?><?php }?>
<?php if($fetch['type']=='Paypal'){?><?=$fetch['paypal']?><?php }?>
<?php if($fetch['type']=='PerfectMoney'){?><?=$fetch['perfectmoney']?><?php }?>
<?php if($fetch['type']=='Paytm'){?><?=$fetch['paytm']?><?php }?>
<?php if($fetch['type']=='UPI'){?><?=$fetch['upi']?><?php }?>
<?php if($fetch['type']=='Bitcoin'){?><?=$fetch['bitcoin']?><?php }?>
<?php if($fetch['type']=='Bitcoincash'){?><?=$fetch['bitcoincash']?><?php }?>
<?php if($fetch['type']=='Ethereum'){?><?=$fetch['ethereum']?><?php }?>
<?php if($fetch['type']=='Dash'){?><?=$fetch['dash']?><?php }?>
<?php if($fetch['type']=='Dogecoin'){?><?=$fetch['dogecoin']?><?php }?>
<?php if($fetch['type']=='Litecoin'){?><?=$fetch['litecoin']?><?php }?>
<?php if($fetch['type']=='Monero'){?><?=$fetch['monero']?><?php }?>
<?php if($fetch['type']=='Ripple'){?><?=$fetch['ripple']?><?php }?>
<?php if($fetch['type']=='Troncoin'){?><?=$fetch['troncoin']?><?php }?>
<?php if($fetch['type']=='Zcash'){?><?=$fetch['zcash']?><?php }?>

</td>
<td align="center"><?php if($fetch['status']=='C'){?><span style="color:#00CC00;">Paid</span><?php }else{?> <span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=$fetch['date']?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
<div align="center"><?=$pagination?></div>

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