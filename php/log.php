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

</head>

<body>
<br><br><br>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <!--<h1><a href="index.html">Material Suppliers</a></h1>-->
		    <img src="assets/img/logo3.png" alt="" class="img-fluid"></div>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Enter Without Sign In</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
<html>
<head>
    <script language="javascript">

    </script>
<style>
  .ar{
background-image:url("bgred.png");
background-size:100%;
background-repeat:no-repeat;
}
</style>
</head>
<body class="ar">
<center>
<br><br><br><br>

<form name="frm1"  method=post action=log.php >
<table>
<tr>
<th>
Username : 
</th>
<td><input type="text" name="cid" required></td>
</tr>
<tr>
<th>
Password :
</th>
<td><input type="password" name="pass" value="" required></td>
</tr>
<br>
</table><br>
<input type="submit" name="log" value="LogIn"/><br><br>
</form>
<form action="customer.php">
    <input type="submit" value="Register"/>
</form>
</center>
</body>

</html>

<?php
if(isset($_POST['log']))
{
    if($_POST['cid']=="admin" && $_POST['pass']=="admin")
    header("location:http://localhost/php/index1.html");
    else
    {
        $cn=mysql_connect("localhost","root");
        mysql_select_db("buildingmaterial",$cn);
        $sql="select count(*) from customer where customerid='$_POST[cid]' and password='$_POST[pass]'";
        $result=mysql_query($sql,$cn);
        $row=mysql_fetch_array($result);
        if($row[0]>0)
        {
            session_start();
            $_SESSION['customerid']=$_POST['cid'];
            header("location:http://localhost/php/index2.html");
        }
        else
        echo "<center>Invalid Username and or Password </center>";
        
    }
    

}
?> 
