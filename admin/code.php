
<?php
	session_start();


	include('../config/dbconn.php');

	if (isset($_POST['registerbtn']))
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['confirmpassword'];

		if ($password == $cpassword) {
			$query = "INSERT INTO admin(username,email,password) VALUES('$username','$email','$password')";
			$query_run = mysqli_query($dbconn,$query);

			if ($query_run)
			{
				//echo "Saved !";
				$session['success'] = "Admin profile added";
			}else{
				//echo "An error occured, please retry.";
				$session['status'] = "Admin profile not added, an error occured, please retry.";
			}
		}
		else
		{
				$session['status'] = "Password and Confirm Password does not match! Please retry.";
		}
		header('location : register.php');

	}









//MODIFICATION

	if (isset($_POST['updatebtn'])){
		$id = $_POST['edit_id'];
		$username = $_POST['edit_username'];
		$email = $_POST['edit_email'];
		$password = $_POST['edit_password'];

		$query= "UPDATE admin SET username='$username', email='$email', password='$password' WHERE admin_id='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is updated!';
			header('location: register.php');

		}else{
			$_SESSION['status']='Your data is not updated!';
			header('location: register.php');
		}

	}






//Suppression

	if (isset($_POST['delete_btn'])){
		$id = $_POST['delete_id'];

		$query= "DELETE FROM admin WHERE admin_id='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is deleted!';
			header('location: register.php');

		}else{
			$_SESSION['status']='Your data is not deleted!';
			header('location: register.php');
		}

	}











//LOGIN

	if (isset($_POST['login'])){
		$username_login = $_POST['username'];
		$password_login = $_POST['password'];

		$query= "SELECT * FROM admin WHERE username='$username_login' AND password='$password_login'";

		$query_run = mysqli_query($dbconn,$query);

		if (mysqli_fetch_assoc($query_run))
		{
			$_SESSION['admin']=$username_login;
			header('location: index.php');

		}else{
			$_SESSION['status']='Email or pass invalid';
			header('location: ../index.php');
		}




		//users
		$query2 = "SELECT * FROM users WHERE username='$username_login' AND password='$password_login'";
		$query_run2 = mysqli_query($dbconn,$query2);

				if (mysqli_fetch_array($query_run2))
				{
						$_SESSION['users'] = $username_login;
						header("Location: ../user_index.php");
				}
				else
				{
					 $_SESSION['status'] = "Username or Password is invalid";
				}

	}




//-------------------------------------------------------------------------------------





//modification USER

	if (isset($_POST['updatingbtn'])){
		$id = $_POST['editt_id'];
		$firstname = $_POST['edit_firstname'];
		$lastname = $_POST['edit_lastname'];
		$email = $_POST['editt_email'];
		$gender = $_POST['editt_gender'];
		$address = $_POST['edit_address'];
		$username = $_POST['editt_username'];
		$password = $_POST['editt_password'];

		$query= "UPDATE users SET firstname='$firstname', lastname ='$lastname',email='$email', gender='$gender',address='$address', username='$username', password='$password' WHERE user_id='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is updated!';
			header('location: userregister.php');

		}else{
			$_SESSION['status']='Your data is not updated!';
			header('location: userregister.php');
		}

	}


//Suppression USER

	if (isset($_POST['deleting_btn'])){
		$id = $_POST['deletee_id'];

		$query= "DELETE FROM users WHERE user_id='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is deleted!';
			header('location: userregister.php');

		}else{
			$_SESSION['status']='Your data is not deleted!';
			header('location: userregister.php');
		}

	}


//Ajouter User


	if (isset($_POST['registeringbtn']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$username = $_POST['username'];
		$password = $_POST['password'];

			$query = "INSERT INTO users(firstname, lastname, email, gender, address, username, password) VALUES('$firstname','$lastname','$email', '$gender','$address','$username','$password')";
			$query_run = mysqli_query($dbconn,$query);

			if ($query_run)
			{
				//echo "Saved !";
				$session['success'] = "User profile added";
			}else{
				//echo "An error occured, please retry.";
				$session['status'] = "User profile not added, an error occured, please retry.";
			}
				header('location : userregister.php');

	}




//-------------------------------------------------------------------------------------Category








//Ajouter Category


	if (isset($_POST['addcat']))
	{
		$name = $_POST['name_category'];

			$query = "INSERT INTO category(name_category) VALUES('$name')";
			$query_run = mysqli_query($dbconn,$query);

			if ($query_run)
			{
				//echo "Saved !";
				$session['success'] = "Category added";
			}else{
				//echo "An error occured, please retry.";
				$session['status'] = "Category not added, an error occured, please retry.";
			}
				header('location : category.php');

	}






//modification Category


	if (isset($_POST['updatedbtn'])){
		$id = $_POST['edit_id'];
		$name = $_POST['edit_name'];

		$query= "UPDATE category SET name_category='$name' WHERE id_category='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is updated!';
			header('location: category.php');

		}else{
			$_SESSION['status']='Your data is not updated!';
			header('location: category.php');
		}

	}


//Suppression USER

	if (isset($_POST['deleted_btn'])){
		$id = $_POST['delete_id'];

		$query= "DELETE FROM category WHERE id_category='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is deleted!';
			header('location: category.php');

		}else{
			$_SESSION['status']='Your data is not deleted!';
			header('location: category.php');
		}

	}













//-------------------------------------------------------------------------------------Product



	//ajouter produits

	if (isset($_POST['addprod']))
	{
		$cat = $_POST['select_category'];
		$name = $_POST['name_prod'];
		$price = $_POST['price'];
		$qte = $_POST['qte'];
		$description = $_POST['description'];
		$pic_name = $_FILES["picture"]['name'];
		$pic_name1 = $_FILES["picture1"]['name'];


		$query7 = "insert into products (id_category, name_product, desc_product, qte_product, price_product, img_product,img1_product) values ('$cat','$name','$description','$qte','$price','$pic_name','$pic_name1')";
		$query_run7 = mysqli_query($dbconn,$query7);

		//ida l'image existe deja

		if (file_exists("products_img/".$_FILES["picture"]["name"])||file_exists("products_img/".$_FILES["picture1"]["name"])) {
			$store = $_FILES["picture"]["name"];
			$store = $_FILES["picture1"]["name"];
			$_SESSION['status']="The file ' ".$store." ' or ' ".$store1." ' already exists";
			header('location: products.php');
		}else {
				if ($query_run7)
				{
					move_uploaded_file($_FILES["picture"]["tmp_name"], "products_img/".$_FILES["picture"]["name"]);
					move_uploaded_file($_FILES["picture1"]["tmp_name"], "products_img/".$_FILES["picture1"]["name"]);
					$_SESSION['success']='Your data is Added!';
					header('location: products.php');

				}else{
					$_SESSION['status']='Your data is not Added!';
					header('location: products.php');
				}
		}

	}





	//Suppression Produit

	if (isset($_POST['delete_prd'])){
		$id = $_POST['delete_id'];

		$query= "DELETE FROM products WHERE id_product='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is deleted!';
			header('location: products.php');

		}else{
			$_SESSION['status']='Your data is not deleted!';
			header('location: products.php');
		}

	}







//Modification Produit

if (isset($_POST['updateprodbtn'])){
	$id = $_POST['edittt_id'];
	$cat = $_POST['edit_cat'];
	$name = $_POST['edit_prodname'];
	$desc = $_POST['edit_desc'];
	$qte = $_POST['edit_qte'];
	$price = $_POST['edit_price'];
	$img = $_FILES["picture"]["name"];
	$img1 = $_FILES["picture1"]["name"];

	//$img = $_POST['edit_img'];

	$query5= "UPDATE products SET id_category='$cat', name_product ='$name', desc_product ='$desc', qte_product ='$qte', price_product ='$price', img_product ='$img', img1_product ='$img1' WHERE id_product='$id'";


	$query_run5 = mysqli_query($dbconn,$query5);

	if ($query_run5)
	{
		move_uploaded_file($_FILES["picture"]["tmp_name"], "products_img/".$_FILES["picture"]["name"]);
		move_uploaded_file($_FILES["picture1"]["tmp_name"], "products_img/".$_FILES["picture1"]["name"]);
		$_SESSION['success']='Your data is Updated!';
		header('location: products.php');

	}else{
		$_SESSION['status']='Your data is not updated!';
		header('location: products.php');
	}

}













//-----------------------------------------------------------------------------Forum

//ADD COMMENT


if (isset($_POST['addcom']))
{
	$username = $_SESSION['admin'];
	$comment = $_POST['comment'];
	$date=date("Y-m-d");


		$query = "INSERT INTO comments(username,comment,cur_date) VALUES('$username','$comment','$date')";
		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			//echo "Saved !";
			$session['success'] = "Your Comment is added";
		}else{
			//echo "An error occured, please retry.";
			$session['status'] = "Comment not added, an error occured, please retry.";
		}

	header('location : forum.php');

}

//EDIT Comment

if (isset($_POST['updationbtn'])){
	$id = $_POST['edition_id'];
	$username = $_POST['edition_username'];
	$comment = $_POST['edit_com'];
	$date = $_POST['edit_date'];

	$query= "UPDATE comments SET username='$username', comment ='$comment',cur_date='$date' WHERE id_com='$id'";

	$query_run = mysqli_query($dbconn,$query);

	if ($query_run)
	{
		$_SESSION['success']='Your data is updated!';
		header('location: forum.php');

	}else{
		$_SESSION['status']='Your data is not updated!';
		header('location: forum.php');
	}

}


//Suppression comment

	if (isset($_POST['deletion_btn'])){
		$id = $_POST['delete_id'];

		$query= "DELETE FROM comments WHERE id_com='$id'";

		$query_run = mysqli_query($dbconn,$query);

		if ($query_run)
		{
			$_SESSION['success']='Your data is deleted!';
			header('location: forum.php');

		}else{
			$_SESSION['status']='Your data is not deleted!';
			header('location: forum.php');
		}

	}

















//-------------------------------------------------------------------------------------CART

//delete


if (isset($_POST['deletecart'])){
  $id = $_POST['idcart'];

  $query= "DELETE FROM cart WHERE id_cart='$id'";

  $query_run = mysqli_query($dbconn,$query);

  if ($query_run)
  {
    $_SESSION['success']='Your data is deleted!';
  }else{
    $_SESSION['status']='Your data is not deleted!';
  }
	header('location: ../cart.php');
}



//edit
if (isset($_POST['editcart'])){
	$id = $_POST['idcart'];
	$qte = $_POST['qte'];

	$query= "UPDATE cart SET quantity='$qte' WHERE id_cart='$id'";

	$query_run = mysqli_query($dbconn,$query);

	if ($query_run)
	{
		$_SESSION['success']='Your data is updated!';

	}else{
		$_SESSION['status']='Your data is not updated!';

	}
	header('location: ../cart.php');

}



?>
