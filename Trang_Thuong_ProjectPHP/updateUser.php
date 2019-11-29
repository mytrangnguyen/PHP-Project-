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
	<style type="text/css">
		th{
			width: 100px;
			height: 50px;
		}
		tr{
			width: 150px;
			height: 50px;
		}
	</style>
</head>
<body>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form method="post" action="saveInforUser.php">
			<?php $userArr=accountUser($_SESSION['email']) ?>
			<input style="display: none;"type="text" name="id_user" value=<?php echo $userArr['0']; ?> >
			<table>
				
				<tr>
					<th><label for="name"><b>Tên</b></label></th>
					<td><input type="text" name="fullname" style="width: 200px" value= <?php echo $userArr['1'];?>></td>
				</tr>
				<tr>
					<th><label>Sinh nhật</label></th>
					<td><input type="date" name="birthday" style="width: 200px" value=<?php echo $userArr['2'];?>></td>
				</tr>
				<tr>
					<th><label>Địa chỉ</label></th>
					<td><input type="text" name="address" style="width: 200px" value=<?php echo $userArr['3'];?>></td>
				</tr>
				<tr>
					<th><label>Số điện thoại</label></th>
					<td><input type="text" name="phonenumber" style="width: 200px" value=<?php echo $userArr['4'];?>></td>
				</tr>
				<tr>
					<th><label>Email</label></th>
					<td><input type="text" name="email" style="width: 200px" value=<?php echo $userArr['5']; ?>></td>
				</tr>
				<tr>
					<th><label>Mật khẩu</label></th>
					<td><input type="password" name="password" style="width: 200px" value=<?php echo $userArr['6']; ?>></td>
				</tr>
			</table>
			<input type="submit" name="" class="btn success" value="Lưu">
		</form>
	</div>
	 <div class="col-md-2"></div>
	<?php include('footer.php'); ?>
</body>
</html>
