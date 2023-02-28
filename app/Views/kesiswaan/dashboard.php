<?= $this->extend('kesiswaan/layout') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title text-center">Grafik Siswa Per Kelas</h6>
			</div>
			<div class="card-body">
				<canvas id="bar"> </canvas>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title text-center">Grafik Siswa Per Jenis Kelamin</h6>
			</div>
			<div class="card-body">
				<canvas id="donut"> </canvas>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/vendors/chartjs/Chart.min.js'); ?>"></script>
<script>
	var ctxBar = document.getElementById("bar").getContext("2d");
	var myBar = new Chart(ctxBar, {
		type: 'bar',
		data: {
			labels: [
			<?php foreach ($siswa as $detSiswa):?>
				"<?= $detSiswa->nama_kelas ?>", 
			<?php endforeach;?>
			],
			datasets: 
			[{
				label: 'Perempuan',
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				borderColor: 'rgb(255, 99, 132)',
				pointRadius: false,
				pointColor: '#3b8bba',
				pointStrokeColor: 'rgb(255, 99, 132)',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgb(255, 99, 132)',
				borderWidth: 1,
				data: [
				<?php foreach ($siswa as $detSiswa):?>
					<?= $detSiswa->Perempuan ?>, 
				<?php endforeach;?>
				]
			},
			{
				label: 'Laki-Laki',
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgb(54, 162, 235)',
				pointRadius: false,
				pointColor: 'rgb(54, 162, 235)',
				pointStrokeColor: '#c1c7d1',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgb(54, 162, 235)',
				borderWidth: 1,
				data: [
				<?php foreach ($siswa as $detSiswa):?>
					<?= $detSiswa->laki ?>, 
				<?php endforeach;?>
				]
			}
			]

		},
		options: {
			responsive: true,
			barRoundness: 1,
			title: {
				display: false,
				text: "Data Siswa / Kelas"
			},
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						padding: 10,
					},
					gridLines: {
						drawBorder: false,
					}
				}],
				xAxes: [{
					gridLines: {
						display: false,
						drawBorder: false
					}
				}]
			}
		}
	});

	new Chart(document.getElementById("donut"),
	{
		"type":"doughnut",
		"data":
		{
			"labels":["Perempuan","Laki-Laki"],
			"datasets":[
			{
				"label":"",
				"data":[
				<?php foreach ($jk as $detjk):?>
					<?= $detjk->cew ?>,
					<?= $detjk->cow ?>, 
				<?php endforeach;?>
				],
				"backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]
			}
			]
		}
	}
	);

</script>
<?= $this->endSection() ?>