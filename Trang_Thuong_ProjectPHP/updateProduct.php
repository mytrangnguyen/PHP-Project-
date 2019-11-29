
<?php
    //include "../header.php";
    include "connect.php";
    $idProduct;
    if(isset($_GET["prod_id"])) 
    {
        $idProduct = $_GET["prod_id"];
    } 
    if (isset($_POST["update"])) 
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
        updateproduct($connect,$prod_name,$cat_id,$sup_price,$sell_price,$sale_price,$quantity,$status,$imported_date,$note,$image,$idProduct);   
        header('Location:trangProduct.php'); 
    }
    function insert_product($connect,$prod_name,$cat_id,$sup_price,$sell_price,$sale_price,$quantity,$status,$imported_date,$note,$image)
    {
        if(mysqli_select_db($connect,'sale_management'))
        {
            $sql = "INSERT INTO products (prod_name,cat_id,sup_price,sell_price,sale_price,quantity,status,imported_date,note,image)
            VALUES ('$prod_name','$cat_id','$sup_price','$sell_price','$sale_price','$quantity','$status','$imported_date','$note','$image')";
            
            if ($connect->query($sql) === TRUE) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
                mysqli_close($connect); 
        }
    }
    function updateproduct($connect,$prod_name,$cat_id,$sup_price,$sell_price,$sale_price,$quantity,$status,$imported_date,$note,$image,$prod_id)
    {
        if(mysqli_select_db($connect,'sale_management'))
        {
            $sql = "UPDATE products 
                    SET prod_name = '$prod_name' ,cat_id ='$cat_id', 
                        sup_price = '$sup_price', sell_price='$sell_price',sale_price='$sale_price', quantity = '$quantity', status = '$status',
                        imported_date = '$imported_date' ,note = '$note', image = '$image' 
                    WHERE prod_id = '$prod_id'";
            
            if ($connect->query($sql) === TRUE) 
            {
                    echo "Udate successfully";
            } else {
                    echo "Error: " . $sql . "<br>" . $connect->error;
                }
                    mysqli_close($connect); 
        }
    }

    function getproduct($idProduct)
    {
        global $prod_name,$cat_id,$sup_price,$sell_price,$sale_price,$quantity,$status,$imported_date,$note,$image;
        $connect = mysqli_connect("localhost","root","","sale_management");
        mysqli_set_charset($connect,"utf8");
        $result=mysqli_query($connect,"SELECT * FROM products WHERE prod_id = $idProduct");
        $count=mysqli_num_rows($result);
        if($count > 0)
        {
            $row = $result->fetch_assoc();
            $prod_name = $row["prod_name"];
            $cat_id = $row["cat_id"];
            $sup_price = $row["sup_price"];
            $sell_price = $row["sell_price"];
            $sale_price = $row["sale_price"];
            $quantity = $row["quantity"];
            $status = $row["status"];
            $imported_date = $row["imported_date"];
            $note = $row["note"];
            $image = $row["image"];
        }  
     
    }
    global $idProduct;
    getproduct($idProduct);
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
                <h1>Update Product</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-left: 300px">
                <form role="form" method = "post" action = ""  enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="productname" class="loginFormElement">Name Product:</label>
                        <input class="form-control" id="productname" type="text" name = "prod_name" value = "<?php echo $prod_name?>" >
                    </div>
                    <div class="form-group">
                        <label for="productname" class="loginFormElement" >Category:</label>
                        <select class="form-control" id="productSelect" placeholder = "cat_id" name = "cat_id">
                            <?php 
                            $connect = mysqli_connect("localhost","root","","sale_management");
                            mysqli_set_charset($connect,"utf8");
                            $result=mysqli_query($connect,"SELECT * FROM categories");
                            $count=mysqli_num_rows($result);
                            if($count > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "<option  value='$row[cat_id]' ";
                                    if( $cat_id==$row['cat_id'])
                                    {
                                        echo "selected";
                                    } 
                                    echo ">$row[cat_name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productprice" class="loginFormElement">Price</label>
                        <input class="form-control" id="productprice"  name = "sup_price" value = "<?php echo $sup_price ?>">
                    </div>
                    <div class="form-group">
                        <label for="productprice" class="loginFormElement">Price</label>
                        <input class="form-control" id="productprice"  name = "sell_price" value = "<?php echo $sell_price ?>">
                    </div>
                    <div class="form-group">
                        <label for="productprice" class="loginFormElement">Price</label>
                        <input class="form-control" id="productprice"  name = "sale_price" value = "<?php echo $sale_price ?>">
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Quantity</label>
                        <input id="productdescription" class="form-control input-lg"  type="text" name = "quantity" value = "<?php echo $quantity?>">
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Status</label>
                        <input id="productdescription" class="form-control input-lg"  type="text" name = "status" value= "<?php echo  $status?>">
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Imported_date</label>
                        <input id="productdescription" class="form-control input-lg"  type="date" name = "imported_date" value = "<?php echo  $imported_date?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Product Description</label>
                        <input id="productdescription" class="form-control input-lg"  type="text" name = "note" value = "<?php echo $note?>">
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Product Image</label>
                        <img src = "<?php echo $image?> " name ="avata" alt="Smiley face" height="100" wclassth="100" > 
                        <input type="file" name="image" id="fileToUpload" value = "<?php echo $image?>">
                    </div>
                    <br>
                    <button  type="submit" name = "update" class="btn btn-success">Save</button>
                    <a href="trangProduct.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>