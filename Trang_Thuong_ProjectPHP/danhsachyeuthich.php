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
					<!-- <h3>TOP BÁN CHẠY NHẤT TUẦN</h3>
					<div class="col-xs-12 section-title a-center "> -->
			<h2> <a href=" ">GIÀY THỂ THAO</a>
			</h2> 
				</div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ">
				<?php
				
				$result=favorite_product($_SESSION['id_user']);
				 foreach ($result as $key => $value) {
				 	$prod_id=$value['prod_id'];
				 	$img=$value['image'];
					$prod_name=$value['prod_name'];
					$prod_price=$value['sell_price'];
					$prod_sale=$value['sale_price'];
					$view =$value['views'];
					$favorite =$value['favorite'];
					echo'				
		<div class="sanpham col-xs-6 col-sm-6 col-md-6 col-lg-4 " style="padding-left: 37px; ">
		<p><br/></p>
		
			<div class="col-xs-12 zoomImage ">
				<img src="'.$img.' " height="300px " width="300px " class=" image-link display-flex " title="'.$prod_name.'">
			</div>
			<div class="col-xs-12"> <p style=" text-align:center;margin-left: -90px;">
				 ';
				 	if ($prod_sale=='') {
				 		echo $prod_price.'</p>';
				 	}
				 	else {
				 		echo '<strike style="color:red">'.$prod_price.'</strike> - ';
				 		echo  '</span >'.$prod_sale.'</span> ';
				 	}
				 
		echo '	</div>
			<div class="col-xs-12 " style="margin-left: 10px;">
				
				<button type="button " class="btn btn-default click_add_cart" data-id="'.$prod_id.'" style=" background-color: #80bb35; ">Thêm vào giỏ hàng</button>
				<form method="POST" action="chitiet.php">
					<button type="submit" class="btn btn-default" title="Chi tiết sản phẩm" style="margin-left: 155px;
    margin-top: -55px;"><img src="image/view.png"></button>
					<button data-id="'.$_SESSION['id_user'].'" data-product_id="'.$prod_id.'"  type="button" class="btn btn-default click_add_favorite" title="Chi tiết sản phẩm" style=" 
    margin-top: -55px;';
    if ($_SESSION['id_user']==$favorite) {
    	# code...
    	echo 'color:red;';
    }
    echo ' "> <span class="glyphicon glyphicon-heart"></span></button>

					<input type="text" name="id" style="display: none" size="1" value="'.$prod_id.'">
				</form>
			</div>
			
		</div>';
				 }
			?>
			
			</div>
			<div class=" "></div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="margin-left: 30px; ">
				<div class="col-xs-4 "></div>
				<div class="col-xs-4 section-title">
					<!-- <h3 style="padding-left: 110px;margin-left: -84px; ">HÀNG KHUYẾN MÃI</h3> -->
					<!-- <h2 style="margin-left: 34px; margin-bottom: 12px;"><a href="">GIÀY SANDAL</a></h2>	 -->
				</div>
				<div class="col-xs-4 "></div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="margin-left: 30px; ">
				<!-- <?php
				for ($i=8; $i <14 ; $i++) { 
				showPR($connect,$i);
			}
			?> -->
		</div>
		<div class="col-xs-12 section-title a-center ">
			
			<h2> <a href=" ">Phản hồi của khách</a>
			</h2> 			
			<p>Phản hồi của những khách hàng đã và đang sử dụng sản<br>
				phẩm trong suốt những năm qua</p>
		</div>
		<div class="feedback ">
			<div class=" col-xs-12 " style=" margin-right: 30px; margin-top: 30px; margin-left: 44px; " >

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

 
