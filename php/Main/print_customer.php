<html>
    <head>
        <script language=javascript>
            function toprint()
            {
                window.print();
            }
        </script>    
    </head>
  <body>
    <form name=frm method=post action=print_customer.php>
        <center>
        <h1>Customer Information Report</h1>
            <input type=submit name=sbm value=display>
        </center>
    </form>
  </body>
</html>

<?php
if(isset($_POST['sbm']))
{
$cn=mysql_connect("localhost","root");
mysql_select_db("buildingmaterial",$cn);
$sb=$_POST['sbm'];
if($sb=="display")
{
  echo "<center><table border=1>";
  echo "<caption>Customer Information Report</caption>";
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
echo "</table>";
echo "<br>";
echo "<input type=button name=btn value=print onclick=toprint()></center>";
}
}
?>
