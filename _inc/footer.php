  </div><!--/ .main-cotnainer /-->

  <div class="container p0">
    <footer class="m-none">
      <div class="row">
        <div class="col-md-4">
          <div class="title"><h3>Sosyal Medya</h3></div>
          <hr>
          <ul class="socail-comment">
            <li><a href="<?php get_options('facebook', 'val_1', true); ?>"><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a href="<?php get_options('twitter', 'val_1', true); ?>"><i class="fa fa-twitter"></i> Twitter</a></li>
            <li><a href="<?php get_options('instagram', 'val_1', true); ?>"><i class="fa fa-instagram"></i> İnstagram</a></li>
            <li><a href="<?php get_options('google_plus', 'val_1', true); ?>"><i class="fa fa-google-plus"></i> Google</a></li>
          </ul>
        </div><!--/ .col-md-4 /-->

        <div class="col-md-4">
          <div class="title"><h3>Bizden Haberler</h3></div>
          <hr>
          <?php $result = get_list_news(3); while($news = $result->fetch_object()): if($news->status == 1): ?>
          <div class="row mt20">
            <div class="col-md-3"><a href="<?php echo theme_url('news.php?id=').$news->id; ?>"><img src="<?php echo site_url('upload/news/').$news->list_img; ?>" class="img-responsive" alt="" /></a></div>
            <div class="col-md-9"><a href="<?php echo theme_url('news.php?id=').$news->id; ?>" class="f16"><?php echo $news->title; ?></a><p class="f12 mt10"><?php echo substr($news->content, 0, 40); ?></p></div>
          </div><!--/ .row /-->

          <?php endif; endwhile; ?>
        </div><!--/ .col-md-4 /-->

        <div class="col-md-4">
          <div class="title"><h3>İletişim</h3></div>
          <hr>

          <?php
            $corporate_id = get_options('corporate_id', 'val_1', false);  $user = get_user($corporate_id);

            if(isset($_POST['footer_message']) and isset($_POST['microtime']))
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

          <form name="form_message" id="form_message" action="" method="POST" class="validate_4">
            <div class="form-group">
              <input type="text" name="name_surname" class="form-control required" id="name_surname" placeholder="Ad - Soyad">
            </div><!--/ .form-group /-->

            <div class="form-group">
              <input type="email" name="email" class="form-control required" id="email" placeholder="E-Posta">
            </div><!--/ .form-group /-->

            <div class="form-group">
              <input type="number" name="phone" class="form-control required" minlength="10" id="phone" placeholder="Telefon">
            </div><!--/ .form-group /-->

            <div class="form-group">
              <label for="exampleInputFile">Mesaj*</label>
              <textarea class="form-control required" minlength="10" name="description" rows="2" cols="40"></textarea>
            </div><!--/ .form-group /-->
            <?php html_microtime(); ?>
            <input type="hidden" name="footer_message">
            <button type="submit" class="btn btn-gray">Submit</button>
          </form>
        </div><!--/ col-md-4 /-->
      </div><!--/ .row /-->

      <div class="CLG">
        <hr>
        <span class="pull-left"><?php get_options('building_info', 'val_1', true); ?></span>
        <span class="pull-right">© Alt yapı <a href="http://rulmansoft.com">RulmanSoft</a> ekibi tarafından yazılmıştır.</span>
      </div><!--/ .text-center /-->
    </footer>
  </div><!--/ .containe  /-->
  </body>
</html>
<?php analytics(); ?>
