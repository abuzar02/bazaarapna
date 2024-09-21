<?php include('header.php');
$left=9;
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
<h4 class="card-title" id="basic-layout-colored-form-control">Contact</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>
<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Contact Added Successfully!!</p><?php }?>

<form class="form" action="contact-process.php?case=add" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput5">Office<span style="color:#CC0000;">*</span></label>
<input  class="form-control border-primary" type="text" placeholder="Enter Office" required id="office" name="office" value="" >
</div>

<div class="form-group">
<label for="userinput5">Address1<span style="color:#CC0000;">*</span></label>
<input  class="form-control border-primary" type="text" placeholder="Enter Address1" required id="address1" name="address1" value="" >
</div>

<div class="form-group">
<label for="userinput5">Address2 </label>
<input  class="form-control border-primary" type="text" placeholder="Enter Address2 "  id="address2" name="address2" value="" >
</div>

<div class="form-group">
<label for="userinput5">Email1 <span style="color:#CC0000;">*</span></label>
<input  class="form-control border-primary" type="email" placeholder="Enter Email1 " required id="email1" name="email1" value="" >
</div>

<div class="form-group">
<label for="userinput5">Email2</label>
<input class="form-control border-primary" type="email" placeholder="Enter Email2" id="email2" name="email2" value="" >
</div>
<div class="form-group">
<label for="userinput5">Phone1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone1" id="phone1" name="phone1" value="" pattern="[6789][0-9]{9}" required maxlength="10">
</div>
<div class="form-group">
<label for="userinput5">Phone2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone2" id="phone2" name="phone2" value="" pattern="[6789][0-9]{9}" maxlength="10">
</div>

</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit
</button>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Contact</h4>
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

<?php if(isset($_REQUEST['p'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>
<?php if(isset($_REQUEST['m'])==2){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Update Successfully !!</p><?php }?>

<?php 
$sql="SELECT * FROM `ee_contact` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="contact-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput5">Office<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Office" required id="office" name="office" value="<?=$fetch['title']?>">
</div>

<div class="form-group">
<label for="userinput5">Address1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Address1" required id="address1" name="address1" value="<?=$fetch['addline1']?>">
</div>
<div class="form-group">
<label for="userinput5">Address2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Address2"  id="address2" name="address2" value="<?=$fetch['addline2']?>">
</div>

<div class="form-group">
<label for="userinput5">Phone1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone1 " required id="phone1" name="phone1" pattern="[6789][0-9]{9}" value="<?=$fetch['phone1']?>" maxlength="10">
</div>
<div class="form-group">
<label for="userinput5">Phone2</label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone2 "  id="phone2" name="phone2" pattern="[6789][0-9]{9}" value="<?=$fetch['phone2']?>" maxlength="10">
</div>


<div class="form-group">
<label for="userinput5">Email1<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="email" placeholder="Enter Email1 " required id="email1" name="email1" value="<?=$fetch['email1']?>">
</div>
<div class="form-group">
<label for="userinput5">Email2</label>
<input class="form-control border-primary" type="email" placeholder="Enter Email2 "  id="email2" name="email2" value="<?=$fetch['email2']?>">
</div>
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Update
</button>
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

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Contact</h4>
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


<div class="table-responsive" style="overflow:auto;">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;" width="10%">Sl_No.</th>
<th style="text-align:center;" width="10%">Office</th>
<th style="text-align:center;" width="10%">Address1</th>
<th style="text-align:center;" width="10%">Address2</th>
<th style="text-align:center;" width="10%">Phone1</th>
<th style="text-align:center;" width="10%">Phone2</th>
<th style="text-align:center;" width="15%">Email1</th>
<th style="text-align:center;" width="15%">Email2</th>
<th style="text-align:center;" width="10%">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_contact';
$lim=100;
$tpage='contact.php';

$where="ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center" style="padding:2px"><?=$i?></td>
<td align="center" style="padding:2px"><?=output($fetch['title'])?></td>
<td align="center" style="padding:2px"><?=output($fetch['addline1'])?></td>
<td align="center" style="padding:2px"><?=output($fetch['addline2'])?></td>
<td align="center" style="padding:2px"><?=output($fetch['phone1'])?></td>
<td align="center" style="padding:2px"><?=output($fetch['phone2'])?></td>
<td align="center" style="padding:2px"><?=output($fetch['email1'])?></td>
<td align="center" style="padding:2px"><?=output($fetch['email2'])?></td>
<td align="center" style="padding:2px">
<a href="contact.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png"></a>&nbsp;
<a href="contact-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to delete ?')"><img src="images/delete.png" /></a></td>
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
