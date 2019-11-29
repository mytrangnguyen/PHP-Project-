 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include('header.php')?>;
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
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ">
		<?php
			$filter = (isset($_GET['filter']))?$_GET['filter']:'';
			$order = (isset($_GET['orderby']))?$_GET['orderby']:'';
			 
			$result=showProPrice($filter,$order);
			 
			foreach ($result as  $value) {
				$prod_id = $value[0];
		 		$img=$value[1];
				$prod_name=$value[2];
				$prod_price=$value[3];
				$prod_sale=$value[4];
		 	 	?>
		 	 	<div class="sanpham  col-sm-4  " style="margin-top:21px;"  >
			 
				<div class="col-xs-12 zoomImage ">
				<img src="<?php echo $img ?> " height="300px " width="300px " class=" image-link display-flex " title="<?php echo $prod_name ?>">
				</div>
				<div class="col-xs-12 " >
					<!-- <p style="margin-left: 89px; "><?php echo $prod_sale ?></p> -->
					<?php
						if ($prod_sale=='') {
							 
							echo '<div class="col-xs-12 "><span><p style="margin-left: 41px; ">';
							echo   number_format($prod_price,0,'.','.').'</p></span></div>';
						}
						else
						{
							echo '<div class="col-xs-6 " ><p style="margin-left: 41px; color: red;"><strike><span>'. number_format($prod_price,0,'.','.').'</span></strike>';
							echo ' <span> ';
							echo number_format($prod_sale,0,'.','.').' </span></p></div>';
							 
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
		<?php	}
		?>
	</div>
	<?php include('footer.php'); ?>

</body>
</html>
