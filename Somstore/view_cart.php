<?php
session_start();
include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title> فروشگاه اسباب بازی </title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	 	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="images/favicon.png" />
	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
	
	
		 <!-- Linking scripts -->
    <script src="js/main.js" type="text/javascript"></script>
	
</head>
<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Header -->
		<div id="header">
			<!-- Begin Shell -->
			<div class="shell">
				<h1 id="logo"><a class="notext" href="#" title="Somstore">Somstore</a></h1>
				<div id="top-nav">
					<ul>
					
						
						<li><a href="Sign In.php" title="Sign In"><span>ورود</span></a></li>
					</ul>
				</div>
				<div class="cl">&nbsp;</div>
<div class="shopping-cart"  id="cart" id="right" >
<dl id="acc">	
<dt class="active">								
<p class="shopping" >سبدخرید &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</dt>
<dd class="active" style="display: block;">
<?php
   //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ul>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>سبد خرید</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>قیمت:</b></i> <strong style="color: #d7565b" ><big>'.تومان.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]+$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>قیمت نهایی:</i> <big style="color:green" >'.تومان.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">نهایی کردن خرید</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">پاک کردن سبد خرید</span></a>';
}else{
    echo ' <h4>(سبد خرید شما خالی است)</h4>';
}
?>

</dd>
</dl>
</div>
 <div class="clear"></div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Header -->
	<!-- Begin Navigation -->
		<div id="navigation">
			<!-- Begin Shell -->
			<div class="shell">
				<ul>
					<li class="active"><a href="index.php" title="index.php">صفحه اصلی</a></li>
					<li>
						<a href="products.php">فهرست</a>
						<div class="dd">
							<ul>
								<li>
									 <a href="warehouse_1.php"> سرگرمی نوزاد</a>
									
								</li>
								
								<li>
									 <a href="warehouse_2.php"> عروسک‌ها</a>
									
								</li>
								
								<li>
									<a href="warehouse_3.php"> حرکتی و مهارتی</a>
									
								</li>
								
								<li>
									<a href="warehouse_4.php"> بازی رایانه‌ای</a>
									
								</li>
								
							</ul>
						</div>
					</li>
					   <li><a href="products.php"> </a></li>
					   	   <li>
						<a href="products.php"></a>
						<div class="dd">
							  	   <li>
						<a href="products.php"></a>
						<div class="dd">
							<ul>
								<li>
									 <a href="warehouse_1.php">Som Food Staff</a>
									
								</li>
								
								<li>
									 <a href="warehouse_2.php">Som Beverages</a>
									
								</li>
								
								<li>
									<a href="warehouse_3.php">Som House Staff</a>
									
								</li>
								
								<li>
									<a href="warehouse_4.php">Som Clothes</a>
									
								</li>
								
							</ul>
						</div>
					</li>
						</div>
					</li>
					  <li><a href="about.php"> </a></li>
					  <li><a href="customer.php">  </a> </li>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Navigation -->

		<!-- Begin Main -->
		<div id="main" class="shell">
     <br>
	
<div class="viewcart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["cart_session"]))
    {
	    $total = 0;
		
		echo '<form method="post" action="cart_update.php">';
		echo '<table cellspacing="0">';
			  echo   '<thead>';
		  echo '<tr>';
		  echo '<td>بررسی:</td>';
		  echo '<td>محصول:</td>';
		  echo '<td>قیمت:</td>';
		  echo '<td>عملیات:</td>';
		  echo '</tr>';
		  echo '</thead>';
		  
		$cart_items = 0;
		foreach ($_SESSION["cart_session"] as $cart_itm)
        {
           $Product_ID  = $cart_itm["code"];
		   $results = $mysqli->query("SELECT productName,Description, Price FROM product  WHERE Product_ID='$Product_ID'"); 
          if ($results) { 
		  
	        
			
          //fetch results set as object and output HTML
          while($obj = $results->fetch_object())
        {
			
		  
		    echo '<tr class="cart-itm">';
            echo '<td><input type="checkbox"></td>';
			echo '<td><h3>'.$obj->productName.' (Code :'.$Product_ID.')</h3></td> ';
					    echo '<td class="p-price" style="color:green"><b>'.تومان.$obj->Price.'</b></td>';
			echo '<td><span class="remove-check"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span></td>';
            echo '</tr>';
			$subtotal = ($cart_itm["Qiimaha"]+$cart_itm["TiradaProductTiga"]);
			$total = ($total + $subtotal);

			

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->productName.'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$Product_ID.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->Description.'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["TiradaProductTiga"].'"/>';
			$cart_items ++;
			      		    }}}

    
		echo '<span class="midigta"><a  class="a-btn" href="products.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">برگشت به ادامه خرید</span></a></span>';
		echo '<span class="check-out-txt">';

    	echo '</table>';
		echo '<span> <h4 class="pricewayn"> جمع نهایی : <big style="color:green">'.تومان.$total.'</big> </h4></span> ';
		echo '<spa class="midigta"><a  class="a-btn" href="Somstore checkout/zaadprocess.php"><span class="a-btn-text">Proced On Zaad</span> </a></span>';
		
		echo '<span class="midigta"> <a  class="a-btn" href="Somstore checkout/process.php"> <span class="a-btn-text"> Pay On SomStore</span></a></span>';
		echo '</span>';
		echo '</form>'; 

   }else{        
		echo '<span class="wacwayn"><i>سبدخرید شما خالی است</i></span>';
	}
	
    ?>
    </div><br><br><br>

			
				<!-- Begin Products Slider -->
			
			<!-- End Products Slider -->		
			<br> <br> <br> <br> 
			<!-- Begin Content -->
			
			<!-- End Content -->

			<div class="cl">&nbsp;</div>
			
			
		</div>
		<!-- End Main -->

	</div>
	<!-- End Wrapper -->
</body>
</html>