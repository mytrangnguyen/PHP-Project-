<?php
include('header.php');
function update_infor_user($id_user,$user_name,$birthday,$address,$phonenumber,$email,$password){
		global $connect;
		$sql = "UPDATE users SET  user_name = '".$user_name."',birthday = '".$birthday."',address='".$address."',phonenumber='".$phonenumber."',email='".$email."',password='".$password."' WHERE id_user='".$id_user."'";

		if ($connect->query($sql)===TRUE) {
			echo "<div class='col-md-12'><h4>Bạn đã lưu thông tin thành công</h4></div>";
		}
		else {
			echo "điên quasssssssssssssssssssssssssssssssssssssssssssss";
		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		echo $_POST['id_user'];
		update_infor_user($_POST['id_user'],$_POST['fullname'],$_POST['birthday'],$_POST['address'],$_POST['phonenumber'],$_POST['email'],$_POST['password']);
		
	}
?>