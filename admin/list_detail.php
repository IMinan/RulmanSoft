
<div class="row">
	<div class="col-md-1"></div>
<div class="col-md-10 col-xs-12" itemscope itemtype="http://schema.org/Product">

	<?php $list_id = form_input_control($_GET['list_id']); ?>
	<?php $list = get_single_list($list_id); ?>
	<?php $corporate = get_user($list['user_id']); ?>

	<ol class="breadcrumb hidden-xs hidden-sm">
	  <li><a href="<?php echo $theme_url; ?>">Anasayfa</a></li>
	  <li><a href="<?php echo site_url(''); ?>"><?php echo $corporate['company_name']; ?></a></li>
	  <li class="active"><?php echo brand($list['brand_id'],'name'); ?> <?php echo $list['code']; ?> <?php echo $list['code_type']; ?></li>
	</ol>

	<h3 class="text-danger" itemprop="name"><span itemprop="brand"><?php echo brand($list['brand_id']); ?></span> <?php echo $list['code']; ?> <?php echo $list['code_type']; ?></h3>

	<?php $result = mysqli()->query("SELECT * FROM product WHERE brand_id='".$list['brand_id']."' AND code='".$list['code']."' AND code_type='".$list['code_type']."'"); ?>
	<?php if($result->num_rows > 0): ?>
		<?php $product = $result->fetch_assoc(); ?>
		<div class="bg-muted padding5">
			<table class="table table-condensed fs-11" style="margin-bottom:0px;">
				<thead>
					<tr>
						<th>İç (d)</th>
						<th>Dış (D)</th>
						<th>En (B)</th>
						<th>Ağırlık</th>
						<th>Referans Hızı</th>
						<th>Devir Hızı</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $product['d0']; ?> <span class="text-muted">mm</span></td>
						<td><?php echo $product['D']; ?> <span class="text-muted">mm</span></td>
						<td><?php echo $product['B']; ?> <span class="text-muted">mm</span></td>
						<td><?php echo $product['mass']; ?> <span class="text-muted">kg</span></td>
						<td><?php echo $product['reference_speed']; ?> <span class="text-muted">/dakika</span></td>
						<td><?php echo $product['limiting_speed']; ?> <span class="text-muted">/dakika</span></td>
					</tr>
				</tbody>
			</table>
		</div> <!-- /.bg-muted -->
		<div class="h20"></div>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-5" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<table class="table table-condensed fs-13">
				<tr>
					<th width="80">Fiyat</th>
					<td width="10">:</td>
					<td>
						<?php if($list['price'] == 0): ?>
							<link itemprop="availability" href="http://schema.org/PreOrder"/>
							<meta itemprop="priceCurrency" content="TRY" />
							<span itemprop="price">0.00</span>
							<span class="text-danger fs-12">Teklif alınız.</span>
						<?php else: ?>
							<?php if($list['currency'] == '0'): ?>
								<meta itemprop="priceCurrency" content="TRY" />
							<?php elseif($list['currency'] == '1'): ?>
								<meta itemprop="priceCurrency" content="USD" />
							<?php elseif($list['currency'] == '1'): ?>
								<meta itemprop="priceCurrency" content="EUR" />
							<?php endif; ?>
							<span itemprop="price"><?php echo number_format($list['price'],2); ?> <?php echo currency_to_text($list['currency']); ?></span>
							<link itemprop="availability" href="http://schema.org/InStock"/>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>Firma</th>
					<td>:</td>
					<td><span itemprop="seller"><?php echo $corporate['company_name']; ?></span></td>
				</tr>
				<tr>
					<th>Yetkili Adı</th>
					<td>:</td>
					<td><?php echo $corporate['name']; ?></td>
				</tr>
				<tr>
					<th>Gsm</th>
					<td>:</td>
					<td><?php echo $corporate['gsm']; ?></td>
				</tr>
				<tr>
					<th>E-posta</th>
					<td>:</td>
					<td><?php echo $corporate['email']; ?></td>
				</tr>
				<tfoot>
					<tr>
					</tr>
						<th></th>
						<th></th>
						<th></th>
				</tfoot>
			</table>

			<?php if($list['price'] == 0): ?>
			<?php else: ?>
			<div class="row">
				<div class="col-md-6">
					<a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#order_now">Hemen Al</a>
				</div><!--/ .col-md-6 /-->

				<div class="col-md-6">
					<a href="#" class="btn btn-warning btn-lg">Sepete Ekle</a>
				</div><!--/ .col-md-6 /-->
			</div><!--/ .row /-->
		<?php endif; // if($list['price'] == 0): ?>
		</div> <!-- /.col-md-5 -->

			<?php if(is_login()): $current_id = $_SESSION['login_id']; $current_user = get_user($current_id); if($current_user['user_type'] == 'user'):?>
				<?php
					if(isset($_POST['order_now']))
					{
						$amount = form_input_control($_POST['amount']);

						$order['status'] = 1;
						$order['date'] = Date('Y-m-d H:i:s');
						$order['date_update'] = Date('Y-m-d H:i:s');
						$order['microtime'] = $_POST['microtime'];
						$order['company_id'] = $current_user['id'];
						$order['company_name'] = $current_user['company_name'];
						$order['name'] = $current_user['name'];
						$order['surname'] = $current_user['surname'];
						$order['phone'] = $current_user['gsm'];
						$order['address'] = $current_user['address'];
						$order['district'] = $current_user['district'];
						$order['city'] = $current_user['city'];
						$order['country'] = $current_user['country'];
						$order['product_brand'] = brand($list['brand_id']);
						$order['product_code'] = $list['code'];
						$order['product_id'] = $list['id'];
						$order['code_type'] = $list['code_type'];
						$order['amount'] = $amount;
						$order['sale_price'] = $list['price'];
						$order['currency'] = $list['currency'];

						if(add_orders($order))
						{
							$code = brand($list['brand_id']).' '.$list['code'].' '.$list['code_type'];
							echo '<div class="col-md-7">';
							get_alert('Siperişinizin Tüm Detaylarını Yönetim Panelinden Görebilirsiniz.', ' '. $amount. ' Adet '. $code .'', 'success');
							echo '</div>';
						}
						else
						{
							echo '<div class="col-md-7">';
							get_alert("Veritabanı Hatası");
							echo '</div>';
						}
					}
				?>

			<div id="order_now" class="modal fade" tabindex="-1" role="dialog">
				<form action="" method="post" class="validate">
				<div class="modal-dialog">
				  <div class="modal-content">
				    <div class="modal-header">
				      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				      <h3 class="text-danger modal-title"><?php echo brand($list['brand_id']); ?></span> <?php echo $list['code']; ?> <?php echo $list['code_type']; ?></h3>
				    </div><!--/ .modal-header /-->
				    <div class="modal-body">
				    	<div class="row">
								<div class="col-md-6">
									<table class="table table-bordered table-condensed fs-13">
										<tr>
											<th>Firma</th>
											<td>:</td>
											<td><span itemprop="seller"><?php echo $corporate['company_name']; ?></span></td>
										</tr>
										<tr>
											<th>Yetkili Adı</th>
											<td>:</td>
											<td><?php echo $corporate['name']; ?> <?php echo $corporate['surname']; ?></td>
										</tr>
										<tr>
											<th>Gsm</th>
											<td>:</td>
											<td><?php echo $corporate['gsm']; ?></td>
										</tr>
										<tr>
											<th>E-posta</th>
											<td>:</td>
											<td><?php echo $corporate['email']; ?></td>
										</tr>
									</table>
								</div><!--/ .col-md-6 /-->

								<div class="col-md-6">
									<h4>
										<?php if($list['currency'] == '0'): ?>
											<meta itemprop="priceCurrency" content="TRY" />
										<?php elseif($list['currency'] == '1'): ?>
											<meta itemprop="priceCurrency" content="USD" />
										<?php elseif($list['currency'] == '1'): ?>
											<meta itemprop="priceCurrency" content="EUR" />
										<?php endif; ?>
										<span itemprop="price"><?php echo number_format($list['price'],2); ?> <?php echo currency_to_text($list['currency']); ?></span>
										<link itemprop="availability" href="http://schema.org/InStock"/>
									</h4>

									<div class="form-group mt30">
										<label for="amount">Adet Giriniz</label>
										<input type="number" name="amount" id="amount" placeholder="Adet" class="form-control required">
									</div><!--/ .form-group /-->
								</div><!--/ .col-md-6 /-->
				    	</div><!--/ .row /-->
				    </div><!--/ .modal-body /-->
				    <div class="modal-footer">
							<?php html_microtime(); ?>
							<input type="submit" name="order_now" value="Şiparişi Onayla" class="btn btn-success">
				    </div><!--/ .modal-footer /-->
				  </div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</form>
			</div><!-- /.modal -->

		<div class="col-md-7">
			<?php
			if(isset($_POST['microtime']) and isset($_POST['send_message']))
			{
				$message['name_surname'] = mb_ucwords(form_input_control($_POST['name_surname']));
				$message['phone'] = form_input_control($_POST['phone']);
				$message['email'] = strtolower(form_input_control($_POST['email']));
				$message['description'] = form_input_control($_POST['description']);

				if($message['description'] == '')
				{
					get_alert('Mesaj Bölümü en az 10 karakter olmalıdır!');
				}else
				{
					if(is_login()){ $message['out_user_id'] = active_user('id'); } else { $message['out_user_id'] = ''; }

					if(add_message($message['out_user_id'], $list['user_id'], $message['description'], '', $message))
					{
						get_alert('Mesajınız ilgili firmaya başarı ile ulaşmıştır.', '', 'success', false);
					}
					else
					{
						get_alert('Tüm Bölümleri Dorğru girdiğinizden emin olduktan sonra tekrar deneyiniz.', '', 'danger', false);
					}
				}


			}
			?>

			<?php if($list['price'] == 0){ $message = 'Merhaba, '.brand($list['brand_id']).' '.$list['code'].' '.$list['code_type'].' ürününüz ile ilgili fiyat teklifi alabilir miyim?'; } else { $message = ''; } ?>

				<div class="bg-warning p10 radius3">
					<form name="form_message" id="form_message" action="" method="POST" class="validate">
						<legend><i class="fa fa-envelope-o"></i> Satıcı firmaya mesaj gönderin</legend>
						<div class="form-group">
							<input type="text" name="name_surname" id="name_surname" class="form-control input-sm required" minlength="3" maxlength="30" placeholder="Adınız Soyadınız" value="<?php echo $current_user['name']; ?> <?php echo $current_user['surname']; ?>">
						</div> <!-- /.form-group -->

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="phone" id="phone" class="form-control input-sm required validatePhone digitsOnly" minlength="10" maxlength="11" placeholder="Cep Telefonu" value="<?php echo $current_user['gsm']; ?>">
								</div> <!-- /.form-group -->
							</div> <!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="email" id="email" class="form-control input-sm required email" maxlength="100" placeholder="E-posta" value="<?php echo $current_user['email']; ?>">
								</div> <!-- /.form-group -->
							</div> <!-- /.col-md-6 -->
						</div> <!-- /.row -->

						<div class="form-group">
							<textarea name="description" id="description" required class="form-control input-sm required" style="height:100px;" minlength="10" maxlength="255" placeholder="Bir mesaj yazın"><?php echo $message; ?></textarea>
						</div> <!-- /.form-group -->
						<div class="text-right">
							<?php html_microtime(); ?>
							<input type="hidden" name="send_message">
							<button class="btn btn-default btn-sm">Mesaj Gönder</button>
						</div> <!-- /.text-right -->
					</form>
				</div> <!-- /.bg-muted -->
			</div> <!-- /.col-md-7 -->
		<?php endif; // if($current_user['user_type'] == 'user'): ?>

		<?php else: // if(is_login()):  ?>
			<div class="col-md-7">
				<div class="bg-warning p10 radius3">
					Satıcı Firmaya Mesaj Döndermek İçin <strong><a href="<?php echo $theme_url; ?>/register.php">Üye</a> </strong>Olmanız Gerekmekte.
				</div> <!-- /.bg-warning -->
			</div><!--/ .col-md-7 /-->
		<?php endif; // if(is_login()): ?>
	</div> <!-- /.row -->

</div> <!-- /.col-md-10 -->

<div class="col-md-1"></div><!-- /.col-md-1 -->
</div> <!-- /.row -->
