
		<div class="row">
			<div class="col-sm-3">
				<div class="page-header">
					<h2>My Thread</h2>
				</div>
				<div class="list-group">
					<?php
					if($mythread== null):
						?>
						<h4>you dont have any thread.</h4>
					<?php
					else:
						foreach ($mythread as $eachthread):
						?>
					<a href="<?=site_url('Dashboard/thread/'.$eachthread->threadid)?>" class="list-group-item list-group-item-warning">
						<h4 class="list-group-item-heading"><?=$eachthread->title?></h4>
						<p class="list-group-item-text"><?=$eachthread->descriptionsum?></p>
						<p class="list-group-item-footer">Views:<?=$eachthread->views?>|Replies:<?=$eachthread->replies?></p>
					</a>
					<?php
						endforeach;
					endif;
					?>
				</div>
				<a href="#" class="btn btn-block btn-md btn-info"> See More >></a>
			</div>