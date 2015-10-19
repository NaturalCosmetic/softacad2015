<?php require_once('header.php'); ?>

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<form method="post" action="do_add_product.php">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Product name...">
					</div>

					<div class="form-group">
						<label for="price">Price:</label>
						<input type="number" name="price" class="form-control" id="price" placeholder="Price...">
					</div>

					<div class="form-group">
						<label for="quantity">Quantity:</label>
						<input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity...">
					</div>

					<button type="submit" class="btn btn-default">Add Product</button>
				</form>

				<br><br>
			</div>
		</div>
	</section><!--/form-->

<?php require_once('footer.php'); ?>