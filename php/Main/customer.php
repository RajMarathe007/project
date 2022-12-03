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
    </head>
<body>
    <form name=frm method=post action=customer.php>
        <center>
            <h2>Customer Information</h2>
        </center>
        <table border="1" align="center" cellpadding="3" cellspacing="3">
            
            <tr>
                 <!--Customer_id-->
                 <td>Customer_id</td>
                 <td><input type="text" name=cid style="width: 170px"><?php echo $err1; ?></br> </td>
            </tr>


            <tr>
                 <!--Customer_name-->
                 <td>Customer_name</td>
                 <td><input type="text" name=nm style="width: 170px"><?php echo $err2; ?></br> </td>
            </tr>


            <tr>
                 <!--Address-->
                 <td>Address</td>
                 <td><input type="text" name=ad style="width: 170px"><?php echo $err3; ?></br> </td>
            </tr>


            <tr>
                 <!--Occupation-->
                 <td>Occupation</td>
                 <td><input type="text" name=oc onkeypress="return valid1()"><?php echo $err4; ?></br></td>
            </tr>


            <tr>
                 <!--Contact_no -->
                 <td>Contact_no</td>
                 <td><input type="text" name=cont ><?php echo $err5; ?></br></td>
            </tr>


            <tr>
                 <!--Email_id-->
                 <td>Email_id</td>
                 <td><input type="text" name=email ><?php echo $err6; ?></br></td>
            </tr>


            <tr>
                <!--Password-->
                <td>Password</td>
                <td><input type="text" name=pass ><?php echo $err7; ?></br></td>
           </tr>


            <tr>
                <!--Balance_amount -->
                <td>Balance_amount</td>
                <td><input type="text" name=balamt ><?php echo $err8; ?></br></td>
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
else
if($sb=="display")
{
  echo "<center><table border=1>";
  echo "<caption>Customer Information</caption>";
  echo "<tr>";
  echo "<th>Customer_id</th>";
  echo "<th>Customer_name</th>";
  echo "<th>Address</th>";
  echo "<th>Occupation</th>";
  echo "<th>Contact_no</th>";
  echo "<th>Email_id</th>";
  echo "<th>Password</th>";
  echo "<th>Balance_amount</th>";
  echo "</tr>";
  $sql="select * from customer";
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
      echo "<td>$row[6]</td>";
      echo "<td>$row[7]</td>";
      echo "</tr>";
  }
echo "</table></center>";
}
else
if($sb=="search")
{
  echo "<center><table border=1>";
  echo "<caption>Customer Information</caption>";
  echo "<tr>";
  echo "<th>Customer_id</th>";
  echo "<th>Customer_name</th>";
  echo "<th>Address</th>";
  echo "<th>Occupation</th>";
  echo "<th>Contact_no</th>";
  echo "<th>Email_id</th>";
  echo "<th>Password</th>";
  echo "<th>Balance_amount</th>";
  echo "</tr>";
  $sql="select * from customer where customerid='$_POST[cid]'";
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
      echo "<td>$row[6]</td>";
      echo "<td>$row[7]</td>";
      echo "</tr>"; 
  }
echo "</table></center>";
}
}
?>
