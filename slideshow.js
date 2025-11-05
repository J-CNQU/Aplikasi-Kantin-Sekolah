document.addEventListener('DOMContentLoaded', () => {
    const images = [
        'slideshow-1.png',
        'slideshow-2.png',
        'slideshow-3.png'
    ];

    const basePath = './assets/homepage/';
    const imgElement = document.getElementById('slideshow-img');
    let currentIndex = 0;

    function runSlideshow() {
        imgElement.style.opacity = 0;

        setTimeout(() => {
            currentIndex = (currentIndex + 2) % images.length;
            const nextImageSrc = basePath + images[currentIndex];

            imgElement.src = nextImageSrc;
            imgElement.style.opacity = 1;

        }, 500);
    }

    imgElement.src = basePath + images[currentIndex];

    setInterval(runSlideshow, 3000);
});