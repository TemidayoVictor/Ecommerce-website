// SHOW MENU
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close'),
      sidebar = document.getElementById('sidebar');
let notification = document.getElementById("notification");
let fieldIndex = 0;

// MENU SHOW
if(navToggle) {
  navToggle.addEventListener('click', () => {
    navMenu.classList.add('show-menu');
  })
}

//HIDE SHOW
if(navClose) {
  navClose.addEventListener('click', () => {
    navMenu.classList.remove('show-menu');
  })
}

// function to make notifiction disappper after 3 seconds
if (notification) {
    notification.classList.add("show");
    setTimeout(() => {
        notification.classList.remove("show");
    }, 3000); // Hide after 3 seconds
}

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
          350: {
            slidesPerView: 2,
            spaceBetween: 24,
          },

          768: {
            slidesPerView: 3,
            spaceBetween: 24,
          },

          992: {
            slidesPerView: 4,
            spaceBetween: 24,
          },

          1200: {
            slidesPerView: 5,
            spaceBetween: 24,
          },
          1400: {
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
        350: {
          slidesPerView: 2,
          spaceBetween: 24,
        },

        768: {
          slidesPerView: 3,
          spaceBetween: 24,
        },

        992: {
          slidesPerView: 4,
          spaceBetween: 24,
        },

        1200: {
          slidesPerView: 5,
          spaceBetween: 24,
        },
        1400: {
          slidesPerView: 6,
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

  function addField() {
    let newField = `
        <div class="extra-field">
            <div class="flex">
                <div class="input-field">
                    <label for="">  <h4>Name</h4> </label>
                    <input type="text" name="extra_fields[${fieldIndex}][name]" placeholder="Field Name" required>
                </div>

                <div class="input-field">
                    <label for="">  <h4>Name</h4> </label>
                    <input type="text" name="extra_fields[${fieldIndex}][value]" placeholder="Field Value" required>
                </div>
            </div>
            <button type="button" onclick="removeField(this)" class="btn btn--sm delete" style="margin-bottom: .5rem">Remove</button>
        </div>
    `;

    document.getElementById('extraFields').insertAdjacentHTML('beforeend', newField);
    fieldIndex++;
}

function removeField(element) {
    element.parentElement.remove();
}
