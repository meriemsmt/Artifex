<body>
<?php include('config/dbconn.php'); ?>
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
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder=" DZD">
						                    <option> DZD</option>
					              </select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +213 666602839</a></p>
                    </div>
                    <div class="our-link">
                        <ul>


                            <li><a href="forum.php">Forum</li>
                              <li><a href="user_about.php">About Us</li>
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
                    <a class="navbar-brand" href="user_index.php"><img src="images/ArtifexLogo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation


               -->

               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="navbar-menu">
                   <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                       <li class="nav-item"><a class="nav-link" href="user_index.php">Home</a></li>
                       <li class="nav-item"><a class="nav-link" href="user_shop.php">Products</a></li>
                       <li class="nav-item"><a class="nav-link" href="user_about.php">About Us</a></li>


                           <ul class="col-xl-6 dropdown-menu megamenu-content" role="menu">

                               <li>

                                     <div class="dropdown" >
                                         <div class="col-xl-4 col-menu col-md-8">
                                         <h6 class="title">Categories</h6>
                                         <div class="content">
                                             <ul class="menu-col">


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
                           <a href="#" class="nav-link arrow" data-toggle="dropdown">SHOP</a>
                           <ul class="dropdown-menu">
                               <li><a href="cart.php">Cart</a></li>
                               <li><a href="checkout.php">Checkout</a></li>
                               <li><a href="wishlist.php">Wishlist</a></li>
                           </ul>
                       </li>
                       <li class="dropdown">
                           <a href="#" class="nav-link arrow" data-toggle="dropdown">Categories</a>
                           <ul class="dropdown-menu">
                               <li> <?php
                                   $query = "SELECT * FROM category";
                                   $query_run = mysqli_query($dbconn,$query);
                                   foreach($query_run as $row){
                                       echo "
                                           <li><a href='user_shop.php?category=".$row['name_category']."&id=".$row['id_category']."'>".$row['name_category']."</a></li>
                                       ";
                                   }
                                ?></li>

                           </ul>
                       </li>
                       <li class="nav-item"><a class="nav-link" href="user_service.php">Our Service</a></li>
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
                            <span class="badge">

                              <?php
                              $queryNbr = "SELECT id_cart FROM cart";
                              $queryNbr_run = mysqli_query($dbconn, $queryNbr);

                              if ( $rowz = mysqli_num_rows($queryNbr_run)){
                                  echo $rowz;
                              }
                              ?>

                            </span>



					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                  <?php echo $_SESSION['users']; ?>

                </span>
                <img class="img-profile rounded-circle" src="images/user.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-item" style="text-align: center;">
                  <u><?php echo $_SESSION['users']; ?></u>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

            <!-- Start Side Menu -->

            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                      <?PHP
                      $Query="SELECT * FROM products INNER JOIN cart ON products.id_product = cart.id_product";
                      $Result= mysqli_query($dbconn, $Query);
                      $total = 0;
                      $quantity = 0;
                      
                      while($rows = mysqli_fetch_assoc($Result) )
                      {
                      ?>
                        <li>
                            <a href="#" class="photo"><?php
                            $image = $rows['img_product'];
                             echo '<img src="admin/products_img/'.$image.'" alt="image">'?></a>
                            <h6><a href="#"><?php echo $rows['name_product'];?> </a></h6>
                            <p><?php echo $rows['quantity'];?>x - <span class="price"><?php echo $rows['price_product'];?> DA</span></p>
                        </li>
                      <?php
                      $quantity = $rows['quantity'];
                      $price = $rows['price_product'];
                      $price_quantity= $price * $quantity;
                      $total+= $price_quantity;
                    }

                      ?>

                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>:<?php echo "$total"; ?> DA</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
          <div class="input-group" >
            <table>
              <tr>
            <td>
              <span class="input-group-addon"><i class="fa fa-search"></i></span>
            </td>
              <form action="shop.php" method="post">
                <td style="width:500px;">
                <input type="text" class="form-control" placeholder="Search" name="valueToSearch">
              </td>
              <td style="width:90px;">

                <input type="submit" name="search" value="Filter" class="ml-auto btn hvr-hover" style="color: white;">

                </div>
              </td>
              </form>
              <td>
              <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </td>
            </tr>
            </table>
          </div>
        </div>
    </div>
    <!-- End Top Search -->








    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

            <form action="logout.php" method="POST">

              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

            </form>


          </div>
        </div>
      </div>
    </div>
