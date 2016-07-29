<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="/assets/css/shoppingcart.css">
<	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script>
		$(document).ready(function(){

		});
	</script>
</head>
<body>
	<div class ="container">
		<table id="cart">
			<thead>
				<th class="tableHead" id="Item">Item</th>
				<th class="tableHead" id="Price">Price</th>
				<th class="tableHead" id="Quantity">Quantity</th>
				<th class="tableHead" id="Total">Total</th>
			</thead>
			<tbody>
				<td><?=$data['name']?></td>
				<td><?=$data['price']?></td>
				<td><?=$data['quantity']?></td>
				<td><?=$data['price']?></td>
			</tbody>
		</table>

		
		<form action="/products/index/">
		<input type="submit" value="Continue Shopping">
		</form>



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
<!--					<script
    					src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    					data-key="pk_test_BKJLSNKJkOkrl1UufIl8SHEz"
    					data-amount="999"
    					data-name="Demo Site"
    					data-description="Widget"
    					data-image="/img/documentation/checkout/marketplace.png"
    					data-locale="auto"
    					data-zip-code="true"> 	
  					</script>	-->
				</div>
			</div>
		</form>
	</div>
</body>
</html>