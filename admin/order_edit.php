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
					$id = $_POST['edit_id'];
					//echo $id; ça affiche l'id, si on clique 3la edit te3 4 -> affiche 4
					$query = "SELECT * FROM orders WHERE order_id = '$id'";
    				$query_run = mysqli_query($dbconn, $query);

    				foreach ($query_run as $row) {


    					?>
    			<form action="orders.php" method="POST">

    				<input type="hidden" name="editt_id" value="<?php echo $row['order_id']?>">

    						<div class="form-group">
		                <label> Cart </label>
		                <input type="text" name="edit_cart" value="<?php echo $row['id_cart']?>" class="form-control" placeholder="Enter Cart">
		            </div>
								<div class="form-group">
		                <label> User </label>
		                <input type="text" name="edit_user" value="<?php echo $row['user_id']?>" class="form-control" placeholder="Enter User">
		            </div>
								<div class="form-group">
		                <label> Firstname </label>
		                <input type="text" name="edit_firstname" value="<?php echo $row['firstname']?>" class="form-control" placeholder="Enter Firstname">
		            </div>
								<div class="form-group">
		                <label> Lastname </label>
		                <input type="text" name="edit_lastname" value="<?php echo $row['lastname']?>" class="form-control" placeholder="Enter Lastname">
		            </div>
								<div class="form-group">
		                <label> Email </label>
		                <input type="email" name="edit_email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email">
		            </div>
								<div class="form-group">
		                <label> Address1 </label>
		                <input type="text" name="edit_address1" value="<?php echo $row['address1']?>" class="form-control" placeholder="Enter the first Address">
		            </div>
								<div class="form-group">
		                <label> Address2 </label>
		                <input type="text" name="edit_address2" value="<?php echo $row['address2']?>" class="form-control" placeholder="Enter the second Address">
		            </div>
								<div class="form-group">
		                <label> Wilaya </label>
										<select name="edit_wilaya" class="form-control" placeholder="Select Wilaya">
																<option value="<?php echo $row['wilaya']; ?>"><?php echo $row['wilaya']; ?></option>
																<option value="Adrar">01. Adrar</option>
																<option value="Chlef">02. Chlef</option>
																<option value="Laghouat">03. Laghouat</option>
																<option value="Oum El Bouaghi">04. Oum El Bouaghi</option>
																<option value="Batna">05. Batna</option>
																<option value="Bejaia">06. Bejaia</option>
																<option value="Biskra">07. Biskra</option>
																<option value="Bechar">08. Bechar</option>
																<option value="Blida">09. Blida</option>
																<option value="Bouira">10. Bouira</option>
																<option value="Tamanrasset">11. Tamanrasset</option>
																<option value="Tebessa">12. Tebessa</option>
																<option value="Tlemcen">13. Tlemcen</option>
																<option value="Tiaret">14. Tiaret</option>
																<option value="Tizi Ouzou">15. Tizi Ouzou</option>
																<option value="Alger">16. Alger</option>
																<option value="Djelfa">17. Djelfa</option>
																<option value="Jijel">18. Jijel</option>
																<option value="Setif">19. Setif</option>
																<option value="Saida">20. Saida</option>
																<option value="Skikda">21. Skikda</option>
																<option value="Sidi Bel Abbes">22. Sidi Bel Abbes</option>
																<option value="Annaba">23. Annaba</option>
																<option value="Guelma">24. Guelma</option>
																<option value="Constantine">25. Constantine</option>
																<option value="Media">26. Media</option>
																<option value="Mostghanem">27. Mostghanem</option>
																<option value="M'Sila">28. M'Sila</option>
																<option value="Mascara">29. Mascara</option>
																<option value="Ouargla">30. Ouargla</option>
																<option value="Oran">31. Oran</option>
																<option value="El Bayadh">32. El Bayadh</option>
																<option value="Ilizi">33. Ilizi</option>
																<option value="Bordj Bou Arreridj">34. Bordj Bou Arreridj</option>
																<option value="Boumerdes">35. Boumerdes</option>
																<option value="El Tarf">36. El Tarf</option>
																<option value="Tindouf">37. Tindouf</option>
																<option value="Tissemsilt">38. Tissemsilt</option>
																<option value="El Oued">39. El Oued</option>
																<option value="Khenchla">40. Khenchla</option>
																<option value="Souk Ahras">41. Souk Ahras</option>
																<option value="Tipaza">42.Tipaza</option>
																<option value="Mila">43. Mila</option>
																<option value="Ain Defla">44. Ain Defla</option>
																<option value="Naama">45. Naama</option>
																<option value="Ain Temouchent">46. Ain Temouchent</option>
																<option value="Ghardaia">47. Ghardaia</option>
																<option value="Relizane">48. Relizane</option>
																<option value="El M'Ghair">49. El M'Ghair</option>
																<option value="El Meniaa">50. El Meniaa</option>
																<option value="Oueld Djellal">51. Oueld Djellal</option>
																<option value="Bordj Baji Mokhtar">52. Bordj Baji Mokhtar</option>
																<option value="Beni Abbes">53. Beni Abbes</option>
																<option value="Timimoun">54. Timimoun</option>
																<option value="Touggourt">55. Touggourt</option>
																<option value="Djanet">56. Djanet</option>
																<option value="In Salah">57. In Salah</option>
																<option value="In Guezzam">58. In Guezzam</option>
										</select>
		            </div>
								<div class="form-group">
		                <label> Post Code </label>
		                <input type="text" name="edit_zip" value="<?php echo $row['postcode']?>" class="form-control" placeholder="Enter Zip">
		            </div>
								<div class="form-group">
		                <label> Date </label>
		                <input type="datetime" name="edit_date" value="<?php echo $row['date_order']?>" class="form-control" placeholder="Enter Date">
		            </div>

		            <button type="submit" name="updatingorderbtn" class="btn btn-primary">Update</button>
		            <a href="orders.php" class="btn btn-danger">CANCEL</a>
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
