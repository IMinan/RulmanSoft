<?php include '_inc/header.php'; //GET Header  ?>
  <div class="row">
    <div class="col-md-3">
      <?php include '_inc/sidebar.php'; ?>
    </div><!--/ .col-md-3 /-->

    <div class="col-md-9">

    <?php if(isset($_GET['status'])): ?>

      <?php $orders = get_orders($_GET['status'], $_SESSION['login_id']); ?>


      <?php


       ?>

      <?php if($orders->num_rows): ?>
        <h3 class="text-center"><?php if($_GET['status'] == 1){ echo 'Yeni Siparişlerim'; }elseif($_GET['status'] == 2){ echo 'Hazırlanan Siparişlerim'; }else{ echo 'Kapatılan Siparişlerim'; } ?></h3>
        <div class="h30"></div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Ürün Adı</th>
                <th>Adet</th>
                <th>Onaylandı</th>
                <th class="hidden-xs">Yapılan Son işlem Tarihi</th>
                <th>Satış Fiyatı</th>
              </tr>
            </thead>

            <tbody>
            <?php while($list = $orders->fetch_object()): ?>
              <tr>
                <td><?php echo $list->product_brand.' '.$list->product_code.' '.$list->code_type; ?></td>
                <td><?php echo $list->amount; ?></td>
                <td><?php echo time_late($list->date_update); ?></td>
                <td class="hidden-xs"><?php echo substr($list->date_update, '0', '10'); ?> - <?php echo substr($list->date_update, '10', '6'); ?></td>
                <td>
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
  </div><!--/ .col-md-9 /-->
</div><!--/ .row /-->
<?php include '_inc/footer.php'; //GET Footer ?>
