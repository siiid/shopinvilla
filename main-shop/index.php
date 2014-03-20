<?php 
include 'globalpath.php';

$sqlCatRand = mysql_query('select catName from categories order by rand() limit 1');
$resultCatRand = mysql_fetch_assoc($sqlCatRand);
$getRandCat = $resultCatRand['catName'];


$sql = @mysql_query("select id, title, imageUrl, price, productUrl from flipkart_products where inStock = 'TRUE' and imageUrl != '' and categories REGEXP '[[:<:]]".$getRandCat."[[:>:]]' limit 30");
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
<link rel="stylesheet" href="<?php echo GLOBAL_PATH;?>/css/reset.css">
<link rel="stylesheet" href="<?php echo GLOBAL_PATH;?>/css/main.css">
<link rel="icon" type="image/png" href="<?php echo GLOBAL_PATH;?>/fav/fav.ico">
</head>
<body>
<div class="for_my_pool">
  <div class="for_my_pool_" id="for_flush_p"><img src="<?php echo GLOBAL_PATH;?>/img/menu.png" width="30px" height="30px" border="0" /></div>
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
<div id="container">
  <div class="head_er" onClick="re_flush_array();"><img src="<?php echo GLOBAL_PATH;?>/img/icon4.png" width="60px" height="60px" border="0" /></div>
  <div class="for_filter_mode" onClick="re_flush_array();">
  <form action="#" method="post" id="sort_out" name="sorting_form">
  <div class="for_sort">
  <select name="for_categories" id="for_categories_sort" class="top_">
  	<option value="">Select category</option>
  	<?php 
	$resultCatDD = @mysql_query($sqlCat);
	while($rowCat = mysql_fetch_array($resultCatDD)){
	?>
  	<option value="<?php echo base64_encode($rowCat['catName']);?>"><?php echo stripslashes($rowCat['catName']);?></option>
    <?php }?>
  </select>
  </div><!-- for categories-->
  <div class="for_sort">
  <select name="for_brands" id="for_brands_sort">
  	<option value="">Select category first</option>
  </select>
  </div><!-- for brands-->
  <div class="for_sort">
  <select name="for_min_range" id="for_min_range_sort">
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
  <div class="text"><span class="read_">Shopinvilla , Shopping on the go ...</span></div>
    <ul id="tiles">
      <div class="bug_removed"><img src="<?php echo GLOBAL_PATH;?>/img/load.gif" /></div>
      <!-- These are our grid blocks -->
      <?php
		while($row = @mysql_fetch_array($sql)){
			$productId = $row['id'];
			$imageWidth = 200;
		?>
      <li>
      <div class="rel"></div>
      <img src="<?php echo $row['imageUrl']?>" width="<?php echo $imageWidth;?>" height="auto" class="ro" />
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
$(function() {
	$("#for_categories_sort").change(function() {
		$("#for_brands_sort").load("<?php echo GLOBAL_PATH;?>/ajax_brand.php?cat=" + $("#for_categories_sort").val());
	});
});
<!-- searchbox js, code ends here-->

$('#for_flush_p').click(function(){
		 //alert('hiiii');
		 $('#cat_on_oven_popping').toggle();
	 });
	 function re_flush_array(){
	$('#cat_on_oven_popping').css('display','none');
}

var loading = false;
$(window).scroll(function(){
//if($(window).scrollTop() + 1000 >= $(document).height())
if (!loading && ($(window).scrollTop() >  $(document).height() - $(window).height() - 100))
			{
			loading = true;
			var ID = $('.more').attr("id");
			if(ID)
			{
				$.ajax({
					type: "POST",
					url: "http://localhost/shit/ajax_more.php",
					data: "last_id="+ ID, 
					cache: false,
					success: function(html){
						$("ul#tiles").append(html);
						$("#more"+ID).remove();
						$('#folPosd').fadeOut();
						loading = false; // reset value of loading once content loaded
						}
					});
				
			}
			else
			{
				$(".for_scr_l").html('No More');
			}
			return false;
		}
		});
/*$flag = true;
$(window).scroll(function() {
	
   if($(window).scrollTop() + $(window).height() > $(document).height() - 300) {
	   if($flag == true)
	   {
			alert($flag);
			
			var ID = $('.more').attr("id");
			if(ID)
			{
				$.ajax({
					type: "POST",
					url: "http://localhost/shit/ajax_more.php",
					data: "last_id="+ ID, 
					cache: false,
					success: function(html){
						$("ul#tiles").append(html);
						$("#more"+ID).remove();
						$('#folPosd').fadeOut();
						}
					});
					
			}
			
			$flag = false;
	   }
	   else
	   $flag = false;
   }
});*/
</script>
</body>
</html>
