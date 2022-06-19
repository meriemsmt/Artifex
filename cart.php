<?php

include('includes/header.php');
include('includes/user_navbar.php');
include('config/dbconn.php');
?>

<?php

    $q = "SELECT * FROM products INNER JOIN cart ON products.id_product = cart.id_product";
    $qrun = mysqli_query($dbconn,$q);

?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
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
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>Images</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Update</th>
                                        <th>SubTotal</th>

                                        <th>Remove</th>
                                    </tr>
                                </thead>

                                <?php
                                    while ($row = mysqli_fetch_assoc($qrun)) {
                                 ?>
                                <tbody>
                                    <tr style="text-align: center;">
                                        <td class="thumbnail-img">
                                            <a href="#">

                                              <?php

                                                  $image = $row['img_product'];
                                                   echo '<img class="img-fluid" src="admin/products_img/'.$image.'" alt="image">';
                                              ?>
    								                        </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
    									                         <?php
                                                  echo $row['name_product'];
                                              ?>
    								                        </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>
                                                <?php
                                                  echo $row['price_product'].' DA';
                                                ?>
                                            </p>

                                        </td>
                                        <td class="price-pr">

                                          <form action="admin/code.php" method="post" >
                                            <input type="hidden" name="idcart" value="<?php echo $row['id_cart'];?>">
                                            <input type="number" name="qte" size="4" value="<?php echo $row['quantity'];?>" min="0" step="1" class="c-input-text qty text" style="text-align: center;">

                                          </td>
                                          <td class="price-pr">
                                            <div class="update-box">
                                              <input value="Update" type="submit" name="editcart" style="border-radius: 50%; padding: 6px;">
                                          </form>
                                            </div>
                                        </td>

                                          <td class="price-pr">
                                              <p>
                                                  <?php
                                                    echo $row['price_product']*$row['quantity']. ' DA';
                                                  ?>
                                              </p>

                                          </td>

                                        <td class="remove-pr">
                                          <form action="admin/code.php" method="post">
                                              <input type="hidden" name="idcart" value="<?php echo $row['id_cart']; ?>">

                                              <button type="submit" name="deletecart" class="fas fa-times"></button>
                                          </form>
                                        </td>
                                    </tr>

                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row my-5">
                    <div class="col-lg-8 col-sm-12"></div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="order-box">
                            <h3>Order summary</h3>
                            <?php
                            $q1 = "SELECT * FROM products INNER JOIN cart ON products.id_product = cart.id_product";
                            $qrun1 = mysqli_query($dbconn,$q1);
                                while ($rowzi = mysqli_fetch_assoc($qrun1)) {
                             ?>
                            <div class="d-flex">
                                <h4><?php echo $rowzi['name_product']; ?></h4>

                                <div class="ml-auto font-weight-bold"> <?php echo $rowzi['quantity'].'x    '.$rowzi['price_product']; ?> </div>
                            </div>


                            <?php
                            $total=0;
                            $quantity = $rowzi['quantity'];
                            $price = $rowzi['price_product'];
                            $price_quantity= $price * $quantity;
                            $total+= $price_quantity;
                             ?>
                          <?php } ?>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>

                                <div class="ml-auto h5"> <?php echo $total; ?> </div>


                            </div>
                            <hr> </div>

                    </div>
                    <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
                </div>

            </div>
        </div>
        <!-- End Cart -->
    <?php include 'includes/footer.php'; ?>
