<div class="container-fluid py-4">
	<div class="row mt-4">
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
</div>

<div class="container-fluid py-2">
	<div class="row">
		<div class="col-md-12 mt-4">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3">News List</h6>
					</div>
				</div>
				<!-- Card News List -->


				<?php
				foreach ($news->result_array() as $news_data) {
				?>
					<div class="card m-3" style="max-width: 100%;">
						<div class="row g-0">
							<div class="col-md-3 col-12">
								<div id="<?= $news_data['article_id']; ?>" class="carousel slide img-pro" style="margin: auto; margin-top: 10px; margin-bottom: 10px;" data-bs-ride="carousel">
									<div class="carousel-indicators">
										<?php
										$count_button = 0;

										foreach ($image->result_array() as $image_data) {
											if ($news_data['article_id'] == $image_data['data_id']) {
										?>
												<button type="button" data-bs-target="#<?= $news_data['article_id']; ?>" data-bs-slide-to="<?= $count_button; ?>" <?php echo $count_button == 0 ?  'class="active"' : '' ?> aria-label="Slide <?= $count_button + 1; ?>" <?php echo $count_button == 0 ?  'aria-current="true"' : '' ?>></button>
										<?php
												$count_button++;
											}
										}
										?>
									</div>
									<div class="carousel-inner">
										<?php
										$count_image = 0;

										foreach ($image->result_array() as $image_data) {
											if ($news_data['article_id'] == $image_data['data_id']) {
										?>
												<div class="carousel-item <?php echo $count_image == 0 ?  'active' : '' ?>">
													<?= '<img src="data:image/jpeg;base64,' . base64_encode($image_data['image_file']) . '" class="d-block img-pro">' ?>
												</div>
										<?php
												$count_image++;
											}
										}
										?>
									</div>
									<button class="carousel-control-prev" type="button" data-bs-target="#<?= $news_data['article_id']; ?>" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#<?= $news_data['article_id']; ?>" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>
							</div>
							<div class="col-md-9 col-12">
								<div class="card-body">
									<h5 class="card-title"><?= $news_data['article_title']; ?></h5>
									<div class="row">
										<div class="col-md-12 col-12">
											<div class="row">
												<div class="col-md-2 col-4"><b>Author</b></div>
												<div class="col-md-1 col-1">:</div>
												<div class="col-md-9 col-6">
													<?php
													foreach ($user->result_array() as $user_data) {
														if ($news_data['article_author'] == $user_data['user_id']) {
															echo $user_data['user_name'];
														}
													}
													?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-2 col-4"><b>Date Time</b></div>
												<div class="col-md-1 col-1">:</div>
												<div class="col-md-9 col-6">
													<?= date('D, d M Y', strtotime($news_data['article_time'])); ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-2 col-4"><b>Content</b></div>
												<div class="col-md-1 col-1">:</div>
												<div class="col-md-9 col-6 text-black news">
													<?= $news_data['article_body']; ?>
												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="ms-auto text-end">
										<a type="submit" class="btn btn-link text-success text-gradient px-3 mb-0" href="">
											<i class="material-icons text-sm me-2">visibility</i>show
										</a>
										<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
											<i class="material-icons text-sm me-2">delete</i>Delete
										</a>
										<a class="btn btn-link text-dark px-3 mb-0" href="javascript:;">
											<i class="material-icons text-sm me-2">edit</i>Edit
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="fixed-plugin">
	<a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
		<i class="material-icons py-2" style="font-size: 30px;">add</i>
	</a>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method='post' action="<?= base_url('article/addarticle') ?>" enctype='multipart/form-data'>
				<div class="modal-body">
					<div class="mb-3">
						<label for="fp_image" class="form-label">Article's Images</label>
						<div class="input-group">
							<input type="file" id="fp_image[]" name="fp_image[]" class="file" multiple />
						</div>
					</div>
					<div class="mb-3">
						<label for="txt_title" class="form-label">Article's title</label>
						<div class="input-group input-group-outline">
							<input type="text" class="form-control" id="txt_title" name="txt_title">
						</div>
					</div>
					<div class="mb-3">
						<label for="dt_time" class="form-label">Time</label>
						<div class="input-group input-group-outline">
							<input type="datetime-local" class="form-control" id="dt_time" name="dt_time">
						</div>
					</div>
					<div class="mb-3">
						<label for="txt_content" class="form-label">Content</label>
						<div class="input-group input-group-outline">
							<textarea type="text" class="form-control" id="txt_content" name="txt_content" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>