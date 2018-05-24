	<div class="list-group">
		<?php
			$i = 0;
			$j = 0;
		foreach($catname as $id => $value):
			$i++;
			$j = 0;
			?>
		<div class="list-group-item <?php if($i%2 ==0):echo 'list-group-item-danger';else:echo 'list-group-item-warning';endif;?>">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<h2><a href="<?=site_url('Dashboard/shop/category/'.$id)?>"><?=$value?></a></h2>
					</div>
				</div>
			</div>
			<div class="container">
			<div class="row">
				<?php
				foreach($alldata[$id] as $row => $columnvalue):
					$j++;
					?>
				<div class="col-xs-3">
					<div class="panel <?php if($j%2 == 0):echo 'panel-success';else:echo 'panel-info';endif;?>">
						<div class="panel-heading">
							<h4>
								<a href="<?=site_url('Dashboard/shop/item/'.$columnvalue->id);?>"> 
									<?=$columnvalue->title?>		
								</a>
								<br>
								<small>@Rp <?=$columnvalue->harga?></small></h4>
						</div>
						<div class="panel-body">
							<img 
							style="width:200px;height:200px" 
							src=
							"
							<?=base_url('assets/shop/'.$columnvalue->category.'/'.$columnvalue->id.'/img/'.$columnvalue->id.'-1.jpg')?>
							" 
							class="img-rounded">
							<h4>Qty:<?=$columnvalue->quantity?></h4>
						</div>
						<div class="panel-footer">
							<div class="btn-group btn-group-justified">
								<a href="<?=site_url('Dashboard/shop/item/'.$columnvalue->id);?>" class="btn btn-primary">
									More Info
								</a>
								<a class="btn btn-success">
									Add to Cart
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php
				endforeach;
				?>
			</div>
			</div>
		</div>
		<?php
		endforeach;?>
	</div>