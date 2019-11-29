<?php
include('connect.php');
$sql = "SELECT * FROM orders";
    $result = $connect->query($sql);
    $ord_id=$id_user=$order_date=$ship_address=array();
    while ($row = $result->fetch_assoc()) 
    {
      array_push($ord_id,$row['ord_id']);
      array_push($id_user,$row['id_user']);
      array_push($order_date,$row['order_date']);
      array_push($ship_address,$row['ship_address']);
 
}?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
      table, td, th {    
          border: 1px solid #ddd;
          text-align: left;
      }

      table {
          border-collapse: collapse;
          width: 90%;
      }

      th, td {
          padding: 15px;
      }
      input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
	}
    button[type=submit]{
    	padding:5px 15px; 
	    background:#ccc; 
	    border:0 none;
	    cursor:pointer;
	    -webkit-border-radius: 5px;
	    border-radius: 5px; 
    }

    </style>
</head>
<body>
   <center>
   <?php include('indexQK.php'); ?>
   <?php
  
   echo "<h4>ĐƠN HÀNG</h4>";
    echo '<table >
      <thead>
        <tr>
          <th>OrderID</th>
          <th>IDUser</th>
          <th>Order Date</th>
          <th>Ship Address/th>
        </tr>
      </thead>';
      //echo "<center><h2 style='color: red;'>CHÀO BẠN ĐẾN VỚI TRANG ADMIN</h2></center>";
for ($i=0; $i < count($ord_id); $i++) { 
  	echo '<tr>
        <form action="deleteOrder.php" method="post">      
          	<td>'.$ord_id[$i].'</td>
          	<td>'.$id_user[$i].'</td>
          	<td>'.$order_date[$i].'</td>
          	<td>'.$ship_address[$i].'</td>
        </form>
        </tr>';  
  }
  echo "</table>";

?>
</center>
</body>
</html>