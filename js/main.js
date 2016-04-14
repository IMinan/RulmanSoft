/* search JS */
$(document).ready(function(){
  $(".validate").validate();
	$(".validate_1").validate();
	$(".validate_2").validate();
	$(".validate_3").validate();
	$(".validate_4").validate();

  $('.search i').click(function(){
    $('.search-box').stop().fadeToggle("slow");
  });

  $('.carousel-inner .item:first').addClass('active');
  var src = $('.carousel-inner .item:first img').attr('src');
  $('#last_news_img').attr("src", src);

  var content = $('.content-info-body:first p').text();
  $('#last_news_content').html(content);
});

/* Text list JS */
$(document).ready(function(){
  $(".text-list li").first().addClass("open");
  $(".text-list li div i").first().addClass("fa-minus");

  $(".text-list li").click(function(){
    $(".text-list li").removeClass("open");
    $(".text-list i").addClass("fa-plus");
    $(".text-list i").removeClass("fa-minus");
    $(this).children().children("i").addClass("fa-minus");
    $(this).addClass("open");
  });
});
