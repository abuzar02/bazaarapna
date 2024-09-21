<div class="sidebar">
<div class="sidebar-background"></div>
<div class="sidebar-wrapper scrollbar-inner">
<div class="sidebar-content">
<div class="user">
<div class="avatar-sm float-left mr-2">
<?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{
?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." class="avatar-img rounded-circle">
<?php }else{?>
<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
<?php }?></div>
<div class="info">
<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
<span>
<?=getMember($conn,$_SESSION['mid'],'name')?>
<span class="user-level"><?=getMember($conn,$_SESSION['mid'],'userid')?></span>
<span class="caret"></span>
</span>
</a>
<div class="clearfix"></div>

<div class="collapse in" id="collapseExample">
<ul class="nav">
<li><a href="edit-profile.php"><span class="link-collapse">Edit Profile</span></a></li>
<li><a href="change-password.php"><span class="link-collapse">Change Password</span></a></li>
<li><a href="logout.php" onclick="return confirm('Are you sure want to logout?');"><span class="link-collapse">Logout</span></a></li>
</ul>
</div>
</div>
</div>

<ul class="nav">
<li class="nav-item active">
<a href="dashboard.php">
<i class="fas fa-home"></i>
<p>Dashboard</p>
</a>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#base">
<i class="fas fa-layer-group"></i>
<p>Member</p>
<span class="caret"></span>
</a>
<div class="collapse" id="base">
<ul class="nav nav-collapse">
<li><a href="member-direct-downline.php"><span class="sub-item">My Sponsor</span></a></li>
</ul>
</div>
</li>


<li class="nav-item">
<a data-toggle="collapse" href="#forms">
<i class="fas fa-pen-square"></i>
<p>Commission</p>
<span class="caret"></span>
</a>
<div class="collapse" id="forms">
<ul class="nav nav-collapse">
<li><a href="comm-direct.php"><span class="sub-item">Direct Income</span></a></li>
<li><a href="comm-binary.php"><span class="sub-item">Binary Bonus</span></a></li>
<li><a href="comm-roi.php"><span class="sub-item">BDA Bonus</span></a></li>
<li><a href="comm-reward.php"><span class="sub-item">Reward & Award</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#form">
<i class="fas fa-pen-square"></i>
<p>Payment Request</p>
<span class="caret"></span>
</a>
<div class="collapse" id="form">
<ul class="nav nav-collapse">
<li><a href="payment.php?case=add"><span class="sub-item">New Request</span></a></li>
<li><a href="payment-statement.php"><span class="sub-item">View Request</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#upgrade">
<i class="fas fa-pen-square"></i>
<p>Upgrade</p>
<span class="caret"></span>
</a>
<div class="collapse" id="upgrade">
<ul class="nav nav-collapse">
<li><a href="upgrade.php?case=add"><span class="sub-item">Self Upgrade</span></a></li>
<li><a href="upgrade-others.php?case=check"><span class="sub-item">Others Upgrade</span></a></li>
<li><a href="upgrade.php"><span class="sub-item">View Upgrades</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#tables">
<i class="fas fa-table"></i>
<p>Activation Pin</p>
<span class="caret"></span>
</a>
<div class="collapse" id="tables">
<ul class="nav nav-collapse">
<li><a href="epin-generate.php"><span class="sub-item">Epin Purchase</span></a></li>
<li><a href="epin-purchase.php"><span class="sub-item">Purchased Statement</span></a></li>
<li><a href="epin.php"><span class="sub-item">View Epin</span></a></li>
<!--<li><a href="epin-member.php?case=add"><span class="sub-item">Transfer To Member</span></a></li>
<li><a href="epin-member.php"><span class="sub-item">Transfer History</span></a></li>-->
<li><a href="topup.php?case=check"><span class="sub-item">Others Topup</span></a></li>
<li><a href="topup.php"><span class="sub-item">Topup Statement</span></a></li>
</ul>
</div>
</li>


<li class="nav-item">
<a data-toggle="collapse" href="#maps">
<i class="fas fa-user"></i>
<p>Genealogy</p>
<span class="caret"></span>
</a>
<div class="collapse" id="maps">
<ul class="nav nav-collapse">
<li><a href="grid-view.php"><span class="sub-item">Grid View</span></a></li>
<li><a href="tree-view.php"><span class="sub-item">Tree View</span></a></li>
</ul>
</div>
</li>


<li class="nav-item">
<a data-toggle="collapse" href="#submenu">
<i class="fas fa-bars"></i>
<p>Withdrawal</p>
<span class="caret"></span>
</a>
<div class="collapse" id="submenu">
<ul class="nav nav-collapse">
<li><a href="withdrawal.php?case=add"><span class="sub-item">New Request</span></a></li>
<li><a href="withdrawal-statement.php"><span class="sub-item">View Statement</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#charts">
<i class="far fa-chart-bar"></i>
<p>Support</p>
<span class="caret"></span>
</a>
<div class="collapse" id="charts">
<ul class="nav nav-collapse">
<li><a href="support.php?case=add"><span class="sub-item">New Support</span></a></li>
<li><a href="support-statement.php"><span class="sub-item">View Support</span></a></li>
</ul>
</div>
</li>

<li class="nav-item active">
<a href="logout.php"  onclick="return confirm('Are you sure want to logout?')" data-i18n="nav.dash.main" class="menu-item">
<i class="fas fa-lock"></i>
<p>Logout</p>
</a>
</li>

</ul>
</div>
</div>
</div>