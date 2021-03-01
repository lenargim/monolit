export default {
  init() {
    $('.banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    infinite: false,
    })
  },
  finalize() {},
};

/* Sidebar */
//$('.sidebar__li.active').find('.sidebar__block').slideDown();
$('.sidebar__title').on('click', function() {
  $(this).parent('.sidebar__li').toggleClass('active');
  $(this).siblings('.sidebar__block').slideToggle();
})

$('.single-practices__arrow').on('click', function() {
  $(this).parent('.single-practices__item').toggleClass('active');
  $(this).siblings('.single-practices__desc').slideToggle()
})

let link = $('.sidebar__li');
let path =  window.location.pathname

function checkSidebar() {
  let hash = location.hash;
  let child = link.find('.sidebar__subli a');
  child.each(function() {
    $(this).attr('href').includes(path + hash) ? $(this).addClass('open') : $(this).removeClass('open')
  });
}

$(window).on('hashchange', function() {
  let hash = location.hash
   $('.single-practices__desc').hide();
   $(hash).find('.single-practices__desc').show();
   $(hash).addClass('active');
   checkSidebar()
 });

if(window.location.hash) {
  let hash = location.hash
   $(hash).addClass('active');
   $(hash).find('.single-practices__desc').css('display', 'block');
   link.each(function() {
     if ($(this).data('path').includes(path)) {
      $(this).addClass('active');
      $(this).find('.sidebar__block').css('display', 'block');
     } else {
      $(this).removeClass('active')
     }
   });
   checkSidebar();
} else {
  let first = $('.sidebar__li:first-of-type');
  first.addClass('active');
  first.find('.sidebar__block').css('display', 'block');
}



/* Team */

$('.team-page__arrow').on('click', function() {
  $(this).toggleClass('active');
  $(this).siblings('.team-page__text').slideToggle()
})


$('.header__close').on('click', function() {
$('.header').toggleClass('active');
$('.nav-primary, .header__phone').slideToggle()
});


$('.contacts-page__map').on('click', function () {
  $(this).find('iframe').css({pointerEvents: 'unset'})
})
