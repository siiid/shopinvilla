<?php
include 'globalpath.php';

$sql1 = "select parameter from categories";
$result1 = mysql_query($sql1) or die(mysql_error());
while($row1 = mysql_fetch_array($result1)){
	$urlCat = $row1['parameter'];
	$tableName = 'flipkart_'.str_replace('-','_',$row1['parameter']);
	
	$sql2 = "select * from $tableName";
	$result2 = mysql_query($sql2) or die(mysql_error());
	while($row2 = mysql_fetch_array($result2)){
		
		$productId = $row2['productId'];
		$title = trim(str_replace("'","\'",$row2['title']));
		$imageUrl = $row2['imageUrl'];
		$mrp = $row2['mrp'];
		$price = $row2['price'];
		$productUrl = $row2['productUrl'];
		$categories = trim(str_replace("'","\'",$row2['categories']));
		$productBrand = trim(str_replace("'","\'",$row2['productBrand']));
		$deliveryTime = trim(str_replace("'","\'",$row2['deliveryTime']));
		$inStock = trim(str_replace("'","\'",$row2['inStock']));
		$codAvailable = trim(str_replace("'","\'",$row2['codAvailable']));
		$emiAvailable = trim(str_replace("'","\'",$row2['emiAvailable']));
		$offers = trim(str_replace("'","\'",$row2['offers']));
		$discount = trim(str_replace("'","\'",$row2['discount']));
		$cashback = trim(str_replace("'","\'",$row2['cashback']));
	
	
		$import="insert into flipkart_products (urlCat, productId, title, imageUrl, mrp, price, productUrl, categories, productBrand, deliveryTime, inStock, codAvailable, emiAvailable, offers, discount, cashback) values ('$urlCat', '$productId', '$title', '$imageUrl', '$mrp', '$price', '$productUrl', '$categories', '$productBrand', '$deliveryTime', '$inStock', '$codAvailable', '$emiAvailable', '$offers', '$discount', '$cashback')";
		mysql_query($import) or die("insert:".mysql_error());
		
	}
}
print "Import done";
?>