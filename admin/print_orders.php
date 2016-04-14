<?php include '_conf.php'; ?>
<?php include '_inc/functions.php'; ?>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
<?php if(isset($_GET['print_address'])): $order = orders_detail($_GET['print_address']); ?>

  <div class="row">
    <div class="col-md-6">
      <h3>Gönderen Adres</h3>
      <table class="table table-bordered table-hover table-condensed">
        <tr>
          <td class="col-md-4"><b>Firma Adı: </b></td>
          <td><?php get_options('building_info', 'val_1', true); ?></td>
        </tr>

        <tr>
          <td><b>Yekili Telefon</b></td>
          <td><?php get_options('mobile_phone', 'val_1', true); ?></td>
        </tr>

        <tr>
          <td><b>Firma Telefon</b></td>
          <td><?php get_options('phone', 'val_1', true); ?></td>
        </tr>

        <tr>
          <td><b>İl - İlçe</b></td>
          <td><?php get_options('province', 'val_1', true); ?></td>
        </tr>

        <tr>
          <td><b>Adress</b></td>
          <td><?php get_options('address', 'val_1', true); ?></td>
        </tr>
      </table>
    </div><!--/ .col-md-6 /-->

    <div class="col-md-6">
      <h3>Alıcı Adres</h3>
      <table class="table table-bordered table-hover table-condensed">
        <tr>
          <td class="col-md-4"><b>Firma Adı: </td>
          <td><?php echo $order->company_name; ?></td>
        </tr>

        <tr>
          <td><b>Adı - Soyadı</td>
          <td><?php echo $order->name; ?> - <?php echo $order->surname; ?></td>
        </tr>

        <tr>
          <td><b>Yekili Telefon</td>
          <td><?php echo $order->phone; ?></td>
        </tr>

        <tr>
          <td><b>Son Sipariş</td>
          <td><?php echo time_late($order->date); ?></td>
        </tr>

        <tr>
          <td><b>İl - İlçe</td>
          <td><?php echo $order->city; ?> <?php echo $order->district; ?></td>
        </tr>

        <tr>
          <td><b>Adress</td>
          <td><?php echo $order->address; ?></td>
        </tr>
      </table>
    </div><!--/ .col-md-6 /-->
  </div><!--/ .row /-->

<?php elseif(isset($_GET['print_orders'])):  $order = orders_detail($_GET['print_orders']); ?>
  <h3>Sipariş Formu</h3>
  <table class="table table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <td><b>Ürün Markası: </b></td>
        <td><?php echo $order->product_brand; ?></td>
      </tr>

      <tr>
        <td><b>Ürün Kodu: </b></td>
        <td><?php echo $order->product_code; ?> <?php echo $order->code_type; ?></td>
      </tr>

      <tr>
        <td><b>Sipariş Adedi: </b></td>
        <td><?php echo $order->amount; ?></td>
      </tr>

      <tr>
        <td><b>Son İşlem Tarihi</b></td>
        <td><?php echo substr($order->date_update, '0', '10'); ?> - <?php echo substr($order->date_update, '10', '6'); ?></td>
      </tr>

      <tr>
        <td><b>Satış Fiyatı</b></td>
        <td>
          <?php echo $order->sale_price; ?>

          <?php if($order->currency == '0'): ?>
            ₺
          <?php elseif($order->currency == '1'): ?>
            $
          <?php elseif($order->currency == '2'): ?>
            €
          <?php endif; ?>
        </td>
      </tr>
    </thead>
  </table>
<?php endif; ?>
<script>
	window.print();

	$(document).keydown(function(e) {
	    // ESCAPE key pressed
	    if (e.keyCode == 27) {
	        window.close();
	    }
	});
</script>
