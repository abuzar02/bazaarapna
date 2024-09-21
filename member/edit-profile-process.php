<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
if($_FILES['profile']['name'])
{

if(strpos($_FILES['profile']['name'], 'php') == false)
{
$errors= array();
$arr=array();

$rand=rand(11111,99999);

$file_name=$rand.$_FILES['profile']['name'];
$file_type=$_FILES['profile']['type'];
$arr=explode('/',$file_type);

if($arr[1]=="jpg" || $arr[1]=="jpeg" || $arr[1]=="png" || $arr[1]=="gif"){

if($arr[1]=="jpg" || $arr[1]=="jpeg" )
{
$uploadedfile = $_FILES['profile']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
if($arr[1]=="png")
{
$uploadedfile = $_FILES['profile']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
if($arr[1]=="gif") 
{
$uploadedfile = $_FILES['profile']['tmp_name'];
$src = imagecreatefromgif($uploadedfile);
}

list($width,$height)= getimagesize($_FILES['profile']['tmp_name']);
if($width > 128){$newwidth = 128;}else{$newwidth = $width;}
if($height > 128){$newheight = 128;}else{$newheight = $height;}

$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

 $sql="UPDATE `ee_member` SET `name`='".trim(mysqli_real_escape_string($conn,$_POST['name']))."',`address`='".trim(mysqli_real_escape_string($conn,$_POST['address']))."',`bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`branch`='".trim(mysqli_real_escape_string($conn,$_POST['branch']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."',`pancard`='".trim(mysqli_real_escape_string($conn,$_POST['pancard']))."',`aadhar`='".trim(mysqli_real_escape_string($conn,$_POST['aadhar']))."',`payeer`='".trim(mysqli_real_escape_string($conn,$_POST['payeer']))."',`paypal`='".trim(mysqli_real_escape_string($conn,$_POST['paypal']))."',`perfectmoney`='".trim(mysqli_real_escape_string($conn,$_POST['perfectmoney']))."',`paytm`='".trim(mysqli_real_escape_string($conn,$_POST['paytm']))."',`upi`='".trim(mysqli_real_escape_string($conn,$_POST['upi']))."',`profile`='".$file_name."',`bitcoin`='".trim($_POST['bitcoin'])."',`bitcoincash`='".trim($_POST['bitcoincash'])."',`ethereum`='".trim($_POST['ethereum'])."',`dash`='".trim($_POST['dash'])."',`dogecoin`='".trim($_POST['dogecoin'])."',`litecoin`='".trim($_POST['litecoin'])."',`monero`='".trim($_POST['monero'])."',`ripple`='".trim($_POST['ripple'])."',`troncoin`='".trim($_POST['troncoin'])."',`zcash`='".trim($_POST['zcash'])."' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_SESSION['mid']))."'";
$res=query($conn,$sql);

$desired_dir="profile/";

if(is_dir($desired_dir)==false)
{
mkdir("$desired_dir", 0700);		// Create directory if it does not exist
}

if(is_dir("$desired_dir/".$file_name)==false){
$filename ="$desired_dir/".$rand.$_FILES['profile']['name'];


imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp);
}else{									// rename the file if another one exist

$new_dir="$desired_dir/".$file_name.time();
rename($uploadedfile,$new_dir) ;				
}
}
}


}
else{
$sql="UPDATE `ee_member` SET `name`='".trim(mysqli_real_escape_string($conn,$_POST['name']))."',`address`='".trim(mysqli_real_escape_string($conn,$_POST['address']))."',`bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`branch`='".trim(mysqli_real_escape_string($conn,$_POST['branch']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."',`pancard`='".trim(mysqli_real_escape_string($conn,$_POST['pancard']))."',`aadhar`='".trim(mysqli_real_escape_string($conn,$_POST['aadhar']))."',`payeer`='".trim(mysqli_real_escape_string($conn,$_POST['payeer']))."',`paypal`='".trim(mysqli_real_escape_string($conn,$_POST['paypal']))."',`perfectmoney`='".trim(mysqli_real_escape_string($conn,$_POST['perfectmoney']))."',`paytm`='".trim(mysqli_real_escape_string($conn,$_POST['paytm']))."',`upi`='".trim(mysqli_real_escape_string($conn,$_POST['upi']))."',`bitcoin`='".trim($_POST['bitcoin'])."',`bitcoincash`='".trim($_POST['bitcoincash'])."',`ethereum`='".trim($_POST['ethereum'])."',`dash`='".trim($_POST['dash'])."',`dogecoin`='".trim($_POST['dogecoin'])."',`litecoin`='".trim($_POST['litecoin'])."',`monero`='".trim($_POST['monero'])."',`ripple`='".trim($_POST['ripple'])."',`troncoin`='".trim($_POST['troncoin'])."',`zcash`='".trim($_POST['zcash'])."' WHERE `id`='".trim(mysqli_real_escape_string($conn,$_SESSION['mid']))."'";
$res=query($conn,$sql);
}
redirect('edit-profile.php?m=1');

}
}
?>