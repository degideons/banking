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
$branch=$_POST['branch'];
$sql="insert into branch(Branch)values('$branch')";
					 $rs=mysqli_query($mysqli,$sql);
					 if($rs)
					 {
					 

					 header('Location:branch.php?success=1');
					 }
					 else
					 {
					 header('Location:branch.php?error=2');
					 }
}
if(isset($_POST['btnsearch']))
{
$txtsearch=$_POST['txtsearch'];
$res=$mysqli->query("select * from branch where BranchCode='$txtsearch'");
}
else
{
$res=$mysqli->query("select * from branch");
}
?>