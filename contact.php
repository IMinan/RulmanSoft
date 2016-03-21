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
      <iframe frameborder="0" height="550" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Bendas+Rulman,+Ba%C5%9Fak%C5%9Fehir,+Turkey&amp;aq=1&amp;oq=benda%C5%9F+rulman&amp;sll=37.0625,-95.677068&amp;sspn=40.052282,79.013672&amp;t=h&amp;ie=UTF8&amp;hq=Bendas+Rulman,&amp;hnear=Ba%C5%9Fak%C5%9Fehir%2FIstanbul,+Turkey&amp;cid=7610175435778837146&amp;ll=41.098273,28.801818&amp;spn=0.00933,0.01929&amp;iwloc=A&amp;output=embed" width="450"></iframe>
    </div>
  </div>

<?php include '_inc/footer.php'; ?>
