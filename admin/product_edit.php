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
			<h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
		</div>

		<div class="card-body">

			<?php
				if (isset($_POST['edit_btn']))
				{
					$prod_id = $_POST['edit_id'];
					//echo $admin_id; ça affiche l'id, si on clique 3la edit te3 4 -> affiche 4
					$query = "SELECT * FROM category INNER JOIN products ON category.id_category = products.id_category WHERE id_product = '$prod_id'";
    			$query_run = mysqli_query($dbconn, $query);


						$query2 = "SELECT * FROM category";
						$query_run2 = mysqli_query($dbconn, $query2);

    				foreach ($query_run as $row) {


    					?>
    			<form action="code.php" method="POST" enctype="multipart/form-data">

    				<input type="hidden" name="edittt_id" value="<?php echo $row['id_product']?>">

								<?php if (mysqli_num_rows($query_run2))
								{ ?>

		    						<div class="form-group">
				                <label>  Category </label>
												<select class="form-control" name="edit_cat" required>
													<option value="">Choose your Category</option>
													<?php
														foreach ($query_run2 as $row2){
													?>
													<option value="<?php echo $row2['id_category'];?>"><?php echo $row2['name_category'];?></option>

												<?php } ?>
												</select>

				            </div>
								<?php
							} else {
								echo "No data available";
							} ?>

		            <div class="form-group">
		                <label> Product Name </label>
		                <input type="text" name="edit_prodname" value="<?php echo $row['name_product']?>" class="form-control" placeholder="Enter the product name">
		            </div>
		            <div class="form-group">
		                <label>Product Description</label>
										<textarea name="edit_desc" class="form-control" placeholder="Enter Description" rows="8" cols="80"><?php echo $row['desc_product']?></textarea>
		            </div>
								<div class="form-group">
		                <label>Product Quantity</label>
										<input type="text" name="edit_qte" value="<?php echo $row['qte_product']?>" class="form-control" placeholder="Enter the product Quantity">
		            </div>
    						<div class="form-group">
		                <label> Product Price </label>
		                <input type="text" name="edit_price" value="<?php echo $row['price_product']?>" class="form-control" placeholder="Enter the Product Price">
		            </div>
								<div class="form-group">
		                <label> Product Image </label>
		                <input type="file" name="picture" id="picture" value="<?php echo $row['img_product']?>" class="form-control" placeholder="Enter the new image">
		            </div>
								<div class="form-group">
		                <label> Example Image </label>
		                <input type="file" name="picture1" id="picture1" value="<?php echo $row['img1_product']?>" class="form-control" placeholder="Enter the second image">
		            </div>

		            <button type="submit" name="updateprodbtn" class="btn btn-primary">Update</button>
		            <a href="products.php" class="btn btn-danger">CANCEL</a>
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
