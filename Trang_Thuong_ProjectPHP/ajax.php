<?php 
	include('function.php');	
?>
<?php 
	//save commennt belong product
	
	if(isset($_POST['act'])){
		 if( $_POST['act']=='insert_comment'){ 

	 	$id_prod=$_POST['idprod'];
		$id_user=$_POST['iduser'];
		$cmt = $_POST['cmt'];
		$id = insert_comments($id_prod,$id_user,$cmt); 

		  $result_load_comment_belong_prod = load_comment($id);
		  $string='';
		  foreach ( $result_load_comment_belong_prod as $key => $value) {
		  	# code...
		  	 $string .= "<div class='trangcomment'><span>".++$key.'.  '.$value['user_name'].":".$value['comment']."</span><div>";
		  }
		 echo $string;
		die();
	 }elseif($_POST['act']=='load_file'){
	 	$string='';
	 	$id=$_POST['idprod'];
	 	$result_load_comment_belong_prod = load_comment($id);
	 	if(count($result_load_comment_belong_prod)>0){
	 		 foreach ( $result_load_comment_belong_prod as $key => $value) {
		  	
		  	 $string .= "<div class='trangcomment'><span>".++$key.'.  '.$value['user_name'].":".$value['comment']."</span><div>";
		  }
	 	}else{
	 		 $string .= "<div class='trangcomment'><span>chưa có comment</span><div>";
	 	}
		 
		 echo $string;
		die();
	 }elseif($_POST['act']=='add_favorite'){

	 	 update_favorite_product($_POST['id'],$_POST['product_id']);
		die();
	 }
	}
	
	 //end save comment
	//load ngầm
	$id = $_POST['id'];
	$result = getById($id);
	if(empty($_POST['quantity'])){
		$result2=shopping_cart($id,$result);
	}else{
		$result2=shopping_cart($id,$result,$_POST['quantity']);
	}
	
	 echo $result2 ;


	
 ?>