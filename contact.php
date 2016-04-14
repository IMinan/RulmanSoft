<?php include '_inc/header.php'; //Get Header ?>
  <div class="paragraf p30">
    <div class="title">
      <h2 class="CG inline">İletişim</h2> <span class="ml30 m-none">İletişim ve Adres Bilgileri Aşağıda Yer Almakta</span>
    </div>
  </div><!--/ .paragraf /-->

  <div class="row no-space pr10">
    <div class="col-md-8">
      <img src="image/map.png" class="p20 img-responsive" alt="" />
    </div><!--/ .col-md-8 /-->

    <div class="col-md-4 CLG">
      <div class="title mt20">
        <h4><b>Hakkımızda</b></h4>
        <hr class="mtb10">
        <p class="f12"><?php  get_options('information', 'val_1', true); ?></p>
      </div>

      <div class="title mt20">
        <h4><b>İletişim Bilgileri</b></h4>
        <hr class="mtb10">
        <p class="f12">
          <span><?php get_options('building_info', 'val_1', true); ?></span><br>
          <span><?php get_options('address', 'val_1', true); ?></span><br>
          <span><?php get_options('city', 'val_1', true); ?> <?php get_options('country', 'val_1', true); ?></span><br>
          <span>Call : <?php get_options('phone', 'val_1', true); ?> </span><br>
          <span>Email : <?php get_options('email', 'val_1',  true); ?></span><br>
        </p>
      </div>

      <div class="title mt20">
        <h4><b>Sosyal medya</b></h4>
        <hr class="mtb10">
        <p class="f12">Facebook: <a href="<?php get_options('facebook', 'val_1', true); ?>"><?php get_options('facebook', 'val_1', true); ?></p>
        <p class="f12">Twitter: <a href="<?php get_options('facebook', 'val_1', true); ?>"><?php get_options('twitter', 'val_1', true); ?></a></p>
      </div>
    </div><!--/ .col-md-4 /-->
  </div><!--/ .row /-->

  <div class="row">
    <div class="col-md-8">
      <?php
        $corporate_id = get_options('corporate_id', 'val_1', false);  $user = get_user($corporate_id);

        if(isset($_POST['contact_message']) and isset($_POST['microtime']))
        {
          $message['name_surname'] = form_input_control($_POST['name_surname']);
          $message['email'] = form_input_control($_POST['email']);
          $message['phone'] = form_input_control($_POST['phone']);
          $message['description'] = form_input_control($_POST['description']);
          $message['microtime'] = $_POST['microtime'];
          $message['in_user_id'] = $user['id'];
          $message['date'] = date('Y-m-d H:i:s');


          if(add_fast_message($message))
          {
            echo get_alert('Mesajınız ilgili Firmaya başarılı bir şekilde gönderildi.','Mesajınız Gönderildi.', 'success');
          }
          else
          {
            echo get_alert('Tüm alanları eksiksiz doldurunuz.', 'Mesaj Gönderilemedi', 'danger');
          }
        }
      ?>

      <form class="form-contact mtb40 validate_2" action="" method="post">
        <div class="col-md-7">
          <span>Ad - Soyad*</span><br>
          <input type="text" name="name_surname" value="" class="required">
        </div>

        <div class="col-md-7">
          <span>E-Posta*</span><br>
          <input type="email" name="email" value="" class="required">
        </div>

        <div class="col-md-7">
          <span>Telefon*</span><br>
          <input type="text" name="phone" value="" minlength="10" class="required">
        </div>

        <div class="col-md-12">
          <span>Mesaj*</span><br>
          <textarea name="description" rows="8" cols="40" minlength="10" class="required"></textarea>
        </div>

        <div class="col-md-12">
          <?php html_microtime(); ?>
          <input type="hidden" name="contact_message">
          <input type="submit" class="mtb20 btn btn-nb" value="Gönder">
        </div>
      </form>
    </div><!--/ .col-md-8 /-->
    <div class="col-md-6">
      <?php get_options("google_map", 'val_1', true); ?>
    </div>
  </div>

    <div class="col-md-4"></div>
<?php include '_inc/footer.php'; //Get Footer ?>
