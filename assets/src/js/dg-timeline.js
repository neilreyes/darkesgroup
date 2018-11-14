var swiper = new Swiper('#about-timeline .swiper-container', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: false,
  effect: "fade",
  autoHeight: true,
  paginationClickable: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    renderBullet: function(index, className){
      var year = document.querySelectorAll('#about-timeline .swiper-slide')[index].getAttribute('data-year');
      return '<span class="'+className+'">'+year+"</span>";
    }
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});