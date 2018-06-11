<?php
include('../connection/conn.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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
                    <li class="active">
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
                        <a href="customerinfo.php"><i class="fa fa-fw fa-desktop"></i> Manage Customers</a>
                    </li>
					 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-bell"></i> Customer Account <i class="fa fa-fw fa-caret-down"></i></a>
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
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <marquee behavior="alternate"> <i class="fa fa-info-circle"></i> WELCOME TO MIRAJ FINANCIAL SERVICES</marquee>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

               <?php
//count number of staff
$staff=$mysqli->query("select count(*) as NumStaff from staff");
$strow=$staff->fetch_assoc();
$numstaff=$strow['NumStaff'];
?>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $numstaff?></div>
                                        <div>staff!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
					<?php
//count number of customers
$custo=$mysqli->query("select count(*) as Numcusto from customeraccount a,customerinfo c where a.CustomerNumber=c.CustomerNumber and a.AccStatus='Active'");
$custorow=$custo->fetch_assoc();
$numcusto=$custorow['Numcusto'];
?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $numcusto?></div>
                                        <div>customers!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
					
										<?php
//count number of customers on savings account
$savings=$mysqli->query("select count(*) as savings from customeraccount where AccountTypeCode='101' and AccStatus='Active'");
$savingsrow=$savings->fetch_assoc();
$numsavings=$savingsrow['savings'];
?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bell fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $numsavings?></div>
                                        <div>savings account!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
															<?php
//count number of customers on checking account
$checking=$mysqli->query("select count(*) as checking from customeraccount where AccountTypeCode='202' and AccStatus='Active'");
$checkingrow=$checking->fetch_assoc();
$numchecking=$checkingrow['checking'];
?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $numchecking?></div>
                                        <div>checking account!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
			  <br/><br/><br/><br/>
<label for="">Miraj Financial Services; <br/> Your Bank for life.......</label>
<br/><br/><br/>

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
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
