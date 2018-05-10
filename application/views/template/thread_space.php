<div class="panel panel-warning">
	<div class="panel-heading">
		<div class="page-heading">
			<h3><?=$data->title?></h3>
			<h5>Discussion in 
				<a href="<?=site_url('Dashboard/threads/'.$data->category)?>"><?=$catname?></a>, started by 
				<a href="<?=site_url('Dashboard/bio/'.$data->author)?>"><?=$data->author?></a></h5>
		</div>
		<ul class="pagination">
			<li class="previous">
				<a 
			<?php
			if($page != 1):
				echo 'href="'.site_url("Dashboard/threads/".$data->category."/".($page-1)).'"';
			else:
				
			endif;
			?>
			>Previous</a></li>
			<?php
			$pages=ceil($data->replies/20);
			for($i = 0;$i < $pages;$i++):
			?>
			<li <?php if($i+1 == $page):echo 'class="active"';endif;?>>
				<a href="<?=site_url('Dashboard/threads/'.$data->category.'/'.$i+1)?>"><?=($i+1)?></a>
			</li>
			<?php
			endfor;
			?>
			<li class="next">
				<a <?php
			if($page < $pages):
				echo 'href="'.site_url("Dashboard/threads/".$data->category."/".($page+1)).'"';
			else:
				
			endif;
			?>
			>Next</a>
			</li>
		</ul>
		<p>Message <?=(($page*20)-19)?> to <?php if($page != $pages):echo ($page*20);else:echo $data->replies;endif;?> of <?=$data->replies?></p>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12">
				<ul class="list-group">
					<?php
					foreach($msg as $eachmsg):
					?>
					<li class="list-group-item">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h5><?=$eachmsg->msgauthor?>,<?=$eachmsg->dateposted?></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="well well-sm">
									<img style="max-width:100px;" src="<?=$imgmsgpath[(string)$eachmsg->id]?>" title="<?=$eachmsg->msgauthor?>" class="img-rounded center-block">
									<center><h3 class="caption"><a href="#"><?=$eachmsg->msgauthor?></a></h3><center>	
								</div>
							</div>
							<div class="col-md-10">
								<div class="well well-md">
									<div id="msg-content">
										<?php
										echo file_get_contents($msgpath[$eachmsg->id]);
										?>
									</div>
									<div id="like-box" class="panel panel-success">
										<div class="panel-heading">
											Myself and other 666 people liked this.
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?php
					endforeach;
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<ul class="pagination">
			<li class="previous">
				<a 
			<?php
			if($page != 1):
				echo 'href="'.site_url("Dashboard/threads/".$data->category."/".($page-1)).'"';
			else:
				
			endif;
			?>
			>Previous</a></li>
			<?php
			$pages=ceil($data->replies/20);
			for($i = 0;$i < $pages;$i++):
			?>
			<li <?php if($i+1 == $page):echo 'class="active"';endif;?>>
				<a href="<?=site_url('Dashboard/threads/'.$data->category.'/'.$i+1)?>"><?=($i+1)?></a>
			</li>
			<?php
			endfor;
			?>
			<li class="next">
				<a <?php
			if($page < $pages):
				echo 'href="'.site_url("Dashboard/threads/".$data->category."/".($page+1)).'"';
			else:
				
			endif;
			?>
			>Next</a>
			</li>
		</ul>
		<p>Message <?=(($page*20)-19)?> to <?php if($page != $pages):echo ($page*20);else:echo $data->replies;endif;?> of <?=$data->replies?></p>
	</div>
</div>