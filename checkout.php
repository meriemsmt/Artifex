<?php
    include 'includes/header.php';
    include('config/dbconn.php');
    include 'includes/user_navbar.php';

?>



<?php

if (isset($_POST['PlaceOrder']))
{

  $user = $_POST['user_id'];
  $cart = $_POST['id_cart'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $wilaya = $_POST['wilaya'];
  $zip = $_POST['zip'];
  $date_order = date("Y-m-d");

    $q10 = "INSERT INTO orders(id_cart, user_id, firstname, lastname, email, address1, address2, wilaya, postcode,date_order) VALUES('$cart','$user','$firstname', '$lastname','$email','$address1','$address2','$wilaya','$zip','$date_order')";
    $query_run10 = mysqli_query($dbconn,$q10);

    if ($query_run10)
    {
      $session['success'] = "Your Order is accepted! It will arrive in two weeks! Thank you for your Confidence.";

      $selected_qte = $_POST['selected_qte'];
      $total_qte = $_POST['total_qte'];
      $left_qte = $total_qte - $selected_qte;

      $id = $_POST['id_product'];
      $q11 = "UPDATE products SET qte_product='$left_qte' WHERE id_product='$id'";
      $queryrun11 = mysqli_query($dbconn,$q11);

    }else{
      echo "An error occured, please retry.";
      $session['status'] = "Order not accepted, an error occured, please retry.";
    }



}


 ?>





    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="user_shop.php">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" novalidate action="checkout.php" method="POST">
                            <div class="row">


                              <?php
                                  $user = $_SESSION['users'];
                                  $q1="SELECT * FROM users WHERE username = '$user'";
                                  $qr1=mysqli_query($dbconn,$q1);

                                  while ($row1 = mysqli_fetch_assoc($qr1)) {

                              ?>
                              <input type="hidden" name="user_id" value="<?php echo $row1['user_id']; ?>" > <!-- checked meriem.smt=2-->

                            <?php
                          //  SELECT * FROM products INNER JOIN cart ON products.id_product = cart.id_product
                                  $q2 = "SELECT * FROM cart WHERE user_id =".$row1['user_id'];
                                  $qr2=mysqli_query($dbconn,$q2);

                                  while ($row2 = mysqli_fetch_assoc($qr2)) {

                            ?>
                            <input type="hidden" name="id_cart" value="<?php echo $row2['id_cart']; ?>" > <!-- checked-->

                            <?php
                                $q3 = "UPDATE cart SET sale=1 WHERE user_id =".$row1['user_id'];
                                $qr3=mysqli_query($dbconn,$q3);
                            ?>

                          <?php }} ?>

                          <?php

                              $q9 = "SELECT * FROM products INNER JOIN cart ON products.id_product = cart.id_product";
                              $qrun9 = mysqli_query($dbconn,$q9);

                              while ($rwiz = mysqli_fetch_assoc($qrun9)) {

                          ?>
                          <input type="hidden" name="selected_qte" value="<?php echo $rwiz['quantity']; ?>" > <!-- checked-->
                          <input type="hidden" name="total_qte" value="<?php echo $rwiz['qte_product']; ?>" > <!-- checked-->
                          <input type="hidden" name="id_product" value="<?php echo $rwiz['id_product']; ?>" > <!-- checked-->




                          <?php } ?>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name *</label>
                                    <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Enter your Real Firstname" value="" required>
                                    <div class="invalid-feedback"> Valid first name is required. </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name *</label>
                                    <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Enter your Real Lastname" value="" required>
                                    <div class="invalid-feedback"> Valid last name is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" id="address" name="address1" placeholder="Enter your shipping Email" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2 *</label>
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter your second shipping Email"> </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Wilaya *</label>
                                    <select class="wide w-100" id="country" name="wilaya">
      																<option value="Adrar">01. Adrar</option>
      																<option value="Chlef">02. Chlef</option>
      																<option value="Laghouat">03. Laghouat</option>
      																<option value="Oum El Bouaghi">04. Oum El Bouaghi</option>
      																<option value="Batna">05. Batna</option>
      																<option value="Bejaia">06. Bejaia</option>
      																<option value="Biskra">07. Biskra</option>
      																<option value="Bechar">08. Bechar</option>
      																<option value="Blida">09. Blida</option>
      																<option value="Bouira">10. Bouira</option>
      																<option value="Tamanrasset">11. Tamanrasset</option>
      																<option value="Tebessa">12. Tebessa</option>
      																<option value="Tlemcen">13. Tlemcen</option>
      																<option value="Tiaret">14. Tiaret</option>
      																<option value="Tizi Ouzou">15. Tizi Ouzou</option>
      																<option value="Alger">16. Alger</option>
      																<option value="Djelfa">17. Djelfa</option>
      																<option value="Jijel">18. Jijel</option>
      																<option value="Setif">19. Setif</option>
      																<option value="Saida">20. Saida</option>
      																<option value="Skikda">21. Skikda</option>
      																<option value="Sidi Bel Abbes">22. Sidi Bel Abbes</option>
      																<option value="Annaba">23. Annaba</option>
      																<option value="Guelma">24. Guelma</option>
      																<option value="Constantine">25. Constantine</option>
      																<option value="Media">26. Media</option>
      																<option value="Mostghanem">27. Mostghanem</option>
      																<option value="M'Sila">28. M'Sila</option>
      																<option value="Mascara">29. Mascara</option>
      																<option value="Ouargla">30. Ouargla</option>
      																<option value="Oran">31. Oran</option>
      																<option value="El Bayadh">32. El Bayadh</option>
      																<option value="Ilizi">33. Ilizi</option>
      																<option value="Bordj Bou Arreridj">34. Bordj Bou Arreridj</option>
      																<option value="Boumerdes">35. Boumerdes</option>
      																<option value="El Tarf">36. El Tarf</option>
      																<option value="Tindouf">37. Tindouf</option>
      																<option value="Tissemsilt">38. Tissemsilt</option>
      																<option value="El Oued">39. El Oued</option>
      																<option value="Khenchla">40. Khenchla</option>
      																<option value="Souk Ahras">41. Souk Ahras</option>
      																<option value="Tipaza">42.Tipaza</option>
      																<option value="Mila">43. Mila</option>
      																<option value="Ain Defla">44. Ain Defla</option>
      																<option value="Naama">45. Naama</option>
      																<option value="Ain Temouchent">46. Ain Temouchent</option>
      																<option value="Ghardaia">47. Ghardaia</option>
      																<option value="Relizane">48. Relizane</option>
      																<option value="El M'Ghair">49. El M'Ghair</option>
      																<option value="El Meniaa">50. El Meniaa</option>
      																<option value="Oueld Djellal">51. Oueld Djellal</option>
      																<option value="Bordj Baji Mokhtar">52. Bordj Baji Mokhtar</option>
      																<option value="Beni Abbes">53. Beni Abbes</option>
      																<option value="Timimoun">54. Timimoun</option>
      																<option value="Touggourt">55. Touggourt</option>
      																<option value="Djanet">56. Djanet</option>
      																<option value="In Salah">57. In Salah</option>
      																<option value="In Guezzam">58. In Guezzam</option>
                    								</select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip Code*</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Your Zip Code" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <div class="col-12 d-flex shopping-box">
                            <button type="submit" name="PlaceOrder" class="ml-auto btn hvr-hover">Place Order</a> </div>
                          </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <?php

                                    $q = "SELECT * FROM products INNER JOIN cart ON products.id_product = cart.id_product";
                                    $qrun = mysqli_query($dbconn,$q);


                                ?>

                                <?php while ($rw = mysqli_fetch_assoc($qrun)) { ?>
                                <div class="rounded p-2 bg-light">

                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="user_shop.php"> <?php echo $rw['name_product']; ?></a>
                                            <div class="small text-muted">Price: <?php echo $rw['price_product']. ' DA'; ?> <span class="mx-2">|</span> Qty: <?php echo $rw['quantity']; ?> <span class="mx-2">|</span> Subtotal: <?php echo $rw['price_product']*$rw['quantity'];?></div>
                                        </div>
                                    </div>

                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5">
                                      <?php

                                        $r = "SELECT * FROM products INNER JOIN cart ON products.id_product = cart.id_product";
                                        $rr= mysqli_query($dbconn,$r);
                                        $total = 0;

                                        while ($rrr = mysqli_fetch_assoc($rr)) {
                                            $total+=$rrr['quantity']*$rrr['price_product'];
                                        }
                                        echo $total. ' DA';
                                      ?>
                                    </div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box">
                        <a href="checkout.html" class="ml-auto btn hvr-hover">Place Order</a> </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    <?php include 'includes/footer.php'; ?>
