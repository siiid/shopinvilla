<?php
include("globalpath.php");


if(isSet($_POST['last_id']))
{
$lastId=$_POST['last_id'];
$result = @mysql_query("select id, title, imageUrl, price, productUrl from flipkart_products where inStock = 'TRUE' and imageUrl != '' order by rand() limit 30");
//id < "'.$lastId.'" AND
$count=mysql_num_rows($result);
while($row=mysql_fetch_array($result))
{
	$productId = $row['id'];
?>
 

<li>
	<img src="<?php echo $row['imageUrl']?>" width="200" height="auto"/>
    <p><?php echo $row['title']?></p>
	<a href="<?php echo $row['productUrl'];?>" target="_blank">
        <div class="buy_n">Buy Now</div>
        <div class="mrp"><?php echo 'Rs. '.$row['price']?></div></a>
</li>


<?php
}


?>

<div id="more<?php echo $productId; ?>" class="morebox">
<a href="#" id="<?php echo $productId; ?>" class="more"></a>
</div>

<?php
}
?>
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.min.js"></script>
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.imagesloaded.js"></script> 
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.wookmark.js"></script> 
<script src="<?php echo GLOBAL_PATH;?>/js/jquery.wookmark1.js"></script> 