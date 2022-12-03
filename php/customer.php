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
          <li><a class="nav-link scrollto active" href="log.php">Back to Login Page</a></li>
          <li><a class="nav-link scrollto active" href="index2.html">Back</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
<br><br>



<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$err7="";
$err8="";
$fl=0;
if(isset($_POST['sbm']))
{
if($_POST['sbm']=="submit" || $_POST['sbm']=="update")
{
if(empty($_POST['cid']))
{
$err1=" Customer_id must exist";
$fl=1;
}
if(empty($_POST['nm']))
{
$err2=" Customer_name must exist";
$fl=1;
}
if(empty($_POST['ad']))
{
$err3=" Address must exist";
$fl=1;
}
if(empty($_POST['oc']))
{
$err4=" Occupation must exist";
$fl=1;
}
if(empty($_POST['cont']))
{
$err5=" Contact_no must exist";
$fl=1;
}
if(empty($_POST['email']))
{
$err6=" Email_id must exist";
$fl=1;
}
if(empty($_POST['pass']))
{
$err7=" Password must exist";
$fl=1;
}
if(empty($_POST['balamt']))
{
$err8=" Balance_amount must exist";
$fl=1;
}

}
}
?>

<html>
    <head>>
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

    <body class="ar">
    <form name=frm method=post action=customer.php>
        <center>
            <h2>Customer Information</h2>
        </center>
        <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select count(*) from customer";
                $result=mysql_query($sql,$cn);
                $row=mysql_fetch_array($result);
                $orn=$row[0]+1;
        
        ?>
        <table border="1" align="center" cellpadding="3" cellspacing="3">
            
            <tr>
                 <!--Customer_id-->
                 <td>Customer_id</td>
                 <td><input type="text" name=cid style="width: 170px" value=<?php echo $orn;?>><?php echo $err1; ?></br> </td>
            </tr>


            <tr>
                 <!--Customer_name-->
                 <td>Customer_name</td>
                 <td><input type="text" name=nm style="width: 170px" onKeyPress="return valid1(event)"><?php echo $err2; ?></br> </td>
            </tr>


            <tr>
                 <!--Address-->
                 <td>Address</td>
                 <td><input type="text" name=ad style="width: 170px"><?php echo $err3; ?></br> </td>
            </tr>


            <tr>
                 <!--Occupation-->
                 <td>Occupation</td>
                 <td><input type="text" name=oc onKeyPress="return valid1(event)"><?php echo $err4; ?></br></td>
            </tr>


            <tr>
                 <!--Contact_no -->
                 <td>Contact_no</td>
                 <td><input type="text" name=cont onKeyPress="return valid2(event)" pattern="[1-9]{1}[0-9]{9}"><?php echo $err5; ?></br></td>
            </tr>


            <tr>
                 <!--Email_id-->
                 <td>Email_id</td>
                 <td><input type="text" name=email ><?php echo $err6; ?></br></td>
            </tr>


            <tr>
                <!--Password-->
                <td>Password</td>
                <td><input type="password" name=pass ><?php echo $err7; ?></br></td>
           </tr>


            <tr>
                <!--Balance_amount -->
                <td>Balance_amount</td>
                <td><input type="text" name=balamt onKeyPress="return valid2(event)"><?php echo $err8; ?></br></td>
           </tr>
        </table>
        <br>
        <div id="Footer" style="Text-align:center">
                <input type=submit name=sbm value=submit>
                <input type=submit name=sbm value=update>
                <input type=submit name=sbm value=delete>
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
    $sql="insert into customer values('$_POST[cid]','$_POST[nm]','$_POST[ad]','$_POST[oc]','$_POST[cont]','$_POST[email]','$_POST[pass]','$_POST[balamt]')";
    mysql_query($sql,$cn);
    echo "<center>data stored</center>";
}
}
else
if($sb=="update")
{
if($fl==0)
{
  $sql="update customer set customername='$_POST[nm]',address='$_POST[ad]',occupation='$_POST[oc]',contanctno='$_POST[cont]',emailid='$_POST[email]',password='$_POST[pass]',balanceamount='$_POST[balamt]' where customerid='$_POST[cid]'";
  mysql_query($sql,$cn);
  echo "<center>data updated</center>";
}
}
else
if($sb=="delete")
{
$sql="delete from customer where customerid='$_POST[cid]'";
mysql_query("$sql",$cn);
echo"<center>data deleted</center>";
}
}
?>
