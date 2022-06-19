<?php
    session_start();

    include('includes/header.php');
    include('includes/navbar.php');
    include('../config/dbconn.php');


    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }

    $num_per_page = 05;
    $start_from = ($page-1)*05;

    //echo $start_from;

?>

<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

?>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM category INNER JOIN products ON category.id_category = products.id_category WHERE CONCAT(`id_product`, `name_category`, `name_product`, `desc_product`, `qte_product`, `price_product`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM category INNER JOIN products ON category.id_category = products.id_category LIMIT $start_from,$num_per_page";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $dbconn = mysqli_connect("localhost", "root", "", "artifex");
    $filter_Result = mysqli_query($dbconn, $query);
    return $filter_Result;
}



?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




      <form action="code.php" method="POST" name="form" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label > Category : </label>
                <select class="form-control input-sm" name="select_category">
                      <!--<option value="0">Drawings</option> -->
                      <?php
                        $query = "SELECT * FROM category";
                        $query_run = mysqli_query($dbconn, $query);

                        foreach($query_run as $crow){
                          $selected = ($crow['id_category'] == $catid) ? 'selected' : '';
                          echo "
                            <option value='".$crow['id_category']."' ".$selected.">".$crow['name_category']."</option>
                          ";
                        }

                      ?>
                    </select>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name_prod" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label >Price</label>
                <input type="text" name="price" placeholder="0.00 DZ" class="form-control" required>
            </div>
            <div class="form-group">
                <label >Quantity</label>
                <input type="text" name="qte" placeholder="Enter Quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Upload Image</label><br>
                <input type="file" name="picture" placeholder="Enter the picture here" required>
            </div>
            <div class="form-group">
                <label>Example Image</label><br>
                <input type="file" name="picture1" placeholder="Insert the Second picture here" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter Description" style="width:100%; height:100px" required>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addprod" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Products
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add a Product
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
        if (isset($_SESSION['success']) && $_SESSION['success']!='') {
            echo '<h2>'.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['status']) && $_SESSION['status']!='') {
            echo '<h2>'.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }
      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Example Image</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (mysqli_num_rows($search_result)>0)
            {
                while ($row = mysqli_fetch_assoc($search_result)) {
          ?>

                    <tr>
                      <td> <?php echo $row['id_product']; ?> </td>
                      <td> <?php echo $row['name_category']; ?></td>
                      <td> <?php echo $row['name_product']; ?></td>
                      <td> <?php echo $row['desc_product']; ?></td>
                      <td> <?php echo $row['qte_product']; ?> </td>
                      <td> <?php echo $row['price_product']; ?></td>
                      <td><?php echo '<img src="products_img/'.$row['img_product'].'" width="100px;" height="100px;" alt="image">'?> </td>
                      <td><?php echo '<img src="products_img/'.$row['img1_product'].'" width="100px;" height="100px;" alt="image1">'?> </td>

                      <td>

                        <?php

                           $queries = "SELECT * FROM category";
                           $queries_run = mysqli_query($dbconn,$queries);

                               foreach($queries_run as $rowss){
                        ?>

                          <form action="product_edit.php" method="post">
                              <input type="hidden" name="edit_id" value="<?php echo $row['id_product']; ?>">
                              <input type="hidden" name="edit_category" value="<?php echo $rowss['name_category'];} ?>">
                              <button  type="submit" name="edit_btn" class="btn btn-success" > EDIT</button>
                          </form>
                      </td>
                      <td>
                          <form action="code.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id_product']; ?>">
                            <button type="submit" name="delete_prd" class="btn btn-danger"> DELETE</button>
                          </form>
                      </td>
                    </tr>
          <?php
                }
            }
            else{
              echo "No Record Found";
            }
          ?>

        </tbody>
      </table>


<?php

      $per_query = "SELECT * FROM products ORDER BY id_product";
      $per_result = mysqli_query($dbconn,$per_query);
      $total_record = mysqli_num_rows($per_result);
      $total_page = ceil($total_record/$num_per_page); //ceil arrondis le resultat

      if ($page>1) {
          echo "<a href='products.php?page=".($page=1)."' class='btn btn-danger'> << </a>";
          echo "<a href='products.php?page=".($page-1)."' class='btn btn-danger'> < </a>";
      }


      for ($i=1; $i <=$total_page ; $i++) {
        echo "<a href='products.php?page=".$i."' class='btn btn-primary'>$i</a>";
      }

      if ($i>$page) {
          echo "<a href='products.php?page=".($page+1)."' class='btn btn-danger'> > </a>";
          echo "<a href='products.php?page=".($total_page)."' class='btn btn-danger'> >> </a>";
      }
?>


    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
