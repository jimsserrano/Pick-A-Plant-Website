<?php include('b_server.php');
?>
<?php include('login_server.php');

if (isset($_SESSION['username'])) {

  $login = $_SESSION['username'];
  $data = "SELECT * FROM tbl_register WHERE username='$login'";

  $qry = mysqli_query($db, $data) or die("Could not execute Query." . mysql_error());
  $data2 = mysqli_fetch_array($qry);
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

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pick-A-Plant</title>

  <!-- CSS -->
  <link rel="shortcut icon" href="assets/ico/icon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,500,500i">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style/stylefooter.css">
  <script defer src="script.js"></script>
  <script src="script.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
  <style type="text/css">
    .heading {
      display: flex;
      justify-content: center;
    }

    .heading h1 {
      border-left: 2px solid #000000;
      Border-right: 2px solid #000000;
      background-color: #f05656;
      text-shadow: 2px 2px 12px rgba(69, 66, 66, 0.3);
      padding: 0px 10px;
      color: #FFFFFF;
      margin: 20px;
      font-size: 30px;
      font-family: calibri;
    }


    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 5px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }


    .dropdown:hover .dropdown-content {
      display: block;
    }
          #count{
             border-radius: 40%;
            position: relative;
            top: -10px;
            left: -10px;
        }
  </style>


</head>

<body>

  <!-- Top menu -->
  <nav class="navbar navbar-inverse" role="navigation">
    <!-- style="background-color: #64ca87; -->
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="b_index.php"></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="top-navbar-1">
        <ul class="nav navbar-nav navbar-right navbar-search-button">

             <li class="dropdown"><a href="b_profile.php"><img src="<?php
                                 if($data2['profile'] !== '') { 
                                    echo 'profile/'.$data2['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>" class="img-radius" style="border-radius: 50%; width: 18px;" alt="User-Profile-Image">
                            <span class="dropbtn"><?php
                                                    //display username from db
                                                    echo $data2['username'];
                                                    ?></span>
                        </a></li>

             <li class="notif">
                  
                        <a class="dropdown-toggle"  id="menu1" type="button" data-toggle="dropdown" style="cursor: pointer;"><i class="fa fa-bell" aria-hidden="true"></i>
                            <small><span class="badge" id="count"> 
                    <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result5=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($result5);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='1'";
                    $result5=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result5);

                    $num_rows5=$values['total'];
                   



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='2'";
                    $result6=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result6);

                    $num_rows6=$values['total'];
                  

                    $totalnum=($num_rows5+$num_rows6);
                
                    echo "<small>",$totalnum,"</small>";



                ?></span></small>
                        </a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a href="b_profile_confirmed.php" role="menuitem" tabindex="-1" href="#">
                           <center>Confirmed (<?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='1'";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);

                    $num_rows=$values['total'];
                    echo "<small>",$num_rows,"</small>"; 


                ?>)</center></a></li>
                          <li role="presentation"><a href="b_profile_cancelled.php" role="menuitem" tabindex="-1" href="#">
                             <center>Cancelled (<?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='2'";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);

                    $num_rows=$values['total'];
                    echo "<small>",$num_rows,"</small>"; 


                ?>)</center></a></li>
                        </ul>
                     
                </li>  
          <li><a href="b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <small><span class="badge" id="count">
            <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                     $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];


                    $sql="SELECT count(id) AS total FROM tbl_check WHERE buyer_id=$id";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values['total'];

                    echo "<small>",$num_rows,"</small>";
                ?></span></small></a>
                   <!--Chat feature part-->
                   <?php
                   $user = $data2['unique_id'];
                   $sql2="SELECT * FROM tbl_register WHERE not unique_id='$user' ORDER BY id DESC";
                   $find=mysqli_query($db,$sql2);
                   $data=mysqli_fetch_assoc($find);

                   ?>
                <li><a href="chat/chat.php?user_id=<?php echo $data['unique_id']?>" id="message" onclick='changeStatus(<?php echo $data2['unique_id']?>)'><i class="fa fa-envelope" aria-hidden="true" ></i><small><span class="badge" id="count">
            <?php
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
                  <small id=''><?php echo $num_rows?></small></span></small></a>
               
<script>
    function changeStatus($id){
      
        $.ajax({
            
            url: "update.php",
            data: {id : $id},
            type: "POST",  
            
        });
    }
</script>
          <li class="dropdown"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </ul>

        <form class="navbar-form navbar-right navbar-search-form disabled wow fadeInLeft" role="form" action="" method="post">
          <div class="form-group">
            <input type="text" name="search" placeholder="Search..." class="search form-control">
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right navbar-menu-items wow fadeIn">
          <li style="background-color: #eaeae8; "><a href="b_index.php">Home</a></li>
          <li><a href="b_dictionary.php">Dictionary</a></li>
          <li><a href="b_shop.php">Shop</a></li>

        </ul>
      </div>

    </div>
  </nav>

  <!-- Top content -->
  <div class="top-content">
    <div class="container">

      <div class="row">
        <div class="col-sm-12 text wow fadeInLeft">

          <h1 style="color: black; font-size: 70px">Pick <strong>A</strong> Plant</h1>
          <i class="fa fa-leaf" style="color: #64ca87;"></i>
          <p class="medium-paragraph" style="color: black">
            The Gardening that matters
          </p>
        </div>
      </div>

    </div>
  </div>
  <!-- Features -->
  <div class="features-container section-container">
    <div class="container">

      <div class="row">
        <div class="col-sm-12 features section-description wow fadeIn">
          <h2>About Pick-A-Plant</h2>
          <div class="divider-1 wow fadeInUp"><span></span></div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 features-box wow fadeInLeft">
          <div class="row">
            <div class="col-sm-3 features-box-icon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
            <div class="col-sm-9">
              <h3>Fast Service</h3>
              <p>
                Pick a Plant is reliable and provides a high level of service to its multinational clientele. The faster you response to your customer,
                the higher customer satisfaction you can get
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 features-box wow fadeInLeft">
          <div class="row">
            <div class="col-sm-3 features-box-icon">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <div class="col-sm-9">
              <h3>Secure Payment</h3>
              <p>
                Pick-A-Plant records invoice between buyer and seller for a secured transactions. It is a key factor in improving buyer confidence
                and trust.

              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 features-box wow fadeInLeft">
          <div class="row">
            <div class="col-sm-3 features-box-icon">
              <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
            </div>
            <div class="col-sm-9">
              <h3>Dictionary and Trivia</h3>
              <p>
                Pick-A-Plant provides a knowledge about variety of plants and it gives the user a description
                about a variety of plant that will entice the customer or
                the user.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 features-box wow fadeInLeft">
          <div class="row">
            <div class="col-sm-3 features-box-icon">
              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            </div>
            <div class="col-sm-9">
              <h3>Legit Sellers</h3>
              <p>
                Pick-A-Plant's sellers undergo in accordance with the law or with a particular set of rules and regulations. Providing quality services is directly related to
                customer satisfaction and, as a result, establishing long-term customer
                relationships.
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <br>
 






 
<!-- FOOTER AREA -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">Pick-A-Plant is an e-commerce website that offers different variety of plants. It is a way to lessen the time of customers going outside to travel, only to buy a various plant from different places or locations. Pick-A-Plant also wants to meet the expectations of the users in using an online-based shopping of plants for it can save time for both the buyer and retailer, reducing phone calls about availability, specifications, hours of operation or other information found from different pages. It provides a very comfortable service, by being able to save the item in the cart, and buy or checkout it later on.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li>Plant Shop</li>
            <li>Buy Plants</li>
            <li>Sell PLants</li>
            <li>Know about Plants</li>
            <li>Fast Service</li>
            <li>Legit Sellers</li>
            <li>Secure Payment</li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="b_index.php">Home</a></li>
            <li><a href="b_dictionary.php">Dictionary</a></li>
            <li><a href="b_shop.php">Shop</a></li>

          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2020-2021 All Rights Reserved by
            <a href="#">3BSIT02</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <footer class="site-footer" style="background-color: #57c27e;">

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text"><i class="fa fa-envelope-square" aria-hidden="true"></i> | @planitas@gmail.com
            <a href="#"></a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="d-inline-flex p-3">
            <span><a href="" data-toggle="modal" data-target="#terms">Terms & Condition</a> &nbsp;|</span>

            <span> &nbsp; &nbsp;<a href="" data-toggle="modal" data-target="#privacy">Privacy Policy &nbsp;|</a></span>
            <span> &nbsp; &nbsp;<a href="" data-toggle="modal" data-target="#information">Contact Us</a></span>
          </div>
        </div>
      </div>
    </div>
  </footer>





  <!-- Javascript -->
  <script src="assets/js/jquery-1.11.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.backstretch.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/scripts.js"></script>

  <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>
<!-- START MODAL -->
<div class="modal fade" role="dialog" id="information">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--MODAL HEADER-->
      <div class="modal-header" style="background-color:  #dcc59a;  text-align: center;">
        <h2 class="modal-title" style="color: white;">Contact us</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!--MODAL HEADER-->

      <!--MODAL BODY-->
      <div class="modal-body">
        <form method="post" name="report_form" action="b_server.php">

          <div class="form-group">
            <p style="float: left;">Name</p>
            <input type="text" name="name" class="form-control" readonly="" value="<?php echo $data2['username']; ?>">
          </div>

          <div class="form-group">
            <p style="float: left;">Subject</p>
            <input type="text" name="subject" class="form-control">
          </div>

          <div class="form-group">
            <p style="float: left;">Message</p>
            <textarea name="message" class="form-control" maxlength="255" style="resize: none; height: 100px;"></textarea>
          </div>


          <div class="form-group" hidden="">
            <textarea name="reported_time">
              <?php
              date_default_timezone_set('Asia/Manila');
              $current_time = date('h:i:s a m/d/Y');

              echo $current_time;
              ?>
                
              </textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="send_message" class="btn btn-success form-control" style="outline: none;">send</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL BODY-->

<!-- privacy modal START-->
<style type="text/css">
  #privacy {

    text-align: justify;
    margin: 30px;

  }
</style>
<div class="modal fade" role="dialog" id="privacy">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--MODAL HEADER-->
      <div class="modal-header" style="background-color:  #dcc59a; text-align: center;">
        <h2 class="modal-title" id="tophead" style="color: white">Privacy Policy</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!--MODAL HEADER-->
      <p id="privacy">
        Last updated: January 09, 2021<br><br>
        This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.
        We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy. This Privacy Policy has been created with the help of the Privacy Policy Generator.

      </p>

    </div>
  </div>
</div>

<!-- TERMS modal -->
<div class="modal fade" role="dialog" id="terms">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--MODAL HEADER-->
      <div class="modal-header" style="background-color:  #dcc59a;  text-align: center;">
        <h2 class="modal-title" id="tophead" style="color: white;">Terms & Condition</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!--MODAL HEADER-->
      <p id="privacy">
        Last updated: 01/09/2021
        <br>
        <br>
        Please read this Terms of Condition carefully before using this site operated by Block 2-Group 2(“us”,”we”,or “our”).
        Your access to use and of the website is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all users and others who access or use this website.
        By accessing or using the website you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the website.

        Termination
        We may terminate or suspend access to our site immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
        All provisions of the Terms which by their nature should survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
        <br><br>
        His/Her Account will be terminated once he/she <strong>violates or receive 20 consecutive reports</strong> to his/her buyer.
      </p>

    </div>
  </div>
</div>

</html>