<?php include('connect.php');?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
echo $_POST['role'].$_POST['edit'];

  if (isset($_POST['delete'])) {
    $sql1="DELETE FROM users WHERE id_user=".$_POST['edit']."";
      if (mysqli_query($connect, $sql1)) {
        echo("Bạn đã xóa thành công");
      }else{
        echo "Bạn không thể xóa được rồi";
      }
  }

  if (mysqli_select_db($connect,"sale_management")) {
    $sql1="UPDATE users
          SET role = '".$_POST['role']."' 
          WHERE id_user='".$_POST['edit']."'";

  if ($connect->query($sql1)===TRUE) {
      echo "sBang dc roi ne ";
      header('Location: admin.php');
    }else{
      echo "Bang ko dc roi T-T";
    }
  }
?>
</body>
</html>