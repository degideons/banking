<?php
include("../connection/conn.php");

//start session
session_start();

//generate password
$fname=$_POST['fname'];
$mypass=rand(000000000,999999999);
$password=$fname."".$mypass;

//generate staff id
 $mystaffid=$mysqli->query("SELECT `StaffID` FROM `staff`");
        $num = $mystaffid->num_rows;

          if($num < 1){
            $new_staff = 'STAFF1000001';
          }else{
              $bool = mysqli_data_seek($mystaffid,$num - 1);

                While($rows = $mystaffid->fetch_assoc()){
                $current_id = $rows['StaffID'];

                }

              $next_id = ltrim($current_id,'STAFF');
              $next_id ++;
              $new_staff = "STAFF".$next_id;
          }

		  //do something if button is clicked
if(isset($_POST['btnsave']))
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
//$password=$_POST['password'];

$thepass=rand(000000000,999999999);
$password=$fname."".$thepass;

$sql="insert into staff(StaffID,FirstName,LastName,Gender,DateOfBirth,MaritalStatus,StaffType,Branch,Telephone,PostAddress,ResdenceAddress,Email,Password)
                 values('$staffid','$fname','$lname','$gender','$dob','$marital','$stafftype','$branch','$mobile','$addr','$resaddr','$email','$password')";
					 $rs=mysqli_query($mysqli,$sql);
					 if($rs)
					 {
					 
					 //generate staff id
					 $mystaffid=$mysqli->query("SELECT `StaffID` FROM `staff`");
        $num = $mystaffid->num_rows;

          if($num < 1){
            $new_staff = 'STAFF1000001';
          }else{
              $bool = mysqli_data_seek($mystaffid,$num - 1);

                While($rows = $mystaffid->fetch_assoc()){
                $current_id = $rows['StaffID'];

                }

              $next_id = ltrim($current_id,'STAFF');
              $next_id ++;
              $new_staff = "STAFF".$next_id;
          }
					 header('Location:staff.php?success=1');
					 }
					 else
					 {
					 header('Location:staff.php?error=2');
					 }
}
?>