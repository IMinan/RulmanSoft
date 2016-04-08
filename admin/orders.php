<?php include '_inc/header.php'; //GET Header  ?>
  <?php if(isset($_GET['status'])): ?>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url(''); ?>">Anasayfa</a></li>
      <li><a href="<?php echo site_url('index.php'); ?>">Yönetim Paneli</a></li>
      <li class="active">Yeni Siparişler</li>
    </ol>

    <?php $orders = get_orders($_GET['status'], $_SESSION['login_id']); ?>
    <?php
      if(isset($_GET['case']))
      {
        if($_GET['case'] == 'success')
        {
          echo get_alert('', 'İşlem Tamamlandı', 'success text-center');
        }
        elseif($_GET['case'] == 'delete')
        {
          echo get_alert('', 'Sipariş Silindi!', 'danger text-center');
        }
      }
    ?>

    <?php if($orders->num_rows): ?>
      <h3 class="text-center"><?php if($_GET['status'] == 1){ echo 'Yeni Siparişler'; }elseif($_GET['status'] == 2){ echo 'Hazırlanan Siparişler'; }elseif($_GET['status'] == 3){ echo 'Kapatılan Siparişler'; }else{ echo 'Silinen Siparişler'; } ?></h3>
      <div class="h30"></div>
        <table class="table table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <?php if($_GET['status'] == 0): else: ?>
              <th>Onayla</th>
              <?php endif; ?>
              <th class="hidden-xs">Firma Adı</th>
              <th>Ad - Soyad</th>
              <th class="hidden-xs">Telefon</th>
              <th class="hidden-xs">İl - İlçe</th>
              <th>Ürün Adı</th>
              <th>Adet</th>
              <th class="hidden-xs">Son İşlem Tarihi</th>
              <th class="hidden-xs">Satış Fiyatı</th>
            </tr>
          </thead>

          <tbody>
          <?php while($list = $orders->fetch_object()): ?>
            <tr>
              <?php if($_GET['status'] == 1): ?>
                <td><a href="<?php echo site_url('orders_detail.php/?order_id=').$list->id.'&type=1'; ?>" class="btn btn-default btn-xs">Detaylar</a> <a href="<?php echo site_url('orders_detail.php?order_id=').$list->id.'&type=1&case=confirm';?>" data-toggle="tooltip" data-placement="top" title="" class="btn btn-success edit_btn btn-xs hidden-xs" data-original-title="Onayla"><i class="fa fa-check"></i></a></td>
              <?php elseif($_GET['status'] == 2): ?>
                <td><a href="<?php echo site_url('orders_detail.php/?order_id=').$list->id.'&type=2'; ?>" class="btn btn-default btn-xs">Detaylar</a> <a href="<?php echo site_url('orders_detail.php?order_id=').$list->id.'&case=close';?>" data-toggle="tooltip" data-placement="top" title="Kapat" class="btn btn-xs btn-warning hidden-xs"><i class="fa fa-power-off"></i></a></td>
              <?php elseif($_GET['status'] == 3):?>
                <td><a href="<?php echo site_url('orders_detail.php?order_id=').$list->id.'&case=delete';?>" class="btn btn-warning btn-xs z-depth-1" style="width: 100%;"><i class="fa fa-trash"></i> Sil</a></td>
              <?php else: ?>
              <?php endif; ?>
              <td class="hidden-xs"><?php echo $list->company_name; ?></td>
              <td><?php echo $list->name; ?> <?php echo $list->surname; ?></td>
              <td class="hidden-xs"><?php echo $list->phone; ?></td>
              <td class="hidden-xs"><?php echo $list->district; ?> <?php echo $list->city; ?></td>
              <td><?php echo $list->product_brand.' '.$list->product_code.' '.$list->code_type; ?></td>
              <td><?php echo $list->amount; ?></td>
              <td class="hidden-xs"><?php echo substr($list->date_update, '0', '10'); ?> - <?php echo substr($list->date_update, '10', '6'); ?></td>
              <td class="hidden-xs">
                <?php if($list->currency == '0'): ?>
                  <meta itemprop="priceCurrency" content="TRY" />
                <?php elseif($list->currency == '1'): ?>
                  <meta itemprop="priceCurrency" content="USD" />
                <?php elseif($list->currency == '1'): ?>
                  <meta itemprop="priceCurrency" content="EUR" />
                <?php endif; ?>

                <span itemprop="price"><?php echo $list->sale_price; ?> <?php echo currency_to_text($list->currency); ?></span>
                <link itemprop="availability" href="http://schema.org/InStock"/>
              </td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div><!--/ .row /-->
    <?php else: ?>
      <div class="alert-danger padding5">
        <h4 class="text-center">Gösterilecek veri bulunamadı.</h4>
      </div><!--/ .alert-danger /-->

      <div class="h60"></div>
    <?php endif; ?>
  <?php endif; ?>
<?php include '_inc/footer.php'; //GET Footer ?>
