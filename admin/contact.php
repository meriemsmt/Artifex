<?php
session_start();

include('includes/header.php');
include('includes/navbar.php');
include('../config/dbconn.php');
?>



<?php
//edit
if (isset($_POST['updatedbtn'])){
  $id = $_POST['edit_id'];
  $user = $_POST['edit_user'];
  $fullname = $_POST['edit_fullname'];
  $email = $_POST['edit_email'];
  $subject = $_POST['edit_subject'];
  $message = $_POST['edit_message'];

  $query1= "UPDATE contact SET user_id='$user', fullname ='$fullname',email='$email', subject='$subject', message='$message' WHERE contact_id='$id'";

  $query_run1 = mysqli_query($dbconn,$query1);

  if ($query_run1)
  {
    $_SESSION['success']='Your data is updated!';
  }else{
    $_SESSION['status']='Your data is not updated!';
  }

}

//delete
if (isset($_POST['deleting_btn'])){
  $id = $_POST['delete_id'];

  $query1= "DELETE FROM contact WHERE contact_id='$id'";

  $query1_run = mysqli_query($dbconn,$query1);

  if ($query1_run)
  {
    $_SESSION['success']='Your data is deleted!';

  }else{
    $_SESSION['status']='Your data is not deleted!';
  }

}


?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
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

          $query = "SELECT * FROM contact";
          $query_run = mysqli_query($dbconn, $query);
      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>User</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
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
                      <td> <?php echo $row['contact_id']; ?> </td>
                      <td> <?php echo $row['user_id']; ?></td>
                      <td> <?php echo $row['fullname']; ?></td>
                      <td> <?php echo $row['email']; ?> </td>
                      <td> <?php echo $row['subject']; ?> </td>
                      <td> <?php echo $row['message']; ?> </td>
                      <td>
                          <form action="contact_edit.php" method="post">
                              <input type="hidden" name="edit_id" value="<?php echo $row['contact_id']; ?>">
                              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                          </form>
                      </td>
                      <td>
                          <form action="contact.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['contact_id']; ?>">
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
