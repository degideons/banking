<?php
include("../connection/conn.php");

session_start();

		 
	      $stafid=$_GET['id'];
		  $res=$mysqli->query("select * from staff where StaffID='$stafid'");
		  $row=$res->fetch_assoc();
		  
		$staffid=$row['StaffID'];
        $fname=$row['FirstName'];
        $lname=$row['LastName'];
        $gender=$row['Gender'];
        $dob=$row['DateOfBirth'];
		$marital=$row['MaritalStatus'];
        $stafftype=$row['StaffType'];
		$mbranch=$row['Branch'];
        $mobile=$row['Telephone'];
        $addr=$row['PostAddress'];
		$resaddr=$row['ResdenceAddress'];
        $email=$row['Email'];
		

		  //do something if button is clicked
if(isset($_POST['btnupdate']))
{
$staffid=$_POST['staffid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$marital=$_POST['marital'];
$stafftype=$_POST['stafftype'];
$branch=$_POST['branch'];
$mobile=$_POST['mobile'];
$addr=$_POST['addr'];
$resaddr=$_POST['resaddr'];
$email=$_POST['email'];


$sql="update staff set  FirstName='$fname',LastName='$lname',Gender='$gender',DateOfBirth='$dob',MaritalStatus='$marital',StaffType='$stafftype',Branch='$branch',
                        Telephone='$mobile',PostAddress='$addr',ResdenceAddress='$resaddr',Email='$email' where StaffID='$staffid'";
                        
					 $rs=mysqli_query($mysqli,$sql);
					 if($rs)
					 {
					 header("Location:editstaff.php?id=$stafid&success=1");
					 }
					 else
					 {
					 header("Location:editstaff.php?id=$stafid&error=2");
					 }
}
?>