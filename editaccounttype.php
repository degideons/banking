<?php
include('../connection/conn.php');
session_start();
$accounttypecodes=$_GET['id'];
if(isset($_GET['id']))
{
$acctypeid=$_GET['id'];
$res=$mysqli->query("select * from accounttype where AccountTypeCode='$acctypeid'");
$row=$res->fetch_assoc();
$accounttypecode=$row['AccountTypeCode'];
$accounttype=$row['AccountType'];
}
if(isset($_POST['btnupdate']))
{
$acctypecode=$_POST['acctypecode'];
$accounttype=$_POST['accounttype'];

$sql="update accounttype set AccountTypeCode='$acctypecode',AccountType='$accounttype' where AccountTypeCode='$acctypecode'";
					 $rs=mysqli_query($mysqli,$sql);
					 if($rs)
					 {
					 

					 header('Location:editaccounttype.php?id='.$accounttypecodes.'&&success=1');
					 }
					 else
					 {
					 header('Location:editaccounttype.php?'.$accounttypecodes.'error=2');
					 }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Account Type</title>

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
                    <li  class="active">
                        <a href="accounttype.php"><i class="fa fa-fw fa-bar-chart-o"></i> Manage Account Type</a>
                    </li>
                    <li>
                        <a href="branch.php"><i class="fa fa-fw fa-table"></i> Manage Branches</a>
                    </li>
                    <li>
                        <a href="staffdetails.php"><i class="fa fa-fw fa-edit"></i> Manage Staff</a>
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
                           Edit Account Type
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Edit Account Type
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               											   <?php 
  if(isset($_GET['success'])){
 ?>
 <div class="alert alert-success" role="alert" id="alert">Record(s) successfully updated<button type="button" class="close" data-dismiss="alert">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <script language="JavaScript" type="text/javascript">timedMsg()</script>
   </div>
 <?php
 }
 else if(isset($_GET['error'])){
 ?>
 <div class="alert alert-danger" role="alert" id="alert">Sorry, Record(s) not updated<button type="button" class="close" data-dismiss="alert">
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
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
								

								
								</h3>
                            </div>
                            <div class="panel-body">
							 <form action="" method="post" enctype="multipart/form-data" role="form">
            <label for="label">Account Type Code</label>
			<div class="form-group">
			<input type="text" name="acctypecode" class="form-control" value="<?php echo $accounttypecode?>">
			<div class="input-group">
			</div>
			</div>
			
			       <label for="label">Account Type </label>
			<div class="form-group">
			<input type="text" name="accounttype" class="form-control" value="<?php echo $accounttype?>">
			<div class="input-group">
			</div>
			</div>
			 <div>
			 <button type="submit" class="btn btn-primary" name="btnupdate"><span class="glyphicon glyphicon-save"></span> Save Changes</button>
			 </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
				
				<!-- add new account type-->
				 <form action="" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
			 <!--class-->
	<div class="modal fade" id="mymodal">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
	<h3 class="modal-title"> Add Account Type</h3>
	</div>
	<div class="modal-body">
	        
	<label for="label">Account Type Code</label>
	 <div class="form-group">
	   <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
	     <input type="text" class="form-control" name="acctypecode" value="" placeholder="Account Type Code"  required />
	 </div>
	 </div>
	 
	 <label for="label">Account Type</label>
	 <div class="form-group">
	  <div class="input-group">
	   <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
	     <input type="text" class="form-control" name="accounttype" placeholder="Account Type" required />
	 </div>
	 </div>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	<button type="submit" class="btn btn-primary" name="btnsave"><span class="glyphicon glyphicon-save"></span> Save</button>
	</div>      
	</div>
	</div>
	</div>
		</form>
				
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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>

</body>

</html>
