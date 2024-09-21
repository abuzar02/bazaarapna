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
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd); min-height:970px">
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
<div class="card-title">Edit Profile</div>
</div>
<div class="card-body">

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
?>
<?php if(isset($_REQUEST['m'])=='1'){?><div align="center" style="color:#009900;font-size:16px;">Your profile is successfully updated!</div><?php }?>
<?php if(isset($_REQUEST['e'])=='1'){?><div align="center" style="color:#FF3300;font-size:16px;">Pancard No already used in another account!</div><?php }?>

<form class="form" action="edit-profile-process.php" method="post" enctype="multipart/form-data">
<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Name</label>
<input type="text" class="form-control" name="name" placeholder="Name" value="<?=getMember($conn,$_SESSION['mid'],'name')?>" readonly="readonly" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Email</label>
<input type="email" class="form-control" name="email" placeholder="Email" value="<?=getMember($conn,$_SESSION['mid'],'email')?>" required />
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Phone</label>
<input type="text" class="form-control" id="phone" name="phone" value="<?=getMember($conn,$_SESSION['mid'],'phone')?>" placeholder="Phone Number" readonly="readonly" maxlength="10" pattern="[6-9]{1}[0-9]{9}" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Address</label>
<input type="text" class="form-control" value="<?=getMember($conn,$_SESSION['mid'],'address')?>" name="address" id="address" placeholder="Address" required />
</div>
</div>

</div>

<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Bank Name</label>
<input type="text" class="form-control" name="bname" id="bname" placeholder="Bank Name" value="<?=getMember($conn,$_SESSION['mid'],'bname')?>" style="text-transform:uppercase;" required />
</div>
</div>
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Branch</label>
<input type="text" class="form-control" name="branch" placeholder="Branch Name" id="branch" value="<?=getMember($conn,$_SESSION['mid'],'branch')?>" style="text-transform:uppercase;" required />
</div>
</div>

</div>

<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>IFS_Code</label>
<input type="text" class="form-control" name="ifscode" id="ifscode" placeholder="IFS Code" value="<?=getMember($conn,$_SESSION['mid'],'ifscode')?>" style="text-transform:uppercase;" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Account Holder Name</label>
<input type="text" class="form-control" name="accname" id="accname" placeholder="Account Holder Name" value="<?=getMember($conn,$_SESSION['mid'],'accname')?>" style="text-transform:uppercase;" required />
</div>
</div>
</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Account No</label>
<input type="text" class="form-control" name="accno" id="accno" placeholder="Account No" value="<?=getMember($conn,$_SESSION['mid'],'accno')?>" style="text-transform:uppercase;" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Pancard</label>
<input type="text" class="form-control" name="pancard" id="pancard" placeholder="Pancard No" value="<?=getMember($conn,$_SESSION['mid'],'pancard')?>" maxlength="10" style="text-transform:uppercase;" pattern="[A-Za-z]{5}\d{4}[A-Za-z]{1}" required />
</div>
</div>
</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Aadhar No.</label>
<input type="text" class="form-control" name="aadhar" id="aadhar" placeholder="Aadhar" value="<?=getMember($conn,$_SESSION['mid'],'aadhar')?>" style="text-transform:uppercase;" required />
</div>
</div>

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Payeer</label>-->
<!--<input type="text" class="form-control" name="payeer" id="payeer" placeholder="Payeer Code" value="<?=getMember($conn,$_SESSION['mid'],'payeer')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--</div>-->

<!--<div class="row mt-3">-->

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>PayPal</label>-->
<!--<input type="text" class="form-control" name="paypal" id="paypal" placeholder="Paypal Code" value="<?=getMember($conn,$_SESSION['mid'],'paypal')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Perfect Money</label>-->
<!--<input type="text" class="form-control" name="perfectmoney" id="perfectmoney" placeholder="Perfect Money Code" value="<?=getMember($conn,$_SESSION['mid'],'perfectmoney')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--</div>-->


<!--<div class="row mt-3">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>PayTM</label>-->
<!--<input type="text" class="form-control" name="paytm" id="paytm" placeholder="PayTM Code" value="<?=getMember($conn,$_SESSION['mid'],'paytm')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<div class="col-md-6">
<div class="form-group form-group-default">
<label>UPI</label>
<input type="text" class="form-control" name="upi" id="upi" placeholder="UPI Code" value="<?=getMember($conn,$_SESSION['mid'],'upi')?>" style="text-transform:uppercase;" required />
</div>
</div>
</div>

<!--<div class="row mt-3">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Bitcoin Wallet</label>-->
<!--<input type="text" class="form-control" name="bitcoin" id="bitcoin" placeholder="Bitcoin Wallet" value="<?=getMember($conn,$_SESSION['mid'],'bitcoin')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Bitcoin Cash Wallet</label>-->
<!--<input type="text" class="form-control" name="bitcoincash" id="bitcoincash" placeholder="Bitcoin Cash Wallet" value="<?=getMember($conn,$_SESSION['mid'],'bitcoincash')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row mt-3">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Ethereum Wallet</label>-->
<!--<input type="text" class="form-control" name="ethereum" id="ethereum" placeholder="Ethereum Wallet" value="<?=getMember($conn,$_SESSION['mid'],'ethereum')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Dash Wallet</label>-->
<!--<input type="text" class="form-control" name="dash" id="dash" placeholder="Dash Wallet" value="<?=getMember($conn,$_SESSION['mid'],'dash')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row mt-3">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Dogecoin Wallet</label>-->
<!--<input type="text" class="form-control" name="dogecoin" id="dogecoin" placeholder="Dogecoin Wallet" value="<?=getMember($conn,$_SESSION['mid'],'dogecoin')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Litecoin Wallet</label>-->
<!--<input type="text" class="form-control" name="litecoin" id="litecoin" placeholder="Litecoin Wallet" value="<?=getMember($conn,$_SESSION['mid'],'litecoin')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row mt-3">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Monero Wallet</label>-->
<!--<input type="text" class="form-control" name="monero" id="monero" placeholder="Monero Wallet" value="<?=getMember($conn,$_SESSION['mid'],'monero')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Ripple Wallet</label>-->
<!--<input type="text" class="form-control" name="ripple" id="ripple" placeholder="Ripple Wallet" value="<?=getMember($conn,$_SESSION['mid'],'ripple')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row mt-3">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Troncoin Wallet</label>-->
<!--<input type="text" class="form-control" name="troncoin" id="troncoin" placeholder="Troncoin Wallet" value="<?=getMember($conn,$_SESSION['mid'],'troncoin')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-md-6">-->
<!--<div class="form-group form-group-default">-->
<!--<label>Zcash Wallet</label>-->
<!--<input type="text" class="form-control" name="zcash" id="zcash" placeholder="Zcash Wallet" value="<?=getMember($conn,$_SESSION['mid'],'zcash')?>" style="text-transform:uppercase;" required />-->
<!--</div>-->
<!--</div>-->
<!--</div>-->


<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<img id="output" height="100" width="100" style="display:none;" />
<script>
var loadFile = function(event)
{
var output = document.getElementById('output');
document.getElementById('output').style.display='inline';
output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
<?php if(getMember($conn,$_SESSION['mid'],'profile')){?>
<img height="100" width="100" src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" />
<?php }?>
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Profile</label>
<input type="file" name="profile" id="profile" onChange="loadFile(event)" accept=".jpg,.jpeg,.png,.pjp" />
</div>
</div>
</div>

<div class="text-left mt-3 mb-3">
<button class="btn btn-success">Update Now</button>
</div>
</form>
<?php }else{?>
<p align="center" style="color:#FF0000;">Your account is inactive! Kindly active your account!</p>
<?php }?>
</div>

</div>
</div>

</div>
</div>
</div>

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