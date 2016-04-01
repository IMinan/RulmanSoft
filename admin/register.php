<?php
  $corporate['company_name'] = '';
  $corporate['name'] = '';
  $corporate['surname'] = '';
  $corporate['email'] = '';
  $corporate['gsm'] = '';
  $corporate['password'] = '';
  $corporate['district'] = '';
  $corporate['city'] = '';
  $corporate['district'] = '';
  $corporate['city'] = '';
  $corporate['country'] = '';
  $corporate['address'] = '';
  if(isset($_POST['submit']))
  {
    $corporate['company_name'] = mb_ucwords(form_input_control($_POST['company_name']));
    $corporate['name'] = mb_ucwords(form_input_control($_POST['name']));
    $corporate['surname'] = mb_ucwords(form_input_control($_POST['surname']));
    $corporate['email'] = strtolower(form_input_control($_POST['email']));
    $corporate['gsm'] = convert_gsm(form_input_control($_POST['gsm']));
    $corporate['password'] = form_input_control($_POST['password']);
    $corporate['city'] = form_input_control($_POST['city']);
    $corporate['district'] = form_input_control($_POST['district']);
    $corporate['country'] = form_input_control($_POST['country']);
    $corporate['address'] = form_input_control($_POST['address']);

    // form string kontrolleri
  	form_string_control($corporate['company_name'], 'Firma adı', array('min'=>3, 'max'=>50));
  	form_string_control($corporate['name'], 'Ad', array('min'=>3, 'max'=>50));
  	form_string_control($corporate['surname'], 'Soyad', array('min'=>3, 'max'=>50));
  	form_string_control($corporate['email'], 'E-posta', array('required'=>true, 'is_mail'=>true));
  	form_string_control($corporate['gsm'], 'Cep telefonu', array('required'=>true, 'is_gsm'=>true));
  	form_string_control($corporate['password'], 'Şifre', array('required'=>true, 'min'=>6, 'max'=>32));
    form_string_control($corporate['city'], 'Şehir', array('required'=>true, 'min'=>3));
    form_string_control($corporate['country'], 'Ülke', array('required'=>true, 'min'=>3));
    form_string_control($corporate['address'], 'Adres', array('required'=>true, 'min'=>10));

    if(!is_form_error())
  	{
  		$corporate['status'] = '1';
  		$corporate['date'] = date('Y-m-d H:i:s');
  		$corporate['user_type'] = 'corporate';

  		if(is_user("gsm='".$corporate['gsm']."'") > 0) {
  			array_push($err_msg, '<strong>'.$corporate['gsm'].'</strong> telefon numarasına ait üyelik bulunmakta. Üyelik ile ilgili problem yaşıyorsanız <a href="'.site_url('iletisim').'" target="_blank">iletişim</a> sayfasından bizimle iletişime geçebilirsiniz.');
  		}
  		elseif(is_user("email='".$corporate['email']."'") > 0) {
  			array_push($err_msg, '<strong>'.$corporate['email'].'</strong> e-posta numarasına ait üyelik bulunmakta. Üyelik ile ilgili problem yaşıyorsanız <a href="'.site_url('iletisim').'" target="_blank">iletişim</a> sayfasından bizimle iletişime geçebilirsiniz.');
  		}
  		else
  		{
  			// her sey duzgun ise veritabani ekleyelim
  			$corporate_id = add_user($corporate);
  			if($corporate_id > 0)
  			{
  				$corporate = get_user($corporate_id);
  				$_SESSION['login_id'] = $corporate['id'];
          header("Location: ".account_url(''));
  			}
  		}
  	}
  }
?>

<?php if(is_form_error()): ?><div class="row"><div class="col-md-3"></div><div class="col-md-6">	<?php print_alert($err_msg, 'danger', 'false'); ?> </div> <!-- /.col-md-3 --><div class="col-md-3"></div></div> <!-- /.row --> <?php endif; ?>
<div class="row">
  <div class="col-md-3"></div><!--/ .col-md-3 /-->

  <div class="col-md-6">
    <form action="" method="post" class="login-register validate">
      <h3>Üye Kayıt Formu</h3>
      <div class="form-group">
        <input type="text" name="company_name" value="" placeholder="Firma Adı" class="form-control">
      </div><!--/ .form-group /-->

      <div class="row">
        <div class="col-md-6">
          <input type="text" minlength="3" name="name" value="" placeholder="Ad" class="form-control required">
        </div><!--/ .col-md-6 /-->

        <div class="col-md-6">
          <input type="text" minlength="3" name="surname" value="" placeholder="Soyad" class="form-control required">
        </div><!--/ .col-md-6 /-->
      </div><!--/ .row /-->

      <div class="form-group mt20">
        <input type="email" minlength="3" name="email" value="" placeholder="E-Posta Adresiniz" class="form-control required">
      </div><!--/ .form-group /-->

      <div class="form-group">
        <input type="password" minlength="8" maxlength="16" name="password" value="" placeholder="Şifre" class="form-control required">
      </div><!--/ .form-group /-->

      <div class="form-group">
        <input type="number" minlength="10" maxlength="11" name="gsm" value="" placeholder="Telefon Numarası" class="form-control required digits">
      </div><!--/ .form-group /-->

      <div class="row">
        <div class="col-md-6">
          <input type="text" name="city" value="" maxlength="20" placeholder="İl" class="form-control required">
        </div><!--/ .col-md-6 /-->

        <div class="col-md-6">
          <input type="text" name="district" value="" maxlength="20" placeholder="İlçe" class="form-control required">
        </div><!--/ .col-md-6 /-->
      </div><!--/ .form-group /-->

      <div class="form-group mt20">
        <input type="text" class="form-control" name="country" maxlength="20" value="" placeholder="Ülke">
      </div><!--/ .form-group /-->

      <div class="form-group">
        <textarea name="address" rows="4" cols="40" class="form-control" placeholder=""></textarea>
      </div><!--/ .form-group /-->

      <div class="form-group">
        <input type="submit" name="submit" value="Gönder" class="btn btn-success required"> <span style="margin-top: 25px;" class="pull-right m-none"> Sitemize üyeliğiniz var mı? <a href="<?php echo theme_url('login.php'); ?>">Üye giriş paneli</a>.</span>
      </div><!--/ .form-group /-->
    </form>
  </div><!--/ .col-md-6 /-->

  <div class="col-md-3"></div><!--/ .col-md-3 /-->
</div><!--/ .row /-->
