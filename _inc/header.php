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
 		<title><?php get_options('building_info', 'val_1', true); ?></title>
	 	<meta charset="utf-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--/ css link /-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
 		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 		<link rel="stylesheet" type="text/css" href="main.css">

    <!--/ javascript src /-->
    <script src="js/jquery.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 	</head>
 	<body>

    <?php include 'admin/admin_menu.php'; ?>
    <?php include 'admin/account_menu.php'; ?>

    <header>
      <div class="navbar navbar-default navbar-top m-none">
        <div class="container">
          <div class="row">
            <div class="col-md-8 collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Ana Sayfa</a></li>
                <?php index_navigation(); ?>
                <li><a href="contact.php">İletişim</a></li>
              </ul>
            </div><!--/ .collapse /-->

            <div class="col-md-4 navbar-right">
              <ul class="nav navbar-nav">
                <li><a href="<?php get_options('facebook', 'val_1', true); ?>"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php get_options('twitter', 'val_1', true); ?>"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php get_options('instagram', 'val_1', true); ?>"><i class="fa fa-instagram"></i></a></li>
                <li><a href="<?php get_options('google_plus', 'val_1', true); ?>"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div><!--/ .navbar-nav /-->
          </div><!--/ .row /-->
        </div><!--/ .container /-->
      </div><!--/ .navbar-top /-->

      <div class="header-body">
        <div class="container">
          <div class="row">
            <div class="header-body-item">
              <div class="col-md-6">
                <a class="navbar-brand" href="index.php"><span><img src="image/logo.png" class="img-responsive logo" alt="RulmanSoft.com"></span><span class="logo-text">RulmanSoft</span></a>
              </div><!--/ .col-md-6 /-->

              <div class="col-md-6 pull-right m-none">
                <div class="phone"><i class="fa fa-mobile"></i> Tel : <?php get_options('phone', 'val_1', true); ?></div>
                <div class="emails"><i class="fa fa-envelope"></i> <?php get_options('email', 'val_1', true); ?></div>
              </div>
            </div><!--/ .header-bodu-item /-->
          </div><!--/ .row /-->
        </div><!--/ .header-body/-->
      </div><!--/ .header-body /-->
    </header>

    <div class="container BW main-container">
      <div class="row">
        <nav class="navbar navbar-default navbar-header">
          <div class="col-md-2 col-xs-12 pull-right">
            <button type="button" class="pull-left ml10 navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <div class="search">
              <i class="fa fa-search"></i>

              <div class="search-box">
                <form method="get" action="search.php">
                  <div class="row no-space">
                    <div class="col-md-9 col-xs-9">
                      <input type="text" name="search" class="form-control" placeholder="Rulman Numarası">
                    </div><!--/ .col-md-9 /-->
                    <div class="col-md-3 col-xs-3">
                      <input type="submit" value="Ara">
                    </div><!--/ .col-md-3 /-->
                  </div><!--/ .row /-->
                </form>
              </div><!--/ .search-box /-->
            </div><!--/ .search /-->
          </div><!--/ .col-md-2s /-->

          <div class="collapse navbar-collapse col-md-10" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Ana Sayfa</a></li>
              <?php index_navigation(); ?>
              <?php if(!is_login()): ?>
              <li><a href="login.php">Girişi Yap</a></li>
              <li><a href="register.php">Üye ol</a></li>
              <?php endif; ?>
              <li class="pull-right"><a href="contact.php">İletişim</a></li>
            </ul>
          </div><!--/ .collpase /-->
        </nav>
      </div><!--/ .row /-->
