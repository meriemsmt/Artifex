<?php include 'includes/header.php';
include('config/dbconn.php');
include 'includes/user_navbar.php';
?>




<?php

      	if (isset($_POST['AddCart']))
        {
            $id=$_POST['id_product'];
            $username=$_POST['user'];
            $qte=$_POST['quantityy'];

            $query = "INSERT INTO cart(user_id,id_product,quantity) VALUES($username,'$id','$qte')";
      			$query_run = mysqli_query($dbconn,$query);

      			if ($query_run)
      			{
      				//echo "Saved !";
      				$session['success'] = "Product added to the cart";
      			}else{
      				//echo "An error occured, please retry.";
      				$session['status'] = "Product not added to the cart, an error occured, please retry.";
      			}

        }

?>






    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#" enctype="multipart/form-data">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">

                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">

                                      <?php
                                      $query = "SELECT * FROM category";
                                      $query_run = mysqli_query($dbconn,$query);

                                          foreach($query_run as $row){
                                              echo "
                                              <li><a href='shop.php?category=".$row['name_category']."&id=".$row['id_category']."'>".$row['name_category']."</a></li>

                                              ";


                                          }
                                       ?>
								</a>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="row product-categorie-box">

                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">

                                    <div class="row">

                                       <?php

                                       $cat = isset($_GET['category']) ? $_GET['category'] : NULL;
                                      //$cat = $_GET['category'];
                                       $id = isset($_GET['id']) ? $_GET['id'] : NULL;


  if ($id==NULL && $cat==NULL  ) {

    $requete = "SELECT * FROM products ";
    $reponse = mysqli_query($dbconn,$requete);


    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $requete = "SELECT * FROM products WHERE CONCAT(`name_product`, `desc_product`, `qte_product`, `price_product`) LIKE '%".$valueToSearch."%'";
        $reponse = filterTable($requete);

    }
  }
  else {
              if(isset($_POST['search']))
              {
                  $valueToSearch = $_POST['valueToSearch'];
                  // search in all table columns
                  // using concat mysql function
                  $requete = "SELECT * FROM products WHERE id_category =".$id. " AND CONCAT(`name_product`, `desc_product`, `qte_product`, `price_product`) LIKE '%".$valueToSearch."%'";
                  $reponse = filterTable($requete);

              }
               else {
                  $requete = "SELECT * FROM products WHERE id_category =".$id;
                  $reponse = mysqli_query($dbconn,$requete);
              }


}


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "artifex");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


                                       while($rows = mysqli_fetch_assoc($reponse))
                                       {

																				 ?>


                                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">

                                        <div class="products-single fix">

                                            <div class="box-img-hover">

                                                <div class="type-lb">

                                                    <p class="new">New</p>
                                                </div>


                                                <div class="img-fluid" alt="Image">
                                                  <!-- <>-->
                                                  <?php
                                                  $image = $rows['img_product'];
                                                   echo '<img src="admin/products_img/'.$image.'" alt="image">'




                                                    ?>





                                                  </div>


                                                <div class="mask-icon">

                                                    <ul>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                    </ul>



<li> <a class="cart" href="#" data-toggle="modal" data-target="#<?php echo $rows['id_product'];?>" class="row" >View Details</a></li>


                                                </div>
																								<!-- Modal -->
																								<!-- Modal: modalQuickView -->



                                                <div class="modal fade" id="<?php echo $rows['id_product'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
																								  aria-hidden="true">
																								  <div class="modal-dialog modal-lg" role="document">
																								    <div class="modal-content">
																								      <div class="modal-body">
																								        <div class="row">
																								          <div class="col-lg-5">
																								            <!--Carousel Wrapper-->
																								            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
																								              data-ride="carousel">
																								              <!--Slides-->
																								              <div class="carousel-inner" role="listbox">
																								                <div class="carousel-item active">
																								                  <img class="d-block w-100"
																																	<?php

																																		echo '<img src="admin/products_img/'.$rows['img_product'].'" alt="image"  width="60">;'


																																		?>
																								                    alt="First slide">
																								                </div>
																								                <div class="carousel-item">
																								                  <img class="d-block w-100"

                                                                  <?php
                                                                  echo '<img src="admin/products_img/'.$rows['img1_product'].'" alt="Second slide"  width="60">;'
                                                                  ?>
																								                </div>
																								              </div>
																								              <!--/.Slides-->
																								              <!--Controls-->
																								              <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
																								                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
																								                <span class="sr-only">Previous</span>
																								              </a>
																								              <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
																								                <span class="carousel-control-next-icon" aria-hidden="true"></span>
																								                <span class="sr-only">Next</span>
																								              </a>
																								              <!--/.Controls-->
																								              <ol class="carousel-indicators">
																								                <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                                                                  <?php  echo '<img src="admin/products_img/'.$rows['img_product'].'" alt="image"  width="60">' ?>
																								                </li>
																								                <li data-target="#carousel-thumb" data-slide-to="1">
                                                                  <?php  echo '<img src="admin/products_img/'.$rows['img1_product'].'" alt="image"  width="60">' ?>

																								                </li>
																								              </ol>
																								            </div>
																								            <!--/.Carousel Wrapper-->
																								          </div>
																								          <div class="col-lg-7">
																								            <h2 class="h2-responsive product-name">
																								              <strong><?php

																																echo $rows['name_product'];



																																?>
																															</strong>
																								            </h2>
																								            <h4 class="h4-responsive">
																								              <span class="green-text">
																								                <strong><?php

																																	echo $rows['price_product'];



																																	?> DA</strong>
																								              </span>
																								              <span class="grey-text">
																								                <small>
																								                  <s>$89</s>
																								                </small>
																								              </span>
																								            </h4>

																								            <!--Accordion wrapper-->
																								            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

																								              <!-- Accordion card -->
																								              <div class="card">

																								                <!-- Card header -->
																								                <div class="card-header" role="tab" id="headingOne1">
																								                  <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
																								                    aria-controls="collapseOne1">
																								                    <h5 class="mb-0">
																								                      Description <i class="fas fa-angle-down rotate-icon"></i>
																								                    </h5>
																								                  </a>
																								                </div>

																								                <!-- Card body -->
																								                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
																								                  data-parent="#accordionEx">
																								                  <div class="card-body">
                                                                    <?php echo $rows['desc_product']; ?>
																								                  </div>
																								                </div>

																								              </div>
																								              <!-- Accordion card -->

																								            </div>
																								            <!-- Accordion wrapper -->


																								            <!-- Add to Cart -->
																								            <div class="card-body">
																								              <div class="row">
																								                <div class="col-md-6">



																								                </div>

																								              </div>
																								              <div class="text-center">

                                                                <form action="" method="POST">
                                                                    <select class="md-form mdb-select colorful-select dropdown-primary" name="quantityy" required>
  																								                    <option value="" disabled selected>Choose your option</option>
                                                                      <?php $qte = $rows['qte_product'];

                                                                        for ($i=1; $i<=$qte ; $i++) {

                                                                      ?>
  																								                    <option value="<?php echo $i; ?>" name="quantityy"> <?php echo $i; ?></option>
                                                                    <?php } ?>
                                                                  </select> <br>
  																								                  <label>Select Quantity</label>
                                                                    <br>
                                                                    <?php
                                                                    $user = $_SESSION['users'];
                                                                    $qry = "SELECT * FROM users WHERE username = '$user' ";
                                                                    $qry_run = mysqli_query($dbconn,$qry);

                                                                    while ($rowsy=mysqli_fetch_assoc($qry_run)) {


                                                                    ?>

                                                                    <input type="hidden" name="id_product" value="<?php echo $rows['id_product']; ?>">
                                                                    <input type="hidden" name="user" value="<?php echo $rowsy['user_id'];?>">
                                                                    <?php } ?>
    																								                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    																								                <button type="submit" class="btn btn-primary" name="AddCart">Add to cart
    																								                  <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
    																								                </button>
                                                                  </form>

																								              </div>
																								            </div>
																								            <!-- /.Add to Cart -->
																								          </div>
																								        </div>
																								      </div>
																								    </div>
																								  </div>
																								</div>

                                            </div>
                                            <div class="why-text">
                                                <h4>
																									<?php

																										echo $rows['name_product'];



																										?></h4>
                                                <h5> <?php

																									echo $rows['price_product'];



																									?> DA</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                              <?php
                              $rqt = "SELECT * FROM products ";
                              $rps = mysqli_query($dbconn,$rqt);
                              while($rowz = mysqli_fetch_assoc($rps))
                              {
                              ?>
                                <div class="list-view-box">

                                    <div class="row">


                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>

                                                    <div class="img-fluid" alt="Image">

                                                    <?php  echo '<img src="admin/products_img/'.$rowz['img_product'].'" alt="image" >' ?>

                                                    </div>
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">

                                            <div class="why-text full-width">

                                                <h4><?php echo $rowz['name_product']; ?></h4>
                                                <h5> <?php echo $rowz['price_product'].' DA'; ?></h5>
                                                <p><?php echo $rowz['desc_product']; ?></p>
                                                <a class="btn hvr-hover">Add to Cart</a>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                              <?php } ?>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

    <!-- End Shop Page -->


    <script type="text/javascript">

    $(document).ready(function() {
    $('.mdb-select').materialSelect();
    });

    </script>


<?php include 'includes/footer.php'; ?>


</body>

</html>
