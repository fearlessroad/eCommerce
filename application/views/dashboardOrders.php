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
			<a href="/dashboards/showorders/">Orders</a>
			<a href="/dashboards/showproducts">Products</a>
			<a href="/dashboards/logout/" href="">Logout</a>			
			<form id="Search">
				<input type="search" name="search" placeholder="search">
			</form>
		</div>

		<div id="searchBar">

			<select id="ShowAll" name="showAll">
				<option value="Show All">Show All</option>
				<option value="Order In">Order in</option>
				<option value="Process">Process</option>
				<option value="Shipped">Shipped</option>
			</select>
		</div>

		<div id="orders">
			<table>
				<tr>
					<th class="tableHead" id="orderID">Order ID</th>
					<th class="tableHead" id="name">Name</th>
					<th class="tableHead" id="date">Date</th>
					<th class="tableHead" id="billingAddress">Billing Address</th>
					<th class="tableHead" id="total">Total</th>
					<th class="tableHead" id="status">Status</th>
				</tr>
				<tr class="orderRow">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<select name="Shipped">
							<option value="Shipped">Shipped</option>
							<option value="Order in process">Order in process</option>
							<option value="Cancelled">Cancelled
							</option>
						</select>
					</td>
				</tr>
				<tr class="orderRow">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<select name="Shipped">
							<option value="Shipped">Shipped</option>
							<option value="Order in process">Order in process</option>
							<option value="Cancelled">Cancelled
							</option>
						</select>
					</td>
				</tr>
				<tr class="orderRow">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<select name="Shipped">
							<option value="Shipped">Shipped</option>
							<option value="Order in process">Order in process</option>
							<option value="Order in process">Order in process
							</option>
						</select>
					</td>
				</tr>
				<tr class="orderRow">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<select name="Shipped">
							<option value="Shipped">Shipped</option>
							<option value="Order in process">Order in process</option>
							<option value="Cancelled">Cancelled</option>
						</select>
					</td>
				</tr>
				<tr class="orderRow">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<select name="Shipped">
							<option value="Shipped">Shipped</option>
							<option value="Order in process">Order in process</option>
							<option value="Cancelled">Cancelled</option>
						</select></td>
				</tr>			
		</div>





	</div>	
</body>
</html>