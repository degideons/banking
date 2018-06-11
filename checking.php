<?php
include("../connection/conn.php");
session_start();
error_reporting(0);

if(isset($_POST['btnsearch'])){
$txtsearch=$_POST['txtsearch'];
$res=$mysqli->query("select * from customeraccount a,customerinfo c,branch b where a.CustomerNumber=c.CustomerNumber and a.BranchCode=b.BranchCode and a.AccStatus='Active' and a.AccountTypeCode='202' and a.AccountNumber='$txtsearch'");
}
else
{
$res=$mysqli->query("select * from customeraccount a,customerinfo c,branch b where a.CustomerNumber=c.CustomerNumber and a.BranchCode=b.BranchCode and a.AccStatus='Active' and a.AccountTypeCode='202'");
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

    <title>Checking Account</title>

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
                    <li>
                        <a href="staffdetails.php"><i class="fa fa-fw fa-edit"></i> Manage Staff</a>
                    </li>
                    <li>
                        <a href="customerinfo.php"><i class="fa fa-fw fa-desktop"></i> Customer Enquiry</a>
                    </li>
					 <li class="active">
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
                          Checking Account 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Account Enquiry
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
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
								

								
								</h3>
                            </div>
                            <div class="panel-body">
							 <form action="" method="post" enctype="multipart/form-data" role="form">
<table class="table">
 <tr>
 <td><input type="text" name="txtsearch" class="form-control" value="<?php echo $txtsearch?>" placeholder="Input Account Number To Search"></td>&nbsp;
 <td><button type="submit" name="btnsearch" class="btn btn-primary">Search <span class="glyphicon glyphicon-search"></span></button>
 </td>
  <td>
 <button type="submit" name="btnrefresh" class="btn btn-primary">Refresh <span class="glyphicon glyphicon-refresh"></span></button>
 </td>
 </tr>
 </table>
<table class="table" width="100%">
<tr class="active">
<td><label for="label">Account No</label></td>
<td><label for="label">Account Name</label></td>
<td><label for="label">Branch</label></td>
<td><label for="label">Account Opening Date</label></td>
</tr>
<?php 
while($row=$res->fetch_assoc())
{
?>
<tr>
<td><?php echo $row['AccountNumber'];?></td>
<td><?php echo $row['Firstname']." ".$row['Lastname'];?></td>
<td><?php echo $row['Branch'];?></td>
<td><?php echo $row['AccOpeningDate'];?></td>
</tr>
<?php
}
?>
 </table>
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
