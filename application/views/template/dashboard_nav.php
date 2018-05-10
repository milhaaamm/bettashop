
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="row">
						<div class="col-md-1">
							<button class="btn btn-sm" data-toggle="collapse" data-target="#topnav">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
							</button>
						</div>
						<div class="col-md-11"  id="topnav">
							<div class="container-fluid">
								<ul class="nav navbar-nav">
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

								<form class="navbar-form navbar-left" action="/action_page.php">
							      <div class="input-group">
							        <input type="text" class="form-control" placeholder="Search" name="search">
							        <div class="input-group-btn">
							          <button class="btn btn-default" type="submit">
							            <i class="glyphicon glyphicon-search"></i>
							          </button>
							        </div>
							      </div>
							    </form>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>