<?php 
include 'globalpath.php';

$sql = @mysql_query('select id, title, imageUrl, price, productUrl from flipkart_products where inStock = \'TRUE\' order by id desc, rand() limit 30');

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
  <div class="for_my_pool_" id="for_flush_p"> <img src="<?php echo GLOBAL_PATH;?>/img/menu.png" width="30px" height="30px" border="0" /> </div>
</div>
<!-- my pool-->
<div class="cat_on_oven" id="cat_on_oven_popping">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" align="center" class="shut_down" id="shut_down_door" onClick="re_flush_array();">Close this window</td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="hoard">Select Category</td>
    </tr>
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
    <ul id="tiles">
      <div class="bug_removed">Loading ...</div>
      <!-- These are our grid blocks -->
      <?php
		while($row = @mysql_fetch_array($sql)){
			$productId = $row['id'];
		?>
      <li><img src="<?php echo $row['imageUrl']?>" width="200" height="auto"/>
        <p><?php echo $row['title']?></p>
        <a href="<?php echo $row['productUrl'];?>">
        <div class="buy_n">Buy Now</div>
        </a>
        <div class="mrp"><?php echo 'Rs. '.$row['price']?></div>
      </li>
      <?php }?>
      <div id="more<?php echo $productId;?>" class="morebox"> <a href="#" class="more" id="<?php echo $productId; ?>"></a> </div>
      <!-- End of grid blocks -->
    </ul>
    
  </div>
   <div class="for_scr_l" id="_folPosd_"><img src="<?php echo GLOBAL_PATH;?>/img/load.gif" /></div>
</div>

<script src="<?php echo GLOBAL_PATH;?>/js/jquery.min.js"></script>
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.imagesloaded.js"></script> 
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.wookmark.js"></script> 
<script type="text/javascript">
    (function ($){
      var $tiles = $('#tiles'),
          $handler = $('li', $tiles),
          $main = $('#main'),
          $window = $(window),
          $document = $(document),
          options = {
            autoResize: true,
            container: $main,
            offset: 20,
            itemWidth: 210 
          };
      function applyLayout() {
        $tiles.imagesLoaded(function() {
          if ($handler.wookmarkInstance) {
            $handler.wookmarkInstance.clear();
          }
          $handler = $('li', $tiles);
          $handler.wookmark(options);
        });
      }
   /*function onScroll() {

        var winHeight = window.innerHeight ? window.innerHeight : $window.height(),
            closeToBottom = ($window.scrollTop() + winHeight > $document.height() - 400);
        if (closeToBottom) {
          var $items = $('li', $tiles),
              $firstTen = $items.slice(0, 10);
          $tiles.append($firstTen.clone());
          applyLayout();
        }
      };*/
      applyLayout();
    /*  $window.bind('scroll.wookmark', onScroll);*/
    })(jQuery);
	function drop_down_me(){
		var dom_pool___ = document.getElementById('bull_lop');
		dom_pool___.style.display="block";
	}
	function re_flush_array(){
		var po_PP_OO_O_s_ss = document.getElementById('cat_on_oven_popping');
		po_PP_OO_O_s_ss.style.display="none";
	}
	$(document).ready(function(e) {
        $('#for_flush_p').click(function(e) {
            $('#cat_on_oven_popping').toggle();
        });
    });
$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
	//	alert($(document).height());
		if ( ($(this).scrollTop() > 400) || ($(document).height() > 400) ) {
			$('#folPosd').fadeIn();
		}
			 else
			{
			$('#folPosd').fadeOut();
		}
		
		
		
		
		if($(window).scrollTop()+1300 >= $(document).height())
		{ 
			$('#_folPosd_').fadeIn('fast');
			var ID = $('.more').attr("id");
		if(ID)
		{
			$.ajax({
			type: "POST",
			url: "<?php echo GLOBAL_PATH;?>/ajax_more.php",
			data: "last_id="+ ID, 
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
			$(".morebox").html('The End');
		}
		return false;
		}
	});
	
	//Click event to scroll to top
	$('#folPosd').click(function(){
		$('html, body').animate({scrollTop : 0},500);
		return false;
	});
	
	// show at starting loading....	
	$(window).load(function(){
  $(".bug_removed").fadeOut(1000, function(){
    $("#tiles").show('fast');
  });
  });
	
});
</script>
</body>
</html>
