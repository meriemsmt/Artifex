<?php
    include 'includes/header.php';
    include('config/dbconn.php');
    include 'includes/user_navbar.php';

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }

    $num_per_page = 03;
    $start_from = ($page-1)*03;
?>



<?php
$msg="";

if (isset($_POST['submit'])) {

  $comment = $_POST['comment'];
  $date=date("Y-m-d");

  $n=$_SESSION['users'];
  $qr = "SELECT * FROM users WHERE username ='$n'";
  $qr_r = mysqli_query($dbconn,$qr);


  while ($rw = mysqli_fetch_assoc($qr_r)) {
    $name = $rw['user_id'];
    $query="INSERT INTO comments(user_id,comment,cur_date) VALUES('$name','$comment','$date')";
    $query_run=mysqli_query($dbconn,$query);

}
  if ($query_run) {
    $msg= "Posted Successfully !";
  }else {
    $msg= "Failed to post Comment !";
  }
}

?>



<?php

if (isset($_POST['delete_userCom'])) {

    $commentt = $_POST['commentt'];
    $userr = $_SESSION['users'];

    $query22="DELETE FROM comments WHERE username='$userr'";

         $query_run22=mysqli_query($dbconn,$query22);

         if ($query_run22) {
           $msg= "Comment deleted !";
         }else {
           $msg= "Failed to delete Comment !";
         }
       }


 ?>


  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mernes Smaouat">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://kit.fontawesome.com/e3c1de59c1.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>




  <body class="bg-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lh-5 bg-light rounded mt-2" style="width:477px;">
          <h4 class="text-center p-2">Write your comment!</h4>

          <form class="p-2" action="" method="post">

            <div class="form-group">
              <textarea style="width:460px;" name="comment" class="form-controlrounded-0" placeholder="Write your comment here" required></textarea>
            </div>
            <div class="form-group" style="text-align:center;">
              <input type="submit" name="submit" class="btn btn-primary" value="Post Comment">
              <br>
              <h5 class="float-center text-success p-2"> <?= $msg; ?></h5>
            </div>
          </form>
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-lg-5 rounded bg-light p-3">
          <?php
            $query = "SELECT * FROM users INNER JOIN comments ON users.user_id = comments.user_id ORDER BY id_com DESC LIMIT $start_from,$num_per_page";
            $query_run = mysqli_query($dbconn, $query);
            //$row = mysqli_fetch_assoc($query_run);

            while ($row= $query_run->fetch_assoc()) {
          ?>

          <div class="card mb-2 border-secondary">
            <div class="card-header bg-secondary py-1 text-light">
              <span class="font-italic">Posted By : <?= $row['username']; ?></span>
              <span class="float-right">On : <?= $row['cur_date']; ?></span>
            </div>
            <div class="card-body py-2">
              <p class="card-text"><?= $row['comment']; ?></p>
            </div>
            <div class="card-footer py-2">

              <?php

          $userrr= $row['username'];

            if ($userrr==$_SESSION['users']){

                    ?>
              <div class="float-right">
                <form action="" method="post">

                <input type="text" name="commentt" value="<?php $row['comment']; ?>">
                <input type="text" name="userr" value="<?php $_SESSION['users']; ?>">
                <button type="submit" name="delete_userCom" class="fas fa-trash" > Delete</button>

                    <?php
                  }?>

</form>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>


<div style="text-align:center;">

    <?php

          $per_query = "SELECT * FROM comments";
          $per_result = mysqli_query($dbconn,$per_query);
          $total_record = mysqli_num_rows($per_result);
          $total_page = ceil($total_record/$num_per_page); //ceil arrondis le resultat
          if ($page>1) {
              echo "<a href='forum.php?page=".($page=1)."' class='btn btn-danger'> << </a>";
              echo "<a href='forum.php?page=".($page-1)."' class='btn btn-danger'> < </a>";
          }


          for ($i=1; $i <=$total_page ; $i++) {
            echo "<a href='forum.php?page=".$i."' class='btn btn-primary'>$i</a>";
          }

          if ($i>$page) {
              echo "<a href='forum.php?page=".($page+1)."' class='btn btn-danger'> > </a>";
              echo "<a href='forum.php?page=".($total_page)."' class='btn btn-danger'> >> </a>";
          }
    ?>
</div>


<?php include('includes/footer.php') ?>
