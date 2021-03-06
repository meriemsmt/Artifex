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
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label> Last Name </label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control" placeholder="Enter Gender">
                  <option value="female">female</option>
                  <option value="male">male</option>
                </select>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registeringbtn" class="btn btn-primary">Save</button>
        </div>
      </form>




    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Profile
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add User Profile
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

          $query = "SELECT * FROM users";
          $query_run = mysqli_query($dbconn, $query);
      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Username</th>
            <th>Password</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (mysqli_num_rows($query_run)>0)
            {
                while ($row = mysqli_fetch_assoc($query_run)) {
          ?>

                    <tr>
                      <td> <?php echo $row['user_id']; ?> </td>
                      <td> <?php echo $row['firstname']; ?></td>
                      <td> <?php echo $row['lastname']; ?></td>
                      <td> <?php echo $row['email']; ?> </td>
                      <td> <?php echo $row['gender']; ?> </td>
                      <td> <?php echo $row['address']; ?> </td>
                      <td> <?php echo $row['username']; ?></td>
                      <td> <?php echo $row['password']; ?> </td>
                      <td>
                          <form action="user_edit.php" method="post">
                              <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
                              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                          </form>
                      </td>
                      <td>
                          <form action="code.php" method="post">
                            <input type="hidden" name="deletee_id" value="<?php echo $row['user_id']; ?>">
                            <button type="submit" name="deleting_btn" class="btn btn-danger"> DELETE</button>
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
