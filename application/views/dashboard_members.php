
		<div class="row">
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#mostmsg" data-toggle="tab">Most Msg</a></li>
					<li><a href="#mostlikes" data-toggle="tab">Most Likes</a></li>
					<li><a href="#staff" data-toggle="tab">Staff</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="tab-content">
					<div id="mostmsg" class="tab-pane fade in active">
						<div class="well well-lg">
							<div class="list-group">
								<?php
								foreach($mostmsg as $mbr):
								?>
								<a class="list-group-item" href="<?=site_url('Dashboard/profile/'.$mbr->username)?>">
									<h3><?=$mbr->username?></h3>
								</a>
								<?php
								endforeach;
								?>
							</div>
						</div>
					</div>
					<div id="mostlikes" class="tab-pane fade out">
						<div class="well well-lg">
							<div class="list-group">
								<?php
								foreach($mostlikes as $mbr):
								?>
								<a class="list-group-item list-group-item-info" href="<?=site_url('Dashboard/profile/'.$mbr->username)?>">
									<h3><?=$mbr->username?></h3>
								</a>
								<?php
								endforeach;
								?>
							</div>
						</div>
					</div>
					<div id="staff" class="tab-pane fade out">
						<div class="well well-lg">
							<div class="list-group">
								<?php
								foreach($staff as $mbr):
								?>
								<a class="list-group-item list-group-item-warning" href="<?=site_url('Dashboard/profile/'.$mbr->username)?>">
									<h3><?=$mbr->username?></h3>
								</a>
								<?php
								endforeach;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>