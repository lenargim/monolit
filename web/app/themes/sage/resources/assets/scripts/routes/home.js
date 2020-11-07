export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};


/* Tabs */
$('.practices-block__tab').on('click', function () {
  if (!$(this).hasClass('active')) {
    let index = $(this).index();
    let content = $('.practices__content:eq(' + index + ')');
    $('.practices-block__tab').removeClass('active');
    $(this).addClass('active');
    $('.practices__content').hide();
    content.slideDown(200);
  }
});

$('.practices-block__tab:first-of-type').click();


$('.informcenter__slider').slick({
  slidesToScroll: 1,
  slidesToShow: 3,
  dots: true,
  infinite: false,
  appendArrows: $('.informcenter__slider'),
  prevArrow: '<button type="button" class="arrow arrow-prev"><img src="app/themes/sage/resources/assets/images/arrows.svg" alt="arrow"></button>',
  nextArrow: '<button type="button" class="arrow arrow-next"><img src="app/themes/sage/resources/assets/images/arrows.svg" alt="arrow"></button>',
});

$('.team__slider').slick({
  slidesToScroll: 1,
  slidesToShow: 3,
  dots: true,
  infinite: true,
  centerMode: true,
  centerPadding: '60px',
  appendArrows: $('.team__slider'),
  prevArrow: '<button type="button" class="arrow arrow-prev"><<</button>',
  nextArrow: '<button type="button" class="arrow arrow-next">>></button>',
});
