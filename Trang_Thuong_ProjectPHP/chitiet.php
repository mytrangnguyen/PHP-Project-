	<?php include('header.php'); ?>

<?php
 	function showViewPro($prod_id){
	global $connect;
	$sql = "UPDATE products set views = views+1 where prod_id='".$prod_id."'";
	if ($connect->query($sql)===TRUE) {
		return 1;
	}
	else {
		return 0;
	}
}


	function showDetail($prod_id){
	showViewPro($prod_id);
	showProduct($prod_id);
	$result='';
	$arrayShowPR= showProduct( $prod_id);
	


	$result.= '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4" style="margin-top: 70px; margin-left: 38px;">
				<div class="col-xs-12 zoomImage ">
					<img src="'.$arrayShowPR[0].'" height="300px " width="300px " class=" image-link display-flex " title="'.$arrayShowPR[1].'">
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-7" style="margin-top: 70px;">
				<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div col-xs-2 col-sm-2 col-md-2 col-lg-2><img src="image/yt.png"></img></div>
					<div col-xs-10 col-sm-10 col-md-10 col-lg-10><p style="font-size: 20px">'.$arrayShowPR[1].'</p></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>RẺ VÔ ĐỊCH- Ở ĐÂU RẺ HƠN T&T HOÀN TIỀN</p>
					';
					if ($arrayShowPR[3]=='') {
						$result.= '<p style="color: red; font-size: 30px">'.$arrayShowPR[2].'đ</p>';
					}
					else{
						$result.= '<p style="color: red; font-size: 30px"><strike>'.$arrayShowPR[2].'đ</strike></p>';
						$result.= '<p style=" font-size: 30px">'.$arrayShowPR[3].' đ</p>';
					}
					
					
	$result.=	'</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><label>Xu</label></div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<div class="flex items-center"><img src="image/xu.png" width="16" height="16" style="    margin-left: 60px;"></div>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="margin-left: 33px;">
						Mua hàng và tích tích điểm để nhận quà từ T&T
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="align-items: flex-start;"><label >Vận chuyển</label></div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<div class="flex items-center"><img src="image/free.png" width="25" height="15"></img></div>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="    margin-left: -22px;">
						Miễn Phí Vận Chuyển khi đạt mức giá trị đơn hàng tối thiểu </span>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-left: -16px; margin-top: 15px;">
						<label>Số lượng</label>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<input type="number" class="quantity" value="1" min="1" style="margin-top: 12px;">
					</div>
				<div>
				</div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px;">
				<img src="image/view.png">
				<input value="'.$arrayShowPR[4].'" style="width:29px" readonly><br><br>
					<button type="button " class="btn btn-default click_add_cart page_detail" data-id="'.$prod_id.'" style=" background-color: #80bb35; ">Thêm vào giỏ hàng</button>
					<button type="button" class="btn btn-default" style="background-color: #80bb35; color: white">Mua ngay</button>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="hienthibinhluan">
				<br>
				';

				if (isset($_SESSION['email'])) {
					$result.= '<label>Bình luận</label>
					<span><textarea rows="4" class="cmt" cols="50"></textarea></span>
					<input data-iduser="'.$_SESSION['id_user'].'" data-idprod="'.$prod_id.'" type="submit" value="Submit" class="btn success click_add_cmt" style="text-align:right; display: block; transform: translateX(366px);">';
					}else{
						$result.= "Bạn vui lòng đăng nhập để được bình luận";
						$result.='<br><a href="dangnhap.php?id=';
						$result .= $_POST["id"].'"';
						$result.=' style="display: block;">Click vào đây để đăng nhập</a>';
					}
					
			$result.='	</div>
			</div>
			</div>';
			echo $result;
}

?>

	<?php
	//session_start();
	if (isset($_POST['id'])) {
		# code...
		showDetail($_POST['id']);
	}
	//session_start();
	elseif (isset($_GET['id'])) {
		# code...
		showDetail($_GET['id']);
	}
	else{
		echo 'chưa tồn tại sản phẩm!';
	}
	

	?>
	<?php include('footer.php');?>
