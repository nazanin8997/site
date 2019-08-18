<?php
session_start();
include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>گروه کاربران سایت </title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	  
	 	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	 <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />
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
				<h1 id="logo"><a class="notext" href="index.php" title="Suncart">Suncart</a></h1>
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
		echo '<span><b><i>سبدخرید</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>قیمت:</b></i> <strong style="color: #d7565b" ><big>'.تومان.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]+$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>قیمت نهایی:</i> <big style="color:green" >'.تومان.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">نهایی کردن خرید</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">پاک کردن سبدخرید</span></a>';
}else{
    echo ' <h4>(سبدخرید شما خالی است)</h4>';
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
									 <a href="products.php"> سرگرمی نوزاد</a>
								
								</li>
								
								<li>
									 <a href="products.php"> عروسک‌ها</a>
									
								</li>
								
								<li>
									<a href="products.php">  حرکتی و مهارتی</a>
									
								</li>
								
								<li>
									<a href="products.php"> بازی رایانه‌ای</a>
									
								</li>
								
							</ul>
						</div>
					</li>
					   <li><a href="products.php"> </a></li>
					   	   <li>
						<a href="products.php"></a>
						<div class="dd">
							<ul>
								<li>
									 <a href="warehouse_1.php"> Warehouse A</a>
									
								</li>
								
								<li>
									 <a href="warehouse_2.php"> Warehouse B</a>
									
								</li>
								
								<li>
									<a href="warehouse_3.php"> Warehouse C</a>
									
								</li>
								
								<li>
									<a href="warehouse_4.php"> Warehouse D</a>
									
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
		<!-- End Navigation -->		<!-- Begin Slider -->
		<div id="slider">
		
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
           
	
<script type="text/javascript">
$(document).ready(function() { 

    $('#btnSubmit').click(function() {  

        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        var emailaddressVal = $("#email").val();
        if(emailaddressVal == '') {
            $("#email").after('<span class="error">لطفا آدرس ایمیل خود را وارد نمایید.</span>');
            hasError = true;
        }

        else if(!emailReg.test(emailaddressVal)) {
            $("#email").after('<span class="error">ایمیل نامعتبر.</span>');
            hasError = true;
        }

        if(hasError == true) { return false; }

    });
});

</script>

					
<div id="form_wrapper" class="form_wrapper">
	 <table>
					<form class="register active"  id="myForm" method="POST" action="insertCustomer.php">

   
       <th colspan="3"><h2>ثبت نام :</h2> </th> 
						
						
						   
   
   <tr>
    <td>  

		<label> ایمیل:</label>
		<input type="text" name="email" id="email"/>
		<span class="error">خطا</span>

	
	</td>
    <td>   



		<label> نام :</label>
		<input type="text" name="name" />
		<span class="error">خطا</span>
							
   </td>


   </tr>
   
    <tr>
    <td>  

		<label>رمزعبور :</label>
		<input type="password" name="password1" id="password1" />

	</td>
	
   <td>   
     	  <label>نام کاربری :</label>
			<input type="text" name="username" id="username"/>
			<span class="error">خطا</span>

	</td>

   </tr>
   
   <tr>
    <td>  

		<label> تکرار رمزعبور :</label>
		<input type="password" name="password2"id="password2" />  
		<div id="pass-info"> </div>
	</td>
	
   <td>   
     
			<label> شماره تماس:</label>
			<input type="text" name="tell" id="tell"/>
			<span class="error">خطا</span>

   </td>
   
   
   </tr>
   
    <tr>
    <!-- <td>   
	
		<label> Cuntery:</label>
        <script type="text/javascript" src="js/countries.js"></script>
        <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>

   </td> -->
   
    <td>   

        <label>آدرس :</label>
		<input type="text" name="address" id="address"/>
		<span class="error">خطا</span>   
		

   </td>
   <td>   
   
   <label>کدپستی :</label>
   <input type="text" name="pcode" id="pcode"/>
   <span class="error">خطا</span>

	</td>	
   
   </tr>
   
   
   
  <tr>
						<div class="bottom">

						<td colspan="3">	
						<button  id="btnSubmit" type="submit" name="submit"> ثبت</button>
							
							<div class="clear"></div>
						</div>
						
		
   </tr>
					</form>

					</table>
					
					
<script type="text/javascript">

$(document).ready(function(){ 
    $("#btnSubmit").click(function() { 
    alert("اطلاعات اضافه شوند؟");
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'insertCustomer.php',
        data: $("#myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
			console.log(d)
        }
        });
    }); 
});

</script>

					
				</div>
	   			

			</div>
			<!-- End Content -->
			<!-- Begin Sidebar -->
						<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
			<!-- Begin Products -->

			
	
		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		
				<!-- Begin Shell -->
				
				<!-- End Shell -->
			</div>
			<div class="copy">
				<!-- Begin Shell -->
				
		<!-- End Footer -->
		
		
	<!-- End Wrapper -->
</body>
</html>