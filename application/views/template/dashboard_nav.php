
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8">
				<ul class="nav nav-tabs nav-justified">
					<li <?php if($activetab=='home'){echo 'class="active"';}else{}?>>
						<a href="<?=site_url('Dashboard/home')?>"><span class="glyphicon glyphicon-home"></span><br>Home</a>
					</li>
					<li <?php if($activetab=='threads'){echo 'class="active"';}else{}?>>
						<a href="<?=site_url('Dashboard/threads')?>"><span class="glyphicon glyphicon-th-list"></span><br>Threads</a>
					</li>
					<li <?php if($activetab=='shop'){echo 'class="active"';}else{}?>>
						<a href="<?=site_url('Dashboard/shop')?>"><span class="glyphicon glyphicon-shopping-cart"></span><br>Shop</a>
					</li>
					<li <?php if($activetab=='bio' || $activetab == 'notif'){echo 'class="dropdown active"';}else{echo 'class="dropdown"';}?>>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><br>Profile</a>
						<ul class="dropdown-menu">
							<li <?php if($activetab=='bio'){echo 'class="active"';}else{}?>>
								<a href="<?=site_url('Dashboard/bio')?>"><span class="glyphicon glyphicon-info-sign"></span> Biography</a>
							</li>
							<li <?php if($activetab=='notif'){echo 'class="active"';}else{}?>>
								<a href="<?=site_url('Dashboard/notif')?>"><span class="glyphicon glyphicon-bell"></span> Notification</a>
							</li>
							<li><a href="<?=site_url('Logout')?>"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-sm-2">
			</div>
		</div>