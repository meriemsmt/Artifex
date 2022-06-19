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
			<h6 class="m-0 font-weight-bold text-primary">Edit User Profile</h6>
		</div>

		<div class="card-body">

			<?php
				if (isset($_POST['edit_btn']))
				{
					$user_id = $_POST['edit_id'];
					//echo $admin_id; ça affiche l'id, si on clique 3la edit te3 4 -> affiche 4
					$query = "SELECT * FROM users WHERE user_id = '$user_id'";
    				$query_run = mysqli_query($dbconn, $query);

    				foreach ($query_run as $row) {


    					?>
    			<form action="code.php" method="POST">

    				<input type="hidden" name="editt_id" value="<?php echo $row['user_id']?>">

    				<div class="form-group">
		                <label> First Name </label>
		                <input type="text" name="edit_firstname" value="<?php echo $row['firstname']?>" class="form-control" placeholder="Enter Firstname">
		            </div>
		            <div class="form-group">
		                <label> Last Name </label>
		                <input type="text" name="edit_lastname" value="<?php echo $row['lastname']?>" class="form-control" placeholder="Enter Lastname">
		            </div>
		            <div class="form-group">
		                <label>Email</label>
		                <input type="email" name="editt_email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email">
		            </div>
								<div class="form-group">
		                <label>gender</label>
										<select name="editt_gender" value="<?php echo $row['gender']?>" class="form-control" placeholder="Enter Gneder">
											<option value="female">female</option>
											<option value="male">male</option>

										</select>

		            </div>
    				<div class="form-group">
		                <label> address </label>
		                <input type="text" name="edit_address" value="<?php echo $row['address']?>" class="form-control" placeholder="Enter Address">
		            </div>
					<div class="form-group">
		                <label> Username </label>
		                <input type="text" name="editt_username" value="<?php echo $row['username']?>" class="form-control" placeholder="Enter Username">
		            </div>

		            <div class="form-group">
		                <label>Password</label>
		                <input type="password" name="editt_password" value="<?php echo $row['password']?>" class="form-control" placeholder="Enter Password">
		            </div>

		            <button type="submit" name="updatingbtn" class="btn btn-primary">Update</button>
		            <a href="userregister.php" class="btn btn-danger">CANCEL</a>
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
