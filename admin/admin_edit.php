<?php
session_start();

include('includes/header.php');
include('includes/navbar.php');
include('../config/dbconn.php');
?>


<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
		</div>

		<div class="card-body">

			<?php
				if (isset($_POST['edit_btn']))
				{
					$admin_id = $_POST['edit_id'];
					//echo $admin_id; ça affiche l'id, si on clique 3la edit te3 4 -> affiche 4
					$query = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
    				$query_run = mysqli_query($dbconn, $query);

    				foreach ($query_run as $row) {


    					?>
    			<form action="code.php" method="POST">

    				<input type="hidden" name="edit_id" value="<?php echo $row['admin_id']?>">

					<div class="form-group">
		                <label> Username </label>
		                <input type="text" name="edit_username" value="<?php echo $row['username']?>" class="form-control" placeholder="Enter Username">
		            </div>
		            <div class="form-group">
		                <label>Email</label>
		                <input type="email" name="edit_email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email">
		            </div>
		            <div class="form-group">
		                <label>Password</label>
		                <input type="password" name="edit_password" value="<?php echo $row['password']?>" class="form-control" placeholder="Enter Password">
		            </div>

		            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
		            <a href="register.php" class="btn btn-danger">CANCEL</a>
		        </form>



    					<?php
    				}
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
