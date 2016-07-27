<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="CSS/shopping.css">
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<body>
	<div class ="container">
		<table>
			<thead>
				<th>Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</thead>
			<tbody>
				<td>Item Name</td>
				<td>Item Price</td>
				<td>Item Quantity</td>
				<td>Total Price</td>
			</tbody>
		</table>
		<div id="payment">
			<div id="shipment">
			<form action 
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
			</div>
		</div>
	</div>
</body>
</html>