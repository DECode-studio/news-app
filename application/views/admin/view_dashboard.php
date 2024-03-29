<div class="container-fluid py-4">
	<div class="card z-index-2 mt-4">
		<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
			<div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
				<div class="chart">
					<canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
				</div>
			</div>
		</div>
		<div class="card-body">
			<h6 class="mb-0 ">Website Views</h6>
			<p class="text-sm ">Last Campaign Performance</p>
			<hr class="dark horizontal">
			<div class="d-flex ">
				<i class="material-icons text-sm my-auto me-1">schedule</i>
				<p class="mb-0 text-sm"> campaign sent 2 days ago </p>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class=" col-xl-4  col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">newspaper</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Total Post</p>
						<h4 class="mb-0">100 Post</h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">favorite</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Total Like</p>
						<h4 class="mb-0">2,300</h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10">visibility</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Total Seen</p>
						<h4 class="mb-0">3,462</h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3">Authors table</h6>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($user->result_array() as $user_data) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl" style="width: 50px; height: 50px;">
													<i class="material-icons opacity-10">person</i>
												</div>
												<div class="d-flex flex-column justify-content-center ms-3">
													<h6 class="mb-0 text-sm"><?= $user_data['user_name']; ?></h6>
													<p class="text-xs text-secondary mb-0"><?= $user_data['user_email']; ?></p>
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $user_data['user_category']; ?></p>
											<p class="text-xs text-secondary mb-0">Portal</p>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm <?php echo $user_data['user_status'] == 'online' ? 'bg-gradient-success' : 'bg-gradient-secondary' ?>"><?= $user_data['user_status']; ?></span>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>