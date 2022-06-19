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
        <h5 class="modal-title" id="exampleModalLabel">Add a Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Comment</label>
                <textarea name="comment" class="form-control" placeholder="Enter Email"></textarea>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addcom" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Comments Section
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add a Comment
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

          $query = "SELECT * FROM comments";
          $query_run = mysqli_query($dbconn, $query);
      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Comment </th>
            <th>Date</th>
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
                      <td> <?php echo $row['id_com']; ?> </td>
                      <td> <?php echo $row['username']; ?></td>
                      <td> <?php echo $row['comment']; ?></td>
                      <td> <?php echo $row['cur_date']; ?> </td>
                      <td>
                          <form action="comment_edit.php" method="post">
                              <input type="hidden" name="edit_id" value="<?php echo $row['id_com']; ?>">
                              <button  type="submit" name="edit_boutton" class="btn btn-success"> EDIT</button>
                          </form>
                      </td>
                      <td>
                          <form action="code.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id_com']; ?>">
                            <button type="submit" name="deletion_btn" class="btn btn-danger"> DELETE</button>
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
