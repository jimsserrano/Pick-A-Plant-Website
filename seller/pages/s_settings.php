<?php include('s_server.php'); ?>
<?php include('login_server.php'); 

 if (isset($_SESSION['username'])) {

   $login=$_SESSION['username'];
   $data="SELECT * FROM tbl_register WHERE username='$login'";

  $qry=mysqli_query($db,$data) or die ("Could not execute Query.".mysql_error());
  $data2=mysqli_fetch_array($qry);
 
}

?>

<?php
if (!isset($_SESSION['username'])) {
   echo "<script>alert('You must login before viewing this page.'); location.href='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <link rel="shortcut icon" href="assets/ico/icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pick A Plants - Seller</title>
           <style type="text/css">

    </style>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
 
    <body>

    <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Pick A Plant</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                            <i class="fa fa-user fa-fw"></i> <?php echo $data2['username'];
                                ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <img src="logo.png">
     
                            </li>

                            <li>
                                <a href="index.php" class="active" style="color: #64ca87;"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="s_products.php"   style="color: #64ca87;">
                                    <i class="fa fa-leaf" aria-hidden="true"></i> Products</a>
                            </li>

                            <li>
                                <a href="#" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Orders</a>
                            </li>

                            <li>
                                <a href="#" style="color: #64ca87;"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a>
                            </li>

                            <li>
                                 <?php
                   $user = $data2['unique_id'];
                   $sql2="SELECT * FROM tbl_register WHERE not unique_id='$user' ORDER BY id DESC";
                   $find=mysqli_query($db,$sql2);
                   $data=mysqli_fetch_assoc($find);

                   ?>
                  <!--CHAT FEATURE-->
                    <a href="chat/chat.php?user_id=<?php echo $data['unique_id']?>" onclick='changeStatus(<?php echo $data2['unique_id']?>)' style="color: #64ca87;" ><i class="fa fa-comments" aria-hidden="true"></i></i>&nbsp; Messages 
                     <span class="badge badge-primary" style="background-color: #64ca87;">  <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                     $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['unique_id'];
                    $query="SELECT * FROM tbl_register WHERE unique_id = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['unique_id'];


                    $sql="SELECT count(incoming_msg_id) AS total FROM messages WHERE  incoming_msg_id=$id AND status='1'";
                    $result=mysqli_query($con,$sql);
                   
                    $values=mysqli_fetch_assoc($result);
                   $num_rows=$values['total'];
                    
                    ?>
                  <small id=''><?php echo $num_rows?></small></span></small></a></a>
                            </li>
<script>
    function changeStatus($id){
      
        $.ajax({
            
            url: "update.php",
            data: {id : $id},
            type: "POST",  
            
        });
    }
</script>
                        </ul>
                    </div>
                </div>
            </nav>
  
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
