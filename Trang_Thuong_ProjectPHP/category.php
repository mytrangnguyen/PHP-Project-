
<?php include('header.php'); ?>
<div class="adv">
	<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 carousel slide" id="carousel-example-generic" data-ride="carousel">
		<br/>
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>
		
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<?php showImageBanner($connect,1) ?>
				<div class="carousel-caption"></div>
			</div>
			<div class="item">
				<?php showImageBanner($connect,2) ?>
				<div class="carousel-caption"></div>
			</div>
			<div class="item">
				<?php showImageBanner($connect,3) ?>
				<div class="carousel-caption"></div>
			</div>
		</div>
		<a class="left carousel-control" href="#carousel-example-generic" style="height: 0; margin-top: 199px; background-color: #e5e5e5"
		 role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"  aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
		<a class="right carousel-control" href="#carousel-example-generic" style="height: 0; margin-top: 204px; background-color: #e5e5e5"
		 role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
	</div>
</div>
<div class="content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-dark">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

		</div>
		<div class="col-xs-6 col-sm-4 col-md-6 col-lg-6 text-center section-title a-center">
	<h2> <a href=" "> 
		<?php 
			if(isset($_GET['name']) && $_GET['name']==1){
				if(isset($_GET['id']) && $_GET['id']==1){
					$string='giày thể thao nam';
				}
				elseif(isset($_GET['id']) && $_GET['id']==3){
					$string='giày sandal nam';
				}elseif(isset($_GET['sale_price']) ){
					$string='giày khuyến mãi nam';
				}else{
					$string='giày nam';
				}
			}

			elseif(isset($_GET['name']) && $_GET['name']==2){
				if(isset($_GET['id']) && $_GET['id']==2){
					$string='giày thể thao nữ';
				}
				elseif(isset($_GET['id']) && $_GET['id']==4){
					$string='giày sandal nữ';
				}
				elseif(isset($_GET['sale_price']) ){
					$string='giày khuyến mãi nữ';
				}else{
					$string='giày nữ';
				}
			}
		 ?>
		 <span style="text-transform: uppercase;"><?php echo $string; ?></span>
	</a>
	</h2> 
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ">
		<?php
		//kiểm tra có tồn tại method get name
		if(isset($_GET['sale_price']) && isset($_GET['name'])){ 
			$result = showProductCat($_GET['name'],123);
		}
		elseif(isset($_GET['name'])){
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$parent_id=123;
			}else{
				$parent_id='';
				$id=$_GET['name'];
			} 

			$result = showProductCat($id,'',$parent_id);
		}

		// category 1 shoes 
	 	?>
	 	<?php
	 	$i=0;
	 	foreach ($result as $key => $value) {
	 	 
	 		$prod_id = $value['prod_id'];
	 		$img=$value['image'];
			$prod_name=$value['prod_name'];
			$prod_price=$value['sell_price'];
			$prod_sale=$value['sale_price'];
	 	 	?>
	 	 	  
	 	 	<div class="sanpham  col-sm-4  " style="margin-top:21px;"  >
			 
				<div class="col-xs-12 zoomImage ">
				<img src="<?php echo $img ?> " height="300px " width="300px " class=" image-link display-flex " title="<?php echo $prod_name ?> "">
				</div>
				<div class="col-xs-12 " >
					<!-- <p style="margin-left: 89px; "><?php echo $prod_sale ?></p> -->
					<?php
						if ($prod_sale=='') {
							echo '<div class="col-xs-12 "><span><p style="margin-left: 41px; ">'.$prod_price.'</p></span>;</div>';
						}
						else
						{
							echo '<div class="col-xs-6 " ><p style="margin-left: 41px; color: red;"><strike><span>'.$prod_price.'</span></strike></p></div>';
							echo '<div "col-xs-12 "><span><p style="margin-left: 41px; ">'.$prod_sale.'</p></span>;</div>';
						}
					?>	
				</div>
				<div class="col-xs-12 ">
					<button type="button " class="btn btn-default click_add_cart" data-id=<?php echo $prod_id?> style=" background-color: #80bb35; ">Thêm vào giỏ hàng</button>
					<form method="POST" action="chitiet.php"><button type="submit" class="btn btn-default" title="Chi tiết sản phẩm" style="margin-left: 155px;margin-top: -55px;"><img src="image/view.png"></button>
						<input type="text" name="id" style="display: none" size="1" value=<?php echo $prod_id?>>
						<button style="margin-top: -55px;" type="button" class="btn btn-default click_add_favorite glyphicon glyphicon-heart"></button>
					</form>
				</div>
			</div>
		<?php } ?>
</div> 
<div class="col-xs-12 section-title a-center ">
	
	<h2> <a href=" ">Phản hồi của khách</a>
	</h2> 			
	<p>Phản hồi của những khách hàng đã và đang sử dụng sản<br>
		phẩm trong suốt những năm qua</p>
</div>
<div class="feedback ">
	<div class=" col-xs-12 " style="margin-right: 30px; margin-top: 30px; margin-left: 44px; " >

		<div class="col-xs-3 testimonial-item text-center phanhoi p-4 mb-5 " style=" padding-top: 10px; ">
			<div class="image-avata ">
				<img src="image/hg.jpg " height="60px " width="50px " alt="Người mẫu - Ngọc Trinh ">
			</div>
			<h4 class="name ">Siêu mẫu - Hương Giang</h4>
			<p class="designation m-0 ">Là một người khá kỹ tính, tôi luôn luôn lựa chọn những sản phẩm tốt nhất. Và đây là nơi tôi đặt trọn niềm tin </p>
		</div>
		<div class="col-xs-1 "></div>
		<div class="col-xs-3 phanhoi testimonial-item text-center p-4 mb-5 " style=" padding-top: 10px; ">
			<div class="image-avata ">
				<img src="image/km.jpg " height="60px " width="50px " alt="Người mẫu - Ngọc Trinh ">
			</div>
			<h4 class="name ">Ca sĩ - Khởi My</h4>
			<p class="designation m-0 ">Là một người khá kỹ tính, tôi luôn luôn lựa chọn những sản phẩm tốt nhất. Và đây là nơi tôi đặt trọn niềm tin </p>
		</div>
		<div class="col-xs-1 "></div>
		<div class=" col-xs-3 phanhoi testimonial-item text-center p-4 mb-5 " style=" padding-top: 10px; ">
			<div class="image-avata ">
				<img src="image/st.jpg " height="60px " width="50px " alt="Người mẫu - Ngọc Trinh ">
			</div>
			<h4 class="name ">Ca sĩ - Sơn Tùng</h4>
			<p class="designation m-0 ">Là một người khá kỹ tính, tôi luôn luôn lựa chọn những sản phẩm tốt nhất. Và đây là nơi tôi đặt trọn niềm tin </p>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>

