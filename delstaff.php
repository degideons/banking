<?php
include("../connection/conn.php");
if(isset($_GET['id']))
{
$mystafid=$_GET['id'];
$sql="delete from staff where StaffID='$mystafid'";
$del=mysqli_query($mysqli,$sql);
if($del)
{
header("location:staffdetails.php?delsuccess=2");
}
else
{
header("location:staffdetails.php?delfail=3");
}
}
?>