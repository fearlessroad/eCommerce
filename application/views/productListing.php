<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
	<title>The Unpopped Kernel</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/productlisting.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.nav').click(function(e){
				e.preventDefault();
				if($(this).attr('id')=='babies'){
					var name = $(this).attr('id');
				}
				$.ajax({
					method:'GET',
					url:'/products/getProductsByCategory/'+name+'/'
				}).done(function(data){
					$('#products').html(data);
				});
			});
		});


	</script>
</head>
<body>
	<div id="wrapper">

	

		<div id="header">
			<h2>The Unpopped Kernel</h2> 
		</div>			
		<div id="categories">
			<ul>
				<li><a id="babies" class="nav" href="#">Designer Babies</a></li>
				<li><a id="toiletseatart" class="nav" href="#">Toilet Seat Art</a></li>
				<li> <a id="mylittleponygear" class="nav" href="#">My Little Pony Gear</a></li>
				<li><a id="apocalypse kits" class="nav" href="#">Apocalypse Kits</a></li>
				<form  id="search" action="?" method="post">
				<li><label><input type="text" name="product_name"></label></li>
				<li><input id="button" type="submit" name="Submit"></li></form>
				<li><a href="/products/shoppingcart/"><img id="cart" src="/assets/images/shoppingcart.png"></a></li>
	<!-- <a id="shoppingCart" href="/products/shoppingcart/">Shopping Cart (<?= $total; ?>)</a> --> <!--Tom working on: need to tie in # of prods in cart-->
			</ul>
		</div>
		<div id="main">
			<h1>All Products</h1>
			<a  id="first" href="?">First</a>
			<a  id="prev" href="?">Prev</a>
			<a  id="" href="?">#</a>
			<a id="next" href="?">Next</a><br>	
			<form action="?" method="post">
				<label>
					<select>
						<option>Price</option>
						<option>Most Popular</option>
					</select>
				</label>
			</form>
			<div id="products">
<?php foreach($products as $product){?>
			<div class="productlist">
			<a href="/products/productView/<?=$product['id']?>">
			<img class='product_img' src='/assets/images/<?=$product["category"]?>/<?=$product["img"]?>'></a><p><?=$product['name']?></p>
			</div>
<?php } ?>
			</div>
			<a  id="page_one" href="?">1</a>
			<a id="page_two" href="?">2</a>

		</div>
	</div>
	<h1> TEST</h1>
</body>
</html>