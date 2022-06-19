<?php
    include 'includes/header.php';
    include('config/dbconn.php');
    include 'includes/user_navbar.php';

?>





<?php

      if (isset($_POST['submitcont'])) {
          $user_id=$_POST['user'];
          $fullname=$_POST['fullname'];
          $email=$_POST['email'];
          $subject=$_POST['subject'];
          $message=$_POST['message'];

          $query = "INSERT INTO contact(user_id,fullname, email, subject, message) VALUES('$user_id','$fullname','$email','$subject','$message')";
          $query_run = mysqli_query($dbconn,$query);

          if ($query_run)
          {
            $session['success'] = "Message Sent!";
          }else{
            $session['status'] = "User profile not added, an error occured, please retry.";
          }
      }

 ?>






    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
                        <p>Artifex is a website specialized in creating exceptional art in different categories and a platform gathering  <strong>talented artists</strong> from all over the world, promoting them and their original and outstanding work. Want to know more? Contact us here : </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+213 666602839</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>GET IN TOUCH</h2>
                        <?php
                        $user=$_SESSION['users'];

                        $user = $_SESSION['users'];
                        $qry = "SELECT * FROM users WHERE username = '$user' ";
                        $qry_run = mysqli_query($dbconn,$qry);

                        while ($rowsy=mysqli_fetch_assoc($qry_run)) {


                        ?>
                        <p>Hi <?php echo $user; ?> ! If you are here, You probably want to share your opinion or your outstanding Art ! You are in the right place, Artifex is here for you to help you. Contact us down below and we will respond to your request as soon as possible. Thank you !</p>

                        <form method="POST" action="contact-us.php">
                          <input type="hidden" name="user" value="<?php echo $rowsy['user_id'];?>">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fullname" placeholder="Your Fullname" required data-error="Please enter your name" value="<?php echo $rowsy['firstname'].' '.$rowsy['lastname']; ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Email" class="form-control" name="email" required data-error="Please enter your email" value="<?php echo $rowsy['email']; ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                          <?php } ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject" required data-error="Please enter your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea name="message" class="form-control" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <!--<div class="col-md-12 text-center">
                                            <label>Join a picture of your product if you want to put it on Artifex!</label>
                                            <input type="file"  name="picture" placeholder="Image" not required>
                                    </div>-->
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" name="submitcont" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->




    <?php include 'includes/footer.php'; ?>
