document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.reviews-swiper', {
    loop: true,
    spaceBetween: 25,
    slidesPerView: 1,
    centeredSlides: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    breakpoints: {
        1024: {
        slidesPerView: 'auto',
        },
    }
  });
});
