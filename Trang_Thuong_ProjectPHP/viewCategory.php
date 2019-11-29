<?php
// Check existence of id parameter before processing further
if(isset($_GET["cat_id"]) && !empty(trim($_GET["cat_id"]))){
    // Include config file
    require_once "connect.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM Categories WHERE cat_id = ?";
    
    if($stmt = mysqli_prepare($connect, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["cat_id"]);
        
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
                $cat_name = $row["cat_name"];
                $description = $row["description"];
                
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
    <title>View Category</title>
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
                <h1>View Category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-left: 300px">
                <form role="form" method = "post" action = ""  enctype="multipart/form-data" >
                     <div class="form-group">
                        <label for="productname" class="loginFormElement">Name Category:</label>
                        <input class="form-control" id="namecategory" type="text" name = "cat_name" value = "<?php echo $row["cat_name"]?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="productname" class="loginFormElement">Description Category:</label>
                        <input class="form-control" id="descriptioncategory" type="text" name = "description" value = "<?php echo $row["description"]?>" readonly >
                    </div>
                   
                    <br>
                    <!-- <button  type="submit" name = "update" class="btn btn-success">Save</button> -->
                    <a href="trangCategory.php" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
</body>
</html>