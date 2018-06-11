<?php
include("../connection/conn.php");
if(isset($_GET['id']))
{
$branchid=$_GET['id'];
$sql="delete from branch where BranchCode='$branchid'";
$del=mysqli_query($mysqli,$sql);
if($del)
					 {
					 

					 header('Location:branch.php?delsuc=1');
					 }
					 else
					 {
					 header('Location:branch.php?delerror=2');
					 }
}
?>