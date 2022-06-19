<?php
    session_start();
    include('config/dbconn.php');

    if (isset($_SESSION['id'])){
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











    <br> <br><br> <br> <br><br> <br> <br><br> <br> <br><br>
    <div class="box">
      <p>Sign in to start your session</p>

                      <form action="user_login.php" method="POST">
                          <div class="imgcontainer">
                              <input type="text" class="form-control" name="username" placeholder="Username" required>
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>
                          <div class="imgcontainer">
                              <input type="password" class="form-control" name="password" placeholder="Password" required>
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          <div class="row">
                              <div class="col-xs-4">
                                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"> Sign In</button>
                              </div>
                          </div>
                      </form>
          <br>
        <a href="password_forgot.php">I forgot my password</a><br>
        <a href="signup.php" class="text-center">Register a new membership</a><br>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
    </div>
</div>
<?php

                                    if (
                                        isset($_SESSION['msg'])){
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);

                                    }
                                    ?>
<br> <br><br> <br> <br>


<?php include 'includes/footer.php'; ?>

</body>

</html>
