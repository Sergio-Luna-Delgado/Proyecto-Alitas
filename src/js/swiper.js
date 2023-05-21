const swiper = new Swiper(".mySwiper", {
    breakpoints: {
        // cuando la pantalla tenga un ancho máximo de 768 píxeles
        1024: {
            slidesPerView: 3,
            grid: {
                rows: 2,
            },
        },
        // cuando la pantalla tenga un ancho máximo de 768 píxeles
        768: {
            slidesPerView: 2,
            grid: {
                rows: 2,
            },
        },
        // cuando la pantalla tenga un ancho máximo de 480 píxeles
        320: {
            slidesPerView: 1,
            grid: {
                rows: 2,
            },
        },
    },
    spaceBetween: 5,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// setInterval(() => {
//     let swiperTop = document.querySelector('.swiper-slide-next');
//     swiperTop.classList.add('mt-0');
// }, 1);

// console.log(swiperTop);