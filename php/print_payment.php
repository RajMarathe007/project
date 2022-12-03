<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Building Material Supplier</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Scaffold - v4.7.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  .ar{
background-image:url("reportimg.png");
background-size:100%;
background-repeat:no-repeat;
}
</style>
    </head>

    <body class="ar">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <!--<h1><a href="index.html">Material Suppliers</a></h1>-->
		<a href="index.html"><img src="assets/img/logo3.png" alt="" class="img-fluid"></a></div>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index1.html">Home</a></li>
          <li><a class="nav-link scrollto" href="print_customer.php">Customer Report</a></li>
          <li><a class="nav-link scrollto" href="print_material.php">Material Report</a></li>
          <li><a class="nav-link scrollto" href="print_order.php">Order Report</a></li>
          <li><a class="nav-link scrollto" href="print_delivery.php">Delivery Report</a></li>
          <li><a class="nav-link scrollto" href="print_payment.php">Payment Report</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
<br><br><br><br><br><br>
</form>
</body>
</html>

<html>
<body>
    <head>
        <script language=javascript>
            function toprint()
            {
                window.print();
            }
        </script>    
    </head>
    <form name=frm method=post action=print_payment.php>
        <center>
            <h1>Payment Information Report</h1>
        </center>
    </Form>
</body>
</html>

<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("buildingmaterial",$cn);
{
  echo "<center><table border=1>";
  echo "<caption>Payment Information</caption>";
  echo "<tr>";
  echo "<th>Payment_no</th>";
  echo "<th>Payment_date</th>";
  echo "<th>Customer_id</th>";
  echo "<th>Amount</th>";
  echo "<th>Order_no</th>";
  echo "<th>Payment_mode</th>";
  echo "</tr>";
  $sql="select * from payment";
  $result=mysql_query($sql,$cn);
  while ($row=mysql_fetch_array($result)) 
  {
      echo "<tr>";
      echo "<td>$row[0]</td>";
      echo "<td>$row[1]</td>";
      echo "<td>$row[2]</td>";
      echo "<td>$row[3]</td>";
      echo "<td>$row[4]</td>";
      echo "<td>$row[5]</td>";
      echo "</tr>";
  }
echo "</table>";
echo "<br>";
echo "<input type=button name=btn value=print onclick=toprint()></center>";
}
?>
