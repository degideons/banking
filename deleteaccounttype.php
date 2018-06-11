<?php
include("../connection/conn.php");
if(isset($_GET['id']))
{
$acctypeid=$_GET['id'];
$sql="delete from accounttype where AccountTypeCode='$acctypeid'";
$del=mysqli_query($mysqli,$sql);
if($del)
					 {
					 

					 header('Location:accounttype.php?delsuc=1');
					 }
					 else
					 {
					 header('Location:accounttype.php?delerror=2');
					 }
}
?>