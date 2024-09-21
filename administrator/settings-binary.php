<?php include('header.php');
$left=2;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<!-- / main menu-->

<?php if($_REQUEST['case']=='edit'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Edit Settings Binary & Direct Income</h4>
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
$sql="SELECT * FROM `ee_settings_binary` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="settings-binary-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">

<div class="form-body">
<div class="form-group">
<label for="userinput1">Direct Income(%)<span style="color:#FF0000;">*</span></label>
<input type="text" id="directot"  class="form-control border-primary" placeholder="Enter Direct Income" name="directot" value="<?=$fetch['directot']?>" required />
</div>
<div class="form-group">
<label for="userinput1">Direct Daily(%)<span style="color:#FF0000;">*</span></label>
<input type="text" id="directper"  class="form-control border-primary" placeholder="Enter Direct Daily" name="directper" value="<?=$fetch['directper']?>" required />
</div>
<div class="form-group">
<label for="userinput1">No Of Days<span style="color:#FF0000;">*</span></label>
<input type="text" id="dnodays"  class="form-control border-primary" placeholder="Enter No of Days" name="dnodays" value="<?=$fetch['dnodays']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Binary Income(%)<span style="color:#FF0000;">*</span></label>
<input type="text" id="binarytot"  class="form-control border-primary" placeholder="Enter Binary Income" name="binarytot" value="<?=$fetch['binarytot']?>" required />
</div>

<div class="form-group">
<label for="userinput1">Binary Daily(%)<span style="color:#FF0000;">*</span></label>
<input type="text" id="binaryper"  class="form-control border-primary" placeholder="Enter Binary Daily" name="binaryper" value="<?=$fetch['binaryper']?>" required />
</div>
<div class="form-group">
<label for="userinput1">No Of Days<span style="color:#FF0000;">*</span></label>
<input type="text" id="bnodays"  class="form-control border-primary" placeholder="Enter No Of Days" name="bnodays" value="<?=$fetch['bnodays']?>" required />
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
<h4 class="card-title">Settings Binary & Direct Income</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>

<div class="table-responsive" style="overflow:auto;">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">Direct_Income(%)</th>
<th style="text-align:center;">Direct_Daily(%)</th>
<th style="text-align:center;">No_of_days</th>
<th style="text-align:center;">Binary_Income(%)</th>
<th style="text-align:center;">Binary_Daily(%)</th>
<th style="text-align:center;">No_of_days</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_settings_binary';
$lim=100;
$tpage='settings-binary.php';
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
<td style="text-align:center;padding:5px;"><?=$fetch['directot']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['directper']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['dnodays']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['binarytot']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['binaryper']?></td>
<td style="text-align:center;padding:5px;"><?=$fetch['bnodays']?></td>
<td align="center">
<a href="settings-binary.php?case=edit&id=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to edit?');"><img src="images/edit.png" /></a>
</td>
</tr> 
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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