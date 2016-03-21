<?php include '_inc/header.php'; //Get Header ?>
  <?php if(isset($_GET['id'])): $news = get_news($_GET['id']); if($news): if($news->status == 1):?>
    <div class="paragraf p30">
      <div class="title">
        <h3 class="CG"><?php echo $news->title; ?></h3>
      </div>
    </div><!--/ .paragraf /-->

    <div class="content mtb20 p20">
      <?php echo $news->content; ?>
    </div><!--/ .content /-->

    </div><!--/ .row /-->
    <?php else: ?>
      <?php get_alert('Aradığınız Haber Daha Önce Silinmiş!', '', 'danger mtb40', 'false'); ?>
    <?php endif; ?>

    <?php else: ?>
      <?php include '_inc/404.php' ?>
    <?php endif; ?>
  <?php else: ?>
    <div class="row">
      <div class="col-md-1"></div>

      <div class="col-md-10">
      <?php $results = get_list_news(); if($results): ?>
        <?php while($lists = $results->fetch_object()): if($lists->status == 1): ?>
          <div class="news">
            <div class="title cnb"><h3><a class="CNB" href="?id=<?php echo $lists->id; ?>"><?php echo $lists->title; ?></a></h3></div>

            <div class="content">
              <div class="row">
                <div class="col-md-4">
                  <a href="?id=<?php echo $lists->id; ?>"><img src="admin/upload/news/<?php if($lists->list_img){ echo $lists->list_img; }else{ echo 'img-none.png'; } ?>" class="img-responsive" alt="" /></a>
                </div>

                <div class="col-md-8">
                  <p class="mtb10"><?php echo strip_tags(substr($lists->content, 0, 500).'...'); ?></p>

                  <a href="?id=<?php echo $lists->id; ?>" class="btn btn-nb pull-right">Devamı...</a>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>


      <div class="col-md-1"></div>
    </div>
  <?php endif; ?>
<?php include '_inc/footer.php'; //Get Footer ?>
