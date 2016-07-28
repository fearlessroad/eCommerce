<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard Orders</title>
	<link rel="stylesheet" types="text/css" href="/assets/css/dashboardorders.css">

	</style>
</head>
<body>
	<div id='wrapper'>
		<div id="header">
			<h1>Dashboard</h1>
			<a id="orders" href="/dashboards/showorders/">Orders</a>
			<a id="products" href="/dashboards/showproducts/">Products</a>
			<a id="logOff" href="/dashboards/logout">log off</a>
		</div>

		<div id="order">
			<h1>Order ID</h1>

			<p>Customer shipping info:</p>
			<ul>
				<li>Name: <!--<?=$user["name"] ?>--></li>						<!--need to tie to the database-->
				<li>Address: <!--<?=$user["address"] ?>--></li>
				<li>City: <!--<?=$user["city"] ?>--></li>
				<li>State: <!--<?=$user["state"] ?>--></li>
				<li>Zip: <!--<?=$user["zip"] ?>--></li>
			</ul>

			<p>Customer billing info:</p>
			<ul>
				<li>Name: <!--<?=$user["name"] ?>--></li>						<!--need to tie to the database-->
				<li>Address: <!--<?=$user["address"] ?>--></li>
				<li>City: <!--<?=$user["city"] ?>--></li>
				<li>State: <!--<?=$user["state"] ?>--></li>
				<li>Zip: <!--<?=$user["zip"] ?>--></li>
			</ul>
		</div>
		<div id="orderInfo">
			<table>
				<tr>
					<th class="tableHead" id="orderID">Order ID</th>
					<th class="tableHead" id="item">Item</th>
					<th class="tableHead" id="price">Price</th>
					<th class="tableHead" id="quantity">Quantity</th>
					<th class="tableHead" id="total">Total</th>					
				</tr>
				<tr class="orderRow">
					<td></td>											<!--need to tie to the database-->
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="orderRow">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>

			<h3>Status: <!--<?= $status['status'] ?>--></h3>					<!--need to tie to the database-->

			<ul>
				<li>Sub Total: <!--<?=$subTotal["subTotal"] ?>--></li>			<!--need to tie to the database-->
				<li>Shipping: <!--<?=$shipping["shipping"] ?>--></li>
				<li>Total Price: <!--<?=$total["total"] ?>--></li>				
			</ul>
		</div>
	
	</div>
</body>
</html>








		