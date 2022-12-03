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
if(empty($_POST['dno']))
{
$err1=" Delivery_no must exist";
$fl=1;
}
if(empty($_POST['ddt']))
{
$err2=" Delivery_date must exist";
$fl=1;
}
if(empty($_POST['ono']))
{
$err3=" Order_no must exist";
$fl=1;
}
if(empty($_POST['vno']))
{
$err4=" Vehicle_no must exist";
$fl=1;
}
if(empty($_POST['rno']))
{
$err5=" Receipt_no must exist";
$fl=1;
}
if(empty($_POST['ad']))
{
$err6=" Address must exist";
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
    <form name=frm method=post action=delivery.php>
        <center>
            <h2>Delivery Information</h2>
        </center>
        <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select count(*) from delivery";
                $result=mysql_query($sql,$cn);
                $row=mysql_fetch_array($result);
                $orn=$row[0]+1;
        
        ?>
        <table border="1" align="center" cellpadding="3" cellspacing="3">
            
            <tr>
                <!--Delivery_no-->
                <td>Delivery_no</td>
                <td><input type="text" name="dno" style="width: 170px" value=<?php echo $orn;?>> <?php echo $err1; ?>
                </td>
            </tr>


            <tr>
                <!--Delivery_date-->
                <td>Delivery_date</td>
                <td><input type="date" name="ddt" style="width: 170px"> <?php echo $err2; ?>
                </td>
            </tr>


            <tr>
                <!--Order_no-->
                <td>Order_no</td>
                <td><select name="ono"> <?php echo $err3; ?>
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
                <!--Vehicle_no-->
                <td>Vehicle_no</td>
                <td><input type="text" name="vno" style="width: 170px"> <?php echo $err4; ?>
            </tr>


            <tr>
                <!--Receipt_no-->
                <td>Receipt_no</td>
                <td><input type="text" name="rno" style="width: 170px"> <?php echo $err5; ?>
            </tr>
            
            
            <tr>
               <!--Address-->
               <td>Address</td>
               <td><input type="text" name="ad" style="width: 170px"> <?php echo $err6; ?>
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
    $sql="insert into delivery values('$_POST[dno]','$_POST[ddt]','$_POST[ono]','$_POST[vno]','$_POST[rno]','$_POST[ad]')";
    mysql_query($sql,$cn);
    $sql1="select order1.materialid,order1.quantity from order1,delivery where order1.orderno=delivery.orderno";
    $result=mysql_query($sql1);
    $row1=mysql_fetch_array($result);
    $m=$row1[0];
    $q=$row1[1];
    $sql2="update material set stock=stock-$q where materialid=$m";
    mysql_query($sql2,$cn);
    echo "<center>data stored</center>";
}
}
else
if($sb=="update")
{
if($fl==0)
{
  $sql="update delivery set deliverydate='$_POST[ddt]',orderno='$_POST[ono]',vehicleno='$_POST[vno]',receiptno='$_POST[rno]',address='$_POST[ad]' where deliveryno='$_POST[dno]'";
  mysql_query($sql,$cn);
  echo "<center>data updated</center>";
}
}
else
if($sb=="delete")
{
$sql="delete from delivery where deliveryno='$_POST[dno]'";
mysql_query("$sql",$cn);
echo"<center>data deleted</center>";
}
else
if($sb=="display")
{
  echo "<center><table border=1>";
  echo "<caption>Delivery Information</caption>";
  echo "<tr>";
  echo "<th>Delivery_no</th>";
  echo "<th>Delivery_date</th>";
  echo "<th>Order_no</th>";
  echo "<th>Vehicle_no</th>";
  echo "<th>Reciept_no</th>";
  echo "<th>Address</th>";
  echo "</tr>";
  $sql="select * from delivery";
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
  echo "<caption>Delivery Information</caption>";
  echo "<tr>";
  echo "<th>Delivery_no</th>";
  echo "<th>Delivery_date</th>";
  echo "<th>Order_no</th>";
  echo "<th>Vehicle_no</th>";
  echo "<th>Reciept_no</th>";
  echo "<th>Address</th>";
  echo "</tr>";
  $sql="select * from delivery where deliveryno='$_POST[dno]'";
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
