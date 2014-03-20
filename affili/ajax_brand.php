<?php
include("globalpath.php");

$getCategory = @base64_decode($_POST['club']);

if(!empty($getCategory))
{
	echo "<option value=''>Select Brand</option>";
	$sql = "select distinct productBrand from flipkart_products where categories REGEXP '[[:<:]]".$getCategory."[[:>:]]' AND inStock = 'TRUE' order by productBrand";
	$result = @mysql_query($sql);

	$count=@mysql_num_rows($result);
	while($row=@mysql_fetch_array($result))
	{
?>
	<option value="<?php echo @str_replace(" ","-",$row['productBrand']);?>"><?php echo @stripslashes($row['productBrand']);?></option>
<?php
	}
}
?>
