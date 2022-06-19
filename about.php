<?php include 'includes/header.php';
include('config/dbconn.php');
//if (!$_SESSION['admin'] OR !$_SESSION['users']) {
 //   header('location: index.php');
//}

      //  if(isset($_SESSION['admin']))
        //{
        //    header("Location: admin/index.php");
        //}
        //if(isset($_SESSION['users']))
        //{
          //  header("Location: user_index.php");
        //}
include 'includes/navbar.php';

?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>ABOUT US</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">ABOUT US</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="noo-sh-title" style="text-align: center">We are <span>Artifex</span></h2> <br> <br>
                    <p>
                        "We are a team of young and energetic people for whome <strong>art </strong>and <strong>design </strong>have been always a true <strong>passion. </strong>We want to spread it across the universe, inspiring others. <br>
                        Our biggest value are the artists collaborating with us – they are the life-blood of our website. At the moment Artifex gathers over 130 artists from all over the world which makes us really proud. <br>
                        Artifex has become a perfect platform for promoting those unusually talented people and their original and outstanding works. <br>
                        Join our community of art lovers and start spreading great graphics, drawings, sculpture around the world!"

                        <p>Artifex is a website specialized in creating exceptional art in different categories and a platform gathering talented artists from all over the world, promoting them and their original and outstanding work.
                            </p>
                </div>
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="images/about-img.jpg" alt="" />
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Trusted</h3>
                        <p>“To be trusted is a greater compliment than being loved.” ― George MacDonald. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Professional</h3>
                        <p>“Professionalism: It’s NOT the job you DO, It’s HOW you DO the job.” — Anonymous </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Expert</h3>
                        <p>“An expert is one who knows more and more about less and less.” – Nicholas B. </p>
                    </div>
                </div>
            </div>
            <div class="row my-4" id="team">
                <div class="col-12">
                    <h2 class="noo-sh-title">Meet Our Team</h2>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-1.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Ines Nouiouat</h3> <span class="post">Software Engineer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/ines1313" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/wlgwwbi1999" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCFngXcVw12s5f_v7roJvZ7g" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Third year Software Engineering student in the university of Mohamed El Bachir El Ibrahimi University creating her first E-Commerce Website !</p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-2.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Meriem Smati</h3> <span class="post">Software Engineer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/meriem.smt" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/Smati_Meriem" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCnBOt06-M4ETN2f_tXbkdRw?view_as=subscriber" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Third year Software Engineering student in the university of Mohamed El Bachir El Ibrahimi University creating her first E-Commerce Website !</p>
                        </div>
                        <hr class="my-0"> </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End About Page -->

<?php include 'includes/footer.php'; ?>
