<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A Web Page</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/dashBoardProductView.css">
	<script src="/assets/js/coolcat.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<img id="coolcat" src="/assets/images/coolcat.png" alt="">
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
		<table>
			<tr>
				<th class="headRow" id="picture">Picture</th>
				<th class="headRow" id="id">ID</th>
				<th class="headRow" id="name">Name</th>
				<th class="headRow" id="inventory">Inventory Count</th>
				<th class="headRow" id="quantity">Quantity sold</th>
				<th class="headRow" id="action">action</th>
			</tr>
			<tr class="products">
				<td>img</td>
				<td>1</td>
				<td>t-shirt</td>
				<td>123</td>
				<td>1000</td>
				<td><a class="actions" href="">edit</a><a class="actions" href="">delete</a></td>
			</tr>
			<tr class="products">
				<td>img</td>
				<td>1</td>
				<td>t-shirt</td>
				<td>123</td>
				<td>1000</td>
				<td><a class="actions" href="">edit</a><a class="actions" href="">delete</a></td>
			</tr>
			<tr class="products">
				<td>img</td>
				<td>1</td>
				<td>t-shirt</td>
				<td>123</td>
				<td>1000</td>
				<td><a class="actions" href="">edit</a><a class="actions" href="">delete</a></td>
			</tr>
			<tr class="products">
				<td>img</td>
				<td>1</td>
				<td>t-shirt</td>
				<td>123</td>
				<td>1000</td>
				<td><a class="actions" href="">edit</a><a class="actions" href="">delete</a></td>
			</tr>
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
				<form>
					<tr>
						<td>Name</td>
						<td><input type="text" name="" placeholder="hat"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><textarea></textarea></td>
					</tr>
					<tr>
						<td>Categories</td>
						<td>
							<select>
								<option>Shirt $editButton $trashBin</option>
								<option>Hat $editButton $trashBin</option>
								<option>Mug $editButton $trashBin</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>or add new category:</td>
						<td><input type="text" name=""></td>
					</tr>
					<tr>
						<td>Images</td>
						<td><button>Upload</button></td>
					</tr>
				</form>
			</table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>