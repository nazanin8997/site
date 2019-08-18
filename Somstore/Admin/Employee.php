<?php
include("../session.php");
include("../config.php");

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>صفحه افزودن ادمین </title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
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

</head>


<body>

<div id="container">

	  
	  
	  
		
		</div>
		</div> <!--DHAMAADKA hedaerka-->
		
	
	<div id="content-wrap">	
	
	<section id="secondary_bar">

             <nav><!-- Defining the navigation menu -->
                <ul>
                    <li class="selected"><a href="index.php">صفحه اصلی</a></li>
                    <li><a href="add_warehouse.php"></a></li>
                    <li><a href="add_product.php">افزودن محصول</a></li>
                    <li><a href="Employee.php">افزودن ادمین</a></li>
                    <li><a href="add_category.php"></a></li>
                    <li class="logout"> <span class="check"> <?php echo " ". "<font color='##fa5400'><i><b></b></i></font>" ;?> </span></li>
					
                </ul>
				
            </nav>
				
            </nav>

	</section><!-- end of secondary bar -->
	   	
<aside id="sidebar" class="column">
			<!-- Begin Search -->
			
		
        <h3>جداول :</h3>
		<ul class="toggle">
		    <li class="icn_categories"><a href="order.php">جزئیات سفارشات</a></li>
     		<li class="icn_categories"><a href="customerTable.php">جزئیات کاربران سایت</a></li>
		</ul>

		<h3>ادمین</h3>
		<ul class="toggle">

			<li class="icn_jump_back"><a href="../logout.php">خروج</a></li>
		</ul>
	
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
	
	<h4 class="alert_info"><strong></strong> ادمین : <?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4>

<script type="text/javascript">
function validateForm()
{
var a=document.forms["addemployee"]["fullname"].value;
if (a==null || a=="")
  {
  alert("لطفانام پرشود");
  return false;
  }
var b=document.forms["addemployee"]["username"].value;
if (b==null || b=="")
  {
  alert("لطفانام کاربری پرشود");
  return false;
  }
  
   var c=document.forms["addemployee"]["password"].value;
if (c==null || c=="")
  {
  alert("لطفا رمزعبور پر شود");
  return false;
  }

}
</script>	


	
    <script type="text/javascript">
        $(function() {
            $('#empValid').keyup(function() {
			
                if (this.value.match(/[^a-zA-Z]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z ]/g, '');
					
                }
				Alart("وروداعداد نامعتبراست");
            });
        });
    </script>
		

				
				
	<div id="form_wrapper" class="form_wrapper">
	
		 <table>
					<form class="register active" id="myForm"action="empRegistration.php"  method="POST" >

					<th colspan="3"><h2>افزودن ادمین</h2> </th> 
						

        <tr>
       <td>  

	  <label>نام :</label>
		
		<input type="text" id="empValid" name="fullname" placeholder="Full name" />
		<span class="error">خطا</span>
	  </td>
      <td>   

	     <label>نام کاربری :</label>

		<input type="text" id="username" name="username" placeholder="User name" />
		<span class="error">This is an error</span>
      </td>
		</tr>
    <tr>
         <td>  

		<label> انتخاب عکس :</label>
		<input type="file" name="picture" id="picture"  required>
		<span id="pass-info"> </span>
                               
	    </td>
		
       <td>  

		<label> رمزعبور :</label>
		
		<input type="password" id="password" name="password" placeholder="*****" >
		<span id="pass-info"> </span>
                               
	</td>

   </tr>



						<div class="bottom">

						<td colspan="3">	
						
						<button name="submit" id="submit" title="Click to Save"  class="a-btn"> <span class="a-btn-text"> ثبت</span></button>
						
						</td>
							
							<div class="clear"></div>
						</div>
						
		

	</form>
					
	</table>
	</div>


						<script>
<script type="text/javascript">

$(document).ready(function(){ 
    $("#submit").click(function() { 
    
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'empRegistration.php',
        data: $("#myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>
		
	





<?php
$result = mysqli_query($mysqli,"SELECT * FROM employee");
?>
      <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

			
			<thead><tr> <th colspan="7"> اطلاعات ادمین‌ها</th>  </tr> <thead>
		<thead>
			<tr>
   		    <th>بررسی</th> 
    	      <th>ادمین ID</th>
              <th> نام ادمین</th>			  
    		<th>نام کاربری</th>
		    <th>رمزعبور</th>
           <th>عکس</th>			
    		<th>عملیات</th>
			</tr>
		</thead>
		<tbody>
<?php while($row = mysqli_fetch_array($result))
  {?>

      <tr>
    <td><input type="checkbox"></td>
    <td><?Php echo $row['Employee_ID']; ?></td>
    <td><?php echo $row['Employee_Name']; ?></td>
   <td><?php echo $row['Username']; ?></td>
	<td><?php echo $row['Password']; ?></td>
	<td><img src="../images/<?php echo $row['Picture']; ?>" width="40" height="40"></td>
    <td> <a href="empViewUpdate.php?update=<?php echo $row['Employee_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
     <a href="empDelete.php?delete=<?php echo $row['Employee_ID']; ?>" onClick="del(this);" title="Delete"><input type="image" src="images/icn_trash.png" title="Trash"/>  </a></td>
    </tr>

  <?php }mysqli_close($mysqli);?>
      </tbody>
</table>
	  
 </div> 

	</section>
          </div>
   </div>
    
</body>

</html>