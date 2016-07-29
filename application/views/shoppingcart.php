<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="/assets/css/shoppingcart.css">
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script>
		$(document).ready(function(){

		});
	</script>
</head>
<body>
<?php 	
$data = $this->session->userdata();
//Tom's work for updating cart totals 
	$total = 0;
	foreach($products as $product)
	{
		$temp = $product['price'] * $this->session->userdata($item['id']);
		$total += $temp;
		if($this->session->userdata($item['id']) >0)
		{
			echo "<div class='item'>
					<div class='description'>
					<p>Name: {$product['name']}</p>
					<p>Price: \${$product['price']}</p>
					<p>Quantity: {$this->session->userdata($item['id'])}</p>
					<form action='/products/removecart/{$item['id']}' method='post'>
						<select name='qty'>";
						for ($i=1; $i<= $this->session->userdata($product['id']); $i++)
						{
							echo "<option>{$i}</option>";
						}
						echo "</select>
						<input type='submit' value='Remove'>
					</form>
				</div>
			</div>"; 
		}
	}
	echo "<h3>Total Price : \${total}</h3>"
	?>
<!--	<div class ="container">
		<table id="cart">
			<thead>
				<th class="tableHead" id="Item">Item</th>
				<th class="tableHead" id="Price">Price</th>
				<th class="tableHead" id="Quantity">Quantity</th>
				<th class="tableHead" id="Total">Total</th>
			</thead>
			<tbody>
				<td>Item Name</td>
				<td>Item Price</td>
				<td>Item Quantity</td>
				<td>Total Price</td>
			</tbody>
		</table>
-->
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



		<form action="" method="POST" id="payment-form">
			<div id="payment">
				<div id="shipment">
					<h4>Shipping Information</h4>
					<label>First Name</label><input type="text" name="first_name"><br>
					
					<label>Last Name</label><input type="text" name="last_name"><br>
					
					<label>Address</label>
					<input type="text" name="address"><br>
					<label>Address 2</label>
					<input type="text" name="address2"><br>
					<label>City</label>
					<input type="text" name="city"><br>
					<label>State</label>
					<input type="text" name="state"><br>
					<label>Zipcode</label>
					<input type="text" name="zipcode"><br>
				</div>
				<div id="billing">
					<h4>Billing Information</h4>
					<input type="checkbox"><label id="checkboxid">Check if same as shipping address.</label><br>
					<label>First Name</label>
					<input type="text" name="first_name"><br>
					<label>Last Name</label>
					<input type="text" name="last_name"><br>
					<label>Address</label>
					<input type="text" name="address"><br>
					<label>Address 2</label>
					<input type="text" name="address2"><br>
					<label>City</label>
					<input type="text" name="city"><br>
					<label>State</label>
					<input type="text" name="state"><br>
					<label>Zipcode</label>
					<input type="text" name="zipcode"><br>
					<script
    					src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    					data-key="pk_test_BKJLSNKJkOkrl1UufIl8SHEz"
    					data-amount="999"
    					data-name="Demo Site"
    					data-description="Widget"
    					data-image="/img/documentation/checkout/marketplace.png"
    					data-locale="auto"
    					data-zip-code="true">
  					</script>
		<form action="/products/index/">
		<input type="submit" value="Continue Shopping">
		</form>
				</div>
			</div>
		</form>
</div>
</body>
</html>