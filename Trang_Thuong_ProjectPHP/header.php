<?php
	//session_start();
	include('function.php');	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/test.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.js">
	<style type="text/css">
		html, body {
		  overflow-x: hidden;
		}
		.km{
			color: red;
		}
		.fixed{
			 position: fixed;
		    right: -400px;
		    z-index: 111;
		    background: #e8d8d8;
    box-shadow: 2px 4px 4px #dcb7b7;
    padding: 10px;
    border-radius: 10px;
		}
	</style>
</head>
<body>
<div class="header">
		<div class="top-nav" style="background-color:#80bb35; height: 40px; ">
			<div class="row">
	      <div class="top col-md-7 bg-dark">
	        <ul class="list-inline f-left">
				<li>
					<i class="fa fa-mobile" style=" font-size: 20px; display: inline-block; position: relative; transform: translateY(2px); padding-left: 15px; color: white; "></i><b>Hotline: </b> 
					<span>
						<a href="callto:01634778516" style=" text-decoration: none; color: white "><b> 01634778516</b></a>
					</span>
				</li>
				<li class="margin-left-20">
					<i class="fa fa-map-marker"></i> <b>Địa chỉ</b>: 
					<span style="color: white">
						<b>Shop T&T, thành phố Đà Nẵng</b>
					</span>
				</li>
			</ul>
	      </div>
	       <div class="col-md-2"></div>
	       <div class="col-sm-3 col-md-3 col-lg-3" style="margin-top: 10px; ">
	       		<?php
                    if (isset($_SESSION['email'])) {
                        echo '<a href="accountInfo.php" style="text-decoration:none"><i class="icon fa fa-user"></i>Tài khoản của tôi</a> |<a href="danhsachyeuthich.php" style="text-decoration:none">Yêu thích</a>|<a href="logout.php"
								 style="text-decoration:none"><i class="icon fa fa-sign-in"></i>Đăng xuất</a>';
                    } else {
                        echo '<a href="dangnhap.php" style="background-color:80bb35; color: white; height: 20px margin-top: 10px">Đăng nhập</a></li>';
                        echo '|<a href="dangki.php" style="background-color:80bb35; color: white; height: 20px margin-top: 10px">Đăng ký</a></li>';
                    }
                ?>
	       		
	
			</div>
					 </div>
				</div>
	
	</div>
	<div class="row">
		<div class="banner col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<a href="#" ><img src="image/logoMT.png" height="100px" width="350px" style="margin-top: -31px;" ></img></a>
		</div>
		<div class="slogant col-xs-5 col-sm-5 col-md-5 col-lg-5">
			
				<h5 style="margin-top: -9px;"><i>Thanh lịch, quyến rũ và duyên dáng</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nâng niu bàn chân Việt </i></h5>
			
		</div>
		<div class="left col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 6px;">
			<div class="col-xs-7">
				<form method="post" action="search1.php" class="navbar-form">
						<div class="input-group search-box " style="    margin-top: -16px;">
							<input type="text" name="q" class="form-control search" placeholder="Search here..." style="width: 130px;">
							 <button class="input-group-addon btn search" type="submit"name= "search1" style="height: 34px" > <i  class="glyphicon glyphicon-search" ></i> </button>
						</div>
					</form> 
			</div>
			<div class="col-xs-5 cart_count"  >
			
				<a href="shoppingCart.php"><img src="image/giohang.png" height="30px" width="30px" title="Thêm vào giỏ hàng" style="margin-left:23px; "><span class="label giohang" style="text-decoration: none;" >Giỏ hàng</span><span class="cartCount2">&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']) ?></span></img></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"id="smoothmenu1" class="ddsmoothmenu" >
			<ul class="nav nav-tabs  text-center"  style="padding-left: 135px; padding-bottom: 0px;">
				<li class="nav-item" style="margin-top: 4px;">
					<a class="nav-link" href="index.php"><img src="Image/home.png" height="40px" width="50px">TRANG CHỦ</img>
					</li>
					<li class="nav-item" style="margin-top: -20px; margin-left: -26px;">
						<a href="intro.php" class="nav-link"><img src="Image/gioithieu.png" height="40px" width="50px">GIỚI THIỆU</img></a>
				</li>

				<li class="nav-item dropdown" style="margin-top: 8px;">
					<a class="nav-link" href="category.php?name=2" id="navbarDropdown"><img src="Image/giaynu.png" height="30px" width="40px">NỮ</img></a>
						<div class="dropdown-content">
						<a class="dropdown-item" href="category.php?name=2&id=2" style="color: black"><span>Giày thể thao nữ</span></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="category.php?name=2&id=4" style="color: black">Sandal nữ</a>
						<div class="dropdown-divider"></div>
					</div>
				</li>

				<li class="nav-item dropdown" style="margin-top: -4px;">
					<a href="category.php?name=1"  class="nav-link" ><img src="Image/giaynam.png">NAM</img></a>
					<div class="dropdown-content">
						<a class="dropdown-item" href="category.php?name=1&id=1" style="color: black"><span>Giày thể thao nam</span></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="category.php?name=1&id=3" style="color: black">Sandal nam</a>
						<div class="dropdown-divider"></div>
					</div>
				</li>
				<li class="nav-item dropdown" style="margin-top: 6px;">
					<a href="#" class="nav-link"><img src="Image/sale.png" height="30px" width="40px">SALES</img></a>
					<div class="dropdown-content">
						<a class="dropdown-item" href="category.php?name=1&sale_price=sale_price" style="color: black"><span>Khuyến mãi giày nam</span></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="category.php?name=2&sale_price=sale_price" style="color: black">Khuyến mãi giày nữ</a>
						<div class="dropdown-divider"></div>
					</div>
				</li>
				<li class="nav-item" style="margin-top: 1px;">
					<a href="systemstories.php" class="nav-link"><img src="Image/store.png" height="40px" width="35px">HỆ THỐNG</img></a>
				</li>
				<li class="nav-item" style="margin-top: 1px;">
					<a href="blog.php" class="nav-link"><img src="Image/blog.png" height="40px" width="35px">BLOG</img></a>
				</li>
				<li style="margin-top: 19px;">
					<select name="dropdown" onchange="location = this.options[this.selectedIndex].value;">
						<option value="" >Chọn</option>
						<option value="showPrPrice.php?filter=sell_price&orderby=asc" <?php if( isset($_GET['filter'],$_GET['orderby']) && $_GET['filter']=='sell_price' && $_GET['orderby']=='asc') echo 'selected' ?>>Giá từ thấp đến cao</option>
						<option <?php if(isset($_GET['filter'],$_GET['orderby']) && $_GET['filter']=='sell_price' && $_GET['orderby']=='desc') echo 'selected' ?> value="showPrPrice.php?filter=sell_price&orderby=desc" >Giá từ cao đến thấp</option>
						<option <?php if(isset($_GET['filter'],$_GET['orderby']) && $_GET['filter']=='prod_name' && $_GET['orderby']=='asc') echo 'selected' ?> value="showPrPrice.php?filter=prod_name&orderby=asc">ký tự a-z</option>
						<option <?php if(isset($_GET['filter'],$_GET['orderby']) && $_GET['filter']=='prod_name' && $_GET['orderby']=='desc') echo 'selected' ?> value="showPrPrice.php?filter=prod_name&orderby=desc">ký tự z-a</option>
					</select>
				</li>
			</ul>
		</div>
		 
 