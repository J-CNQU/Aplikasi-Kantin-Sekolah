document.querySelectorAll('.list-menu').forEach(menu => {
  const plusBtn = menu.querySelector('.plus');
  const minusBtn = menu.querySelector('.minus');
  const qtyDisplay = menu.querySelector('.qty-number');

  let count = 0;

  plusBtn.addEventListener('click', () => {
    count++;
    qtyDisplay.textContent = count;
  });

  minusBtn.addEventListener('click', () => {
    if (count > 0) {
      count--;
      qtyDisplay.textContent = count;
    }
  });
});



const track = document.querySelector('.menu-track');
const leftBtn = document.querySelector('.arrow.left');
const rightBtn = document.querySelector('.arrow.right');

let currentSlide = 0;
const slideWidth = 490;
const totalCards = document.querySelectorAll('.list-menu').length;
const visibleCards = 6;

function updateButtons() {
  if (currentSlide === 0) {
    leftBtn.classList.add('hidden');
  } else {
    leftBtn.classList.remove('hidden');
  }

  if (currentSlide + visibleCards >= totalCards) {
    rightBtn.classList.add('hidden');
  } else {
    rightBtn.classList.remove('hidden');
  }
}

rightBtn.addEventListener('click', () => {
  if (currentSlide + visibleCards < totalCards) {
    currentSlide++;
    track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    updateButtons();
  }
});

leftBtn.addEventListener('click', () => {
  if (currentSlide > 0) {
    currentSlide--;
    track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    updateButtons();
  }
});

updateButtons();