<?php 

function productListTemplate($r, $o) {
return $r.<<<HTML
<a class="col-xs-12 col-md-3" href="../so.eunice/m11/product_item.php?id=$o->id">
	<figure class="figure product-overlay display-flex flex-column">
		<div>
			<img src="img/$o->thumbnail" alt="">
		</div>
		<figcaption>
			<div class="caption-body">
				<div>$o->title</div>
				<div>&dollar;$o->price</div>
			</div>
		</figcaption>
	</figure>
</a>

HTML;
}



function selectAmount($amount=1,$total=10) {
	$output = "<select name='amount'>";
	for($i=1;$i<=$total;$i++) {
		$output .= "<option ".($i==$amount?"selected":"").">$i</option>";
	}
	$output .= "</select>";
	return $output;
}

function cartListTemplate($r,$o) {
$totalfixed = number_format($o->total,2,'.','');
$selectamount = selectAmount($o->amount,10);
return $r.<<<HTML
	<div class="display-flex">
		<div class="flex-none images-thumbs">
			<img src="img/$o->thumbnail">
		</div>
		<div class="flex-stretch">
			<strong>$o->title</strong>
			<form action="m11/cart_actions.php?action=delete-cart-item" method="post">
				<input type="hidden" name="id" value="$o->id">
				<input type="submit" class="form-button inline secondary" value="Delete" style="font-size:0.8em">
			</form>
		</div>
		<div class="flex-none">
			<div>&dollar;$totalfixed</div>

			<form action="m11/cart_actions.php?action=update-cart-item" method="post" onchange="this.submit()">
				<input type="hidden" name="id" value="$o->id">
				<div class="form-select" style="font-size: 0.8em;">
					$selectamount
				</div>
			</form>
		</div>
	</div>
HTML;
}




function cartTotals() {
	$cart = getCartItems();

	$cartprice = array_reduce($cart,function($r,$o){return $r + $o->total;},0);

	$pricefixed = number_format($cartprice,2,'.','');
	$taxfixed = number_format($cartprice*0.0725,2,'.','');
	$taxedfixed = number_format($cartprice*1.0725,2,'.','');

return 
<<<HTML
<div class="card-section display-flex">
	<div class="flex-stretch"><strong>Sub Total</strong></div>
	<div class="flex-none">&dollar;$pricefixed</div>
</div>
<div class="card-section display-flex">
	<div class="flex-stretch"><strong>Taxes</strong></div>
	<div class="flex-none">&dollar;$taxfixed</div>
</div>
<div class="card-section display-flex">
	<div class="flex-stretch"><strong>Total</strong></div>
	<div class="flex-none">&dollar;$taxedfixed</div>
</div>
<div class="card-section">
	<a href="../so.eunice/m11/product_checkout.php" class="form-button">Checkout</a>
</div>

HTML;
}



















