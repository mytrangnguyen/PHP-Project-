<?php
include "connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        //upload image
        
        //Lấy dữ liệu từ form;
        $cat_name = $_POST["cat_name"];
        $description = $_POST["description"];
        insert_product($connect,$cat_name,$description);
        header('Location:trangCategory.php');
    }
   
    function insert_product($connect,$cat_name,$description)
    {
        if(mysqli_select_db($connect, 'sale_management'))
        {
            $sql = "INSERT INTO CATEGORIES (cat_name,description)
            VALUES ('$cat_name','$description')";
            
            if ($connect->query($sql) === TRUE) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
                mysqli_close($connect); 
        }else echo "Cos lỗi";
    }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create category</title>
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
                    <label for="productname" class="loginFormElement">Name category:</label>
                    <input class="form-control" id="categoryname" type="text" name = "cat_name">
                </div>
                <div class="form-group">
                    <label for="productprice" class="loginFormElement">Description </label>
                    <input class="form-control" id=categorydes"  name = "description">
                </div>
                
                <br>
                <button type="submit" name= "submit" value = "submit" id="loginSubmit" class="btn btn-success loginFormElement">
                Add Category
                </button>
                        <a href="trangCategory.php" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>