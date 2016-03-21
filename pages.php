<?php include '_inc/header.php'; //Get Header ?>
<?php if(isset($_GET['id'])): $page = get_page($_GET['id']); if($page): if($page->status == 1):?>
    <div class="paragraf p30">
      <div class="title">
        <h3 class="CG"><?php echo $page->title; ?></h3>
      </div>
    </div><!--/ .paragraf /-->

    <div class="content mtb20 p20">
      <?php echo $page->content; ?>
    </div><!--/ .content /-->

    </div><!--/ .row /-->
    <?php else: ?>
      <?php get_alert('Aradığınız Sayfa Daha Önce Silinmiş!', '', 'danger mtb40', 'false'); ?>
    <?php endif; ?>

    <?php else: ?>
      <?php include '_inc/404.php' ?>
    <?php endif; ?>
  <?php endif; ?>
<?php include '_inc/footer.php'; //Get Footer ?>
