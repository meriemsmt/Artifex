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
			<h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
		</div>

		<div class="card-body">

			<?php
				if (isset($_POST['edit_boutn']))
				{
					$id_category = $_POST['edit_id'];
					//echo $admin_id; ça affiche l'id, si on clique 3la edit te3 4 -> affiche 4
					$query = "SELECT * FROM category WHERE id_category = '$id_category'";
    				$query_run = mysqli_query($dbconn, $query);

    				foreach ($query_run as $row) {


    					?>
		    			<form action="code.php" method="POST">

		    				<input type="hidden" name="edit_id" value="<?php echo $row['id_category']?>">

								<div class="form-group">
					                <label>Name</label>
					                <input type="text" name="edit_name" value="<?php echo $row['name_category']?>" class="form-control" placeholder="Enter Name">
					      </div>

				            <button type="submit" name="updatedbtn" class="btn btn-primary">Update</button>
				            <a href="category.php" class="btn btn-danger">CANCEL</a>
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
