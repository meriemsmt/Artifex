<?php
include('config/dbconn.php');

if (isset($_POST['submitcont']))
{

  $user = $_SESSION['users'];

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];


    $qur="SELECT * FROM users WHERE username = '$user'";
    $run = mysqli_fetch_array($dbconn,$qur);

    $rw = mysqli_fetch_assoc($run);
    while ($rw) {
          $user_id = $rw['user_id'];
    }

    $query = "INSERT INTO contact(user_id,	fullname,	email,	subject,	message) VALUES('$user_id','$name','$email', '$subject','$message')";
    $query_run = mysqli_query($dbconn,$query);

        if ($query_run)
        {
          $_SESSION['success']='Your data is Added!';
          header('location: contact-us.php');

        }else{
          $_SESSION['status']='Your data is not Added!';
          header('location: ../user_index.php');
        }


}

?>


<?php

include('config/dbconn.php');

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// Subject
if (empty($_POST["subject"])) {
    $errorMSG .= "Subject is required ";
}
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}
// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";


?>

<?php

if (isset($_POST['submitcont']))
{

  $user = $_POST['user'];

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

    $query = "INSERT INTO contact (user_id,fullname,email,subject,message) VALUES ('$user','$name','$email','$subject','$message')";
    $query_run = mysqli_query($dbconn,$query);

				if ($query_run)
				{
					$_SESSION['success']='Your data is Added!';
					header('location: ../contact-us.php');

				}else{
					$_SESSION['status']='Your data is not Added!';
					header('location: ../user_index.php');
          echo "nop";
				}


}

?>
