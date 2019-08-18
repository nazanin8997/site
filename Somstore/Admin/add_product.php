<?php
include("../session.php");
include("../config.php");

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>صفحه افزودن محصولات </title>
	
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

	</section><!-- end of secondary bar -->
	
<aside id="sidebar" class="column">
						
		
        <h3>جداول :</h3>
		<ul class="toggle">
		    <li class="icn_categories"><a href="order.php">Order Detial</a></li>
     		<li class="icn_categories"><a href="customerTable.php">Customer Detail</a></li>
		</ul>

		<h3>ادمین :</h3>
		<ul class="toggle">

			<li class="icn_jump_back"><a href="../logout.php">خروج</a></li>
		</ul>
	
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
	<h4 class="alert_info"><strong></strong> ادمین : <?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4>

<SCRIPT language="Javascript">
      <!--
      function isNumberKey(evt)
      {
	 
        // alert عددبودن قیمت
		  
      }
     

   </SCRIPT>


    <script type="text/javascript">
        $(function() {
		
           });
    </script>
	
   
	
	<div id="form_wrapper" class="form_wrapper">

		 <table>
					<form class="register active"  action=" insertProduct.php"method="POST" id="myForm">

					<th colspan="3"><h2>افزودن محصول :</h2> </th> 
						

   <tr>
    <td>  

		<label> نام :</label>
		<input type="text" name="name" id="name"  class="user" required>
		<span class="error">خطا</span>
		
	</td>
   <td>   
	<label>فهرست :</label>

 <?php
include('../config.php');
$name= mysqli_query($mysqli,"select * from category");

echo '<select  name="select"  id="ml" class="ed">';
echo '<option selected="selected">انتخاب</option>';
 while($res= mysqli_fetch_assoc($name))
{

echo '<option>';
echo $res['Category_ID'];
echo'</option>';
}
echo'</select>';

?>
		<span class="error">خطا</span>

   </td>
   
      <td>  

		<label> مدل:</label>
		<input type="text"  name="model"  id="model"  required> 
		<span id="pass-info"> </span>
                               
	</td>
	
   </tr>

   
   <tr>
 
	
   <td> 
       
	   <label> نوع :</label>
		<input type="text" name="type" id="type"  required>
		<span id="pass-info"> </span>
   
		
  </td>
    <td> 
    	<label>  گروه :</label>
<?php
include('../config.php');
$name= mysqli_query($mysqli,"select * from warehouse");

echo '<select   name="WH"  id="ml" class="ed">';
echo '<option selected="selected">انتخاب</option>';
 while($res= mysqli_fetch_assoc($name))
{

echo '<option>';
echo $res['Warehouse_ID'];
echo'</option>';
}
echo'</select>';

?>
		<span class="error">خطا</span>
                    
	</td>
	
   <td>   
	    <label> توضیحات :</label>
		<input type="text"  name="ml"  id="ml"  maxlength="19" required> 
		<span id="pass-info"> </span>
		
  </td>
  
   </tr>
   
   
   <tr>
    <td>  

		<label>قیمت :</label>
		<input type="text"  name="price"  id="price"  onkeypress="return isNumberKey(event)"  required>
		<span class="error">خطا</span>
		
	
	</td>
   <td>   

		<label> عکس:</label>
		<input type="file" name="picture" id="picture"  required>
		<span class="error">خطا</span>

   </td>


   </tr>
   
 
			<div class="bottom">

			<td colspan="3">	
		
			<button name="save" id="delbutton" title="Click to Save"  class="a-btn" > <span class="a-btn-text"> ثبت</span></</button>
			<div class="clear"></div>
			</div>

</form>
					
					</table>
					

		<script src="js/jquery.js"></script>
		  <script type="text/javascript">
		$(function() {


		$("#delbutton").click(function(){

		//Save the link in a variable called element
		var element = $(this);

		//  if(confirm("ثبت شود؟"))
				  {

		 $.ajax({
		   type: "GET",
		   url: "prodDelete.php",
		   data: info,
		   success: function(){
		   
		   }
		 });
				 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
				.animate({ opacity: "hide" }, "slow");

		 }

		return false;

		});

		});
		</script> 


	</div>

<?php
$result = mysqli_query($mysqli,"SELECT * FROM product");
?>
      <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

			<thead>  <th Colspan="11">  جدول محصولات </th></thead>
		<thead>
			</tr>
   		      <th>بررسی</th> 
    	      <th>ID</th>
              <th> نام</th>			  
    		<th>فهرست</th>
		    <th>مدل</th>				
    		<th> نوع</th>
			 <th>گروه</th>				
    		<th> توضیحات</th>
			<th>قیمت</th>				
    		<th> عکس</th>
    		<th>عملیات</th>
			</tr>
		</thead>
		<tbody>
     <?php while($row = mysqli_fetch_array($result))
    {?>

    <tr>
    <td><input type="checkbox"></td>
    <td><?Php echo $row['Product_ID']; ?></td>
    <td><?php echo $row['productName']; ?></td>
   <td><?php echo $row['Category_ID']; ?></td>
	<td><?php echo $row['Model']; ?></td>
	  <td><?Php echo $row['Type']; ?></td>
    <td><?php echo $row['Warehouse_ID']; ?></td>
   <td><?php echo $row['Description']; ?></td>
	<td><?php echo $row['Price']; ?></td>
		<td> <img src="../images/<?php echo $row['Picture']; ?> " width="40" height="40"   ></td>
    <td> <a href="prodViewUpdate.php?update=<?php echo $row['Product_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
     <a href="prodDelete.php?delete=<?php echo $row['Product_ID']; ?>" onClick="del(this);" title="Delete" class="delbutton"><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
    </tr>

  <?php }mysqli_close($mysqli);?>
</tbody>
</table>
	  
 </div> 


 
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

 if(confirm("Sure you want to delete this PRODUCT? There is NO PLS.undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "prodDelete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script> 

	</section>
          </div>
   </div>
 
   
</body>

</html>