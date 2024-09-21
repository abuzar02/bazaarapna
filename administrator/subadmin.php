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
<h4 class="card-title" id="basic-layout-colored-form-control">New Sub Admin</h4>
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
if($_REQUEST['e']==1){?><div style="color:#FF0000;" align="center">Username already exist!!</div>
<div>&nbsp;</div>
<?php }?>

<form action="subadmin-process.php?case=add" method="post">
<div class="form-body">

<div class="form-group">
<label for="userinput1">Username<span style="color:#FF0000;">*</span></label>
<input type="text" name="username" id="username" required class="form-control border-primary" placeholder="Enter Username" />
</div>

<div class="form-group">
<label for="userinput1">Password<span style="color:#FF0000;">*</span></label>
<input type="password" name="password" id="password" required class="form-control border-primary" placeholder="Enter Password" />
</div>

<div class="form-group">
<label for="userinput1">Name<span style="color:#FF0000;">*</span></label>
<input type="text" name="name" id="name" required class="form-control border-primary" placeholder="Enter Name" />
</div>

<div class="form-group">
<label for="userinput1">Phone<span style="color:#FF0000;">*</span></label>
<input type="text" name="phone" id="phone" required class="form-control border-primary" placeholder="Enter Phone"  pattern="[6-9]{1}[0-9]{9}" maxlength="10" />
</div>

<div class="form-group">
<label for="userinput1">Email<span style="color:#FF0000;">*</span></label>
<input type="email" name="email" id="email" required class="form-control border-primary" placeholder="Enter Email" />
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
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Sub Admin</h4>
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
if($_REQUEST['e']==1){?><div style="color:#FF0000;" align="center">Username already exist!!</div>
<div>&nbsp;</div>
<?php }?>
<?php
$sql="SELECT * FROM `ee_admin` WHERE `id`='".mysql_real_escape_string($_REQUEST['id'])."'";
$res=query($sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form  action="subadmin-process.php?case=edit&id=<?=$fetch['id']?>" method="post">

<div class="form-group">
<label for="userinput1">Username<span style="color:#FF0000;">*</span></label>
<input type="text" name="username" id="username" required class="form-control border-primary" placeholder="Enter Username" value="<?=$fetch['username']?>" />
</div>

<div class="form-group">
<label for="userinput1">Password<span style="color:#FF0000;">*</span></label>
<input type="password" name="password" id="password" required class="form-control border-primary" placeholder="Enter Password" value="<?=$fetch['password']?>" />
</div>

<div class="form-group">
<label for="userinput1">Name<span style="color:#FF0000;">*</span></label>
<input type="text" name="name" id="name" required class="form-control border-primary" placeholder="Enter Name" value="<?=$fetch['name']?>" />
</div>

<div class="form-group">
<label for="userinput1">Phone<span style="color:#FF0000;">*</span></label>
<input type="text" name="phone" id="phone" required class="form-control border-primary" placeholder="Enter Phone"  pattern="[6-9]{1}[0-9]{9}" maxlength="10" value="<?=$fetch['phone']?>" />
</div>

<div class="form-group">
<label for="userinput1">Email<span style="color:#FF0000;">*</span></label>
<input type="email" name="email" id="email" required class="form-control border-primary" placeholder="Enter Email" value="<?=$fetch['email']?>" />
</div>

</form>
<?php }?>
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
<h4 class="card-title">View Sub Admin</h4>
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
<td align="center">Sl_No</td>
<td align="center">Username</td>
<td align="center">Password</td>
<td align="center">Name</td>
<td align="center">Phone</td>
<td align="center">Email</td>
<td align="center">Status</td>
<td align="center">Date</td>
<td align="center">Action</td>
</tr>
</thead>
<tbody>

<?php
$tname='ee_admin';
$lim=100;
$tpage='subadmin.php';
$where="WHERE `id`>1 ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr style="text-align:center;">
<td align="center"><?=$i?></td>
<td align="center"><?=ucwords(base64_decode($fetch['username']))?></td>
<td align="center"><?=base64_decode($fetch['password'])?></td>
<td align="center"><?=ucwords($fetch['name'])?></td>
<td align="center"><?=$fetch['phone']?></td>
<td align="center"><?=$fetch['email']?></td>
<td align="center"><?php if($fetch['status']=='A') {?><a href="subadmin-process.php?case=status&st=<?=$fetch['status']?>&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to change status?')"><img src="images/enable.gif" /></a><?php } else{ ?><a href="subadmin-process.php?case=status&st=<?=$fetch['status']?>&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to change status?')"><img src="images/disable.gif" /></a><?php } ?></td>
<td align="center"><?=$fetch['date']?></td>
<td align="center"><?php if($fetch['status']=='I') {?><a href="subadmin-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure delete this?')"><img src="images/delete.png" /></a><?php }else{?>---<?php  } ?></td>
</tr> 
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>

</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>
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