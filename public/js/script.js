// image gallery

function imgGallery() {
  const mainImg = document.querySelector('.details__img')
  smallImg = document.querySelectorAll('.details__small-img') 

  smallImg.forEach((img) => {
    img.addEventListener('click', function() {
      mainImg.src = this.src
    })
  })
}

imgGallery();

// Swiper categories
var swiperCategories = new Swiper(".categories__container", {
    spaceBetween: 24,
    loop:true,

    navigation: {
      nextEl: ".swiper-move-next",
      prevEl: ".swiper-move-prev",
    },
    
    breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1200: {
          slidesPerView: 6,
          spaceBetween: 24,
        },
    },

  });

  // Swiper Products

  var swiperProducts = new Swiper(".new__container", {
    spaceBetween: 24,
    loop:true,

    navigation: {
      nextEl: ".swiper-prod-move-next",
      prevEl: ".swiper-prod-move-prev",
    },
    
    breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 24,
        },
    },

  });

  // Products tab

  const tabs = document.querySelectorAll('[data-target]')
  tabContents = document.querySelectorAll('[content]')

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      const target = document.querySelector(tab.dataset.target);
      tabContents.forEach((tabContent) => {
        tabContent.classList.remove('active-tab');
      })

      target.classList.add('active-tab');

      tabs.forEach((tab) => {
        tab.classList.remove('active-tab');
      })

      tab.classList.add('active-tab');

    })
  })