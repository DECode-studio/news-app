</main>

<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="<?php echo base_url('public/js/core/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('public/js/core/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('public/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('public/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('public/js/plugins/chartjs.min.js'); ?>"></script>
<script>
	var ctx = document.getElementById("chart-bars").getContext("2d");

	new Chart(ctx, {
		type: "bar",
		data: {
			labels: ["M", "V", "W", "T", "F", "S", "S"],
			datasets: [{
				label: "Sales",
				tension: 0.4,
				borderWidth: 0,
				borderRadius: 4,
				borderSkipped: false,
				backgroundColor: "rgba(255, 255, 255, .8)",
				data: [50, 20, 10, 22, 50, 10, 40],
				maxBarThickness: 6
			}, ],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			plugins: {
				legend: {
					display: false,
				}
			},
			interaction: {
				intersect: false,
				mode: 'index',
			},
			scales: {
				y: {
					grid: {
						drawBorder: false,
						display: true,
						drawOnChartArea: true,
						drawTicks: false,
						borderDash: [5, 5],
						color: 'rgba(255, 255, 255, .2)'
					},
					ticks: {
						suggestedMin: 0,
						suggestedMax: 500,
						beginAtZero: true,
						padding: 10,
						font: {
							size: 14,
							weight: 300,
							family: "Roboto",
							style: 'normal',
							lineHeight: 2
						},
						color: "#fff"
					},
				},
				x: {
					grid: {
						drawBorder: false,
						display: true,
						drawOnChartArea: true,
						drawTicks: false,
						borderDash: [5, 5],
						color: 'rgba(255, 255, 255, .2)'
					},
					ticks: {
						display: true,
						color: '#f8f9fa',
						padding: 10,
						font: {
							size: 14,
							weight: 300,
							family: "Roboto",
							style: 'normal',
							lineHeight: 2
						},
					}
				},
			},
		},
	});

	$.ajax({
		url: "<?php echo base_url('admin/logout'); ?>",
		method: 'POST',
		contentType: false,
		processData: false,
		success: function(data) {
			alert("session destroyed");
		}
	});
</script>
<script>
	var win = navigator.platform.indexOf('Win') > -1;
	if (win && document.querySelector('#sidenav-scrollbar')) {
		var options = {
			damping: '0.5'
		}
		Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
	}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url('public/js/material-dashboard.min.js?v=3.0.2'); ?>"></script>
</body>

</html>