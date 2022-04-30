<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="public/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?php echo base_url('public/img/favicon.png'); ?>">
	<title>
		<?= $title; ?>
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="<?php echo base_url('public/css/nucleo-icons.css" rel="stylesheet'); ?>" />
	<link href="public/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="<?php echo base_url('https://kit.fontawesome.com/42d5adcbca.js'); ?>" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="<?php echo base_url('public/css/material-dashboard.css'); ?>" rel="stylesheet" />

	<link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-200">
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href="<?php echo base_url('admin/dashboard'); ?>">
				<img src="<?php echo base_url('public/img/logo-ct.png'); ?>" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold text-white">Portal Admin</span>
			</a>
		</div>
		<hr class="horizontal light mt-0 mb-2">
		<div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-white <?php echo $this->uri->segment(2) == 'dashboard' ? 'active bg-gradient-primary' : '' ?>" href="<?php echo base_url('admin/dashboard'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">dashboard</i>
						</div>
						<span class="nav-link-text ms-1">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php echo $this->uri->segment(2) == 'news' ? 'active bg-gradient-primary' : '' ?>" href="<?php echo base_url('admin/news'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">newspaper</i>
						</div>
						<span class="nav-link-text ms-1">Articles</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php echo $this->uri->segment(2) == 'users' ? 'active bg-gradient-primary' : '' ?>" href="<?php echo base_url('admin/users'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">people</i>
						</div>
						<span class="nav-link-text ms-1">Users</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php echo $this->uri->segment(2) == 'lectures' ? 'active bg-gradient-primary' : '' ?>" href="<?php echo base_url('admin/lectures'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">school</i>
						</div>
						<span class="nav-link-text ms-1">Lectures</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php echo $this->uri->segment(2) == 'curiculum' ? 'active bg-gradient-primary' : '' ?>" href="<?php echo base_url('admin/curiculum'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">list</i>
						</div>
						<span class="nav-link-text ms-1">Curiculum</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white <?php echo $this->uri->segment(2) == 'events' ? 'active bg-gradient-primary' : '' ?>" href="<?php echo base_url('admin/events'); ?>">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">event</i>
						</div>
						<span class="nav-link-text ms-1">Events</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>

	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
						<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
						<li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo $this->uri->segment(2) ?></li>
					</ol>
					<h6 class="font-weight-bolder mb-0"><?php echo $this->uri->segment(2) ?></h6>
				</nav>
				<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
					<div class="ms-md-auto pe-md-3 d-flex align-items-center">
						<div class="input-group input-group-outline">
							<label class="form-label">Type here...</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<ul class="navbar-nav  justify-content-end">
						<li class="nav-item d-flex align-items-center">
							<a href="#" class="nav-link text-body font-weight-bold px-0 d-flex">
								<i class="material-icons opacity-10 align-self-center">person</i>
								<div class="d-sm-inline d-none align-self-center ms-2">Profile</div>
							</a>
						</li>
						<li class="nav-item d-flex align-items-center ms-4">
							<a href="#" class="nav-link text-body font-weight-bold px-0 d-flex">
								<i class="material-icons opacity-10 align-self-center">notifications</i>
							</a>
						</li>
						<li class="nav-item d-flex align-items-center ms-4">
							<a href="#" class="nav-link text-body font-weight-bold px-0 d-flex">
								<i class="material-icons opacity-10 align-self-center">settings</i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->