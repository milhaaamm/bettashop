
			<div class="col-sm-9">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-10">
							<h2>Forum - <?=$catinfo->catname?></h2>
						</div>
						<div class="col-sm-2">
							<h2><a href="<?=site_url('Dashboard/createthread')?>" class="btn btn-success btn-block">Create Thread <span class="glyphicon glyphicon-pencil"></span></a></h2>
						</div>
					</div>
				</div>
				<ul class="list-group">
					<li class="list-group-item active">
						<div class="btn-group btn-group-justified">
							<a class="btn btn-success btn-md">sortby</a>
							<a href="<?=site_url('Dashboard/threads/'.$catinfo->catid.'/sortby=title&order=desc')?>" class="btn btn-info btn-md">Title</a>
							<a href="<?=site_url('Dashboard/threads/'.$catinfo->catid.'/sortby=datecreated&order=desc')?>" class="btn btn-info btn-md">Date</a>
							<a href="<?=site_url('Dashboard/threads/'.$catinfo->catid.'/sortby=views&order=desc')?>" class="btn btn-info btn-md">Views</a>
							<a href="<?=site_url('Dashboard/threads/'.$catinfo->catid.'/sortby=replies&order=desc')?>" class="btn btn-info btn-md">Replies</a>
							<a href="<?=site_url('Dashboard/threads/'.$catinfo->catid.'/sortby=lastupdate&order=desc')?>" class="btn btn-info btn-md">Last Update</a>
						</div>
					</li>
					<?php
					if($threadrecords == null):
					?>
						<h3>Nothing found</h3>
					<?php
					else:
						foreach ($threadrecords as $threads => $thread):
					?>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-1">
								<img class="img-rounded" style="width:100%" src="<?=$imgpath[$thread->author]?>" alt="<?=$authordata[$thread->author]->fullname?>">
							</div>
							<div class="col-sm-7">
								<h4><a href="<?=site_url('Dashboard/thread/'.$thread->threadid)?>"><?=$thread->title?></a></h4>
								<br>
								<p><a href="<?=site_url('Dashboard/profile/'.$thread->author)?>"><?=$thread->author?></a>, <?=$thread->datecreated?></p>
							</div>
							<div class="col-sm-2">
								<strong>Views:<?=$thread->views?></strong>
								<br>
								<p>Replies:<?=$thread->replies?></p>
								<p>Likes:<?=$thread->likes?></p>
							</div>
							<div class="col-sm-2">
								<h5>SIAPA KEK</h5><br>
								<h6>Jam Berapa Kek</h6>
							</div>
						</div>
					</li>
					<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>
		</div>			