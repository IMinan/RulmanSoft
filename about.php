<?php include '_inc/header.php'; ?>

  <div class="row">
    <div class="col-md-12">
      <h2>Firma Hakkında</h2>

      <img src="image/logo.png" class="img-responsive" style="width: 400px;" alt="" />

      <div class="p20">
        <?php get_options("information", "val_1", true); ?>
      </div>
    </div>
  </div>

<?php include '_inc/footer.php'; ?>
