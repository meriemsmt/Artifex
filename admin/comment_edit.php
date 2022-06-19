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
			<h6 class="m-0 font-weight-bold text-primary">Edit Comment</h6>
		</div>

		<div class="card-body">

			<?php
				if (isset($_POST['edit_boutton']))
				{
					$com_id = $_POST['edit_id'];
					//echo $admin_id; ça affiche l'id, si on clique 3la edit te3 4 -> affiche 4
					$query = "SELECT * FROM comments WHERE id_com = '$com_id'";
    				$query_run = mysqli_query($dbconn, $query);

    				foreach ($query_run as $row) {


    					?>
    			<form action="code.php" method="POST">

    				<input type="hidden" name="edition_id" value="<?php echo $row['id_com']?>">

    				<div class="form-group">
		                <label> Username </label>
		                <input type="text" name="edition_username" value="<?php echo $row['username']?>" class="form-control" placeholder="Enter username">
		            </div>
		            <div class="form-group">
		                <label> Comment </label>
                    <textarea name="edit_com" value="<?php echo $row['comment']?>" class="form-control" placeholder="Enter Comment"></textarea>
		            </div>
		            <div class="form-group">
		                <label>Date</label>
		                <input type="date" name="edit_date" value="<?php echo $row['cur_date']?>" class="form-control" placeholder="Enter Date">
		            </div>

		            <button type="submit" name="updationbtn" class="btn btn-primary">Update</button>
		            <a href="forum.php" class="btn btn-danger">CANCEL</a>
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
