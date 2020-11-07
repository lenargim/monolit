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

$('.sidebar__li:first-of-type').addClass('active');
$('.sidebar__li.active .sidebar__block').css('display', 'block');

$('.sidebar__title').on('click', function() {
  $(this).parent('.sidebar__li').toggleClass('active');
  $(this).siblings('.sidebar__block').slideToggle();
})

$('.single-practices__arrow').on('click', function() {
  $(this).parent('.single-practices__item').toggleClass('active');
  $(this).siblings('.single-practices__desc').slideToggle()
})

$(window).on('hashchange', function() {
  let hash = location.hash
   $(hash).addClass('active');
   $(hash).find('.single-practices__desc').slideDown();
 });

if(window.location.hash) {
  let hash = location.hash
     $(hash).addClass('active');
     $(hash).find('.single-practices__desc').css('display', 'block');
}


let link = $('.sidebar__subli a')
let path =  window.location.pathname

link.each(function() {
 $(this).attr('href').includes(path) ? $(this).addClass('open') : false
});


/* Team */

$('.team-page__arrow').on('click', function() {
  $(this).toggleClass('active');
  $(this).siblings('.team-page__text').slideToggle()
})
