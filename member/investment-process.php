<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$invoice=rand(111111,999999);

redirect('deposit.php?amt='.trim($_POST['amount']).'&inv='.$invoice.'&type='.trim($_POST['type']));
}
?>