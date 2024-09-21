<?php include('header.php');
$left=5;
?>
<script src="js/ajax.js" type="text/javascript"></script>
<script>
function getSponcheck(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getSponRequest;
xmlhttp.send();
}
function getSponRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('sponDiv').innerHTML=response;
}
}
}
</script>
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<?php if($_REQUEST['case']=='member'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">User Epin Generate</h4>
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

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Invalid User ID!</p><?php }?>
<?php if(isset($_REQUEST['g'])==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Please enter epin no greater than zero!!</p><?php }?>

<form class="form" action="epin-process.php?case=member" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput5">User ID<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter User ID" required id="userid" name="userid" value="" onChange="getSponcheck(this.value);" onBlur="getSponcheck(this.value);"  onKeyUp="getSponcheck(this.value);" />
<div id="sponDiv" style="color:#FF0000; font-size:14px;"></div>
</div>

<div class="form-group">
<label for="userinput5">Package<b style="color:#FF0000;">*</b></label>
<select name="package" id="package" class="form-control  border-primary" required>
<option value="">Select Package</option>
<?php
$sqlst="SELECT * FROM `ee_settings_package` ORDER BY `amount`";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower($fetchst['package']))?> (<?=$fetchst['amount']?>)</option>
<?php }}?>
</select>
</div>
<div class="form-group">
<label for="userinput5">No of Epin<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter No of Epin" required id="number" name="number" value="" />
</div>
</div>
<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
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

<?php }if($_REQUEST['case']=='admin'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Admin Epin Generate</h4>
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

<?php if(isset($_REQUEST['g'])==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Please enter epin no greater than zero!!</p><?php }?>

<form class="form" action="epin-process.php?case=admin" method="post">
<div class="form-body">
<div class="form-group">
<label for="userinput5">Package<b style="color:#FF0000;">*</b></label>
<select name="package" id="package" class="form-control  border-primary" required>
<option value="">Select Package</option>
<?php
$sqlst="SELECT * FROM `ee_settings_package` ORDER BY `amount`";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower($fetchst['package']))?> (<?=$fetchst['amount']?>)</option>
<?php }}?>
</select>
</div>

<div class="form-group">
<label for="userinput5">No of Epin<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter No of Epin" required id="number" name="number" value="">
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

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;overflow:auto;">

<div class="content-body"  >

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Epin</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in" >
<form name="frm1" action="epin.php?act=search" method="post">

<div class="row">
<div class="col-md-6" align="center">

<input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" placeholder="User ID, Epin" style="width:180px;margin:5px;" required />
</div>
<div class="col-md-6" align="center" ><h4 align="center" style="color:#FF0000;margin:5px;">Today Epin Generate: <?=getTodayEpinGenerate($conn,date('Y-m-d'))?></h4>
</div>
</div>
</form>


</div>

<div class="table-responsive" style="overflow:auto" >
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">Package</th>
<th style="text-align:center;">User_ID</th>
<th style="text-align:center;">To_ID</th>
<th style="text-align:center;">Epin</th>
<th style="text-align:center;">Generate</th>
<th style="text-align:center;">Status</th>
<th style="text-align:center;">Used_By</th>
<th style="text-align:center;">Used_On</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='ee_epin';
$lim=100;
$tpage='epin.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['search']))."' OR `epin`='".trim(mysqli_real_escape_string($conn,$_POST['search']))."' ORDER BY `id` DESC";
}else{              
$where="ORDER BY `id` DESC";
}
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
<td align="center" style="padding:5px;"><?=$i?></td>
<td align="center" style="padding:5px;"><?=getPackage($conn,$fetch['package'],'package')?> (<?=getPackage($conn,$fetch['package'],'amount')?>)</td>
<td align="center" style="padding:5px;"><?php if($fetch['userid']){?><?=$fetch['userid']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:5px;"><?php if($fetch['toid']){?><?=$fetch['toid']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:5px;"><span id="p1<?=$i?>"><?=$fetch['epin']?></span>&nbsp;&nbsp;<i class="fa fa-copy" onClick="copyToClipboard<?=$i?>('#p1<?=$i?>')" id="cpbutton<?=$i?>" style="cursor:pointer;"><img src="images/copy.png" height="20" width="20" /></i></td>
<td align="center" style="padding:5px;"><?=$fetch['generate']?></td>
<td align="center" style="padding:5px;"><?php if($fetch['status']=='A'){?><span style="color:#009966;">Available</span><?php }else{?><span style="color:#FF0000;">Used</span><?php }?></td>
<td align="center" style="padding:5px;"><?php if($fetch['usedby']){?><?=$fetch['usedby']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:5px;"><?php if($fetch['usedon']){?><?=$fetch['usedon']?><?php }else{?>---<?php }?></td>                           
<td align="center" style="padding:5px;">
<?php if($fetch['status']=='A'){?>  
<a href="epin-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>"onclick="return confirm('Are you want to sure to delete this?');"><img src="images/delete.png" /></a><?php }else{?>----<?php }?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="10" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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