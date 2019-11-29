<?php
include('connect.php');
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(is_password_correct($connect,$_POST['email'],$_POST['password'])=="admin"){
    //$_SESSION['email']=$_POST['email'];
    header('Location: admin.php');
    } 
  else if(is_password_correct($connect,$_POST['email'],$_POST['password'])=="quankho") { 
     header('Location: trangProduct.php');
  }
  else if(is_password_correct($connect,$_POST['email'],$_POST['password'])=="member") {
  
   if(isset($_GET['id'])&&intval($_GET['id'])){
      header('Location: chitiet.php?id='.$_GET['id']);
      exit();
   }
    header('Location: index.php');
  }
  else{
    echo "<div style='margin-left:600px; color:red;'><p>Mật khẩu hoặc email của bạn chưa đúng</p></div>";
  }

}
   

function is_password_correct($connect,$email,$password){
  $sql = "SELECT * FROM users WHERE email='".$email."' LIMIT 1";
  $result = $connect->query($sql);
  $role="";
  $row = $result->fetch_assoc();
  if($row){
    if(password_verify($password, $row['password']) && $row['role']=="admin")
    {
      $role="admin";
      return $role;
    }
    else if (password_verify($password, $row['password']) && $row['role']=="quankho") {
      $role = "quankho";
      return $role;
    }
    else if (password_verify($password, $row['password']) && $row['role']=="member") {
      $role = "member";
       $_SESSION['email']=$row['email'];
       $_SESSION['id_user']=$row['id_user'];
      return $role;
    }
    else {
      return false;
    }
  }
}
 
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/test.css">
  <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
</head>
<body>
  <form method="POST">
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
            <h4>Đăng nhập tài khoản</h4>
          <div class="col-md-3">Email</div>
            <div class="form-group col-md-8">
              <input type="text" class="form-control" id="email" placeholder="Email" name="email">
            </div>

          <div class="col-md-3">Mật khẩu</div>
            <div class="form-group col-md-8">
            <input type="password" class="form-control" id="password" placeholder="Mật khẩu mới" name="password">
            </div>
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-success" onclick="">Đăng nhập</button>
              </div>
            </div>
            <p>Nếu bạn chưa có tài khoản hãy bấm vao đây để đăng kí <a href="dangki.php">Đăng kí!!!</a></p>
        </div>
      </div>
      <div class="col-md-2">
       
      </div>
                </div>
             </div>
           </div>
        </div>
</form>
</body>
</html>