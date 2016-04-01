<?php include('../_inc/header.php'); ?>
  <script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
  <div class="row">
    <div class="col-md-3">
      <?php include('../_inc/sidebar.php'); ?>
    </div><!--/ .col-md-3 /-->

    <div class="col-md-9">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>">Anasayfa</a></li>
        <li><a href="<?php echo site_url('index.php'); ?>">Yönetim Paneli</a></li>
        <li class="active">Yeni Sayfa</li>
      </ol>

      <?php if(isset($_GET['id'])): $id = $_GET['id']; $page = get_page($id); ?>
        <?php
          if($_POST){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $m_short = $_POST['m_short'];
            $m_title = $_POST['m_title'];
            if(!$title || !$content){
          		echo get_alert('Tüm Alanları eksiksiz şekilde Doldurunuz');
          	}
            elseif(strlen($content) < 10)
            {
              echo get_alert('İçerik alanı en az 10 karakter olmalı.');
            }
            else{
              if(edit_pages($id, $title, $content, $m_short, $m_title, $theme_url."/pages.php?id=".$id))
              {
                $page = get_page($id);
                echo get_alert("Sayfa Başarılı Bir Şekilde Güncellendi", "Sayfa Güncellendi", "success");
                header("Refresh:2;".site_url("pages/page_list.php"));
              }
          } }
        ?>
        <form class="" action="" method="post">
          <div class="form-group">
            <input type="text" name="title" class="form-control" value="<?php echo $page->title; ?>" placeholder="Sayfa Başlığını Giriniz">
          </div><!--/ .form-group /-->

          <div class="form-group">
            <textarea name="content" style="outline: none;" class="form-control" rows="8" cols="40"><?php echo $page->content; ?></textarea>
          </div><!--/ .form-group /-->

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <div style="height:5px;"></div>
              <label class="text-muted" style="cursor:pointer;"> <input type="checkbox" name="is_menu" id="is_menu" value="1" <?php if($page->m_short > 0){echo'checked';}else{} ?>> <small>Site menüsünde gösterilsin mi?</small></label>
            </div> <!-- /.col-md-4 -->
            <div class="col-md-4">
              <div class="form-group m_items"><input type="text" name="m_title" id="m_title" class="form-control input-sm" value="<?php echo $page->m_title; ?>" placeholder="Menü Adı"/></div>
            </div> <!-- /.col-md-4 -->
            <div class="col-md-2">
              <div class="form-group m_items"><input type="text" name="m_short" id="m_short" class="form-control input-sm" value="<?php if($page->m_short == '0'){echo'';}else{echo $page->m_short;} ?>" placeholder="Sıralama (0,1,2,7,8...)" /></div>
            </div> <!-- /.col-md-4 -->
          </div> <!-- /.form-group -->

          <script>
          $(document).ready(function() {
            $('#is_menu').change(function() {
              if($(this).is(':checked'))
              {
                $('.m_items').show('slide');
              }
              else {
                $('.m_items').hide('slide');
              }
            });
            <?php if($page->m_short == 0){echo "  $('.m_items').hide();";}else{} ?>
          });

          </script>

          <div class="form-group text-right">
            <input type="submit" name="submit" class="btn btn-success" value="Kaydet">
          </div><!--/ .row /-->
        </form>
      <?php else: ?>
        <?php get_alert("Aradığınız Sayfa Bulunamadı!"); ?>
      <?php endif; ?>
    </div><!--/ .col-md-9 /-->
  </div><!--/ .row /-->
<?php include('../_inc/footer.php'); ?>
