<?php
	include('connect.php');
 

function update_favorite_product($user_id,$pro_id){
	global $connect;

	$sql = "UPDATE  products SET favorite =  $user_id WHERE prod_id=$pro_id";
 
	if ($connect->query($sql)===TRUE) {
	 	return true;
	 } 
	 else {return false; exit();}
}
function insert_comments($pro_id,$id_user,$cmt){
	global $connect;
	 
	$sql = "INSERT INTO comments(id_user,prod_id,comment) value($id_user,$pro_id,'".$cmt."')";
	if ($connect->query($sql)===TRUE) {
	 	return $pro_id;
	 } 
	 else {return false; exit();}
}
//load comment function
function load_comment($id){
	global $connect; 
 
	 
	$sql = "SELECT * FROM comments INNER JOIN products 
	ON comments.prod_id = products.prod_id
	INNER JOIN users 
	ON comments.id_user = users.id_user
	WHERE comments.prod_id ='".$id."'"; //laasys thông tin người cmt
	$result = $connect->query($sql);
	$product=[];
	while ($row = $result->fetch_assoc()){
	 	$product[]=$row;
	} 
	return $product;
}
//end load comment


function favorite_product($id_user){
	global $connect; 
	$product = array();
	$sql = "SELECT * FROM products WHERE favorite='".$id_user."'";
		$result = $connect->query($sql);
		while ($row = $result->fetch_assoc()) {
			 $product[]=$row;
		}
		return $product;
}

function show_favorite_product($id_user){
	global $connect;
	 

	$product= favorite_product( $id_user);

	echo'				
		<div class="sanpham col-xs-6 col-sm-6 col-md-6 col-lg-4 " style="padding-left: 37px; ">
		<p><br/></p>
		
			<div class="col-xs-12 zoomImage ">
				<img src="'.$product[0].' " height="300px " width="300px " class=" image-link display-flex " title="'.$product[1].'">
			</div>
			<div class="col-xs-12"> <p style=" text-align:center;margin-left: -90px;">
				 ';
				 	if ($product[3]=='') {
				 		echo $product[2].'</p>';
				 	}
				 	else {
				 		echo '<strike style="color:red">'.$product[2].'</strike> - ';
				 		echo  '</span >'.$product[3].'</span> ';
				 	}
				 
		echo '	</div>
			<div class="col-xs-12 " style="margin-left: 10px;">
				
				<button type="button " class="btn btn-default click_add_cart" data-id="'.$prod_id.'" style=" background-color: #80bb35; ">Thêm vào giỏ hàng</button>
				<form method="POST" action="chitiet.php">
					<button type="submit" class="btn btn-default" title="Chi tiết sản phẩm" style="margin-left: 155px;
    margin-top: -55px;"><img src="image/view.png"></button>
					<button data-id="'.$_SESSION['id_user'].'" data-product_id="'.$prod_id.'"  type="button" class="btn btn-default click_add_favorite" title="Chi tiết sản phẩm" style=" 
    margin-top: -55px;';
    if ($_SESSION['id_user']==$product[5]) {
    	# code...
    	echo 'color:red;';
    }
    echo ' "> <span class="glyphicon glyphicon-heart"></span></button>

					<input type="text" name="id" style="display: none" size="1" value="'.$prod_id.'">
				</form>
			</div>
			
		</div>';
}



function showProduct($prod_id){
	global $connect;
	$img=$prod_name=$prod_price=$prod_sale="";
	$product = array();
	$sql = "SELECT * FROM products WHERE prod_id='".$prod_id."'";
		$result = $connect->query($sql);
		while ($row = $result->fetch_assoc()) {
			$img=$row['image'];
			$prod_name=$row['prod_name'];
			$prod_price=$row['sell_price'];
			$prod_sale=$row['sale_price'];
			$view =$row['views'];
			$favorite =$row['favorite'];
			array_push($product, $img,$prod_name,$prod_price,$prod_sale,$view,$favorite);
		}
		return $product;
	}

		function showPR($connect,$prod_id){
	 

	$product= showProduct( $prod_id);

	echo'				
		<div class="sanpham col-xs-6 col-sm-6 col-md-6 col-lg-4 " style="padding-left: 37px; ">
		<p><br/></p>
		
			<div class="col-xs-12 zoomImage ">
				<img src="'.$product[0].' " height="300px " width="300px " class=" image-link display-flex " title="'.$product[1].'">
			</div>
			<div class="col-xs-12"> <p style=" text-align:center;margin-left: -90px;">
				 ';
				 	if ($product[3]=='') {
				 		echo $product[2].'</p>';
				 	}
				 	else {
				 		echo '<strike style="color:red">'.$product[2].'</strike> - ';
				 		echo  '</span >'.$product[3].'</span> ';
				 	}
				 
		echo '	</div>
			<div class="col-xs-12 " style="margin-left: 10px;">
				
				<button type="button " class="btn btn-default click_add_cart" data-id="'.$prod_id.'" style=" background-color: #80bb35; ">Thêm vào giỏ hàng</button>
				<form method="POST" action="chitiet.php">
					<button type="submit" class="btn btn-default" title="Chi tiết sản phẩm" style="margin-left: 155px;
    margin-top: -55px;"><img src="image/view.png"></button>

					<button style="    margin-top: -55px;" data-id="';
					if (isset($_SESSION['id_user'])) {
						echo $_SESSION['id_user'];
					}echo'" data-product_id="'.$prod_id.'"  type="button" class="btn btn-default click_add_favorite  ';
					 if ($_SESSION['id_user']==$product[5]) {
    					echo 'red " ';
    				}

					echo 'style=" margin-top: -55px;';
    				if (isset($_SESSION['id_user'])&&$_SESSION['id_user']==$product[5]) {
    					echo 'color:red;';
    				}
    				echo ' " title="Chi tiết sản phẩm"> <span class="glyphicon glyphicon-heart"></span></button>
					<input type="text" name="id" style="display: none" size="1" value="'.$prod_id.'">
				</form>
			</div>
			
		</div>';
}

function showImageBanner($connect,$img_id){
	$img="";
	$imageArr = array();
	$sql= "SELECT * FROM img_banner WHERE id='".$img_id."'";
	$result = $connect->query($sql);
	while ($row = $result->fetch_assoc()) {
		$image=$row['img'];
		echo '<img src="'.$image.'" alt="#" style="width: 100%; height: 400px;">';
	
}
}
	

	function showProductCat($id_cat,$sale_prices=null,$parent_cat=''){ 
		global $connect;

		$sql = "SELECT * FROM products ";
		 if(!empty($id_cat)){
		 	if(empty($parent_cat)){
		 		if($id_cat==1){
			 		$sql .=" WHERE cat_id IN(1,3)";
			 	}else	if($id_cat==2){
			 		$sql .=" WHERE cat_id IN(2,4)";
			 	}
		 	}else{
			 	$sql .=" WHERE cat_id = '".$id_cat."' ";
			}
		 	
		 	
		 } 
		if (!empty($sale_prices)) { 
			 
			$sql .= " AND sale_price != '' ";
			 
		}
	 	$sql .= " LIMIT  6 ";
			 $result = $connect->query($sql);

		if( $result->num_rows==0){
			echo '<p style="text-align:center"> không tìm thấy sản phẩm <p>';
			die();
		}
		while ($row = $result->fetch_assoc()) {
		 	$res[] = $row;
		} 
		return $res;

	}



	function getById($id){
		global $connect;
		$sql = "SELECT * FROM products WHERE prod_id='".$id."'";
		 $result = $connect->query($sql);
		 $row = $result->fetch_assoc();
		 return $row;
	}

	//hàm giỏ hàng
	function shopping_cart($id,$array_result,$quantity=''){
		
		$array_cart = (isset($_SESSION['cart']))?$_SESSION['cart']:'';
		// kiểm tra cart có tồn tại trong mảng không

		$quantity = (empty($quantity))?1:$quantity;
		//nếu không tồn tại thì thêm mảng mới
		if(empty($array_cart)){
			$array_cart = array(
				$id=>array('array_result'=>$array_result,'so_luong'=>$quantity)
			);
			
		}

		//nếu tồn tại
		else{ 
			 
			  //neu ko ton tai san pham. nhung co mang, them sanp vao mang
			if(!array_key_exists($id, $array_cart)){ 
				$array_cart[$id]=array('array_result'=>$array_result,'so_luong'=>$quantity);
			 }
			  ///nếu tồn tại sản phẩm có cùng id thì chỉ tăng số lượngx
			 else{ 
			 	$array_cart[$id]['so_luong'] +=1;
			 }
 
		}

		/// thêm mảng cart vào session 
		 $_SESSION['cart'] = $array_cart;	

		// in số lượng sản phẩm đã được thêm vào giỏ
		return count($_SESSION['cart']);
	}



		function showProPrice($filter,$orderBy){
		global $connect;
	 
		$product = array();
		$sql = "SELECT * FROM products ";
		if(!empty($filter) &&  !empty($orderBy)){
			$sql.=" ORDER BY $filter $orderBy";
		}
			$result = $connect->query($sql);
			while ($row = $result->fetch_assoc()) {
				$prod_id=$row['prod_id'];
				$img=$row['image'];
				$prod_name=$row['prod_name'];
				$prod_price=$row['sell_price'];
				$prod_sale=$row['sale_price'];

				array_push($product,array($prod_id, $img,$prod_name,$prod_price,$prod_sale));
			}
		return $product;
	}
?>