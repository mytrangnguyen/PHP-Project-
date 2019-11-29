<?php
// Check existence of id parameter before processing further
if(isset($_GET["prod_id"]) && !empty(trim($_GET["prod_id"]))){
    // Include config file
    require_once "connect.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM PRODUCTS WHERE prod_id = ?";
    
    if($stmt = mysqli_prepare($connect, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["prod_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // $target_dir = "Image/";
                //  $target_file = $target_dir . basename($_FILES["image"]["name"]);
                
                // Retrieve individual field value
                $prod_name = $row["prod_name"];
                $cat_id = $row["cat_id"];
                $sup_price = $row["sup_price"];
                $sell_price = $row["sell_price"];
                $sale_price = $row["sale_price"];
                $quantity = $row["quantity"];
                $status = $row["status"];
                $import_date = $row["imported_date"];
                $note = $row["note"];
                $image = $row["image"];
                // $image = $target_file;
                
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($connect);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            
            width: 500px;
            margin: 0 auto;
        }
        .container{
            float: center;

        }
    </style>
</head>
<body>
    <?php 
    require_once "indexQK.php";
     ?>
    <!--  -->

<div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>View Product</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-left: 300px">
                <form role="form" method = "post" action = ""  enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="productname" class="loginFormElement">Name Product:</label>
                        <input class="form-control" id="productname" type="text" name = "prod_name" value = "<?php echo $row["prod_name"]?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="productname" class="loginFormElement" >Category:</label>
                         <input class="form-control" id="productname" type="text" name = "prod_name" value = "<?php echo $row["cat_id"]?>"readonly >
                    </div>
                    <div class="form-group">
                        <label for="productprice" class="loginFormElement"> Supp Price</label>
                        <input class="form-control" id="productprice"  name = "sup_price" value = "<?php echo $row["sup_price"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="productprice" class="loginFormElement">Sell Price</label>
                        <input class="form-control" id="productprice"  name = "sell_price" value = "<?php echo $row["sell_price"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="productprice" class="loginFormElement">Sale Price</label>
                        <input class="form-control" id="productprice"  name = "sale_price" value = "<?php echo $row["sale_price"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Quantity</label>
                        <input id="productdescription" class="form-control input-lg"  type="text" name = "quantity" value = "<?php echo $row["quantity"]?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Status</label>
                        <input id="productdescription" class="form-control input-lg"  type="text" name = "status" value= "<?php echo  $row["status"]?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Imported_date</label>
                        <input id="productdescription" class="form-control input-lg"  type="text" name = "imported_date" value = "<?php echo   $row["imported_date"]?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Product Description</label>
                        <input id="productdescription" class="form-control input-lg"  type="text" name = "note" value = "<?php echo $row["note"]?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="loginformelement" for="productdescription">Product Image</label>
                        <img src = "<?php echo $image?> " name ="avata" height="200" wclassth="200" readonly>
                        <!-- <input type="file" name="image" id="fileToUpload" value = "<?php// echo $row["image"]?>" readonly> -->
                    </div>
                    <br>
                    <!-- <button  type="submit" name = "update" class="btn btn-success">Save</button> -->
                    <a href="trangProduct.php" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
</body>
</html>