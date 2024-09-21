<?php
include('header.php');
$left=1;
include('calculate-roi-release.php');
?>
<!-- main menu-->
<?php include('leftpanel.php') ?>
<!-- / main menu-->

<div class="app-content content container-fluid">
<div class="content-wrapper" style="background:#FFFFFF;">
<div class="content-header row">
</div>

<div class="content-body" style="min-height:518px;">

<div align="center">&nbsp;</div>
<div class="row">

<?php if(getModulePermission($conn,$_SESSION['sid'],'View Member')>0 || $_SESSION['sid']=='1') {?>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member.php" style="color:#373a3c;">
<div class="card-body shadow" style="background-color: #fff2d6; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="black"><?=getTodayJoining($conn,date('Y-m-d'))?></h3>
<span>Today Joining</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram success font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member.php" style="color:#373a3c;">
<div class="card-body" style="background-color: #aad6a3; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="yellow"><?=getTodayApproved($conn,date('Y-m-d'))?></h3>
<span>Today Approved</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram yellow font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member.php" style="color:#373a3c;">
<div class="card-body" style="background-color: #8f9bf0; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="yellow"><?=getTotalMember($conn)?></h3>
<span>Total Member</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram yellow font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member.php" style="color:#fff;">
<div class="card-body" style="background-color: #d1b2d5;min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=getActiveMember($conn)?></h3>
<span>Active Member</span>
</div>
<div class="media-right media-middle" >
<i class="icon-diagram pink font-large-2 float-xs-right" ></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="member.php" style="color:#373a3c;">
<div class="card-body" style="background-color: #8f9bf0;min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="teal"><?=getInactiveMember($conn)?></h3>
<span>Inctive Member</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram teal font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<?php }?>
<?php if(getModulePermission($conn,$_SESSION['sid'],'Direct Income')>0 || $_SESSION['sid']=='1') {?>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-direct.php" style="color:#fff;">
<div class="card-body" style="background-color: #03c3ec; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#FFFFFF;"><?=getTotalDirectIncome($conn)?></h3>
<span>Direct Income</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram violet font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<?php }?>

<?php if(getModulePermission($conn,$_SESSION['sid'],'Binary Bonus')>0 || $_SESSION['sid']=='1') {?>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-binary.php" style="color:#fff;">
<div class="card-body" style="background-color: #aad6a3; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#FFFFFF;"><?=getTotalBinaryIncome($conn)?></h3>
<span>Binary Income</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram violet font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<?php }?>

<?php if(getModulePermission($conn,$_SESSION['sid'],'ROI Bonus')>0 || $_SESSION['sid']=='1'){?>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-roi.php" style="color:#fff;">
<div class="card-body" style="background-color: #fff2d6;min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="black text-dark" ><?=getTotalROIIncome($conn)?></h3>
<span style="color: black; ">BDA Income</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram black font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<?php }?>

<?php if(getModulePermission($conn,$_SESSION['sid'],'Reward Bonus')>0 || $_SESSION['sid']=='1'){?>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="commission-reward.php" style="color:#fff;">
<div class="card-body" style="background-color: #d1b2d5;min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#FFFFFF;"><?=getTotalRewardIncome($conn)?></h3>
<span>Reward & Award</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram violet font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<?php }?>

<?php if(getModulePermission($conn,$_SESSION['sid'],'Pending Withdrawal')>0 || $_SESSION['sid']=='1'){?>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="pending-withdrawal.php" style="color:#fff;">
<div class="card-body" style="background-color: #8f9bf0; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#FFFFFF;"><?=getPendingWithdrawalAdmin($conn)?></h3>
<span>Pending Withdrawal</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram violet font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<?php }?>

<?php if(getModulePermission($conn,$_SESSION['sid'],'Approved Withdrawal')>0  || $_SESSION['sid']=='1'){?>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="approved-withdrawal.php" style="color:#333333;">
<div class="card-body" style="background-color: #03c3ec;min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="yellow" style="color:#FFFFFF;"><?=getApprovedWithdrawalAdmin($conn)?></h3>
<span style="color:#FFFFFF;">Approved Withdrawal</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram yellow font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<?php }?>

<?php if(getModulePermission($conn,$_SESSION['sid'],'View E-pin')>0 || $_SESSION['sid']=='1'){?>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="epin.php" style="color:#fff;">
<div class="card-body" style="background-color: #8f9bf0;min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3  style="color:#000;"><?=getEpinAdmin($conn)?></h3>
<span style="color:#000;">Total Available Epin</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram pink font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="epin.php" style="color:#fff;">
<div class="card-body" style="background-color: #8f9bf0; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3  style="color:#FFFFFF;"><?=getUsedEpinAdmin($conn)?></h3>
<span>Total Used Epin</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram pink font-large-2 float-xs-right" style="color:#FFFFFF;"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<?php }?>

<?php if(getModulePermission($conn,$_SESSION['sid'],'View Support')>0 || $_SESSION['sid']=='1'){?>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius:10px;">
<a href="support.php" style="color:#fff;">
<div class="card-body" style="background-color: #8f9bf0; min-height:105px;border-radius:10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=getTotalSupport($conn)?></h3>
<span>Total Support</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram pink font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<?php }?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php') ?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
