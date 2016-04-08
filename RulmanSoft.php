<?php
/* Rulman Soft Hazır Codlar ve Tanımları */
/*---------------------------- Pages.php Sayfası için ----------------------------*/
  $page = get_page($_GET['id']); // get_pages fonksiyonu ile pages tablosundaki verileri alabiliyoruz
  $page->$id; // id'si
  $page->$status; // statusü
  $page->$date; // tarihini
  $page->$upload_date; // son güncellenme tarihini
  $page->$title; // bağlığını
  $page->$content; // içeriğini

/*---------------------------- news.php Sayfası için ----------------------------*/
  $news = get_news($_GET['id']); // get_news fonksiyonu ile news tablosundaki verileri alabiliyoruz
  $news->$id; // id'si
  $news->$status; // statusü
  $news->$date; // tarihini
  $news->$upload_date; // son güncellenme tarihini
  $news->$title; // bağlığını
  $news->$list_img; // haberler listesindeki öne çıkarılmış resim
  $news->$content; // içeriğini

/*----------------------------/ Firma Genel Bilgileri /----------------------------*/
  /* Firma adı */
  get_options('building_info', 'val_1', true);

  /* Firma Telefon */
  get_options('phone', 'val_1', true);

  /* Yetkili Kişi Telefon */
  get_options('mobile_phone', 'val_1', true);

  /* E-Mail */
  get_options('email', 'val_1', true);

  /* Fax */
  get_options('fax', 'val_1', true);

  /* İl - İlçe */
  get_options('province', 'val_1', true);

  /* Ülke */
  get_options('country', 'val_1', true);

  /* Adres Bilgileri */
  get_options('address', 'val_1', true);

/*----------------------------/ Sosyal Medya /-----------------------------------*/
  /* Facebook */
  get_options('facebook', 'val_1', true);

  /* Twitter */
  get_options('twitter', 'val_1', true);

  /* İnstagram */
  get_options('instagram', 'val_1', true);

  /* Google+ */
  get_options('google_plus', 'val_1', true);

/*----------------------------/ Api Hizmetleri /-----------------------------------*/
  /* Google Analytics */
  get_options("google_analytics", 'val_1', true);

  /* Google Remarketing */
  get_options("google_remarketing", 'val_1', true);

  /* Google Haritalar */
  get_options("google_map", 'val_1', true);

  /* Facebook Pixel */
  get_options("facebook_pixel", 'val_1', true);

  /* Facebook Remarketing */
  get_options("facebook_remarketing", 'val_1', true);

  /* Yandex */
  get_options("yandex_analytics", 'val_1', true);



?>
