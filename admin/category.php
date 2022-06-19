<?php
session_start();

include('includes/header.php');
include('includes/navbar.php');
include('../config/dbconn.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name_category" class="form-control" placeholder="Enter Name">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addcat" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Categories
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Category
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

      <?php

          $query = "SELECT * FROM category";
          $query_run = mysqli_query($dbconn, $query);
      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (mysqli_num_rows($query_run)>0)
            {
                while ($row = mysqli_fetch_assoc($query_run)) {
          ?>

                    <tr>
                      <td> <?php echo $row['id_category']; ?> </td>
                      <td> <?php echo $row['name_category']; ?></td>
                      <td>
                          <form action="category_edit.php" method="post">
                              <input type="hidden" name="edit_id" value="<?php echo $row['id_category']; ?>">
                              <button  type="submit" name="edit_boutn" class="btn btn-success"> EDIT</button>
                          </form>
                      </td>
                      <td>
                          <form action="code.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id_category']; ?>">
                            <button type="submit" name="deleted_btn" class="btn btn-danger"> DELETE</button>
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

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
