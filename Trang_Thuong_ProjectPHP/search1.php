<?php
include_once 'header.php';
include_once('connect.php');
$output = '';
if(isset($_POST['search1'])){
	$q = $_POST['q'];
	$query = mysqli_query($connect,"SELECT * FROM `products` WHERE `prod_name` LIKE '%$q%' OR `sell_price` LIKE '%$q%' LIMIT 9"); 
	$count = mysqli_num_rows($query);
	
	if($count == "0"){
		$output = '<h2>No result found!</h2>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$prod_name = $row['prod_name']; 
		$sell_price = $row['sell_price'];
		$prod_id = $row['prod_id'];
		$sale_price = $row['sale_price'];
		$image = $row['image'];

				echo'				
					<div class="sanpham col-xs-6 col-sm-6 col-md-6 col-lg-4 " style="padding-left: 37px; ">
					<p><br/></p>
		
					<div class="col-xs-12 zoomImage ">
						<img src="'.$image.' " height="300px " width="300px " class=" image-link display-flex " title="'.$prod_name.'">
					</div>
					<div class="col-xs-12"> <p style=" text-align:center;margin-left: -90px;">
						 ';
						 	if ($sale_price=='') {
				 		echo $sell_price.'</p>';
				 	}
				 	else {
				 		echo '<strike style="color:red">'.$sell_price.'</strike> - ';
				 		echo  '</span >'.$sale_price.'</span> ';
				 	}
				 
				echo '	</div>
					<div class="col-xs-12 " style="margin-left: 10px;">
						
						<button type="button " class="btn btn-default click_add_cart" data-id="'.$prod_id.'" style=" background-color: #80bb35; ">Thêm vào giỏ hàng</button>
						<form method="POST" action="chitiet.php">
							<button type="submit" class="btn btn-default" title="Chi tiết sản phẩm" style="margin-left: 155px;
		    margin-top: -55px;"><img src="image/view.png"></button>
							<input type="text" name="id" style="display: none" size="1" value="'.$prod_id.'">
						</form>
					</div>
					
				</div>';

			}
		}
	}
include_once 'footer.php';
?>


