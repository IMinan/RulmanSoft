<div class="sidebar hidden-xs">

	<?php if(is_login()): ?>
	<div class="h20"></div>
		<h3 class="module-title"><i class="fa fa-shopping-basket"></i> Sipariş İstatistik</h3>
		<p><b>Bugün: </b><span class="text-primary"><?php echo orders_reporting(array( 'start_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))).' 00:00:00', 'end_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))).' 99:99:99' )); ?> Sipariş</span></p>
		<p><b>Dün: </b><span class="text-primary"><?php echo orders_reporting(array( 'start_date'=>date('Y-m-d', strtotime('-1 day',strtotime(date('Y-m-d')))).' 00:00:00', 'end_date'=>date('Y-m-d', strtotime('-1 day',strtotime(date('Y-m-d')))).' 99:99:99' )); ?> Sipariş</span></p>
		<p><b>Bu Hafta: </b><span class="text-primary"><?php echo orders_reporting(array( 'start_date'=>date('Y-m-d', strtotime('-7 day',strtotime(date('Y-m-d')))).' 00:00:00', 'end_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))).' 99:99:99' )); ?> Sipariş</span></p>
		<p><b>Bu Ay (<?php echo date_translate(date('F')); ?>): </b><span class="text-primary"><?php echo orders_reporting(array( 'start_date'=>date('Y-m-d', strtotime('-30 day',strtotime(date('Y-m-d')))).' 00:00:00', 'end_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))).' 99:99:99' )); ?> Sipariş</span></p>
		<div class="h20"></div>

		<h3 class="module-title"><i class="fa fa-puzzle-piece"></i> Site İstatistik</h3>
		<p><b>Bu gün: </b><span class="text-success"><?php echo analytics_reporting(array( 'start_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))), 'end_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))))); ?> Görüntüleme</span></p>
		<p><b>Dün: </b><span class="text-success"><?php echo analytics_reporting(array( 'start_date'=>date('Y-m-d', strtotime('-1 day',strtotime(date('Y-m-d')))), 'end_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))))); ?> Görüntüleme</span></p>
		<p><b>Son 7 gün: </b><span class="text-success"><?php echo analytics_reporting(array( 'start_date'=>date('Y-m-d', strtotime('-7 day',strtotime(date('Y-m-d')))), 'end_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))))); ?> Görüntüleme</span></p>
		<p><b>Bu Ay (Ocak): </b><span class="text-success"><?php echo analytics_reporting(array( 'start_date'=>date('Y-m-d', strtotime('-30 day',strtotime(date('Y-m-d')))), 'end_date'=>date('Y-m-d', strtotime('0 day',strtotime(date('Y-m-d')))))); ?> Görüntüleme</span></p>
		<div class="h20"></div>
	<?php endif; ?>


	<script>$(".sidebar").height($('.container.container-content').height());</script>
</div> <!-- /.sidebar -->
