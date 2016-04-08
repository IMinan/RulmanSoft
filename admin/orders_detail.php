<?php include '_inc/header.php'; // Get Header ?>
  <div class="row">
    <div class="col-md-3">
      <?php include '_inc/sidebar.php'; ?>
    </div>

    <div class="col-md-9">
    <?php if(isset($_GET['order_id'])): $order = orders_detail($_GET['order_id']);  ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>">Anasayfa</a></li>
        <li><a href="<?php echo site_url('index.php'); ?>">Yönetim Paneli</a></li>
        <li class="active">Sipariş Detayı</li>
      </ol>

      <div class="row">
        <div class="col-md-7">
          <h4>Müşteri Hakkında</h4>
          <table class="table table-bordered table-hover table-condensed">
            <tr>
              <th class="col-md-4">Firma Adı: </th>
              <td><?php echo $order->company_name; ?></td>
            </tr>

            <tr>
              <th>Adı - Soyadı</th>
              <td><?php echo $order->name; ?> - <?php echo $order->surname; ?></td>
            </tr>

            <tr>
              <th>Yekili Telefon</th>
              <td><?php echo $order->phone; ?></td>
            </tr>

            <tr>
              <th>Son Sipariş</th>
              <td><?php echo time_late($order->date); ?></td>
            </tr>

            <tr>
              <th>İl - İlçe</th>
              <td><?php echo $order->city; ?> <?php echo $order->district; ?></td>
            </tr>

            <tr>
              <th>Adress</th>
              <td><?php echo $order->address; ?></td>
            </tr>
          </table>

          <div class="h30"></div>
        </div><!--/ .col-md-7 /-->

        <?php
          if(isset($_GET['case']))
          {
            $case = $_GET['case'];
            if($case == 'confirm')
            {
              if(orders_case($order->id, 2))
              {
                header("Location:".site_url('orders.php?status=2&case=success'));
              }
            }
            elseif($case == 'delete')
            {
              if(orders_case($order->id, 0))
              {
                header("Location:".site_url('orders.php?status=0'.'&case=delete'));
              }
            }
            elseif($case == 'close')
            {
              if(orders_case($order->id, 3))
              {
                header("Location:".site_url('orders.php?status=3&case=success'));
              }
            }

          }
        ?>

        <div class="col-md-5">
          <div class="h40"></div>
          <?php if($_GET['type'] == 1): ?>
          <div class="btn-group pull-right">
            <a href="<?php echo site_url('orders_detail.php?order_id=').$order->id.'&case=confirm';?>" class="btn btn-success"><i class="fa fa-check"></i> Siparişi Onayla</a>
            <a href="<?php echo site_url('orders_detail.php?order_id=').$order->id.'&case=delete';?>" class="btn btn-danger"><i class="fa fa-trash"></i> Siparişi Sil</a>
          </div><!--/ .btn-group /-->
          <?php elseif($_GET['type'] == 2): ?>
          <div class="btn-group pull-right">
            <a href="<?php echo site_url('orders_detail.php?order_id=').$order->id.'&case=close';?>" class="btn btn-warning"><i class="fa fa-check"></i> Siparişi Kapat</a>
            <a href="<?php echo site_url('orders_detail.php?order_id=').$order->id.'&case=delete';?>" class="btn btn-danger"><i class="fa fa-trash"></i> Siparişi Sil</a>
          </div><!--/ .btn-group /-->
          <?php endif; ?>

          <div class="h60"></div>
          <div class="pull-right">
            <a href="<?php echo site_url('print_orders.php?print_address=').$order->id; ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Adres Etkiketi Yazdır</a>
            <div class="h10"></div>
            <a href="<?php echo site_url('print_orders.php?print_orders=').$order->id; ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Sipariş Formu Yazdır</a>
          </div><!--/ .pull-right /-->
        </div><!--/ .col-md-5 /-->
      </div><!--/ .row /-->

      <h4>Sipariş Hakkında</h4>

      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Ürün Markası: </th>
            <th>Ürün Kodu: </th>
            <th>Sipariş Adedi: </th>
            <th>Son İşlem Tarihi</th>
            <th>Satış Fiyatı</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><?php echo $order->product_brand; ?></td>
            <td><?php echo $order->product_code; ?> <?php echo $order->code_type; ?></td>
            <td><?php echo $order->amount; ?></td>
            <td><?php echo substr($order->date_update, '0', '10'); ?> - <?php echo substr($order->date_update, '10', '6'); ?></td>
            <td>
              <?php if($order->currency == '0'): ?>
                <meta itemprop="priceCurrency" content="TRY" />
              <?php elseif($order->currency == '1'): ?>
                <meta itemprop="priceCurrency" content="USD" />
              <?php elseif($order->currency == '1'): ?>
                <meta itemprop="priceCurrency" content="EUR" />
              <?php endif; ?>

              <span itemprop="price"><?php echo $order->sale_price; ?> <?php echo currency_to_text($order->currency); ?></span>
              <link itemprop="availability" href="http://schema.org/InStock"/>
            </td>
          </tr>

        </tbody>
      </table>

    <?php endif; ?>
    </div><!--/ .col-md-9 /-->
  </div><!--/ .row /-->
<?php include '_inc/footer.php' ?>
