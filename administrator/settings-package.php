<?php include('header.php');
$left=2;
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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Package</h4>
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

<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC00; padding-bottom:8px;">Added Successfully</p><?php }?>
<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already exists!!</p><?php }?>

<form class="form" action="settings-package-process.php?case=add" method="post">
<div class="form-body">

<div class="form-group">
<label for="userinput1">Package<span style="color:#FF0000;">*</span></label>
<input type="text" id="package"  class="form-control border-primary" placeholder="Enter Package Name" name="package" value="" required/>
</div>

<div class="form-group">
<label for="userinput1">Amount<span style="color:#FF0000;">*</span></label>
<input type="text" id="amount"  class="form-control border-primary" placeholder="Enter Amount" name="amount" value="" required/>
</div>

<div class="form-group">
<label for="userinput1">Daily ROI(%)<span style="color:#FF0000;">*</span></label>
<input type="text" id="dailyroi"  class="form-control border-primary" placeholder="Enter Daily ROI" name="dailyroi" value="" required/>
</div>

<div class="form-group">
<label for="userinput1">No Of Days<span style="color:#FF0000;">*</span></label>
<input type="text" id="nodays"  class="form-control border-primary" placeholder="Enter No of Days" name="nodays" value="" required/>
</div>

<div class="form-group">
<label for="userinput1">Daily Capping Binary<span style="color:#FF0000;">*</span></label>
<input type="text" id="capping"  class="form-control border-primary" placeholder="Enter Daily Capping" name="capping" value="" required/>
</div>


</div>
<div class="form-actions right">
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

<?php } else if($_REQUEST['case']=='edit'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Settings Package</h4>
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

<?php if($_REQUEST['m']=='1'){?><p align="center" style=" color:#FF0000;">Already exists!</p><?php }?>
<?php if($_REQUEST['m']=='2'){?><p align="center" style=" color:#00CC33;">Updated successfully!</p><?php }?>

<?php 
$sql="SELECT * FROM `ee_settings_package` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="settings-package-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">
<div class="form-body">

<div class="form-group">
<label for="userinput1">Package<span style="color:#FF0000;">*</span></label>
<input type="text" id="package"  class="form-control border-primary" placeholder="Enter Package Name" name="package" value="<?=$fetch['package']?>" required/>
</div>

<div class="form-group">
<label for="userinput1">Amount<span style="color:#FF0000;">*</span></label>
<input type="text" id="amount"  class="form-control border-primary" placeholder="Enter Amount" name="amount" value="<?=$fetch['amount']?>" required/>
</div>

<div class="form-group">
<label for="userinput1">Daily ROI(%)<span style="color:#FF0000;">*</span></label>
<input type="text" id="dailyroi"  class="form-control border-primary" placeholder="Enter Daily ROI" name="dailyroi" value="<?=$fetch['dailyroi']?>" required/>
</div>

<div class="form-group">
<label for="userinput1">No Of Days<span style="color:#FF0000;">*</span></label>
<input type="text" id="nodays"  class="form-control border-primary" placeholder="Enter No of Days" name="nodays" value="<?=$fetch['nodays']?>" required/>
</div>

<div class="form-group">
<label for="userinput1">Daily Capping Binary<span style="color:#FF0000;">*</span></label>
<input type="text" id="capping"  class="form-control border-primary" placeholder="Enter Daily Capping" name="capping" value="<?=$fetch['capping']?>" required/>
</div>

</div>
<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
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
<h4 class="card-title">Settings Package</h4>
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
<div align="right"><a href="settings-package.php?case=add" style="text-decoration:none;margin-top:10px;"><input type="button" name="button" value="New Package" class="btn btn-info"/></a></div></div>

<div class="table-responsive" style="overflow:auto;">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">Package</th>
<th style="text-align:center;">Amount</th>
<th style="text-align:center;">Daily_ROI(%)</th>
<th style="text-align:center;">No_Days</th>
<th style="text-align:center;">Daily_Capping_Binary</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_settings_package';
$lim=100;
$tpage='settings-package.php';
$where="ORDER BY `id`";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr style="text-align:center;">
<td style="text-align:center;padding:5px;"><?=$i?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['package']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['amount']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['dailyroi']?> %</td>
<td style="text-align:center;padding:5px;"><?=$fetch['nodays']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['capping']?></td>
<td align="center">
<a href="settings-package.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to edit?');"><img src="images/edit.png" /></a>&nbsp;<a href="settings-package-process.php?case=delete&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to delete?');"><img src="images/delete.png" /></a>
</td>
</tr> 
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>