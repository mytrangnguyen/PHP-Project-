
<?php
    //include "../header.php";
    include "connect.php";
    $idcategory;
    if(isset($_GET["cat_id"])) 
    {
        $idcategory = $_GET["cat_id"];
    } 
    if (isset($_POST["update"])) 
    {
    
        //Lấy dữ liệu từ form;
        $cat_name = $_POST["cat_name"];
        $description = $_POST["description"];
        updatecategory($connect,$cat_name,$description,$idcategory);   
        header('Location:trangCategory.php'); 
    }
    function insert_category($connect,$cat_name,$description)
    {
        if(mysqli_select_db($connect,'sale_management'))
        {
            $sql = "INSERT INTO Categories (cat_name,description)
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
        }
    }
    function updatecategory($connect, $cat_name, $description, $cat_id)
    {
        if(mysqli_select_db($connect,'sale_management'))
        {
            $sql = "UPDATE Categories 
                    SET cat_name = '$cat_name' , description ='$description' 
                    WHERE cat_id = '$cat_id' ";
            
            if ($connect->query($sql) === TRUE) 
            {
                    echo "Udate successfully";
            } else {
                    echo "Error: " . $sql . "<br>" . $connect->error;
                }
                    mysqli_close($connect); 
        }
    }

    function getcategory($idcategory)
    {
        global $cat_name,$description;
        $connect = mysqli_connect("localhost","root","","sale_management");
        mysqli_set_charset($connect,"utf8");
        $result=mysqli_query($connect,"SELECT * FROM Categories WHERE cat_id = $idcategory");
        $count=mysqli_num_rows($result);
        if($count > 0)
        {
            $row = $result->fetch_assoc();
            $cat_name = $row["cat_name"];
            $description = $row["description"];
        }  
     
    }
    global $idcategory;
    getcategory($idcategory);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Category</title>
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
                <h1>Update category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-left: 300px">
                <form role="form" method = "post" action = ""  enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for= categoryname" class="loginFormElement">Name category:</label>
                        <input class="form-control" id="categoryname" type="text" name = "cat_name" value = "<?php echo $cat_name?>" >
                    </div>
                    
                    <div class="form-group">
                        <label for="categorydes" class="loginFormElement">Description</label>
                        <input class="form-control" id="categorydes"name = "description" value = "<?php echo $description ?>">
                    </div>
                    
                    <br>
                    <button  type="submit" name = "update" class="btn btn-success">Save</button>
                    <a href="trangCategory.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>