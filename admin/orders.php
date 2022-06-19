<?php
session_start();

include('includes/header.php');
include('includes/navbar.php');
include('../config/dbconn.php');
?>

<?php

//edit
if (isset($_POST['updatingorderbtn'])){
  $id = $_POST['editt_id'];
	$cart = $_POST['edit_cart'];
	$useredit=$_POST['edit_user'];
	$firstname=$_POST['edit_firstname'];
	$lastname=$_POST['edit_lastname'];
	$email=$_POST['edit_email'];
	$adr1=$_POST['edit_address1'];
	$adr2=$_POST['edit_address2'];
	$wilaya=$_POST['edit_wilaya'];
	$zip=$_POST['edit_zip'];
	$date_order=$_POST['edit_date'];
	$query1= "UPDATE orders SET id_cart='$cart', user_id='$useredit', firstname='$firstname', lastname='$lastname', email='$email' ,address1='$adr1', address2='$adr2', wilaya='$wilaya', postcode='$zip', date_order='$date_order' WHERE order_id = $id";

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
  $id = $_POST['deletee_id'];

  $query= "DELETE FROM orders WHERE order_id='$id'";

  $query_run = mysqli_query($dbconn,$query);

  if ($query_run)
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
    <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
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
            unset($s_SESSION['status']);
        }
      ?>

      <?php

          $query = "SELECT * FROM orders";
          $query_run = mysqli_query($dbconn, $query);
      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> User </th>
            <th>Firstname </th>
            <th>Lastname</th>
            <th>email</th>
            <th>Address1</th>
            <th>Address2</th>
            <th>Wilaya</th>
            <th>Post Code</th>
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
                      <td> <?php echo $row['order_id']; ?> </td>
                      <td> <?php echo $row['user_id']; ?></td>
                      <td> <?php echo $row['firstname']; ?></td>
                      <td> <?php echo $row['lastname']; ?></td>
                      <td> <?php echo $row['email']; ?></td>
                      <td> <?php echo $row['address1']; ?></td>
                      <td> <?php echo $row['address2']; ?> </td>
                      <td> <?php echo $row['wilaya']; ?></td>
                      <td> <?php echo $row['postcode']; ?></td>
                      <td> <?php echo $row['date_order']; ?></td>

                      <td>
                          <form action="order_edit.php" method="POST">
                              <input type="hidden" name="edit_id" value="<?php echo $row['order_id']; ?>">
                              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                          </form>
                      </td>
                      <td>
                          <form action="orders.php" method="post">
                            <input type="hidden" name="deletee_id" value="<?php echo $row['order_id']; ?>">
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
