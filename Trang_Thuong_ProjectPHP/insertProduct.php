<?php
include "connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        //upload image
        $target_dir = "Image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        //Lấy dữ liệu từ form;
        $prod_name = $_POST["prod_name"];
        $cat_id = $_POST["cat_id"];
        $sup_price = $_POST["sup_price"];
        $sell_price = $_POST["sell_price"];
        $sale_price = $_POST["sale_price"];
        $quantity = $_POST["quantity"];
        $status = $_POST["status"];
        $imported_date = $_POST["imported_date"];
        $note = $_POST["note"];
        $image = $target_file;
        insert_product($connect,$prod_name,$cat_id,$sup_price,$sell_price, $sale_price,$quantity,$status,$imported_date,$note,$image);
         header('Location:trangProduct.php'); 
    }
   
    function insert_product($connect,$prod_name,$cat_id,$sup_price,$sell_price,$sale_price,$quantity,$status,$imported_date,$note,$image)
    {
        if(mysqli_select_db($connect, 'sale_management'))
        {
            $sql = "INSERT INTO PRODUCTS (prod_name,cat_id,sup_price, sell_price, sale_price,quantity,status,imported_date,note,image)
            VALUES ('$prod_name','$cat_id','$sup_price', '$sell_price','$sale_price','$quantity','$status','$imported_date','$note','$image')";
            
            if ($connect->query($sql) === TRUE) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
                mysqli_close($connect); 
        }else echo "Cso lỗi";
    }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php 
    require_once "indexQK.php";
     ?>

     <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Add Product</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" style="margin-left: 300px">
            <form role="form" method = "post" action = ""  enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="productname" class="loginFormElement">Name Product:</label>
                    <input class="form-control" id="productname" type="text" name = "prod_name">
                </div>
                <div class="form-group">
                        <label for="productname" class="loginFormElement" >Category:</label>
                        <select class="form-control" id="productSelect" placeholder = "cat_id" name = "cat_id">
                            <?php 
                            $connect = mysqli_connect("localhost","root","","sale_management");
                            mysqli_set_charset($connect,"utf8");
                            $result=mysqli_query($connect,"SELECT * FROM CATEGORIES");
                            $count=mysqli_num_rows($result);
                            if($count > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "<option  value='$row[cat_id]'>$row[cat_name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="productprice" class="loginFormElement">Price supp </label>
                    <input class="form-control" id="productprice"  name = "sup_price">
                </div>
                <div class="form-group">
                    <label for="productprice" class="loginFormElement">Price sell</label>
                    <input class="form-control" id="productprice"  name = "sell_price">
                </div>
                <div class="form-group">
                    <label for="productprice" class="loginFormElement">Price sale</label>
                    <input class="form-control" id="productprice"  name = "sale_price">
                </div>
                <div class="form-group">
                    <label class="loginformelement" for="productdescription">Quantity</label>
                    <input id="productquantity" class="form-control input-lg"  type="text" name = "quantity">
                </div>
                <div class="form-group">
                    <label class="loginformelement" for="productdescription">Status</label>
                    <input id="productstatus" class="form-control input-lg"  type="number" min="0" max="1" name = "status">
                </div>
                <div class="form-group">
                    <label class="loginformelement" for="productdescription">Imported_date</label>
                    <input id="productdate" class="form-control input-lg"  type="date" name = "imported_date">
                </div>
                <div class="form-group">
                    <label class="control-label">Product Description</label>
                    <input id="productdescription" class="form-control input-lg"  type="text" name = "note">
                </div>
                <div class="form-group">
                    <label class="loginformelement" for="productdescription">Product Image</label>
                    <img src = "<?php echo  $target_file?> " name ="avata" alt="Smiley face" height="100" wclassth="100"> 
                    <input type="file" name="image" id="fileToUpload" >
                </div>
                <br>
                <button type="submit" name= "submit" value = "submit" id="loginSubmit" class="btn btn-success loginFormElement">
                Add Product
                </button>
                        <a href="trangProduct.php" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>