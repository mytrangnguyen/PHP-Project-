<?php
    include('header.php');
	function accountUser($email)
	{
		global $connect;
		$userArr =array();
		$sql = "SELECT * FROM users Where email = '$_SESSION[email]'";
		$result=$connect->query($sql);
		$row = $result->fetch_assoc();
		if ($result->num_rows > 0){
			$id_user =$row['id_user'];
			$user_name=$row['user_name'];
			$birthday =$row['birthday'];
			$address =$row['address'];
			$phonenumber=$row['phonenumber'];
			$email =$row['email'];
			$password =$row['password'];
			array_push($userArr, $id_user,$user_name,$birthday,$address,$phonenumber,$email,$password);
		}
		return $userArr;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form action="updateUser.php">
			<?php $userArr=accountUser($_SESSION['email']) ?> 
			<p>Tên: <?php echo $userArr['1']; ?></p>
			<p>Sinh nhật: <?php echo $userArr['2'];  ?></p>
			<p>Địa chỉ: <?php echo $userArr['3']; ?></p>
			<p>Số điện thoại: <?php echo $userArr['4']; ?></p>
			<p>Email: <?php echo $userArr['5']; ?></p>
			<center><button type="submit" class="btn success">Cập nhật</button></center>
		</form>
	</div>
	<div class="col-md-2"></div>
	<?php include('footer.php');?>
</body>
</html>