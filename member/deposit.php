<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$email=getMember($conn,$_SESSION['mid'],'email');

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

<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  padding: 15px;
}
</style>
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
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

<div class="card">
<div class="card-header">
<div class="card-title">Payment Details</div>

<div class="card-body" style="overflow:auto;background:#FFFFFF;">

<?php
$privatekey='42A53f15535FfFbdf70dA3B526B4008Eb5ec30Ec9f54c91F989bb3d90A603314';
$publickey='968f1612bad65a48c89dfb09fce0a1ec9d41cbdb5ee99c4660d1e05662a9a2ee';


require('Coinopayment.php'); 
$Private_Key=$privatekey;
$Public_Key=$publickey;
$cps = new Coinpayments();
$cps->Setup($Private_Key, $Public_Key);

$req = array(


'invoice'  => trim($_REQUEST['inv']), // Invoice or Oder ID From Database
'amount' => trim($_REQUEST['amt']),  // Deposit AMount
'currency1' => 'USD',
'currency2' => trim($_REQUEST['type']), // Payment Crypto Currency BTC, BCH, ETH
'buyer_email' => trim($email),
'item_name' => 'Investment',
'item_number' => '1', // Could be anything user id etc
'ipn_url' => 'https://assoftech.in/develop/fundtrade/member/depositipn.php'  // Your IPN Link
);

// See https://www.coinpayments.net/apidoc-create-transaction for all of the available fields

$result = $cps->CreateTransaction($req);

if($result['error'] == 'ok')
{

$amount2= sprintf('%.08f', $result['result']['amount']);
$pay_address = $result['result']['address'];
$payment_txn=$result['result']['txn_id'];
$url = $result['result']['status_url'];

// Run Databse query
// Redirect to payment page

$sql6="INSERT INTO `ee_member_coinpayment` (`userid`,`type`,`invoice`,`amount`,`txn_id`,`coinamt`,`paywallet`,`status`,`date`) VALUES('".$userid."','".trim($_REQUEST['type'])."','".trim($_REQUEST['inv'])."','".trim($_REQUEST['amt'])."','".$payment_txn."','".$amount2."','".$pay_address."','P','".date('Y-m-d')."')";
$res6=query($conn,$sql6);
?>
<table cellspacing=0 cellpadding=2 class="form deposit_confirm">
<tr>
<th>Transaction ID:</th>
<td><?=$payment_txn?></td>
<td rowspan="6" align="center"><img src="https://chart.googleapis.com/chart?chs=225x225&chld=M|0&cht=qr&chl=<?=trim($_REQUEST['type'])?>%3f<?=$pay_address?>%3Famount%3f<?=$amount2?>&amp;choe=UTF-8" alt=""></td></td>
</tr>


<tr>
<th>Amount:</th>
<td><?=$amount2?></td>
</tr>

<tr>
<th>Payment Wallet:</th>
<td><?=$pay_address?></td>
</tr>

<tr>
<th>Status</th>
<td><div id="div_refresh"></div></td>
</tr>
</table>
<p>&nbsp;</p>

<div align="center">
<h5> Send Exact <b><?=$amount2?> <?=trim($_REQUEST['type'])?> </b> to this address <b> <?=$pay_address?> </b></h5>
<br>
<h4>Other any amount will be not deposit.</h4>
</div>
<p>&nbsp;</p>
<p style="color:red">To complete a deposit in <span class="deposit-currency-symbol font-bold">
<?=trim($_REQUEST['type'])?></span> you need <span class="deposit-currency-symbol font-bold">3</span> confirmations. </p>
<?php 
}else{
?>
<h2 align="center" style="color:#FF0000;">Error: <?=$result['error']?></h2>
<?php }?>

</div>

<div align="center">&nbsp;</div>
</div>

</div>
</div>

</div>

</div>
</div>

</div>

<!-- End Custom template -->
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
<script>
function getRedirect()
{
window.open('<?=$url?>');
}
</script>
<script>getRedirect()</script>
</body>
</html>