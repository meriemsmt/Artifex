
<?php


	if (isset($_POST['logout_btn'])) {
		session_destroy();
		unset($_SESSION['admin']);
		header('location: ../index.php');
	}
	?>
