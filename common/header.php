<?php
if (!$action->session->get("admin_id")) {
	header("location:./login.php");
} else {
	$user = $action->get_admin_function->fetchUsers($action->session->get("admin_id"));
}
?>

<!-- Header -->
<div class="header">
	<div class="main-header">
		<!-- Logo -->
		<div class="header-left active">
			<a href="index.php" class="logo logo-normal">
				<img src="assets/img/mh-logo.jpeg" alt="Img" class="id-img-logo">
			</a>
			<a href="index.php" class="logo logo-white">
				<img src="assets/img/mh-logo.jpeg" alt="Img" class="id-img-logo">
			</a>
			<a href="index.php" class="logo-small">
				<img src="assets/img/mh-logo.jpeg" alt="Img" class="id-img-logo">
			</a>
		</div>
		<!-- /Logo -->
		<a id="mobile_btn" class="mobile_btn" href="#sidebar">
			<span class="bar-icon">
				<span></span>
				<span></span>
				<span></span>
			</span>
		</a>

		<!-- Header Menu -->
		<ul class="nav user-menu">



			<li class="nav-item nav-item-box">
				<a href="javascript:void(0);" id="btnFullscreen">
					<i class="ti ti-maximize"></i>
				</a>
			</li>


			<li class="nav-item dropdown has-arrow main-drop profile-nav">
				<a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
					<span class="user-info p-0">
						<span class="user-letter">
							<img src="assets/img/profiles/avator1.jpg" alt="Img" class="img-fluid">
						</span>
					</span>
				</a>
				<div class="dropdown-menu menu-drop-user">
					<div class="profileset d-flex align-items-center">
						<span class="user-img me-2">
							<img src="assets/img/profiles/avator1.jpg" alt="Img">
						</span>
						<div>
							<h6 class="fw-medium"><?= @$user[0]['u_name']; ?></h6>
							<p><?= @$user[0]['u_email']; ?></p>
						</div>
					</div>
					<hr class="my-2">
					<a class="dropdown-item logout pb-0" id="logout" href="#"><i
							class="ti ti-logout me-2"></i>Logout</a>
				</div>
			</li>
		</ul>
		<!-- /Header Menu -->

		<!-- Mobile Menu -->
		<div class="dropdown mobile-user-menu">
			<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
				aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="./change-password">Change Password</a>
				<a class="dropdown-item" href="#" id="logout1">Logout</a>
			</div>
		</div>
		<!-- /Mobile Menu -->
	</div>
</div>
<!-- /Header -->
<div class="main-wrapper">