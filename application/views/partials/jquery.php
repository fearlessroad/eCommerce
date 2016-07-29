<?php foreach($jquery as $query){?>
			<div class="productlist">
			<a href="/products/productView/<?=$query['id']?>">
			<img class='product_img' src='/assets/images/<?=$query["category"]?>/<?=$query["img"]?>'></a><p><?=$query['name']?></p>
			</div>
<?php } ?>