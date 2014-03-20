<?php
mysql_connect("localhost","root","");
mysql_select_db("eshopping");

$sql = mysql_query('select title, imageUrlStr, price from flipkart where inStock = \'TRUE\'limit 0, 20');
echo"hi im back";
?>