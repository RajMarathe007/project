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
                 <input type=submit name=sbm value=display>
        </center>
    </Form>
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
}
?>
