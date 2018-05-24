<div class="row">
	<div class="col-sm-4">
		<div class="panel">
			<div class="panel-heading">
				<a class="btn btn-success" href="<?=site_url('Dashboard/privatemsg/newmsg')?>">New private message</a>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<a href="<?=site_url('Dashboard/privatemsg/id')?>" class="list-group-item">
						<h3>milhaaamm</h4>
						<h5>Latest Chat : </h5>\
					</a>
					<a href="<?=site_url('Dashboard/privatemsg/id')?>" class="list-group-item">
						<h3>operator</h4>
						<h5>Latest Chat : </h5>\
					</a>
					<a href="<?=site_url('Dashboard/privatemsg/id')?>" class="list-group-item">
						<h3>admin</h4>
						<h5>Latest Chat : </h5>\
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><a href="<?=site_url('Dashboard/profile/milhaaamm')?>">milhaaamm</h3>
			</div>
			<div class="panel-body" style="height:500px;overflow:auto">
			</div>
			<div class="panel-footer">
				<form action="<?=site_url('Dashboard/privatemsg/id')?>">
					<textarea style="width:100%;height:100px" name="pvtmsg"></textarea>
					<input type="submit" value="Send">
				</form>
			</div>
		</div>
	</div>
</div>