const images = [
    'media/boat.jpeg',
    'media/boat2.jpeg',
    'media/boat3.jpeg'
];
let current = 0;
const landingPage = document.getElementById('landing-page');

setInterval(() => {
    current = (current + 1) % images.length;
    landingPage.style.backgroundImage = `url('${images[current]}')`;
}, 5000);

//da dobijemo dodatno polje za yacht i gliser
const vehicleSelect = document.getElementById('vehicle');
    const durationGroup = document.getElementById('duration-group');

    vehicleSelect.addEventListener('change', () => {
        const selected = vehicleSelect.value;
        if (selected === 'yacht' || selected === 'speedboat') {
            durationGroup.classList.remove('hidden');
        } else {
            durationGroup.classList.add('hidden');
        }
    });

// Modal JS
const modal = document.getElementById('tourModal');
const modalTitle = document.getElementById('modalTitle');
const modalImage = document.getElementById('modalImage');
const modalDescription = document.getElementById('modalDescription');
const closeModal = document.querySelector('.close');

document.querySelectorAll('.learn-more').forEach(btn => {
  btn.addEventListener('click', function (e) {
    e.preventDefault();
    const card = this.closest('.tour-card');
    const title = card.querySelector('h3').textContent;
    const imgSrc = card.querySelector('img').src;
    const description = card.querySelector('p').textContent;

    modalTitle.textContent = title;
    modalImage.src = imgSrc;
    modalDescription.textContent = description;
    modal.style.display = 'block';
  });
});

closeModal.addEventListener('click', function () {
  modal.style.display = 'none';
});

window.addEventListener('click', function (e) {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
});





//ANIMACIJE ZA TEKSTOVE







document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".booking-form");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      } else {
        entry.target.classList.remove("visible"); // ako želiš da se efekt ponavlja
      }
    });
  }, {
    threshold: 0.2
  });

  if (form) observer.observe(form);
});







  
  document.addEventListener("DOMContentLoaded", function () {
    const bookingInfo = document.querySelector(".booking-info");

    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
          } else {
            entry.target.classList.remove("visible");
          }
          
        });
      },
      {
        threshold: 0.3
      }
    );

    if (bookingInfo) observer.observe(bookingInfo);
  });





 

  document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".tour-card");

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        } else {
          entry.target.classList.remove("visible");
        }
        
      });
    }, {
      threshold: 0.4
    });

    cards.forEach(card => observer.observe(card));
  });






 
  document.addEventListener("DOMContentLoaded", function () {
    const fleetItems = document.querySelectorAll(".fleet-block li");

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        } else {
          entry.target.classList.remove("visible");
        }
        
      });
    }, {
      threshold: 0.7
    });

    fleetItems.forEach(item => observer.observe(item));
  });

