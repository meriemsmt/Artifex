<?php
session_start();
/*if (!$_SESSION['admin']) {
    header('location: ../404.php');
} */
include('includes/header.php');
include('includes/navbar.php');
include('../config/dbconn.php');

 $query6 = "SELECT gender, count(*) as number FROM users GROUP BY gender";
 $result = mysqli_query($dbconn, $query6);
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php
                  $query = "SELECT admin_id FROM admin ORDER BY admin_id";
                  $query_run = mysqli_query($dbconn, $query);

                  $row = mysqli_num_rows($query_run);

                 // echo "<h4>".$row."</h4>";
                ?>


               <h4>Total Admin: <?php echo $row; ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Registered Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php
                  $query1 = "SELECT user_id FROM users ORDER BY user_id";
                  $query_run1 = mysqli_query($dbconn, $query1);

                  $row1 = mysqli_num_rows($query_run1);

                 // echo "<h4>".$row."</h4>";
                ?>


               <h4>Total Users: <?php echo $row1; ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Available Products</div>
              <!--<div class="row no-gutters align-items-center">-->
              <div class="h5 mb-0 font-weight-bold text-gray-800">


                <?php
                  $query2 = "SELECT id_product FROM products ORDER BY id_product";
                  $query_run2 = mysqli_query($dbconn, $query2);

                  $row2 = mysqli_num_rows($query_run2);

                 // echo "<h4>".$row."</h4>";
                ?>


               <h4>Total Products: <?php echo $row2; ?></h4>


                <!--<div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>-->
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Received Messages</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


                <?php
                  $query1 = "SELECT * FROM contact";
                  $query1_run = mysqli_query($dbconn,$query1);
                  $num = mysqli_num_rows($query1_run);

                ?>

                <h4>Total Messages: <?php echo $num; ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->





  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Orders Overview</h6>


        </div>
        <!-- Card Body -->
        <div class="card-body">

          <div class="card-body">
            <div class="chart-area">
               <div id="chart"></div>
            </div>
          </div>


          <?php
          $chart_data = '';

          $query3 = "SELECT *, MONTH(date_order) AS Month FROM orders GROUP BY Month";
          $result3 = mysqli_query($dbconn, $query3);

          for ($i=1; $i <=12 ; $i++) {

            $query4 = "SELECT *, MONTH(date_order) AS Month FROM orders WHERE MONTH(date_order)= '$i'";
            $result4 = mysqli_query($dbconn, $query4);

            $num = mysqli_num_rows($result4);
            //echo $num;

             $chart_data .= "{ time:'".$i."', OrdersNumber:".$num."}, ";


          }
          $chart_data = substr($chart_data, 0, -2);


          ?>

        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Users Gender</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div>

               <h3 align="center"></h3>
               <br />
               <div id="piechart" style="width: auto; height: 330px;"></div>
          </div>

        <head>

             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
             <script type="text/javascript">
             google.charts.load('current', {'packages':['corechart']});
             google.charts.setOnLoadCallback(drawChart);
             function drawChart()
             {
                  var data = google.visualization.arrayToDataTable([
                            ['Gender', 'Number'],
                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                                 echo "['".$row["gender"]."', ".$row["number"]."],";
                            }
                            ?>
                       ]);
                  var options = {
                        title: 'Percentage of Male and Female users',
                        is3D:true,
                        //pieHole: 0.4
                       };
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
             }
             </script>
        </head>

      </div>
    </div>
  </div>

















  <!-- Area Chart -->

  <!--
  <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
      <! Card Header - Dropdown >
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>


      </div>


      <! Card Body
      <div class="card-body">

        <div class="card-body">
          <div class="chart-area">
             <div id=""></div>
          </div>
        </div>



      </div>
    </div>

  -->
  </div>










</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->














  <?php
include('includes/scripts.php');
include('includes/footer.php');


?>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'time',
 ykeys:['OrdersNumber'],
 labels:['OrdersNumber', 'humidity'],
 hideHover:'auto',
 stacked:true
});
</script>
