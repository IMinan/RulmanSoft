<?php
ob_start();
session_start();
  if(file_exists('admin/_conf.php')) { include('admin/_conf.php'); }
  elseif(file_exists('../admin/_conf.php')) { include('../admin/_conf.php'); }
  elseif(file_exists('../../admin/_conf.php')) { include('../../admin/_conf.php'); }
  elseif(file_exists('../../../admin/_conf.php')) { include('../../../admin/_conf.php'); }
  else { include('../../../admin/_conf.php'); }
?>
<?php
  if(file_exists('admin/_inc/functions.php')) { include('admin/_inc/functions.php'); }
  elseif(file_exists('../admin/_inc/functions.php')) { include('../admin/_inc/functions.php'); }
  elseif(file_exists('../../admin/_inc/functions.php')) { include('../../admin/_inc/functions.php'); }
  elseif(file_exists('../../../admin/_inc/functions.php')) { include('../../../admin/_inc/functions.php'); }
  else { include('../../../admin/_inc/functions.php'); }
?>
<!DOCTYPE html>
<html lang="en">
 	<head>
 		<title>Night-Blue</title>
	 	<meta charset="utf-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--/ css link /-->
 		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 		<link rel="stylesheet" type="text/css" href="main.css">
 		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!--/ javascript src /-->
	 	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 	</head>
 	<body>

  <?php include 'admin/admin_menu.php'; ?>

  <div class="container">
    <header>
      <nav class="top-nav">
        <div class="row">
          <div class="col-md-4">
            <a href="<?php echo $theme_url; ?>"><img src="image/logo.png" class="img-responsive logo" alt="" /></a>
          </div><!--/ .col-md-4 /-->

          <div class="col-md-4 pull-right">
            <div class="pull-right">
              <a href="#"><img class="m-none" src="image/1.png" alt="" /></a>
              <a href="#"><img style="width: 40px;" class="m-none" src="image/logo_one.png" alt="" /></a>
            </div><!--/ .pull-right /-->

            <div class="pull-right">
              <form class="" action="search.php" method="get">
                <input type="text" class="search-input form-control" name="search" value="" placeholder="Rulman Arama..">
                <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
              </form>
            </div><!--/ .pull-right /-->
          </div><!--/ .col-md-4 /-->
        </div><!--/ .row /-->

        <div class="top-menu navbar">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div><!--/ .navbar-header /-->

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo $theme_url; ?>">Ana Sayfa</a></li>
              <li><a href="<?php echo $theme_url; ?>/news.php">Haberler</a></li>
              <li><a href="<?php echo $theme_url; ?>/search.php">Ürünlerimiz</a></li>
              <li><a href="<?php echo $theme_url; ?>/about.php">Hakkımızda</a></li>
              <li><a href="<?php echo $theme_url; ?>/contact.php">İletişim</a></li>
            </ul>
          </div><!--/ .collapse /-->
        </div><!--/ .top-menu /-->
      </nav>
    </header>
