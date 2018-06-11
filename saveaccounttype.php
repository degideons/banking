<?php
//include connection
include("../connection/conn.php");

//start session
session_start();

//set error to zero
error_reporting(0);


		  //do something if button is clicked
if(isset($_POST['btnsave']))
{
$acctypecode=$_POST['acctypecode'];
$accounttype=$_POST['accounttype'];

$sql="insert into accounttype(AccountTypeCode,AccountType)values('$acctypecode','$accounttype')";
					 $rs=mysqli_query($mysqli,$sql);
					 if($rs)
					 {
					 

					 header('Location:accounttype.php?success=1');
					 }
					 else
					 {
					 header('Location:accounttype.php?error=2');
					 }
}
if(isset($_POST['btnsearch']))
{
$txtsearch=$_POST['txtsearch'];
$res=$mysqli->query("select * from accounttype where AccountTypeCode='$txtsearch'");
}
else
{
$res=$mysqli->query("select * from accounttype");
}
?>