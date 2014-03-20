<?php 
include 'globalpath.php';
$category = @mysql_real_escape_string($_GET['cat']);

$sql = @mysql_query('select id, title, imageUrl, price, productUrl from flipkart_products where inStock = \'TRUE\' AND urlCat = "'.$category.'" order by rand() limit 30');
$sqlCat = @mysql_query('select catName, parameter from categories');
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
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="<?php echo GLOBAL_PATH;?>/css/reset.css">
<link rel="stylesheet" href="<?php echo GLOBAL_PATH;?>/css/main.css">
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
while($rowCat = @mysql_fetch_array($sqlCat)){
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
  <div class="head_er" onClick="re_flush_array();"> Shopingvilla </div>
  <div class="for_filter_mode" onClick="re_flush_array();"> </div>
  <!--for filter mode--> 
  <a href="#">
  <div class="for_scr" id="folPosd"> Back to Top </div>
  </a><!-- scroll to top ends her-->
  <div id="main" role="main" onClick="re_flush_array();">
  <div class="text">Welcome to this shity website</div>
    <ul id="tiles">
      <div class="bug_removed">Loading ...</div>
      <!-- These are our grid blocks -->
      <?php
		while($row = @mysql_fetch_array($sql)){
			$productId = $row['id'];
		?>
      <li><img src="<?php echo $row['imageUrl']?>" width="200" height="auto"/>
        <p><?php echo $row['title']?></p>
        <a href="<?php echo $row['productUrl'];?>" target="_blank">
        <div class="buy_n">Buy Now</div>
        </a>
        <div class="mrp"><?php echo 'Rs. '.$row['price']?></div>
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
$('#for_flush_p').click(function(){
		 //alert('hiiii');
		 $('#cat_on_oven_popping').toggle();
	 });
	 function re_flush_array(){
	$('#cat_on_oven_popping').css('display','none');
}

$(window).scroll(function(){
if($(window).scrollTop()+1500 >= $(document).height())
			{
			var ID = $('.more').attr("id");
			if(ID)
			{
				$.ajax({
					type: "POST",
					url: "http://localhost/shit/ajax_more_cat.php",
					data: "cat=<?php echo $category;?>&last_id="+ ID, 
					cache: false,
					success: function(html){
						$("ul#tiles").append(html);
						$("#more"+ID).remove();
						$('#folPosd').fadeOut();
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
</script>
</body>
</html>
