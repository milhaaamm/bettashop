
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container-fluid">
						<div class="navbar-header" style="border-right:1px solid #000" >
							<div class="navbar-brand">
								<button class="btn btn-xs" data-toggle="collapse" data-target="#topnav,#searchnav">
									<span class="glyphicon glyphicon-menu-hamburger"></span>
								</button>
							</div>
							<a class="navbar-brand" href="<?=site_url()?>">BettaShop</a>
						</div>
						<ul class="nav navbar-nav" id="topnav">
							<li <?php if($activetab=='home'){echo 'class="active"';}else{}?>>
								<a href="<?=site_url('Dashboard/home')?>"><span class="glyphicon glyphicon-home"></span> Home</a>
							</li>
							<li <?php if($activetab=='threads'){echo 'class="active"';}else{}?>>
								<a href="<?=site_url('Dashboard/threads')?>"><span class="glyphicon glyphicon-th-list"></span> Threads</a>
							</li>
							<li <?php if(
								$activetab =='shop' ||
								$activetab == 'listitem' ||
								$activetab == 'cart'){echo 'class="active"';}else{ echo 'class="dropdown"';}?>>
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-chevron-down"></span> Shop</a>
								<ul class="dropdown-menu">
									<li <?php if($activetab=='listitem'){echo 'class="active"';}else{}?>>
										<a href="<?=site_url('Dashboard/shop')?>"><span class="glyphicon glyphicon-tags"></span> List Item</a>
									</li>
									<li <?php if($activetab=='cart'){echo 'class="active"';}else{}?>>
										<a href="<?=site_url('Dashboard/shop/cart')?>"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
									</li>
								</ul>
							</li> 
							<li <?php if($activetab=='members'){echo 'class="active"';}else{}?>>
								<a href="<?=site_url('Dashboard/members')?>"><span class="glyphicon glyphicon-user"></span> Members</a>
							</li>
							<li <?php if(
								$activetab=='account' || 
								$activetab == 'notif' || 
								$activetab == 'profile' || 
								$activetab == 'privatemsg'){echo 'class="dropdown active"';}else{echo 'class="dropdown"';}?>>
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-chevron-down"></span> Account</a>
								<ul class="dropdown-menu">
									<li <?php if($activetab=='profile'){echo 'class="active"';}else{}?>>
										<a href="<?=site_url('Dashboard/profile')?>"><span class="glyphicon glyphicon-info-sign"></span> Profile</a>
									</li>
									<li <?php if($activetab=='notif'){echo 'class="active"';}else{}?>>
										<a href="<?=site_url('Dashboard/notif')?>"><span class="glyphicon glyphicon-bell"></span> Notification</a>
									</li>
									<li <?php if($activetab=='privatemsg'){echo 'class="active"';}else{}?>>
										<a href="<?=site_url('Dashboard/privatemsg')?>"><span class="glyphicon glyphicon-envelope"></span> Private Message</a>
									</li>
									<li><a href="<?=site_url('Logout')?>"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
								</ul>
							</li>
						</ul>
						<form class="navbar-form navbar-right" id="searchnav" action="/action_page.php">
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
				</nav>
			</div>
		</div>