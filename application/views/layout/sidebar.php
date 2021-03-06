<?php
	$active = '';
	$active = "active opened active expanded";
?>

<div class="sidebar-menu toggle-others fixed">
	<div class="sidebar-menu-inner ps-container ps-active-y">	
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				<a href="#" class="logo-expanded">
					<img src="<?= base_url() ?>assets/images/logo@2x.png" alt="" width="80">
				</a>
			</div>

			<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
			<div class="mobile-menu-toggle visible-xs">
				<a href="#" data-toggle="mobile-menu">
					<i class="fa-bars"></i>
				</a>
			</div>								
		</header>			
				
		<ul id="main-menu" class="main-menu">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<li>
				<a href="<?= base_url()."admin" ?>">
					<i class="fa-home"></i>
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="has-sub">
				<a href="#">
					<i class="fa-database"></i>
					<span class="title">Data Management</span>
				</a>
				<ul>
					<li>
						<a href="<?= base_url()."admin/civil_input" ?>">
							<span class="title">Input Penduduk</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url()."admin/civil_data" ?>">
							<span class="title">Data Penduduk</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url()."admin/civil_statistic" ?>">
							<span class="title">Statistik penduduk</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url()."admin/civil_archive" ?>">
							<span class="title">Arsip Penduduk</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="#">
					<i class="fa-users"></i>
					<span class="title">User Management</span>
				</a>
				<ul>
					<li>
						<a href="<?= base_url()."admin/user_data" ?>">
							<span class="title">User Data</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url()."admin/user_activity" ?>">
							<span class="title">User Activity</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="#">
					<i class="fa-cubes"></i>
					<span class="title">API Management</span>
				</a>
				<ul>
					<li>
						<a href="<?= base_url()."admin/verifikasi" ?>">
							<span class="title">Verification</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url()."admin/access_control" ?>">
							<span class="title">Access Control</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url()."admin/log" ?>">
							<span class="title">Access Log</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa-wrench"></i>
					<span class="title">Pengaturan</span>
				</a>
			</li>
		</ul>
	</div>
</div>