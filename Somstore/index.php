<?php
session_start();
include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title> فروشگاه اسباب بازی</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	   	<link rel="stylesheet" href="css/userlogin.css" type="text/css" media="all" />
	 	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	 <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" /> 

	 
	 <link rel="stylesheet" href="css/audioplayer.css"  type="text/css" media="screen" />

		<script>
			/*
				VIEWPORT BUG FIX
				iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
			*/
			(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
		</script>
	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
	
	
	 <!-- Linking scripts -->
    <script src="js/main.js" type="text/javascript"></script>
	
<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->

<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);
	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	
				//send data to "shout.php" using jQuery $.post()
				$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});
	
	//toggle hide/show shout box
	$(".close_btn").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>

<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->
</head>
<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Header -->
		<div id="header">
			<!-- Begin Shell -->
			<div class="shell">
			<h1 id="logo"><a class="notext" href="#" title="Suncart">Somstore</a></h1>
				
				<div id="top-nav">
					<ul>
					
						
						<li><a href="Sign In.php" title="Sign In"><span> ورود</span></a></li>
					</ul>
				</div>
				<div class="cl">&nbsp;</div>
	<div class="shopping-cart"  id="cart" id="right" >
<dl id="acc">	
<dt class="active">								
<p class="shopping" >سبد خرید &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
		echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$currency.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >'.$currency.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
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
									 <a href="warehouse_1.php">سرگرمی نوزاد</a> 
									
								</li>
								
								<li>
									 <a href="warehouse_2.php"> عروسک‌ها</a>
									
								</li>
								
								<li>
									<a href="warehouse_3.php"> حرکتی‌ و مهارتی</a>
									
								</li>
								
								<li>
									<a href="warehouse_4.php"> بازی رایانه‌ای</a>
									
								</li>
								
							</ul>
						</div>
					</li>
					   <li><a href="products.php"></a></li>
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
					  <li><a href="about.php"></a></li>
					  <li><a href="customer.php"></a> </li>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Navigation -->
<!-- Begin Slider -->
		<div id="slider">
			<!-- Begin Shell -->
			<div class="shell">
				<ul class="slider-items">
					<li>
						<img src="images/tb-playdouh-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h2><span> </span> </h2>
					
							
						</div>
					</li>
					<li>
						<img src="images/tb-baby-alive-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span></span><span class="small"></span> &nbsp; </h4>
							
							
						</div>
					</li>
					<li>
						<img src="images/tb-funko-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span></span><span class="small"> </span><span class="small"></span></h3> 
					
						
						
						</div>
					</li>
							<li>
						<img src="images/tb-korobot-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span> </span><span class="small"> </span></h3> 
							
							
						</div>
					</li>
					<li>
						<img src="images/lol-kekilou-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span></span><span class="small"></span><span></span></h4>
							
						</div>
					</li>
					<li>
						<img src="images/tb-livpet-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h3><span></span><span class="small"></span> </h3> 
					
							
							
						</div>
					</li>
					<li>
						<img src="images/tb-lego-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h2><span></span></h2>
						
							
						</div>
					</li>
					<li>
						<img src="images/tb-pony-image.png" alt="Slide Image" />
						<div class="slide-entry">
							<h4><span></span><span class="small"></span> &nbsp;<span> </span> </h4>
							
							
						</div>
					</li>
					<li>
						<img src="images/tb-collecta-image.png" alt="Slide Image" />
						<div class="slide-entry">
					
							<h4 class="short"><span></span></h4>
							
							
						</div>
					</li>
				</ul>
				<div class="cl">&nbsp;</div>
				<div class="slider-nav">
					
				</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
					<h2>خوش آمدید</h2>
					
					این سایت مربوط به پروژه پایانی اینجانب نازنین حسین خان می‌باشد.
					سایت طراحی شده یک سایت فروش اسباب بازی با قابلیت‌های نمایش دسته‌ بندی شده اسباب بازی‌ها،ثبت نام مشتریان،اضافه شدن اقلام موردنظر مشتریان به سبدخرید و پرداخت،ورود ادمین،اضافه کردن محصول و... می‌باشد.
					باتشکر از زحمات و راهنمایی‌های استاد عزیز سرکار خانم مریم صداقتی<div class=""></div> <a href="#" class="more" title="Read More"></a></p>
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
						<div class="cl">&nbsp;</div>
			<!-- Begin Products -->
			
			<!-- End Products -->
			
			
      <!-- Begin Products Slider -->
						<!-- End Products Slider -->
			
		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		
				<!-- Begin Shell -->
							</div>
		</div>
		<!-- End Footer -->
		
	
	</div>
	
	</div>
	<!-- End Wrapper -->
</body>
</html>