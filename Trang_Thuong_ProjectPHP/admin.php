<?php

include('connect.php');

 $sql = "SELECT * FROM users";
    $result = $connect->query($sql);
    $id=$name=$phone_number=$email=$password=$role=array();
    while ($row = $result->fetch_assoc()) 
    {
      array_push($id,$row['id_user']);
      array_push($name,$row['user_name']);
      array_push($phone_number,$row['phonenumber']);
      array_push($password,$row['password']);
      array_push($email,$row['email']);
      array_push($role, $row['role']);
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
   	<div class=" header" >
		<div class="row" style="background-color: #80bb35 ; " >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<ul class="nav nav-tabs  text-center" style="padding-left: 140px; padding-bottom: 8px;">
					<li class="nav-item" style="margin-top: 4px;">
						<a class="nav-link" href="admin.php"><img src="Image/thanhvien.png" height="40px" width="50px" >THÀNH VIÊN</img></a>
					</li>
				</ul>
			</div>
		</div>
		</div>
	</div>
   <?php
  
   
    echo '<table >
      <thead>
        <tr>
          <th>Id</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Mật khẩu</th>
          <th>SĐT</th>
          <th>Vai trò</th>
          <th>Hành động</th>
        </tr>
      </thead>';
      echo "<center><h2 style='color: red;'>CHÀO BẠN ĐẾN VỚI TRANG ADMIN</h2></center>";
for ($i=0; $i < count($id); $i++) { 
  	echo '<tr>
        <form action="edit.php" method="post">      
          	<td>'.$id[$i].'</td>
          	<td>'.$name[$i].'</td>
          	<td>'.$email[$i].'</td>
          	<td>'.$password[$i].'</td>
          	<td>'.$phone_number[$i].'</td>
          	<td>'.$role[$i].'</td>
          	<input type="text" name="edit" value='.$id[$i].' style="display: none;">
          	
          	<td><input style="color:white ;background:green" type="submit" name="role" value="admin" admin>
          	<br><br>
          	<input style="color:white ;background:green" type="submit" name="role" value="quankho" quankho>
          	<br><br>
          	<input style="color:white ;background:green" type="submit" name="role" value="member" member>
           	<br><br>
          	<button style="color:white ;background:green" type="submit" name="delete"> Xóa</button>
        </form>
        </tr>';  
  }
  echo "</table>";

?>
</center>
</body>
</html>
    
   
