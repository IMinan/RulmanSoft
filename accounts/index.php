<?php include('_inc/header.php'); ?>
<?php page_access('user'); ?>
<?php
if(!is_login())
{
	header("Location: ".account_url('login.php'));
	exit;
}
?>

<div class="row">
<div class="col-md-3">
	<?php include('_inc/sidebar.php'); ?>
</div> <!-- /.col-md-3 -->
<div class="col-md-9">

<ol class="breadcrumb">
  <li><a href="<?php echo account_url(''); ?>">Anasayfa</a></li>
  <li class="active">Yönetim Paneli</li>
</ol>


<style>
.dashboard_box {
	display: block;
	background-color: #f5f5f5;
	padding: 10px;
	text-align:center;
	color:#000;
	border:1px solid #ccc;
	height: 100px;
	position: relative;
}
.dashboard_box i {
	display: block;
	font-size: 36px;
	margin-bottom: 5px;
}
.dashboard_box i.fa2 {
	font-size:18px;
	position: absolute;
	right: 10px;
	top: 5px;
	color:#0D25AB;
}
.dashboard_box span {
	color:#7D7D7D;
}
</style>



<h4>Sipariş Takibi & Mesajlaşma</h4>
<div class="row">
	<div class="col-md-2">
		<a href="<?php echo account_url('message_inbox.php'); ?>" class="dashboard_box">
			<i class="fa fa-envelope-o"></i>
			<span>Mesaj Kutusu</span>
		</a>
	</div> <!-- /.col-md-2 -->
	<div class="col-md-2">
		<a href="<?php echo account_url('message_inbox.php'); ?>" class="dashboard_box">
			<i class="fa fa-shopping-basket"></i>
			<i class="fa fa-clock-o fa2"></i>
			<span>Yeni Sipariş</span>
		</a>
	</div> <!-- /.col-md-2 -->
	<div class="col-md-2">
		<a href="<?php echo account_url('message_inbox.php'); ?>" class="dashboard_box">
			<i class="fa fa-shopping-basket"></i>
			<i class="fa fa-cubes fa2"></i>
			<span>Hazırlanan Sipariş</span>
		</a>
	</div> <!-- /.col-md-2 -->
	<div class="col-md-2">
		<a href="<?php echo account_url('message_inbox.php'); ?>" class="dashboard_box">
			<i class="fa fa-shopping-basket"></i>
			<i class="fa fa-check fa2"></i>
			<span>Kapatılan Sipariş</span>
		</a>
	</div> <!-- /.col-md-2 -->
</div> <!-- /.row -->

</div> <!-- /.row -->

</div> <!-- /.col-md-9 -->
</div> <!-- /.row -->
<?php include('_inc/footer.php'); ?>
