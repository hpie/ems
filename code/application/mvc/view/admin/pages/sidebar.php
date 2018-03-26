<body class="page-body skin-black" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="<?php echo BASE_URL.'dashboard' ?>">
						<img src="<?php echo ASSETS; ?>images/ibrandlogo.png" width="120" alt="iBrand" />
					</a>
				</div>
				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>				
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>
			</header>			
                        <div class="sidebar-user-info">
				<div class="sui-normal">
					<a href="#" class="user-link">
						<img src="<?php echo THUMB_IMAGES; ?>default1.png" width="55" alt="iBrand" class="img-circle" />
						<span>Welcome,</span>
						<strong><?php echo $_SESSION['admin_name']; ?></strong>
					</a>
				</div>

				<div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
					<a href="#">
						<i class="entypo-user"></i>
						Profile
					</a>
					<a href="#">
						<i class="entypo-lock"></i>
						Log Off
					</a>
					<span class="close-sui-popup">&times;</span><!-- this is mandatory -->				</div>
			</div>												
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li class="has-sub">
					<a href="<?php echo ADMIN_DASHBOARD_LINK; ?>">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
				</li> 
				<li class="has-sub">
					<a href="#">
						<i class="entypo-users"></i>
						<span class="title">Customer</span>
					</a>
					<ul>
						<li>
                                                    <a href="<?php echo MASTER_ADMIN_CUSTOMER_LIST_LIINK; ?>">
								<i class="entypo-lock-open"></i>
								<span class="title">Customer List</span>
							</a>
						</li>											
					</ul>
				</li>
			</ul>
			
		</div>

	</div>