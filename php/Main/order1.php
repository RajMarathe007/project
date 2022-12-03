<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$err7="";
$fl=0;
if(isset($_POST['sbm']))
{
if($_POST['sbm']=="submit" || $_POST['sbm']=="update")
{
if(empty($_POST['ono']))
{
$err1=" Order_no must exist";
$fl=1;
}
if(empty($_POST['odt']))
{
$err2=" Order_date must exist";
$fl=1;
}
if(empty($_POST['cid']))
{
$err3=" Customer_id must exist";
$fl=1;
}
if(empty($_POST['mid']))
{
$err4=" Material_id must exist";
$fl=1;
}
if(empty($_POST['qty']))
{
$err5=" Quantity must exist";
$fl=1;
}
if(empty($_POST['rt']))
{
$err6=" Rate must exist";
$fl=1;
}
if(empty($_POST['amt']))
{
$err7=" Amount must exist";
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
    <form name=frm method=post action="order1.php">
        <center>
            <h2>Order Information</h2>
        </center>
        <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select count(*) from order1";
                $result=mysql_query($sql,$cn);
                $row=mysql_fetch_array($result);
                $orn=$row[0]+1;
        
        ?>
        <table border="1" align="center" cellpadding="3" cellspacing="3">
            
            <tr>
                <!--Order_no-->
                <td>Order_no</td>
                <td><input type="text" name="ono" style="width: 170px" value=<?php echo $orn;?>><?php echo $err1; ?>
                </td>
            </tr>


            <tr>
                <!--Order_date-->
                <td>Order_date</td>
                <td><input type="date" name="odt" style="width: 170px"><?php echo $err2; ?></td>
            </tr>


            <tr>
                <!--Customer_id-->
                <td>Customer_id</td>
                <td><select name="cid"><?php echo $err3; ?>
                <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select customerid from customer";
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
                <!--Material_id-->
                <td>Material_id</td>
                <td><select name="mid"><?php echo $err4; ?>
                <?php
                $cn=mysql_connect("localhost","root");
                mysql_select_db("buildingmaterial",$cn);
                $sql="select materialid from material";
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
                <!--Quantity-->
                <td>Quantity</td>
                <td><input type="text" name="qty" style="width: 170px"><?php echo $err5; ?></td>
            </tr>


            <tr>
                <!--Rate-->
                <td>Rate</td>
                <td><input type="text" name="rt" style="width: 170px"><?php echo $err6; ?></td>
            </tr>


            <tr>
                <!--Amount-->
                <td>Amount</td>
                <td><input type="text" name="amt" style="width: 170px"><?php echo $err7; ?></td>
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
    $sql="insert into order1 values('$_POST[ono]','$_POST[odt]','$_POST[cid]','$_POST[mid]','$_POST[qty]','$_POST[rt]','$_POST[amt]')";
    mysql_query($sql,$cn);
    echo "<center>data stored</center>";
}
}
else
if($sb=="update")
{
if($fl==0)
{
  $sql="update order1 set orderdate='$_POST[odt]',customerid='$_POST[cid]',materialid='$_POST[mid]',quantity='$_POST[qty]',rate='$_POST[rt]',amount='$_POST[amt]' where orderno='$_POST[ono]'";
  mysql_query($sql,$cn);
  echo "<center>data updated</center>";
}
}
else
if($sb=="delete")
{
$sql="delete from order1 where orderno='$_POST[ono]'";
mysql_query("$sql",$cn);
echo "<center>data deleted</center>";
}
else
if($sb=="display")
{
  echo "<center><table border=1>";
  echo "<caption>Order Information</caption>";
  echo "<tr>";
  echo "<th>Order_no</th>";
  echo "<th>Order_date</th>";
  echo "<th>Customer_id</th>";
  echo "<th>Material_id</th>";
  echo "<th>Quantity</th>";
  echo "<th>Rate</th>";
  echo "<th>Amount</th>";
  echo "</tr>";
  $sql="select * from order1";
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
  echo "<th>Order_no</th>";
  echo "<th>Order_date</th>";
  echo "<th>Cistomer_id</th>";
  echo "<th>Material_id</th>";
  echo "<th>Quantity</th>";
  echo "<th>Rate</th>";
  echo "<th>Amount</th>";
  echo "</tr>";
  $sql="select * from order1 where orderno='$_POST[ono]'";
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
      echo "</tr>"; 
  }
echo "</table></center>";
}
}
?>
