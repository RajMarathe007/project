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
if(empty($_POST['mid']))
{
$err1=" Material_id must exist";
$fl=1;
}
if(empty($_POST['mt']))
{
$err2=" Material_type must exist";
$fl=1;
}
if(empty($_POST['st']))
{
$err3=" Sub_type must exist";
$fl=1;
}
if(empty($_POST['dsc']))
{
$err4=" Description must exist";
$fl=1;
}
if(empty($_POST['uom']))
{
$err5=" Unit_of_measurenment must exist";
$fl=1;
}
if(empty($_POST['rt']))
{
$err6=" Rate must exist";
$fl=1;
}
if(empty($_POST['stk']))
{
$err7=" Stock must exist";
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
    <form name=frm method=post action=material.php>
        <center>
            <h2>Material Information</h2>
        </center>
        <table border="1" align="center" cellpadding="3" cellspacing="3">

            <tr>
                <!--Material_id-->
                <td>Material_id</td>
                <td><input type="text" name="mid" style="width: 170px"><?php echo $err1; ?>
                </td>
            </tr>


            <tr>
                <!--Material_type-->
                <td>Material_type</td>
                <td><input type="text" name="mt" style="width: 170px" onkeypress="return valid1(event)"><?php echo $err2; ?></td>
            </tr>


            <tr>
                <!--Sub_type-->
                <td>Sub_type</td>
                <td><input type="text" name="st" style="width: 170px" onkeypress="return valid1(event)"><?php echo $err3; ?></td>
            </tr>


            <tr>
                <!--Description-->
                <td>Description</td>
                <td><input type="text" name="dsc" style="width: 170px" onkeypress="return valid1(event)"><?php echo $err4; ?></td>
            </tr>


            <tr>
                <!--Unit_of_measurenment-->
                <td>Unit_of_measurenment</td>
                <td><input type="text" name="uom" style="width: 170px"><?php echo $err5; ?></td>
            </tr>


            <tr>
                <!--Rate-->
                <td>Rate</td>
                <td><input type="text" name="rt" style="width: 170px"><?php echo $err6; ?></td>
            </tr>

            <tr>
                <!--Stock-->
                <td>Stock</td>
                <td><input type="number" name="stk" style="width: 170px"><?php echo $err7; ?></td>
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
    $sql="insert into material values('$_POST[mid]','$_POST[mt]','$_POST[st]','$_POST[dsc]','$_POST[uom]','$_POST[rt]','$_POST[stk]')";
    mysql_query($sql,$cn);
    echo "<center>data stored</center>";
}
}
else
if($sb=="update")
{
if($fl==0)
{    
  $sql="update material set materialtype='$_POST[mt]',subtype='$_POST[st]',description='$_POST[dsc]',unitofmeasurement='$_POST[uom]',rate='$_POST[rt]',stock='$_POST[stk]' where materialid='$_POST[mid]'";
  mysql_query($sql,$cn);
  echo "<center>data updated</center>";
}
}
else
if($sb=="delete")
{
$sql="delete from material where materialid='$_POST[mid]'";
mysql_query("$sql",$cn);
echo "<center>data deleted</center>";
}
else
if($sb=="display")
{
  echo "<center><table border=1>";
  echo "<caption>Delivery Information</caption>";
  echo "<tr>";
  echo "<th>Material_id</th>";
  echo "<th>Material_type</th>";
  echo "<th>Sub_type</th>";
  echo "<th>Decribtion</th>";
  echo "<th>Unit_of_measurement</th>";
  echo "<th>Rate</th>";
  echo "<th>Stock</th>";
  echo "</tr>";
  $sql="select * from material";
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
  echo "<th>Material_id</th>";
  echo "<th>Material_type</th>";
  echo "<th>Sub_type</th>";
  echo "<th>Decribtion</th>";
  echo "<th>Unit_of_measurement</th>";
  echo "<th>Rate</th>";
  echo "<th>Stock</th>";
  echo "</tr>";
  $sql="select * from material where materialid='$_POST[mid]'";
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
