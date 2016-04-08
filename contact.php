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
        <p class="f12">You can use these information to contact us or Just using the form below.</p>
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
        <p class="f12">Facebook: <a href="#"><?php get_options('facebook', 'val_1', true); ?></p>
        <p class="f12">Twitter: <a href="#"><?php get_options('twitter', 'val_1', true); ?></a></p>
      </div>
    </div><!--/ .col-md-4 /-->
  </div><!--/ .row /-->

  <div class="row">
    <div class="col-md-8">
      <form class="form-contact mtb40">
        <div class="col-md-7">
          <span>İsim*</span><br>
          <input type="text" name="name" value="">
        </div>

<<<<<<< HEAD
        <div class="col-md-7">
          <span>Email*</span><br>
          <input type="email" name="name" value="" >
        </div>

        <div class="col-md-12">
          <span>Mesaj*</span><br>
          <textarea name="message" rows="8" cols="40"></textarea>
        </div>

        <div class="col-md-12">
          <input type="submit" class="mtb20 btn btn-nb" value="Gönder">
        </div>
      </form>
    </div><!--/ .col-md-8 /-->
=======
    <div class="col-md-6">
      <?php get_options("google_map", 'val_1', true); ?>
    </div>
>>>>>>> origin/master
  </div>

    <div class="col-md-4"></div>
<?php include '_inc/footer.php'; //Get Footer ?>
