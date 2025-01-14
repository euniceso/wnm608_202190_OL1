<?php 

function productListTemplate($r, $o) {
return $r.<<<HTML
<a class="col-xs-12 col-md-3" href="../so.eunice/m10/product_item.php?id=$o->id">
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


function cartListTemplate($r,$o) {
return $r.<<<HTML
	<div class="display-flex">
		<div class="flex-none images-thumbs">
			<img src="img/$o->thumbnail">
		</div>
		<div class="flex-stretch">
			<strong>$o->title</strong>
			<div>Delete</div>
		</div>
		<div class="flex-none">
			&dollar;$o->price
		</div>
	</div>
HTML;
}