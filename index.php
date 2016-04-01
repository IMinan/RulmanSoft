<?php include '_inc/header.php' ?>
  <div class="row">
    <div class="col-md-8">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <script type="text/javascript">
          $(document).ready(function(){
            $('.carousel-inner .item').first().addClass('active');
          });
        </script>
        <div class="carousel-inner" role="listbox">
          <?php
            $query = mysqli()->query("SELECT * FROM news ORDER BY id DESC LIMIT 3");
            if($query->num_rows > 0):
            while ($news = $query->fetch_object()):
              if($news->status == 1):
          ?>
          <div class="item">
            <a href="<?php echo $theme_url; ?>/news.php?id=<?php echo $news->id; ?>"><img src="admin/upload/news/<?php if($news->list_img){ echo $news->list_img; }else{ echo 'img-none.png'; } ?>" class="img-reponsive" alt="..."></a>
            <div class="carousel-caption">
              <!--/ .content /-->
            </div>
          </div>
        <?php endif; endwhile; endif; ?>
        </div><!--/ .carousel-inner /-->

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--/ .carous.el /-->
    </div><!--/ .col-md-8 /-->

    <div class="col-md-4">
      <div class="title">
        <h2>Firma Hakkında</h2>
      </div>

      <div class="row">
        <div class="col-md-8">
          <p><?php echo substr(get_options('information', 'val_1', false), 0, 85).' ...'; ?></p>
          <a href="<?php echo $theme_url; ?>/about.php" class="">Devamını oku >></a>
        </div><!--/  /-->

        <div class="col-md-4">
          <img src="image/logo_one.png" class="img-responsive" alt="" />
        </div><!--/ .col-md-4 /-->
      </div><!--/.row  /-->
    </div><!--/ .col-md-4 /-->
  </div><!--/ .row /-->

  <div class="row">
    <div class="content-title">Son Haberler</div>
    <?php
      $query = mysqli()->query("SELECT * FROM news ORDER BY id DESC LIMIT 3");
      if($query->num_rows > 0):
      while ($news = $query->fetch_object()):
        if($news->status == 1):
    ?>

    <div class="col-md-4">
      <div class="showcase-news">
        <a href="<?php echo $theme_url; ?>/news.php?id=<?php echo $news->id; ?>"><h4><?php echo $news->title; ?></h4></a>

        <div class="row">
          <div class="col-md-4">
            <a href="<?php echo $theme_url; ?>/news.php?id=<?php echo $news->id; ?>"><img src="admin/upload/news/<?php if($news->list_img){ echo $news->list_img; }else{ echo 'img-none.png'; } ?>" class="img-responsive" alt="" /></a>
          </div><!--/ .col-md-4 /-->

          <div class="col-md-8">
            <p><?php echo substr($news->content, 0, 70); ?></p>
            <a href="<?php echo $theme_url; ?>/news.php?id=<?php echo $news->id; ?>">Detaylar..</a>
          </div><!--/ .col-md-8 /-->
        </div><!--/ .row /-->
      </div><!--/ .showcase /-->
    </div><!--/ .col-md-4 /-->

  <?php endif; endwhile; endif; ?>

  </div><!--/ .row /-->

<?php include '_inc/footer.php'; ?>
