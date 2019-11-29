<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="col-md-12">
        <?php if(empty($_SESSION['cart'])){
      
         echo "<h3><center>cảm ơn bạn đã tin tưởng và đặt hàng</center></h3>";
    }else{ ?>
    <center><form method="POST" action="payment.php">
    <h4 style="color: red"><marquee width="30%">Mời bạn nhập địa chỉ để nhận hàng</marquee></h4>
    Địa chỉ   <input type="text" name="diachi" required>
    <input type="submit" name="thanhtoan" value="Thanh toán" class="btn btn-success" >
    </form></center>
<?php } ?>
    </div>
    <?php include('footer.php'); ?> 
    
</body>
</html>