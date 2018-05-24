<div class="row">
	<div class="col-xs-12">
		<div class="page-header">
			<h3><?=$item->title?></h3>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<img style="width:100%" src="<?=base_url('assets/shop/'.$item->category.'/'.$item->id.'/img/'.$item->id.'-1.jpg')?>">
			</div>
			<div class="col-xs-6">
				<?php echo file_get_contents(base_url('assets/shop/'.$item->category.'/'.$item->id.'/description.txt'));?>
			</div>
			<div class="col-xs-2">
				Harga : <?=$item->harga?>
				<br>
				<a class="btn btn-primary" href="">Buy Now</a>
				<a class="btn btn-success" href="">Add to Shopping Cart</a>
			</div>
		</div>
	</div>
</div>