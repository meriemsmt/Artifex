<?php
    include('config/dbconn.php');

    if (isset($_POST['login'])) {
        $username   = $_POST['username'];
        $password   = $_POST['password'];


        //admin

        $query1 = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $query_run = mysqli_query($dbconn,$query1);

            if (mysqli_fetch_array($query_run))
            {
                $_SESSION['admin'] = $username;
                header("Location: admin/index.php");
            }
            else
            {
               $_SESSION['status'] = "Username or Password is invalid";
            }



        //users
        $query2 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $query_run = mysqli_query($dbconn,$query2);

            if (mysqli_fetch_array($query_run))
            {
                $_SESSION['users'] = $username;
                header("Location: user_index.php");
            }
            else
            {
               $_SESSION['status'] = "Username or Password is invalid";
            }
    }


/*
    if (isset($_POST['login'])){
        $username_login = $_POST['username'];
        $password_login = $_POST['password'];

        $query= "SELECT * FROM admin WHERE username='$username_login' AND password='$password_login'";

        $query_run = mysqli_query($dbconn,$query);

        if (mysqli_fetch_array($query_run))
        {
            $_SESSION['admin']=$username_login;
            header('location: admin/index.php');

        }else{
            $_SESSION['status']='Email or pass invalid';
            header('location: index.php');
        }

    } */
?>
