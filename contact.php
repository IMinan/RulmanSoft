<?php include '_inc/header.php'; ?>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-hover table-bordered">
        <tr class="row">
          <th class="col-md-4">Firma Adı: </th>
          <td class="col-md-8"><?php get_options('building_info', 'val_1', true); ?></td>
        </tr>

        <tr class="row">
          <th class="col-md-4">Firma Telefon: </th>
          <td class="col-md-8"><?php get_options('phone', 'val_1', true); ?></td>
        </tr>

        <tr class="row">
          <th class="col-md-4">Yetkili Kişi Telefon: </th>
          <td class="col-md-8"><?php get_options('mobile_phone', 'val_1', true); ?></td>
        </tr>

        <tr class="row">
          <th class="col-md-4">E-Mail: </th>
          <td class="col-md-8"><?php get_options('email', 'val_1', true); ?></td>
        </tr>

        <tr class="row">
          <th class="col-md-4">Fax: </th>
          <td class="col-md-8"><?php get_options('fax', 'val_1', true); ?></td>
        </tr>

        <tr class="row">
          <th class="col-md-4">İl - İlçe: </th>
          <td class="col-md-8"><?php get_options('province', 'val_1', true); ?></td>
        </tr>

        <tr class="row">
          <th class="col-md-4">Ülke: </th>
          <td class="col-md-8"><?php get_options('country', 'val_1', true); ?></td>
        </tr>

        <tr class="row">
          <th class="col-md-4">Adres Bilgileri: </th>
          <td class="col-md-8"><?php get_options('address', 'val_1', true); ?></td
        </tr>
      </table>
    </div>

    <div class="col-md-6">
      <?php get_options("google_map", 'val_1', true); ?>
    </div>
  </div>

<?php include '_inc/footer.php'; ?>
