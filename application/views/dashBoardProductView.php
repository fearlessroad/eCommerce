<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A Web Page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/dashBoardProductView.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
	<div id="header">
		<h1>Dashboard</h1>
		<a id="orders" href="">Orders</a>
		<a id="products" href="">Products</a>
		<a id="logOff" href="">log off</a>
	</div>
	<div>
		<input id="search" type="text" name="search" placeholder="search">
		<button id="addButton" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add new product</button>
	</div>
	<div id="productsArea">
		<table id="productlist">
			<tr>
				<th class="headRow" id="picture">Picture</th>
				<th class="headRow" id="id">ID</th>
				<th class="headRow" id="name">Name</th>
				<th class="headRow" id="inventory">Inventory Count</th>
				<th class="headRow" id="quantity">Quantity sold</th>
				<th class="headRow" id="action">action</th>
			</tr>
<?php 	foreach($products as $product){?>
			<tr class="products">
				<td><img src="/assets/images/<?=$product['img']?>"></td>
				<td><?=$product['id']?></td>
				<td><?=$product['name']?></td>
				<td><?=$product['quantity']?></td>
				<td>0</td>
				<td><a class="actions" href="">edit</a><a class="actions" href="">delete</a></td>
			</tr>
<?php } ?>
		</table>
	</div>
	<div>
		<a class="page" href="">1</a>
		<a class="page" href="">2</a>
		<a class="page" href="">3</a>
		<a class="page" href="">4</a>
		<a class="page" href="">5</a>
		<a class="page" href="">6</a>
	</div>
	 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Product - ID $2</h4>
        </div>
        <div class="modal-body">
			<table>
				<form action="/products/addproduct/" method="POST">
					<tr>
						<td>Name</td>
						<td><input type="text" name="productName"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><textarea name="description"></textarea></td>
					</tr>
					<tr>
						<td>Categories</td>
						<td>
							<select name="categoryDrop">
<?php foreach($categories as $category){?>
								<option value="<?=$category['name']?>"><?=$category['name']?></option>
<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>or add new category:</td>
						<td><input type="text" name="categoryWrite"></td>
					</tr>
					<tr>
						<td>Price</td>
						<td><input type="text" name="price"></td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><input type="type" name="quantity"></td>
					</tr>
					<tr>
						<td>Images</td>
						<td><input type="text" name="image"></td>
					</tr>
			</table>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add</button>
				</form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>