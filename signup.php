




<?php



include('config/dbconn.php');
  session_start();

  if (isset($_SESSION['id_user'])){
     header('Location:user_index.php');
  }




?>

<?php include 'includes/header.php'; ?>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on the Drawings section
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now !
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Make your house astonishing !
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Paintings
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now !
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder=" DZ DA">
						<option> DZ DA</option>
					</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +213 666602839</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
                           <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
                            <li><a href="contact-us.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/ArtifexLogo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row" >
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Drawing</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php">Pencil</a></li>
                                                    <li><a href="shop.php">Painting</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Photography</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php">Wildlife</a></li>
                                                    <li><a href="shop.php">Cities</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Sculpture</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php">Pottery</a></li>
                                                    <li><a href="shop.php">Sewing</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my-account.php">My Account</a></li>
                                <li><a href="wishlist.php">Wishlist</a></li>
                                <li><a href="shop-detail.php">Shop Detail</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="service.php">Our Service</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->











<?php
// including the database connection file
include("config/dbconn.php");
if(isset($_POST['submit']))
{

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    // checking empty fields
    if(empty($firstname) || empty($lastname) || empty($address) || empty($email) || empty($username) || empty($password)) {

        if(empty($firstname)) {
            echo "<font color='red'>Firstname field is empty!</font><br/>";
        }

        if(empty($lastname)) {
            echo "<font color='red'>Lastname field is empty!</font><br/>";
        }

        if(empty($address)) {
            echo "<font color='red'>Address field is empty!</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>Email field is empty!</font><br/>";
        }

        if(empty($username)) {
            echo "<font color='red'>Username field is empty!</font><br/>";
        }

        if(empty($password)) {
            echo "<font color='red'>Password field is empty!</font><br/>";
        }
    } else {
        //updating the table
        $query = "INSERT INTO users (firstname, lastname, email, address, username, password)
                VALUES ('$firstname', '$lastname','$email','$address','$username','$password')";

        $result = mysqli_query($dbconn,$query);

        if($result){
            echo "Vous etes bien enregistrer, merci";
            //redirecting to the display page. In our case, it is index.php
            $_SESSION['user_id']=$_POST['user_id'];
               header('Location:user_index.php');






}




                }


        }


    }
}
?>








<br><br>


    <div class="box">
        <p class="login-box-msg">Register a new membership</p>

        <form action="" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="address" placeholder="Address" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>


          <hr>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" id="submit" name="submit"><i class="fa fa-pencil"></i> Sign Up</button>
                </div>
            </div>
        </form>
      <br>
      <a href="login.php">I already have a membership</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>

    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



<?php include 'includes/footer.php';
header('Location:user_index.php');?>

</body>

</html>
