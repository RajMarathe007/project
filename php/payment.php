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
          <li><a class="nav-link scrollto active" href="index2.html">Home</a></li>
          <li><a class="nav-link scrollto" href="material.php">Material </a></li>
          <li><a class="nav-link scrollto" href="delivery.php">Delivery </a></li>
          <li><a class="nav-link scrollto" href="payment.php">Payment </a></li>
          <li><a class="nav-link scrollto" href="reports.php">Reports</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
<br><br><br><br><br><br>

<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$fl=0;
if(isset($_POST['sbm']))
{
if($_POST['sbm']=="submit" || $_POST['sbm']=="update")
{
if(empty($_POST['pno']))
{
$err1=" Payment_no must exist";
$fl=1;
}
if(empty($_POST['pdt']))
{
$err2=" Payment_date must exist";
$fl=1;
}
if(empty($_POST['cid']))
{
$err3=" Customer_id must exist";
$fl=1;
}
if(empty($_POST['amt']))
{
$err4=" Amount must exist";
$fl=1;
}
if(empty($_POST['ono']))
{
$err5=" Order_no must exist";
$fl=1;
}
if(empty($_POST['pmd']))
{
$err6=" Payment_mode must exist";
$fl=1;
}

}
}
?>

<html>
    <head>
        <script language="javascript">
            function valid1(event) {
                var x;
                x = event.keyCode;
                if ((x > 65 && x <= 90) || (x >= 97 && x <= 122) || x == 32)
                    event.keyCode = x;
                else {
                    event.keyCode = 0;
                    return false;
                }
            }
            function valid2(event) {
                var x;
                x = event.keyCode;
                if (x >= 48 && x <= 57)
                    event.keyCode = x;
                else {
                    event.keyCode = 0;
                    return false;
                }
            }
        </script>
<style>
  .ar{
background-image:url("background.png");
background-size:100%;
background-repeat:no-repeat;
}
</style>
    </head>

    <body class="ar">>
    <form name=frm method=post action=payment.php>
        <center>
            <h2>Payment Information</h2>
        </center>
        <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select count(*) from payment";
                $result=mysql_query($sql,$cn);
                $row=mysql_fetch_array($result);
                $orn=$row[0]+1;
        
        ?>
        <table border="1" align="center" cellpadding="3" cellspacing="3">
           
            <tr>
                <!--Payment_no-->
                <td>Payment_no</td>
                <td><input type="text" name="pno" style="width: 170px" value=<?php echo $orn;?>><?php echo $err1; ?>
                </td>
            </tr>


            <tr>
                <!--Payment_date-->
                <td>Payment_date</td>
                <td><input type="date" name="pdt" style="width: 170px" onkeypress="return valid1(event)"><?php echo $err2; ?></td>
            </tr>


            <tr>
                <!--Customer_id-->
                <td>Customer_id</td>
                <td><select name="cid"><?php echo $err3; ?>
                <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select customerid from customer where balanceamount>0";
                $result=mysql_query($sql,$cn);
                while($row=mysql_fetch_array($result))
                {
                    echo "<option value=$row[0]>$row[0]</option>";
                }
                ?>
            </select>
            </td>
            </tr>


            <tr>
                <!--Amount-->
                <td>Amount</td>
                <td><input type="text" name="amt" style="width: 170px"><?php echo $err4; ?></td>
            </tr>


            <tr>
                <!--Order_no-->
                <td>Order_no</td>
                <td><select name="ono"> <?php echo $err5; ?>
                <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select orderno from order1";
                $result=mysql_query($sql,$cn);
                while($row=mysql_fetch_array($result))
                {
                    echo "<option value=$row[0]>$row[0]</option>";
                }
                ?>
            </select>
            </td>
            </tr>


            <tr>
                <!--Payment_mode-->
                <td>Payment_mode</td>
                <td><input type="text" name="pmd" style="width: 170px"><?php echo $err5; ?></td>
            </tr>
        </table>
        <br>
        <div id="Footer" style="Text-align:center">
                <input type=submit name=sbm value=submit>
                <input type=submit name=sbm value=update>
                <input type=submit name=sbm value=delete>
                <input type=submit name=sbm value=display>
                <input type=submit name=sbm value=search>
            </Form>
        </div>
</body>

</html>

<?php
if(isset($_POST['sbm']))
{
$cn=mysql_connect("localhost","root");
mysql_select_db("buildingmaterial",$cn);
$sb=$_POST['sbm'];
if ($sb=="submit") 
{
if($fl==0)
{
    $sql="insert into payment values('$_POST[pno]','$_POST[pdt]','$_POST[cid]','$_POST[amt]','$_POST[ono]','$_POST[pmd]')";
    mysql_query($sql,$cn);
    $sql="update customer set balanceamount=balanceamount-'$_POST[amt]' where customerid='$_POST[cid]'";
    mysql_query($sql,$cn);
    echo "<center>data stored </center>";
}
}
else
if($sb=="update")
{
if($fl==0)
{
  $sql="update payment set paymentdate='$_POST[pdt]',customerid='$_POST[cid]',amount='$_POST[amt]',orderno='$_POST[ono]',paymentmode='$_POST[pmd]' where paymentno='$_POST[pno]'";
  mysql_query($sql,$cn);
  echo "<center>data updated</center>";
}
}
else
if($sb=="delete")
{
$sql="delete from payment where paymentno='$_POST[pno]'";
mysql_query("$sql",$cn);
echo"<center>data deleted</center>";
}
else
if($sb=="display")
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
echo "</table></center>";
}
else
if($sb=="search")
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
  $sql="select * from payment where paymentno='$_POST[pno]'";
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
echo "</table></center>";
}
}
?>