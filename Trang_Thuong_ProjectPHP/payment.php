<?php
//include('function.php');
//session_start();
     include('header.php');

    function insert_orders($cus_id,$address)
    {
        global $connect;
        $sql = "INSERT INTO orders(id_user, order_date,ship_address)
        VALUES ('$cus_id',current_date(),'$address')";
    
        if ($connect->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }
            mysqli_close($connect);   
    }

    function update_quantity_prod($id_prod,$soLuong){
        global $connect;
        $sql1="UPDATE products SET quantity = '".$soLuong."' 
        WHERE prod_id='".$id_prod."'";
        if ($connect->query($sql1)===TRUE) {
            return 1;
        } else{
            return 0;
        }
    }
    

    function insert_prod_orders($order_id,$prod_id,$quantity)
    {
        global $connect;
        $sql = "INSERT INTO prod_orders(ord_id,prod_id,quantity)
        VALUES ('$order_id','$prod_id','$quantity')";
    
        if ($connect->query($sql) === TRUE) {
            return 1;
         } else {
       return 0;
         }
             mysqli_close($connect); 
    }

    //insert_prod_orders(0,1,12);
   
    
    //echo $_SESSION["email"];
    if(isset($_SESSION["email"],$_SESSION["cart"]) )
    {
        $sql = "SELECT * FROM users Where email = '$_SESSION[email]'";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();
        //$orderID=0;
        if ($result->num_rows > 0) 
        {
            $cus_id = $row['id_user'];
            $address = $_POST['diachi'];
            if (insert_orders($cus_id,$address)) {
                $orderID = $connect->insert_id;
                $error_insert_order = 0;
                foreach($_SESSION["cart"]as $key=>$product){
                    insert_prod_orders($orderID,$product["array_result"]['prod_id'],$product["so_luong"]);
                    $error_insert_order++;
                    $current_quantity=$product["array_result"]['quantity']-$product["so_luong"];
                    update_quantity_prod($product["array_result"]['prod_id'],$current_quantity);
                    //echo $current_quantity;
                }
            if($error_insert_order!=0)
            {
                unset($_SESSION['cart']);
  
   header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
                
            }
        }
    }
    else
    {
        echo "<script>alert('Vui lòng đăng nhập trước khi mua hàng!');</script>";
        echo "<a href = 'dangnhap.php'>Click vào đây để đăng nhập</a>";
    }
    include('footer.php');
   

?>
