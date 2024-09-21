<?php include('header.php'); 
$left=9;
?>
<style>
table,
thead,
tr,
tbody,
th,
td {
text-align: center;
}
</style>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Feedback</h4>
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
<div align="center" style="padding:5px;"><form name="frm1" method="post" action="feedback.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="Name, Email, Phone" style="width:250px;" />
</form></div>


<div class="table-responsive" style="overflow:auto;">
<table class="table table-bordered table-striped" align="center">
<thead class="bg-teal bg-lighten-4" align="center">
<tr align="center">
<th width="82" height="23" align="center">Sl_No.</th>							
<th width="168" align="center">Name</th>					
<th width="182" align="center">Email</th>	
<th width="182" align="center">Phone</th>						
<th width="182" align="center">Subject</th>					
<th width="406" align="center">Message</th>
<th width="182" align="center">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='ee_feedback';
$lim=100;
$tpage='feedback.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `phone` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' OR `name` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' OR `email` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' ORDER BY `id` DESC";
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
<tr align="center">
<td style="padding:3px;"><?=$i?></td>
<td style="padding:3px;"><?=$fetch['name']?></td>
<td style="padding:3px;"><?=$fetch['email']?></td>
<td style="padding:3px;"><?=$fetch['phone']?></td>
<td style="padding:3px;"><?=$fetch['subject']?></td>
<td style="padding:3px;"><?=substr($fetch['message'],0,50)?>...</td>
<td style="padding:3px;">
<a href="view-feedback.php?id=<?=$fetch['id']?>" target="_blank"><img src="images/view.png" title="Inquiry Details" height="22" width="22"></a>
<a href="delete.php?case=feedback&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a>
</td> 
</tr>              
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>
