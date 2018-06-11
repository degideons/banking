<?php
include('savestaff.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!--set time-->
<script type="text/javascript">
 
function timedMsg()
{
var t=setTimeout("document.getElementById('alert').style.display='none';",4000);
}
</script>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="dashboard.php"><span class="fa fa-bank"></span> MIRAJ FINANCIAL SERVICES</a>
            </div>
            <!-- Top Menu Items -->
             <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "Hi"." ".$_SESSION['firstname']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../Login/AccLogout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="accounttype.php"><i class="fa fa-fw fa-bar-chart-o"></i> Manage Account Type</a>
                    </li>
                    <li>
                        <a href="branch.php"><i class="fa fa-fw fa-table"></i> Manage Branches</a>
                    </li>
                    <li class="active">
                        <a href="staff.php"><i class="fa fa-fw fa-edit"></i> Manage Staff</a>
                    </li>
                    <li>
                        <a href="customerinfo.php"><i class="fa fa-fw fa-desktop"></i> Customer Enquiry</a>
                    </li>
					 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-bell"></i> Account Enquiry<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="checking.php">Checking Account</a>
                            </li>
                            <li>
                                <a href="savings.php">Savings Account</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="balanceEnquiry.php"><i class="fa fa-fw fa-money"></i> Balance Enquiry</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Add Staff 
						   <a href="staffdetails.php" class="btn btn-primary" style="float:right"><span class="glyphicon glyphicon-"></span> Staff Details</a>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Manage Staff
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               											   <?php 
  if(isset($_GET['success'])){
 ?>
 <div class="alert alert-success" role="alert" id="alert">Record(s) successfully saved<button type="button" class="close" data-dismiss="alert">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <script language="JavaScript" type="text/javascript">timedMsg()</script>
   </div>
 <?php
 }
 else if(isset($_GET['error'])){
 ?>
 <div class="alert alert-danger" role="alert" id="alert">Sorry, Record(s) not saved<button type="button" class="close" data-dismiss="alert">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <script language="JavaScript" type="text/javascript">timedMsg()</script>
   </div>
 <?php
 }
else if(isset($_GET['delsuc'])){
 ?>
 <div class="alert alert-warning" role="alert" id="alert">Record(s) Successfully Deleted<button type="button" class="close" data-dismiss="alert">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <script language="JavaScript" type="text/javascript">timedMsg()</script>
   </div>
 <?php
 }
 else if(isset($_GET['delerror'])){
 ?>
  <div class="alert alert-danger" role="alert" id="alert">Sorry, Record(s) failed to delete<button type="button" class="close" data-dismiss="alert">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <script language="JavaScript" type="text/javascript">timedMsg()</script>
   </div>
 <?php
 }
 ?>

                <div class="row">
				<div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
								

								
								</h3>
                            </div>
                            <div class="panel-body">
							 <form action="" method="post" enctype="multipart/form-data" role="form">
           
		<label for="EnterUsername">Staff Id</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
	     <input type="text" name="staffid" id="inputStaffId" class="form-control" value="<?php echo $new_staff; ?>" placeholder="Staff Id" required readonly />
	 </div>
	 </div> 
	
	<label for="EnterUsername">First Name</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
	     <input type="text" name="fname" id="inputfName" class="form-control" placeholder="First Name" required />
	 </div>
	 </div>
	 
	 <label for="EnterUsername">Last Name</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
	     <input type="text" name="lname" id="inputName" class="form-control" placeholder="Last Name" required />
	 </div>
	 </div>
	 
	 <label for="EnterUsername">Gender</label>
	<div class="form-group">
	   <select name="gender" class="form-control" required />
	   <option value="">--- Select Gender ---</option>
	   <option value="Male">Male</option>
	   <option value="Female">Female</option>
	   </select>
	 </div>
	 
	  <label for="EnterUsername">Date Of Birth</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	     <input type="date" name="dob" id="inputAge" class="form-control" placeholder="Date Of Birth" required />
	 </div>
	 </div>
	 
	 <label for="EnterUsername">Marital Status</label>
	<div class="form-group">
	   <select name="marital" class="form-control" required />
	   <option value="">--- Select Marital Status ---</option>
	   <option value="Divorced">Divorced</option>
	   <option value="Married">Married</option>
	   <option value="Single">Single</option>
	   </select>
	 </div>
	 

	 
	 <label for="EnterUsername">Staff Type</label>
	<div class="form-group">
	   <select name="stafftype" class="form-control" required />
	   <option value="">--- Select Staff Type ---</option>
	   <option value="Administrator">Administrator</option>
	   <option value="Customer Service">Customer Service</option>
	   <option value="Operations">Operations</option>
	   <option value="Teller">Teller</option>
	   </select>
	 </div>
	 
 <label for="EnterUsername">Branch</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
	      <?php
	
			echo "<Select name=branch required class=form-control>";
	
			echo "<option value=>--- Select Branch ---</option>";
			$branch = $_POST['branch'];
			$sql = "SELECT Distinct * from branch";
			$rs = mysqli_query($mysqli,$sql) or die('Error, query failed');
			echo "<option value=".$branch.">".$branch."</option>";
			while($rows = $rs->fetch_assoc())
			{
			echo "<option value=".$rows['Branch'].">".$rows['Branch']."</option>";
			}
			echo "</select>";
			
			?>
	 </div>
	 </div>
 
	  <label for="EnterUsername">Mobile Number</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
	    <input type="text" name="mobile" id="telephone" value="" placeholder="Mobile" class="form-control" required>
	 </div>
	 </div>
	 
	<label for="EnterUsername">Post Address</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
	     <input type="text" name="addr" id="inputAddress" class="form-control" placeholder="Post Address" required />
	 </div>
	 </div>
	 
	 <label for="EnterUsername">Residential Address</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
	     <input type="text" name="resaddr" id="inputresAddress" class="form-control" placeholder="Residential Address" required />
	 </div>
	 </div>

	 
	  <label for="EnterUsername">Email</label>
	<div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
	     <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required />
	 </div>
	 </div>
	 <div class="modal-footer">
	<button type="submit" name="btnsave" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
	</div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="../js/validator.min.js"></script>
  <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
    
	 <script>
 			$(function() {
        $("#telephone").mask("+19999999999");
		$("#tel").mask("+19999999999");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
	</script>

</body>

</html>
