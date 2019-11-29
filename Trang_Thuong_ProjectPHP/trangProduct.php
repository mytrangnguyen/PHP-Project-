<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1250px;
            margin: 0 auto;
            margin-left: 10px;
            margin-right: 10px;
        }
        .page-header h2{
            margin-top: 0;
        }
        th,td{
             width: 30px;
        }
        table tr td:last-child a{
            margin-right: 15px;
            
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <?php 
    include('indexQK.php');
    include('connect.php');
     ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="margin-left: 10px">Products Details</h2>
                        <a href="insertProduct.php" class="btn btn-success pull-right" style="margin-right: 100px">Add New Product</a>
                    </div>
                    <?php
                    // Include config file
                    //require_once "connection.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM PRODUCTS";
                    if($result = mysqli_query($connect, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Cate ID</th>";
                                        echo "<th>Supp Price</th>";
                                        echo "<th>Sell Price</th>";
                                        echo "<th>Sale Price</th>";
                                        echo "<th>Quantity</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Import Date</th>";
                                        echo "<th>Note</th>";
                                        echo "<th>Image</th>";
                                        echo "<th>Action</th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($row = mysqli_fetch_array($result)){
                                    
                                    echo "<tr>";
                                        echo "<td>" . $row['prod_id'] . "</td>";
                                        echo "<td>" . $row['prod_name'] . "</td>";
                                        echo "<td>" . $row['cat_id'] . "</td>";
                                        echo "<td>" . $row['sup_price'] . "</td>";
                                        echo "<td>" . $row['sell_price'] . "</td>";
                                        echo "<td>" . $row['sale_price'] . "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['imported_date'] . "</td>";
                                        echo "<td>" . $row['note'] . "</td>";
                                        $image = $row['image'];
                                        echo "<td>" ."<img hight ='100px' wight ='100px' src='$image' >". "</td>";
                                        
                                        // echo "<td>" . 
                                        echo "<td>";
                                            echo "<a href='viewProduct.php?prod_id=". $row['prod_id'] ."' title='View Product' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='updateProduct.php?prod_id=". $row['prod_id'] ."' title='Update Product' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deleteProduct.php?prod_id=". $row['prod_id'] ."' title='Delete Product' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
                    }
 
                    // Close connection
                    mysqli_close($connect);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

