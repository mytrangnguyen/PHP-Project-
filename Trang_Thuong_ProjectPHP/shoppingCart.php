
<div class="container-fluid">
	<?php include('header.php'); ?>
    <div class="col-md-12">
    <center><h1>Thanh Toán</h1></center>
    <table class='table ' style='width:1150px;margin-left: 63px;'>
        <thead>
            <tr class='info'>
                <!-- <th>No. </th> -->
                <th>Tên </th>
                <th>Số Lượng </th>
                <th>Giá </th>
                <th>Thành Tiền</th>
                <th>Hành Động </th>
            </tr>
        </thead>
        <tbody> 
            
            <?php 
                if(isset($_SESSION["cart"]))
                { 
                    $current_url = base64_encode($_SERVER['REQUEST_URI']);
                    $total = 0;
                    echo '<form method="post">';
                    echo '<ul>';
                    $item = 0;
                    foreach ($_SESSION["cart"] as $key=>$item)
                    {
                        // chỉnh giá theo giảm gias
                        $product_id = $item["array_result"]["prod_id"];
                        
                        if ($item["array_result"]["sale_price"]=="") {
                            $total +=$item["so_luong"]*$item["array_result"]["sell_price"];
                        } else{
                             $total +=$item["so_luong"]*$item["array_result"]["sale_price"];
                        }
                       
            ?>
                        <tr class='success'>
                        <td><?php echo $item["array_result"]["prod_name"]?></td>
                        <td><?php echo $item["so_luong"]?></td>

                        <?php if ($item["array_result"]["sale_price"]=="") { ?>
                            <td><?php echo number_format(  $item["array_result"]["sell_price"],0,'.','.');  ?></td>   
                            <td><?php echo number_format( $item["so_luong"]*$item["array_result"]["sell_price"],0,'.','.');  ?></td>

                        <?php } else{?>

                        <td><?php echo number_format(  $item["array_result"]["sale_price"],0,'.','.');  ?></td>   
                        <td><?php echo number_format( $item["so_luong"]*$item["array_result"]["sale_price"],0,'.','.');  ?></td>
                        <?php } ?>                   
                        <td>
                            <a href="removeCart.php?id=<?php echo $key ?>">
                                 Xóa
                            </a>
                        </td>
                        </tr>
            <?php
                    }
                }
                else{
                    $total = 0;
                    echo 'Giỏ hàng trống';
                }
            ?>
            <tr class='success' >
                 <th colspan="3" style="text-align: right;">Tổng tiền:</th>
                <th  ><?php echo number_format($total,0,'.','.') ?> đ</th>
                <td><a href="cart_update.php?emptycart=1&return_url=<?php echo $current_url?>">Xóa tất cả</a></td>
            </tr>      
        </tbody>
    </table>
   <!--  <form method = "post" action="payment.php">
        <button type="submit" name = "submit"class="btn btn-success">Thanh Toán</button>
    </form> -->
    <center><a href="diachi.php" style="text-decoration: none;">Đặt hàng</a></center>
</div>
    <?php include('footer.php') ?>
    
</div>

</body>
</html>
