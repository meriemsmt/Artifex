<?php include 'includes/header.php';
include('config/dbconn.php');

      //  if(isset($_SESSION['admin']))
        //{
        //    header("Location: admin/index.php");
        //}
        //if(isset($_SESSION['users']))
        //{
          //  header("Location: user_index.php");
        //}
include 'includes/user_navbar.php';
?>


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Services</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Services  -->
    <div class="services-box-main">
        <div class="container">
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>OUR MISSION</h3>
                        <p>“Share Your Art” is our slogan, so our misson is to help you make the hardest task the easiest one ! This platform is for you</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>OUR VISION</h3>
                        <p>“Live the Life of Your Dreams, according to your vision and purpose instead of others expectations. OUR Vision is YOUR Vision ” </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>OUR PHILOSOPHY</h3>
                        <p>“Make improvements, not excuses. Seek respect, not attention.” ― Roy T. Bennett, The Light in the Heart. We are here to make your dreams reality! </p>
                    </div>
                </div>
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
                        <h3>OUR STORIES</h3>
                        <p>Our stories? You create it ! we are waiting for you ! </p>
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
                            <p>Third year Software Engineering student in the university of Mohamed El Bachir El Ibrahimi University creating her first E-Commerce Website ! </p>
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
                            <p>Third year Software Engineering student in the university of Mohamed El Bachir El Ibrahimi University creating her first E-Commerce Website ! </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>

            </div>

        </div>
    </div>
    <!-- End Services -->

    <?php include 'includes/footer.php'; ?>
