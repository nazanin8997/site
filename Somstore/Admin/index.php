<?php
include("../session.php");
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title> صفحه ادمین </title>
<link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="images/favicon.png" />
	 <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />
	 
	 
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>



<script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
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
<div id="container">

  
	   <div id="header">
 
         
		<div id="logo-banner">
		   
				<div id="logo">
					
					<a href="index.php"><img src="images/logo.png" alt="" /></a>
				</div>
				
				<div id="banner">
                   
				</div>
		       
		</div>
		</div> <!--DHAMAADKA hedaerka-->
		
	
<div id="content-wrap">		
	<section id="secondary_bar">
		
            <nav><!-- Defining the navigation menu -->
                <ul>
                    <li class="selected"><a href="index.php">صفحه اصلی</a></li>
                    <li><a href="add_warehouse.php"></a></li>
                    <li><a href="add_product.php">افزودن محصول</a></li>
                    <li><a href="Employee.php">افزودن کارمند</a></li>
                    <li><a href="add_category.php"> </a></li>
                    <li class="logout"> <span class="check"> <?php echo "   ". "<font color='##fa5400'><i><b></b></i></font>" ;?> </span></li>
					
                </ul>
				
            </nav>
		
	</section><!-- end of secondary bar -->
	
	   	
<aside id="sidebar" class="column">
					<!-- Begin Search -->
				
		
        <h3>جداول:</h3>
		<ul class="toggle">
		    <li class="icn_categories"><a href="order.php">جزییات سفارشات</a></li>
     		<li class="icn_categories"><a href="customerTable.php">جزییات کاربران سایت</a></li>
		</ul>

		<h3>ادمین</h3>
		<ul class="toggle">

			<li class="icn_jump_back"><a href="../logout.php">خروج</a></li>
		</ul>
	
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<h4 class="alert_info">  <strong></strong> نام ادمین : <?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4> 
		
		<!-- end of stats article -->


		


					
		<?php
$result = mysqli_query($mysqli,"SELECT * FROM contact");
?>
      		<!-- end of #tab2 -->
			



	     		 

		
		<div class="clear"></div>

		<div class="spacer"></div>


	</section>
       </div>
</div>

</body>

</html>