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
			<h6 class="m-0 font-weight-bold text-primary">Edit Message</h6>
		</div>

		<div class="card-body">

			<?php
				if (isset($_POST['edit_btn']))
				{
					$contact_id = $_POST['edit_id'];
					//echo $admin_id; ça affiche l'id, si on clique 3la edit te3 4 -> affiche 4
					$query = "SELECT * FROM contact WHERE contact_id = '$contact_id'";
    				$query_run = mysqli_query($dbconn, $query);

    				foreach ($query_run as $row) {


    					?>
		    			<form action="contact.php" method="POST">

		    				<input type="hidden" name="edit_id" value="<?php echo $row['contact_id']?>">

								<div class="form-group">
					                <label>user</label>
					                <input type="text" name="edit_user" value="<?php echo $row['user_id']?>" class="form-control" placeholder="Enter the User Id">
					      </div>
                <div class="form-group">
					                <label>Fullname</label>
					                <input type="text" name="edit_fullname" value="<?php echo $row['fullname']?>" class="form-control" placeholder="Enter the Fullname">
					      </div>
                <div class="form-group">
					                <label>Email</label>
					                <input type="text" name="edit_email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter the email">
					      </div>
                <div class="form-group">
					                <label>Subject</label>
					                <input type="text" name="edit_subject" value="<?php echo $row['subject']?>" class="form-control" placeholder="Enter the Subject">
					      </div>
                <div class="form-group">
					                <label>Message</label>
					                <textarea name="edit_message" class="form-control" placeholder="Enter the message"><?php echo $row['message']?></textarea>
					      </div>


				            <button type="submit" name="updatedbtn" class="btn btn-primary">Update</button>
				            <a href="contact.php" class="btn btn-danger">CANCEL</a>
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
