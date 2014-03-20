<?php 
include 'globalpath.php';
$category = @mysql_real_escape_string($_GET['cat']);
$sql = @mysql_query('select id, title, imageUrl, price, productUrl from flipkart_products where inStock = \'TRUE\' AND urlCat = "'.$category.'" limit 30');
$sqlCat = 'select catName, parameter from categories';
?>
<!doctype html>
<html lang="en">
<head>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Shopinvilla</title>
<meta name="description" content="An very basic example of how to use the Wookmark jQuery plug-in.">
<meta name="author" content="Christoph Ono, Sebastian Helzle">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
<link rel="stylesheet" href="<?php echo GLOBAL_PATH;?>/css/main.css">
<!--<link rel="stylesheet" href="<?php //echo GLOBAL_PATH;?>/css/main.css">-->
<link rel="icon" type="image/png" href="<?php echo GLOBAL_PATH;?>/fav/fav.ico">
</head>
<body>
<div class="for_my_pool">
  <div class="for_my_pool_" id="for_flush_p"><img src="<?php echo GLOBAL_PATH;?>/img/menu.png" width="30px" height="30px" border="0" /></div>
</div>
<div class="for_my_poolr">
  <div class="for_my_pool_r" id="for_flush_r"><img src="<?php echo GLOBAL_PATH;?>/img/right.png" width="30px" height="30px" border="0" /></div>
</div>
<!-- my pool-->
<div class="cat_on_oven" id="cat_on_oven_popping">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" align="center" class="shut_down" id="shut_down_door" onClick="re_flush_array();">Close this window</td>
    </tr>
    <tr><td colspan="2" height="10px">&nbsp;</td></tr>
       <tr>
      <?php
$count = 1;
$resultCat = @mysql_query($sqlCat);
while($rowCat = @mysql_fetch_array($resultCat)){
	echo "<td class='selec_pool'>";
	echo "<a href='".GLOBAL_PATH."/".$rowCat['parameter']."/' class='a_tag'>".stripslashes($rowCat['catName'])."</a>";
	echo "</td></a>";
	
	if($count % 2 == 0){
		echo "</tr><tr>";
	}
	$count = $count+1;
	
}?>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</div>
<div class="cat_on_oven_r" id="cat_on_oven_popping_r">
<table width="100%" cellpadding="0" cellspacing="0">
<tr><td class='selec_pool_r'><a href="#" class="a_tag">About Us</a></td></tr>
<tr><td class='selec_pool_r'><a href="#" class="a_tag">Terms and Conditions</a></td></tr>
<tr><td class='selec_pool_r'><a href="#" class="a_tag">Contact Us</a></td></tr>
</table>
</div>
<div id="container">
  <div class="head_er" onClick="re_flush_array();"><a href="<?php echo GLOBAL_PATH;?>"><img src="<?php echo GLOBAL_PATH;?>/img/icon4.png" width="60px" height="60px" border="0" class="ads"/></a></div>
  <div class="for_filter_mode" onClick="re_flush_array();">
  <form action="#" method="post" id="sort_out" name="sorting_form">
  <div class="for_sort">
  <select name="for_categories" id="for_categories_sort" class="top_" requirec>
  	<option value="">Select category</option>
  	<?php 
	$resultCatDD = @mysql_query($sqlCat);
	while($rowCat = mysql_fetch_array($resultCatDD)){
	?>
  	<option value="<?php echo @base64_encode($rowCat['catName']);?>"><?php echo @stripslashes($rowCat['catName']);?></option>
    <?php }?>
  </select>
  </div><!-- for categories-->
  <div class="for_sort">
  <select name="for_brands" id="for_brands_sort">
  	<option value="" id="all_rise_">Brands ( Select a category first )</option>
  </select>
  </div><!-- for brands-->
  <div class="for_sort">
  <select name="for_min_range" id="for_min_range_sort">
  	<option value="">Min. Price</option>
  	<option value="50">50</option>
    <option value="100">100</option>
    <option value="250">250</option>
    <option value="500">500</option>
    <option value="1000">1000</option>
    <option value="2000">2000</option>
    <option value="5000">5000</option>
    <option value="1000">10000</option>
    <option value="1000">20000</option>
    <option value="1000">50000</option>
  </select>
  </div><!-- for min range-->
  <div class="for_sort">
  <select name="for_max_range" id="for_max_range_sort">
  	<option value="">Max. Price</option>
  	<option value="100">100</option>
  	<option value="250">250</option>
    <option value="500">500</option>
    <option value="1000">1000</option>
    <option value="2000">2000</option>
    <option value="5000">5000</option>
    <option value="10000">10000</option>
    <option value="25000">25000</option>
    <option value="50000">50000+</option>
  </select></div><!-- for max range-->
  <div class="for_sort">
  <input type="submit" name="Filter search" value="Filter search" id="sort" />
  </div><!-- for submit-->
  </form>
  </div>
  <!--for filter mode--> 
  <div id="main" role="main" onClick="re_flush_array();">
  <div class="text"><span class="read_">Shopinvilla , Shopping on the go</span></div>
   <div class="text"><span class="read_"><?php echo $category; ?></span></div>
    <ul id="tiles">
      <div class="bug_removed"><img src="<?php echo GLOBAL_PATH;?>/img/load.gif" /></div>
      <!-- These are our grid blocks -->
      <?php
	    $width = NULL;
		while($row = @mysql_fetch_array($sql)){
			$productId = $row['id'];
			//list($width, $height) = @getimagesize($row['imageUrl']);//getting image dimension
			if($width <= 150){
				$imageWidth = $width;
			}else{
				$imageWidth = '200';
			}
		?>
      <li>
      <div class="rel"></div>
      <img src="<?php echo $row['imageUrl']?>" width="200" />
        <p><?php echo $row['title']?></p>
        <a href="<?php echo $row['productUrl'];?>" target="_blank">
        <div class="buy_n">Buy Now</div>
        <div class="mrp"><?php echo 'Rs. '.$row['price']?></div></a>
        
      </li>
      <?php }?>
     <div id="more<?php echo $productId;?>" class="morebox"> <a href="#" class="more" id="<?php echo $productId; ?>"></a> </div>
      <!-- End of grid blocks -->
    </ul>
    
  </div>
   <div class="for_scr_l" id="aqws"><img src="<?php echo GLOBAL_PATH;?>/img/load.gif" /></div>
</div>

<script src="<?php echo GLOBAL_PATH;?>/js/jquery.min.js"></script>
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.imagesloaded.js"></script> 
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.wookmark.js"></script> 
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.wookmark1.js"></script>
<script type="text/javascript">

<!-- searchbox js, code starts here-->
$(function(){
	$('#for_categories_sort').change(function(){
		var ad = $('#for_categories_sort').val();
		$('#for_brands_sort').html('<option value="">Loading Brands...</option>');
		$.ajax({
			type: "POST",
			url: "http://localhost/shit/ajax_brand.php",
			data: "club="+ad,
			cache: false,
			success: function(mm){
				$('#for_brands_sort').html(mm);
			}			
		});
	});
});
<!-- searchbox js, code ends here-->

$('#for_flush_p').click(function(){
		 //alert('hiiii');
		 $('#cat_on_oven_popping').toggle();
		 $('.cat_on_oven_r').css('display','none');
	 });
	 function re_flush_array(){
	$('#cat_on_oven_popping').css('display','none');
	$('.cat_on_oven_r').css('display','none');
}
$('#for_flush_r').click(function(){
	$('.cat_on_oven_r').toggle();
	$('#cat_on_oven_popping').css('display','none');
});

var process;
$(document).ready(function(e) {
    $(document).scroll(function(e){
		if(process)
		return false;
		 if ($(window).scrollTop() >= ($(document).height() - $(window).height())*.7){
			process = true;
			var ID = $('.more').attr('id');
			if(ID)
			{
				$.ajax({
					type: "POST",
					url: "http://localhost/shit/ajax_more_cat.php",
					data: "last_id="+ ID + "&cat="<?php echo $category; ?>, 
					cache: false,
					success: function(html){
						$("ul#tiles").append(html);
						$("#more"+ID).remove();
						$('#folPosd').fadeOut();
						process = false;
						
						}
					});
				
			}
			else
			{
				$(".for_scr_l").html('No More');
			}
			
		 }	
	});	
});
</script>
</body>
</html>
