<?php include '_inc/header.php'; //Get Header ?>
  <?php $results = get_list_news(6); if($results): ?>

  <div class="h20"></div>

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="height: 400px;" role="listbox">
      <?php while($news_img = $results->fetch_object()): if($news_img->status == 1): ?>
      <a href="<?php echo theme_url('news.php?id=').$news_img->id; ?>" class="item">
        <img src="<?php echo site_url('upload/news/').$news_img->list_img; ?>" alt="..." class="img-responsive">
        <div class="carousel-caption">
          <?php echo $news_img->title; ?>
        </div>
      </a>
      <?php endif; endwhile; ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php endif; ?>

  <div class="main-content">
    <div class="title"><h3 class="CNB">Son Haberler</h3><hr></div><!--/ .title /-->

    <?php $news = get_list_news(3); if($results): ?>
    <div class="row">
      <?php while($news_text = $news->fetch_object()): if($news_text->status == 1): ?>
      <div class="col-md-4">
        <div class="content-info">
          <div class="content-info-header"><a href="<?php echo theme_url('news.php?id=').$news_text->id; ?>"><?php echo $news_text->title; ?></a></div>

          <div class="content-info-body">
            <p><?php echo substr($news_text->content, 0, 150); ?> ..</p>
          </div><!--/ .content-info-body /-->
        </div><!--/ .content-info /-->
      </div><!--/ .col-md-4 /-->
      <?php endif; endwhile; ?>
    </div><!--/ .row /-->

  <?php endif; ?>

    <blockquote class="gray-blockquote mt20">
      <div class="row">
        <div class="col-md-10">
          <div class="title">
            <h1>Biz Kimiz?</h1>
          </div>
          <p class="f15"> <?php strip_tags(substr(get_options('information', 'val_1', true), 0, 20)); ?> </p>
        </div><!--/ .col-md-10 /-->

        <div class="col-md-2">
          <div class="ptb20">
            <a href="<?php echo theme_url('about.php'); ?>" class="pull-right btn btn-nb">Devamını oku!</a>
          </div>
        </div><!--/ .col-md-2 /-->
      </div><!--/ .row /-->
    </blockquote>

    <?php /*
    <div class="row">
      <div class="col-md-6">
        <h3 class="CNB">Rulman</h3>
        <hr>
        <img src="http://www.demirsektoru.com/uploads/logo/ringspann-bilya-hirdavat-rulman-tic-ltd-sti.jpg" class="img-responsive" alt="" />
      </div><!--/ .col-md-6 /-->

      <div class="col-md-6">
        <h3 class="CNB">Rulmanlar hakkında Bilgi</h3>
        <hr>

        <ul class="text-list">
          <li><div><i class="fa fa-plus"></i><span>Venenatis Justo Ullamcorper Ridiculus</span></div>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Sed posuere consectetur est at lobortis.</p>
          </li>

          <li><div><i class="fa fa-plus"></i><span>Venenatis Justo Ullamcorper Ridiculus</span></div>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Sed posuere consectetur est at lobortis.</p>
          </li>

          <li><div><i class="fa fa-plus"></i><span>Venenatis Justo Ullamcorper Ridiculus</span></div>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Sed posuere consectetur est at lobortis.</p>
          </li>

          <li><div><i class="fa fa-plus"></i><span>Venenatis Justo Ullamcorper Ridiculus</span></div>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Sed posuere consectetur est at lobortis.</p>
          </li>
        </ul>
      </div><!--/ .col-md-6 /-->
    </div><!--/ .row /-->

     */ ?>

    <div class="row">
      <div class="h60"></div>

      <div class="col-md-4">
        <div class="title"><h2 class="CNB">Hakkımızda</h2></div>

        <div class="paragraf mt10">
          <p><?php get_options('information', 'val_1', true); ?></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="title"><h2 class="CNB">Bizden haberler</h2></div>
          <img id="last_news_img" src="" class="ptb10 img-responsive" style="height: 140px;" alt="" />
          <div class="paragraf Bnone p0">
            <p id="last_news_content"></p>
          </div>
      </div>

      <div class="col-md-4">
        <div class="title"><h2 class="CNB">İletişim</h2></div>
        <div class="p10">
          <p><i class="fa fa-phone"></i> <?php get_options('phone', 'val_1', true); ?></p>
          <p><i class="fa fa-envelope"></i> <?php get_options('email', 'val_1', true); ?></p>
          <p class="f12"><?php get_options('address', 'val_1', true); ?></p>
          <a href="<?php echo theme_url('contact.php'); ?>" class="btn btn-nb">İletişim Formu</a>
        </div>
      </div>

      <div class="h60"></div>
    </div><!--/  /-->
  </div>
<?php include '_inc/footer.php'; //Get Footer ?>
