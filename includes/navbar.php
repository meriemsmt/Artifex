
<?php

//LOGIN



  if (isset($_POST['login'])){
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query= "SELECT * FROM admin WHERE username='$username_login' AND password='$password_login'";

    $query_run = mysqli_query($dbconn,$query);

    if (mysqli_fetch_assoc($query_run))
    {
      $_SESSION['admin']=$username_login;
      header('location: admin/index.php');

    }else{
      $_SESSION['status']='Email or pass invalid';
      header('location: index.php');
    }




    //users
    $query2 = "SELECT * FROM users WHERE username='$username_login' AND password='$password_login'";
    $query_run2 = mysqli_query($dbconn,$query2);

        if (mysqli_fetch_array($query_run2))
        {
            $_SESSION['users'] = $username_login;
            header("Location: user_index.php");
        }
        else
        {
           $_SESSION['status'] = "Username or Password is invalid";
        }

  }

?>



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
                              <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                          </li>
                          <li>
                              <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                          </li>
                          <li>
                              <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                          </li>
                          <li>
                              <i class="fab fa-opencart"></i> Off 50%! Shop Now
                          </li>
                          <li>
                              <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                          </li>
                          <li>
                              <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                          </li>
                          <li>
                              <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                          </li>
                          <li>
                              <i class="fab fa-opencart"></i> Off 50%! Shop Now
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="custom-select-box">
                  <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
      <option> DZD</option>

    </select>
              </div>
              <div class="right-phone-box">
                  <p>Call US :- <a href="#"> +11 900 800 100</a></p>
              </div>
              <div class="our-link">
                  <ul>

                      <li><a href="#" data-toggle="modal" data-target="#exampleModal">Sign in</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#signup">Sign up</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>

                            <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><h3><strong>Sign In</strong></h3></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">

                                            <?php

                    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>

                                        <form action="" method="POST">
                                            <div class="imgcontainer">
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                            </div>
                                            <div class="imgcontainer">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            </div>
                                            <br>
                                              <div class="submit-button text-center">
                                                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                                                <input type="submit" name="login" class="btn hvr-hover" value="Sign In">
                                              </div>

                                        </form>
                                            <div style="text-align: center">
                                                <a href="index.php"><i class="fa fa-home"></i> Home</a>
                                            </div>
                                      </div>

                                    </div>
                                  </div>
                                </div>



                            <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><h3><strong>Register a new membership</strong></h3></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">



                        <?php
                        // including the database connection file
                        include("config/dbconn.php");
                        if(isset($_POST['submit']))
                        {
                        $firstname=$_POST['firstname'];
                        $lastname=$_POST['lastname'];
                        $email=$_POST['email'];
                        $gender=$_POST['gender'];
                        $address=$_POST['address'];
                        $username=$_POST['username'];
                        $password=$_POST['password'];

                        // checking empty fields
                        if(empty($firstname) || empty($lastname) || empty($address) || empty($email) || empty($gender) || empty($username) || empty($password)) {

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

                        if(empty($gender)) {
                        echo "<font color='red'>Gender field is empty!</font><br/>";
                        }

                        if(empty($username)) {
                        echo "<font color='red'>Username field is empty!</font><br/>";
                        }

                        if(empty($password)) {
                        echo "<font color='red'>Password field is empty!</font><br/>";
                        }
                        } else {
                        //updating the table
                        $query = "INSERT INTO users (firstname, lastname, email, gender, address, username, password)
                        VALUES ('$firstname', '$lastname','$email', '$gender','$address','$username','$password')";

                        $result = mysqli_query($dbconn,$query);

                        if($result){
                        //echo "<font color='red'>Username is already taken, try an other one please!</font><br/>";
                        //echo "Welcome! Thank you, You can now login";
                        //redirecting to the display page. In our case, it is index.php
                        $_SESSION['users'] = $username;
                        header("Location: user_index.php");

                      }else {
                        echo '
                        <div class="alert alert-danger" role="alert">
                        Username is already taken, try an other one please!
                        </div>
                        ';
                      }

                        }
                        }
                        ?>




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

                                                               <select class="form-control" name="gender" required>
                                                                 <option value="female">female</option>
                                                                 <option value="male">male</option>
                                                               </select>
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
                                                                <div class="col-xs-4">

                                                                  <div class="submit-button text-center">
                                                                    <button type="submit" class="btn hvr-hover" id="submit" name="submit"><i class="fa fa-pencil"></i> Sign Up</button>

                                                                  </div>
                                                                </div>
                                                    </form>


                                            <div style="text-align: center">
                                                        <a href="index.php">I already have a membership</a><br>
                                                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                                            </div>




                                      </div>

                                    </div>
                                  </div>
                                </div>


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
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop.php">Products</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Categories</a>

                            <ul class=" col-xl-6 dropdown-menu megamenu-content" role="menu">
                                <li>

                                    <div class="dropdown" >
                                        <div class="col-xl-4 col-menu col-md-8">
                                            <h6 class="title">Categories</h6>
                                            <div class="content">
                                                <ul class="menu-col">

                                                     <?php

                                                        $query = "SELECT * FROM category";
                                                        $query_run = mysqli_query($dbconn,$query);

                                                            foreach($query_run as $row){
                                                                echo "
                                                                <li><a href='shop.php?category=".$row['name_category']."&id=".$row['id_category']."'>".$row['name_category']."</a></li>

                                                                ";


                                                            }

                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="service.php">Our Service</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">0</span>
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
                            <strong>
                            <h3 style="text-align: center;">Your Cart is Empty. Sign In to add your Product</h3>
                            </strong>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span ><strong>Total</strong>: 00.0 DZD</span>
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
