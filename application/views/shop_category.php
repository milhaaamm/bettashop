<div class="row">
	<div class="col-xs-12">
		<div class="page-header">
			<h3><?=$catdetail->nama?></h3>
		</div>
		<div class="table-responsive">
			<table class="table">
				<tr>
				<?php
				$i = 0;
				foreach($item as $column):
				$i++;
				if($i > 4):
					echo '</tr><tr>';
					$i = 1;
				endif;
				?>
				<td>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4>
								<a href="<?=site_url('Dashboard/shop/item/'.$column->id);?>"> 
									<?=$column->title?>		
								</a>
								<br>
								<small>@Rp <?=$column->harga?></small></h4>
						</div>
						<div class="panel-body">
							<img 
							style="width:200px;height:200px" 
							src=
							"
							<?=base_url('assets/shop/'.$column->category.'/'.$column->id.'/img/'.$column->id.'-1.jpg')?>
							" 
							class="img-rounded">
							<h4>Qty:<?=$column->quantity?></h4>
						</div>
						<div class="panel-footer">
							<div class="btn-group btn-group-justified">
								<a href="<?=site_url('Dashboard/shop/item/'.$column->id);?>" class="btn btn-primary">
									More Info
								</a>
								<a class="btn btn-success">
									Add to Cart
								</a>
							</div>
						</div>
					</div>
				</td>
				<?php
				endforeach;
				?>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<button class="btn btn-default btn-bg btn-block">
			<span class="glyphicon glyphicon-triangle-bottom"></span> 
			See More
		</button>
	</div>
</div>