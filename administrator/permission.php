<?php include('header.php');
$left=71;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<!-- / main menu-->

<?php if($_REQUEST['case']=='add'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">New Permission</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in">
<div class="card-block">

<?php if($_REQUEST['e']==1){?><div style="color:#FF0000;" align="center">permission already given!!</div><div>&nbsp;</div><?php }?>
<form  action="permission-process.php?case=add" method="post">

<div class="form-body">

<div class="form-group">
<label for="userinput1">Username<span style="color:#FF0000;">*</span></label>
<select name="username" id="username" class="form-control border-primary" required>
<option value="">Select Username</option>
<?php
$sql="SELECT * FROM `ee_admin` WHERE `role`='S' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{?>
<option value="<?=$fetch['id']?>"><?=base64_decode($fetch['username'])?></option>
<?php }}?>
</select>
</div>

<div class="form-group">
<label for="userinput1">Modules<span style="color:#FF0000;">*</span></label>
<select name="menu" id="menu" class="form-control input-line input-medium">
<option value="">Select Menu</option>

<option value="Package">Package</option>
<option value="Binary">Binary</option>
<option value="Reward">Reward</option>
<option value="Epin">Epin</option>
<option value="Withdrawal">Withdrawal</option>

<option value="View Member">View Member</option>
<option value="Bank Details">Bank Details</option>
<option value="Income Statement">Income Statement</option>
<option value="Sales Statement">Sales Statement</option>
<option value="Member ROI">Member ROI</option>

<option value="Direct Income">Direct Income</option>
<option value="Binary Bonus">Binary Bonus</option>
<option value="ROI Bonus">ROI Bonus</option>
<option value="Reward Bonus">Reward Bonus</option>

<option value="E-pin User">E-pin User</option>
<option value="E-pin Admin">E-pin Admin</option>
<option value="View E-pin">View E-pin</option>

<option value="New Deposit">New Deposit</option>
<option value="View Deposit">View Deposit</option>

<option value="New Deduct">New Deduct</option>
<option value="View Deduct">View Deduct</option>

<option value="Payment Statement">Payment Statement</option>

<option value="Pending Withdrawal">Pending Withdrawal</option>
<option value="Approved Withdrawal">Approved Withdrawal</option>
<option value="Paid Withdrawal">Paid Withdrawal</option>

<option value="Grid View">Grid View</option>
<option value="Tree View">Tree View</option>

<option value="New Message">New Message</option>
<option value="View Message">View Message</option>

<option value="New Banner">New Banner</option>
<option value="View Banner">View Banner</option>
<option value="New Contact">New Contact</option>
<option value="View Contact">View Contact</option>
<option value="View Feedback">View Feedback</option>

<option value="View Support">View Support</option>
</select>
</div>

</div>
<div class="form-actions left">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>
</form>

</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else if($_REQUEST['case']=='edit'){?>

<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Permission</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in">
<div class="card-block">

<?php
if($_REQUEST['e']==1){?><div style="color:#FF0000;" align="center">permission  already given!!</div>
<div>&nbsp;</div>
<?php }?>
<?php
$sqle="SELECT * FROM `ee_permission` WHERE `id`='".trim($_REQUEST['id'])."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume>0)
{
$fetche=fetcharray($rese);
}
?>
<p>&nbsp;</p>
<form action="permission-process.php?case=edit&id=<?=$fetche['id']?>" method="post">

<div class="form-body">

<div class="form-group">
<label for="userinput1">Username<span style="color:#FF0000;">*</span></label>
<select name="username" id="username" class="form-control input-line input-medium" required>
<option value="">Select Username</option>
<?php
$sql="SELECT * FROM `ee_admin` WHERE `role`='S' ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{ ?>
<option value="<?=$fetch['id']?>"<?php if($fetche['userid']==$fetch['id']){ echo 'selected';}?>><?=base64_decode($fetch['username'])?></option>
<?php 
}
}
?>
</select>
</div>

<div class="form-group">
<label for="userinput1">Modules<span style="color:#FF0000;">*</span></label>
<select name="menu" id="menu" class="form-control input-line input-medium">
<option value="">Select Menu</option>

<option value="Package" <?php if($fetche['module']=='Package'){ echo 'selected';}?>>Package</option>
<option value="Binary" <?php if($fetche['module']=='Binary'){ echo 'selected';}?>>Binary</option>
<option value="Reward" <?php if($fetche['module']=='Reward'){ echo 'selected';}?>>Reward</option>
<option value="Withdrawal" <?php if($fetche['module']=='Withdrawal'){ echo 'selected';}?>>Withdrawal</option>

<option value="View Member" <?php if($fetche['module']=='View Member'){ echo 'selected';}?>>View Member</option>
<option value="Bank Details" <?php if($fetche['module']=='Bank Details'){ echo 'selected';}?>>Bank Details</option>
<option value="Income Statement" <?php if($fetche['module']=='Income Statement'){ echo 'selected';}?>>Income Statement</option>
<option value="Sales Statement" <?php if($fetche['module']=='Sales Statement'){ echo 'selected';}?>>Sales Statement</option>
<option value="Member ROI" <?php if($fetche['module']=='Member ROI'){ echo 'selected';}?>>Member ROI</option>

<option value="Direct Income" <?php if($fetche['module']=='Direct Income'){ echo 'selected';}?>>Direct Income</option>
<option value="Binary Bonus" <?php if($fetche['module']=='Binary Bonus'){ echo 'selected';}?>>Binary Bonus</option>
<option value="ROI Bonus" <?php if($fetche['module']=='ROI Bonus'){ echo 'selected';}?>>ROI Bonus</option>

<option value="E-pin User" <?php if($fetche['module']=='E-pin User'){ echo 'selected';}?>>E-pin User</option>
<option value="E-pin Admin" <?php if($fetche['module']=='E-pin Admin'){ echo 'selected';}?>>E-pin Admin</option>
<option value="View E-pin" <?php if($fetche['module']=='View E-pin'){ echo 'selected';}?>>View E-pin</option>

<option value="New Deposit" <?php if($fetche['module']=='New Deposit'){ echo 'selected';}?>>New Deposit</option>
<option value="View Deposit" <?php if($fetche['module']=='View Deposit'){ echo 'selected';}?>>View Deposit</option>

<option value="New Deduct" <?php if($fetche['module']=='New Deduct'){ echo 'selected';}?>>New Deduct</option>
<option value="View Deduct" <?php if($fetche['module']=='View Deduct'){ echo 'selected';}?>>View Deduct</option>

<option value="Payment Statement" <?php if($fetche['module']=='Payment Statement'){ echo 'selected';}?>>Payment Statement</option>

<option value="Pending Withdrawal" <?php if($fetche['module']=='Pending Withdrawal'){ echo 'selected';}?>>Pending Withdrawal</option>
<option value="Approved Withdrawal" <?php if($fetche['module']=='Approved Withdrawal'){ echo 'selected';}?>>Approved Withdrawal</option>
<option value="Paid Withdrawal" <?php if($fetche['module']=='Paid Withdrawal'){ echo 'selected';}?>>Paid Withdrawal</option>

<option value="Grid View" <?php if($fetche['module']=='Grid View'){ echo 'selected';}?>>Grid View</option>
<option value="Tree View" <?php if($fetche['module']=='Grid View'){ echo 'selected';}?>>Tree View</option>

<option value="New Message" <?php if($fetche['module']=='New Message'){ echo 'selected';}?>>New Message</option>
<option value="View Message" <?php if($fetche['module']=='New Message'){ echo 'selected';}?>>View Message</option>

<option value="New Banner" <?php if($fetche['module']=='New Message'){ echo 'selected';}?>>New Banner</option>
<option value="View Banner" <?php if($fetche['module']=='View Banner'){ echo 'selected';}?>>View Banner</option>
<option value="New Contact" <?php if($fetche['module']=='New Contact'){ echo 'selected';}?>>New Contact</option>
<option value="View Contact" <?php if($fetche['module']=='View Contact'){ echo 'selected';}?>>View Contact</option>
<option value="View Feedback" <?php if($fetche['module']=='View Feedback'){ echo 'selected';}?>>View Feedback</option>

<option value="View Support" <?php if($fetche['module']=='View Support'){ echo 'selected';}?>>View Support</option>
</select>
</div>

</div>
<div class="form-actions left">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else{ ?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Permission</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in" style="padding:5px;">
<div class="table-responsive" style="overflow:auto;">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No.</th>
<th style="text-align:center;">Username</th>
<th style="text-align:center;">Module</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_permission';
$lim=100;
$tpage='permission.php';
$where="ORDER BY `id`";
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
<td align="center"><?=base64_decode(getAdminName($conn,$fetch['userid'],'username'))?></td>
<td align="center"><?=$fetch['module']?></td>
<td align="center"><?=$fetch['date']?></td>
<td align="center"><a href="permission.php?case=edit&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to edit this?')"><img src="images/edit.png" /></a>&nbsp;<a href="permission-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/cross.png" height="20" width="20" /></a></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="5" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
</div>
<?php }?>

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
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>