<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
	<title>The Unpopped Kernel</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/productDescription.css">

</head>
<div id="wrapper">
		<div id="header">
			<h2>The Unpopped Kernel</h2> 
		</div>			
		<div id="categories">

			<ul>
				<li><a class="nav" href="">Designer Babies</a></li>
				<li><a class="nav" href="">Toilet Seat Art</a></li>
				<li> <a class="nav" href="">My Little Pony Gear</a></li>
				<li><a class="nav" href="">Apocalypse Kits</a></li>
				<form  id="search" action="?" method="post">
				<li><label><input type="text" name="product_name"></label></li>
				<li><input id="button" type="submit" name="Submit"></li></form>
				<li><a href="/products/shoppingcart/"><img id="cart" src="/assets/images/shoppingcart.png"></a></li>
			</ul>
		</div>
<body>
	<a href="/products/">Go Back</a>

	<h1><?=$product['name']?></h1>
		<img id = "picture" src="/assets/images/<?=$product['category']?>/<?=$product['img']?>"
	
	<div id="product_info">
		<p><?=$product['description']?></p>
	<form action="/products/addCart/<?=$product['id']?>" method="post">
		<label>
			<select name="quantity">
				<option values="1">1 </option>
				<option values="2">2</option>
				<option values="3">3</option>
			</select>
		</label>
		<input type="submit" value="Buy">
	</form>

	</div>

	<div id="similar_items">
		<h2>Similar Items</h2>
<?php foreach($similars as $similar){?>

	<a href="/products/productView/<?=$product['id']?>"><img src="/assets/<?=$product['categoryID']?>/<?=$similar['img']?>"></a>

<?php } ?>

	</div>
</div>
</body>
</html>