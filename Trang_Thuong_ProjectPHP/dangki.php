<?php
 	include ('connect.php');
 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(check_email($connect,$_POST['email'])==0){
			$role ='member';
			$result= insert_user($connect,$_POST['fullname'],$_POST['phonenumber'],$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT),$role);
    		header('Location: dangnhap.php');
		}
	}

 	function insert_user($connect,$name,$phoneNumber,$email,$password,$role){
		$sql="INSERT INTO USERS(user_name,phonenumber,email,password,role)
		VALUES('".$name."','".$phoneNumber."','".$email."','".$password."','".$role."')";	
		if ($connect->query($sql)=== TRUE) { 
			
			return "insert ok";
		}
	}

	 //insert_user($connect,"trang",123,"tr@gmail.com","1","member");
		

	function check_email($connect,$email){	
		$email_query = "SELECT email FROM USERS ";
		mysqli_select_db($connect,'SALE_MANAGEMENT');
		$queried = mysqli_query($connect,$email_query);
		if ($queried) {
			$mang=array();
			while ($row=mysqli_fetch_row($queried)) {
			    array_push($mang, $row['0']);
			}
			for ($i=0; $i < count($mang); $i++) { 
				if ($email==$mang[$i]) {
					echo "<div style='margin-left:600px; color:red;'><p>Email đã tồn tại, bạn vui lòng đăng kí lại bằng email khác</p></div>";
					return 1;
				}
			}
  		}
  		mysqli_free_result($queried);
    	return 0;
  	}
  	// define variables and set to empty values
$nameErr = $emailErr= "";
$name = $email= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fullname"])) {
    $nameErr = "Bạn phải nhập tên";
  } else {
    $fullname = test_input($_POST["fullname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
      $nameErr = "Bạn chỉ được phép nhập chữ"; 
    }
  }
  
	if (empty($_POST["email"])) {
	    $emailErr = "Email is required";
	} else{
	  $email = ($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Bạn phải nhập đúng format của email"; 
				    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/test.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.js">
	<style type="text/css">
	input[type=text], input[type=password] {
		  width: 25%;
		  padding: 15px;
		  margin: 5px 0 22px 0;
		  display: inline-block;
		  border: none;
		  background: #f1f1f1;
		}

		input[type=text]:focus, input[type=password]:focus {
		  background-color: #ddd;
		  outline: none;
		}

		/* Overwrite default styles of hr */
		hr {
		  border: 1px solid #f1f1f1;
		  margin-bottom: 25px;
		}

		/* Set a style for the submit/register button */
		.registerbtn {
		  background-color: #4CAF50;
		  color: white;
		  padding: 16px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 15%;
		  opacity: 0.9;
		}

		.registerbtn:hover {
		  opacity:1;
		}


		a {
		  color: dodgerblue;
		}
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<div class="container col-md-12">
		<div class="header">
				<div class="header">
			<div class="top-nav" style="background-color:#80bb35; height: 40px; ">
				<div class="row">
		     <div class="top col-md-7 bg-dark">
		        <ul class="list-inline f-left">
					<li>
						<i class="fa fa-mobile" style=" font-size: 20px; display: inline-block; position: relative; transform: translateY(2px); padding-left: 15px; color: white; "></i><b>Hotline: </b> 
						<span>
							<a href="callto:01634778516" style=" text-decoration: none; color: white "><b> 01634778516</b></a>
						</span>
					</li>
					<li class="margin-left-20">
						<i class="fa fa-map-marker"></i> <b>Địa chỉ</b>:
						<span style="color: white">
							<b>Shop T&T, thành phố Đà Nẵng</b>
						</span>
					</li>
				</ul>
		    </div>
			<div class="col-md-2"></div>
		    
			    <div class="col-md-8" >
				    <h4>Đăng kí tài khoản</h4>
				    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"s>
					    <div class="col-md-3">Tên</div>
						<div class="form-group col-md-8">
						<input type="text" class="form-control" id="fullname" placeholder="Nhập tên đăng nhập" name="fullname" value="<?php echo $name ?>"required>
						<span class="error">* <?php echo $nameErr;?></span>
						</div>


						<div class="col-md-3">Số điện thoại</div>
							<div class="form-group col-md-8">
								<input type="text" class="form-control" id="phoneNumber" placeholder="Số điện thoại" name="phonenumber" required>

							</div>

						<div class="col-md-3">Email</div>
							<div class="form-group col-md-8">
								<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email;?>" required>
								<span class="error">* <?php echo $emailErr;?></span>
							</div>

						<div class="col-md-3">Mật khẩu</div>
							<div class="form-group col-md-8">
							<input type="password" class="form-control" id="password" placeholder="Mật khẩu mới" name="password" required>
							<!-- <input type="text" name="role" value="member" > -->
						</div>
							<div class="row">
								<div class="col-md-4">
								
								<center><input type="submit" class="btn btn-success" value="Đăng kí"></center>	
								</div>
							</div>
							<p>Nếu bạn đã có tài khoản hãy bấm vao đây để đăng nhập<a href="dangnhap.php">Đăng nhập!!!</a></p>
							
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>	
	</div>
</body>
</html>