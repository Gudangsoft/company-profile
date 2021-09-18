<?php 
use App\Models\Maplikasi;
$this->Maplikasi= new Maplikasi();
$awal= date('Y-m-d',strtotime("-20 days",strtotime(date('Y-m-d'))));
?>
<div class="row">
	<div class="col-xl-3 col-sm-6">
		 <a href="<?php echo base_url('paneladmin/video') ?>">
			<div class="card bg-info">
			  <div class="card-body widget-style-2">
					<div class="text-white media">
						 <div class="media-body align-self-center">
							  <h2 class="my-0 text-white"><span data-plugin="counterup"><?php echo $video->getrowcount(); ?></span></h2>
							  <p class="mb-0">VIDEO</p>
						 </div>
						 <i class="fas fa-file-video"></i>
					</div>
			  </div>
		 </div>
		 </a>
	</div>
	<div class="col-xl-3 col-sm-6">
		 <a href="<?php echo base_url('paneladmin/artikel') ?>">
		 <div class="card bg-pink">
			  <div class="card-body widget-style-2">
					<div class="text-white media">
						 <div class="media-body align-self-center">
							  <h2 class="my-0 text-white"><span data-plugin="counterup"><?php echo $artikel->getrowcount(); ?></span></h2>
							  <p class="mb-0">ARTIKEL</p>
						 </div>
						 <i class="fas fa-newspaper"></i>
					</div>
			  </div>
		 </div>
		 </a>
	</div>

	<div class="col-xl-3 col-sm-6">
		 <a href="<?php echo base_url('paneladmin/galeri') ?>">
		 <div class="card bg-purple">
			  <div class="card-body widget-style-2">
					<div class="text-white media">
						 <div class="media-body align-self-center">
							  <h2 class="my-0 text-white"><span data-plugin="counterup"><?php echo $galeri->getrowcount(); ?></span></h2>
							  <p class="mb-0">GALERI</p>
						 </div>
						 <i class="fas fa-image"></i>
					</div>
			  </div>
		 </div>
		 </a>
	</div>

	<div class="col-xl-3 col-sm-6">
		<a href="javascript:;">
		  <div class="card bg-warning">
			 <div class="card-body widget-style-2">
				  <div class="text-white media">
						<div class="media-body align-self-center">
							 <h2 class="my-0 text-white"><span data-plugin="counterup"><?php echo $pengunjung->jumpeng; ?></span></h2>
							 <p class="mb-0">PENGUNJUNG</p>
						</div>
						<i class="fas fa-angle-double-up"></i>
				  </div>
			 </div>
		</div>
		</a>
  	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12">
		 <div class="card card-body">
			  <div id="harian" style="height: 350px"></div>
		 </div>
	</div>
</div>
<script type="text/javascript">
	Highcharts.chart('harian', {
		 chart: {
			  type: 'areaspline'
		 },
		 title: {
			  text: 'Grafik Pengunjung'
		 },
		 legend: {
			  enabled: false,
		 },
		 xAxis: {
			  categories: [
				 <?php 
				 for($i=1;$i<=30;$i++){
					$tgl= date('Y-m-d',strtotime("+".$i." days",strtotime(ymd($awal))));
					echo '"'.dmy($tgl).'",';
				 } ?>
			  ],
		 },
		 yAxis: {
			  title: {
					text: 'Jumlah Pengunjung'
			  }
		 },
		 tooltip: {
			  shared: true,
			  valueSuffix: ''
		 },
		 credits: {
			  enabled: false
		 },
		 plotOptions: {
			  areaspline: {
					fillOpacity: 0.5
			  }
		 },
		 series: [
		 {
			  name: 'Pengunjung',
			  data: [
			  <?php 
			  for($i=1;$i<=30;$i++){
				 $tgl= date('Y-m-d',strtotime("+".$i." days",strtotime(ymd($awal))));
				 $mastgl= $this->Maplikasi->pengunjungtgl($tgl);
				 echo ''.$mastgl->getrowcount().',';
			  } ?>
			  ]
		 },
		 ]
	});
</script>