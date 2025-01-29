// //carusel hver inicio
// document.addEventListener("DOMContentLoaded", function () {
//     // Obtener elementos necesarios
    
//     const carouselH = document.querySelector('.carousel');
//     const navDotsH = document.querySelectorAll('.nav-dot');

//     let currentIndexH = 0;

//     // Función para actualizar el carrusel y los puntos
//     function updateCarouselH(index) {
//     const offset = -index * 100; // Calcula el desplazamiento
//     carouselH.style.transform = `translateX(${offset}%)`; // Mueve el carrusel

//     // Actualiza los puntos de navegación
//     navDotsH.forEach(dot => dot.classList.remove('active'));
//     navDotsH[index].classList.add('active');
//     }

//     // Agregar eventos de hover a los puntos de navegación
//     navDotsH.forEach((dot, index) => {
//     dot.addEventListener('mouseover', () => {
//         currentIndexH = index; // Actualiza el índice actual
//         updateCarouselH(currentIndexH);
//     });
//     });

//     // Iniciar con el primer punto activo
//     updateCarouselH(currentIndexH);
// });
// //fin caruse home inicio



// document.querySelector('.dropdown-btn').addEventListener('click', function () {
//     this.classList.toggle("active");
//     const dropdown = document.querySelector('.dropdown');
//     dropdown.classList.toggle('expanded');

// });


// document.querySelector('.dropdown1-btn').addEventListener('click', function () {
//     this.classList.toggle("active");
//     const dropdown = document.querySelector('.dropdown1');
//     dropdown.classList.toggle('expanded');
// });

// document.addEventListener('DOMContentLoaded', () => {
//     let currentIndex = 0; // Índice del slide actual
//     let autoSlideInterval; // Variable para almacenar el intervalo automático

//     function updateCarousel() {
//         const items = document.querySelectorAll('.carousel-item');

//         // Elimina la clase active de todos los items
//         items.forEach(item => item.classList.remove('active'));

//         // Añade la clase active al elemento actual
//         items[currentIndex].classList.add('active');
//     }

//     function nextSlide() {
//         const items = document.querySelectorAll('.carousel-item');
//         currentIndex = (currentIndex + 1) % items.length; // Avanza al siguiente slide
//         updateCarousel();
//     }

//     function prevSlide() {
//         const items = document.querySelectorAll('.carousel-item');
//         currentIndex = (currentIndex - 1 + items.length) % items.length; // Retrocede al slide anterior
//         updateCarousel();
//     }

//     function startAutoSlide() {
//         autoSlideInterval = setInterval(nextSlide, 3000); // Cambia cada 3 segundos
//     }

//     function stopAutoSlide() {
//         clearInterval(autoSlideInterval); // Detiene el cambio automático
//     }

//     // Añadir eventos a los botones para cambiar manualmente
//     document.querySelector('.next').addEventListener('click', () => {
//         stopAutoSlide(); // Detiene el automático al hacer clic
//         nextSlide();
//         startAutoSlide(); // Reinicia el automático
//     });

//     document.querySelector('.prev').addEventListener('click', () => {
//         stopAutoSlide(); // Detiene el automático al hacer clic
//         prevSlide();
//         startAutoSlide(); // Reinicia el automático
//     });

//     // Inicia el carrusel automáticamente al cargar
//     startAutoSlide();
// });


// document.addEventListener("DOMContentLoaded", () => {
//     // Seleccionar todos los botones "VER MÁS"
//     const openButtons = document.querySelectorAll(".btn-open");

//     openButtons.forEach((button) => {
//         button.addEventListener("click", function () {
//             const modalId = this.getAttribute("data-modal");
//             const modal = document.getElementById(modalId);
//             if (modal) {
//                 modal.style.visibility = "visible";
//                 modal.style.opacity = "1";
//             } else {
//                 console.error(`Modal con ID "${modalId}" no encontrado.`);
//             }
//         });
//     });

//     // Seleccionar todos los botones "Cerrar" de los modales
//     const closeButtons = document.querySelectorAll(".btn-close");

//     closeButtons.forEach((button) => {
//         button.addEventListener("click", function () {
//             const modal = this.closest(".modal");
//             if (modal) {
//                 modal.style.visibility = "hidden";
//                 modal.style.opacity = "0";
//             }
//         });
//     });

//     // Cerrar el modal al hacer clic fuera del contenido
//     window.addEventListener("click", function (event) {
//         const modals = document.querySelectorAll(".modal");
//         modals.forEach((modal) => {
//             if (event.target === modal) {
//                 modal.style.visibility = "hidden";
//                 modal.style.opacity = "0";
//             }
//         });
//     });
// });


// //caruel para los videos
// const videos = document.querySelectorAll('.carousel-video video');
// const videoContainer = document.querySelector('.carousel-videos');
// const leftButton = document.querySelector('.carousel-button.left');
// const rightButton = document.querySelector('.carousel-button.right');
// let current = 2;

// function updateCarousel() {
//   // Pausa todos los videos antes de actualizar
//   videos.forEach((video, index) => {
//     if (index !== current) {
//       video.pause();
//     }
//   });

//   // Actualiza las clases para resaltar el video principal
//   document.querySelectorAll('.carousel-video').forEach((video, index) => {
//     video.classList.remove('main');
//     if (index === current) {
//       video.classList.add('main');
//     }
//   });

//   // Ajusta el contenedor al video principal
//   const offset = -(current - 1) * 33.33;
//   videoContainer.style.transform = `translateX(${offset}%)`;

//   // Opcional: inicia automáticamente el video principal
//   videos[current].play();
// }

// // Botón izquierdo: ir al video anterior
// leftButton.addEventListener('click', () => {
//   videos[current].pause(); // Pausa el video actual
//   current = (current - 1 + videos.length) % videos.length;
//   updateCarousel();
// });

// // Botón derecho: ir al siguiente video
// rightButton.addEventListener('click', () => {
//   videos[current].pause(); // Pausa el video actual
//   current = (current + 1) % videos.length;
//   updateCarousel();
// });

// // Inicializa el carrusel
// updateCarousel();

// document.addEventListener("DOMContentLoaded", function () {
    
//     function initHoverCarousel() {
//         const carouselH = document.querySelector('.carousel');
//         const navDotsH = document.querySelectorAll('.nav-dot');

//         if (!carouselH || navDotsH.length === 0) return;

//         let currentIndexH = 0;

//         function updateCarouselH(index) {
//             const offset = -index * 100;
//             carouselH.style.transform = `translateX(${offset}%)`;

//             navDotsH.forEach(dot => dot.classList.remove('active'));
//             navDotsH[index].classList.add('active');
//         }

//         navDotsH.forEach((dot, index) => {
//             dot.addEventListener('mouseover', () => {
//                 currentIndexH = index;
//                 updateCarouselH(currentIndexH);
//             });
//         });

//         updateCarouselH(currentIndexH);
//     }

//     initHoverCarousel();
// });

// document.addEventListener("DOMContentLoaded", function () {
//     function toggleDropdown(buttonClass, dropdownClass) {
//         const button = document.querySelector(buttonClass);
//         const dropdown = document.querySelector(dropdownClass);

//         if (!button || !dropdown) return;

//         button.addEventListener("click", function () {
//             this.classList.toggle("active");
//             dropdown.classList.toggle("expanded");
//         });
//     }

//     toggleDropdown(".dropdown-btn", ".dropdown");
//     toggleDropdown(".dropdown1-btn", ".dropdown1");
// });

// document.addEventListener("DOMContentLoaded", function () {
//     function initImageCarousel(carouselSelector, nextBtnSelector, prevBtnSelector) {
//         const carousel = document.querySelector(carouselSelector);
//         const nextBtn = document.querySelector(nextBtnSelector);
//         const prevBtn = document.querySelector(prevBtnSelector);
//         if (!carousel || !nextBtn || !prevBtn) return;

//         let currentIndex = 0;
//         let autoSlideInterval;

//         function updateCarousel() {
//             const items = carousel.querySelectorAll('.carousel-item');
//             items.forEach(item => item.classList.remove('active'));
//             items[currentIndex].classList.add('active');
//         }

//         function nextSlide() {
//             const items = carousel.querySelectorAll('.carousel-item');
//             currentIndex = (currentIndex + 1) % items.length;
//             updateCarousel();
//         }

//         function prevSlide() {
//             const items = carousel.querySelectorAll('.carousel-item');
//             currentIndex = (currentIndex - 1 + items.length) % items.length;
//             updateCarousel();
//         }

//         function startAutoSlide() {
//             autoSlideInterval = setInterval(nextSlide, 3000);
//         }

//         function stopAutoSlide() {
//             clearInterval(autoSlideInterval);
//         }

//         nextBtn.addEventListener("click", () => {
//             stopAutoSlide();
//             nextSlide();
//             startAutoSlide();
//         });

//         prevBtn.addEventListener("click", () => {
//             stopAutoSlide();
//             prevSlide();
//             startAutoSlide();
//         });

//         startAutoSlide();
//     }

//     initImageCarousel(".carousel-container", ".next", ".prev");
// });


// document.addEventListener("DOMContentLoaded", function () {
//     function initModalSystem() {
//         document.body.addEventListener("click", function (event) {
//             if (event.target.classList.contains("btn-open")) {
//                 const modalId = event.target.getAttribute("data-modal");
//                 const modal = document.getElementById(modalId);
//                 if (modal) {
//                     modal.style.visibility = "visible";
//                     modal.style.opacity = "1";
//                 }
//             }

//             if (event.target.classList.contains("btn-close") || event.target.classList.contains("modal")) {
//                 const modal = event.target.closest(".modal");
//                 if (modal) {
//                     modal.style.visibility = "hidden";
//                     modal.style.opacity = "0";
//                 }
//             }
//         });
//     }

//     initModalSystem();
// });

// document.addEventListener("DOMContentLoaded", function () {
//     function initVideoCarousel() {
//         const videos = document.querySelectorAll('.carousel-video video');
//         const videoContainer = document.querySelector('.carousel-videos');
//         const leftButton = document.querySelector('.carousel-button.left');
//         const rightButton = document.querySelector('.carousel-button.right');

//         if (!videos.length || !videoContainer || !leftButton || !rightButton) return;

//         let current = 2;

//         function updateVideoCarousel() {
//             videos.forEach((video, index) => {
//                 if (index !== current) video.pause();
//             });

//             document.querySelectorAll('.carousel-video').forEach((video, index) => {
//                 video.classList.toggle('main', index === current);
//             });

//             const offset = -(current - 1) * 33.33;
//             videoContainer.style.transform = `translateX(${offset}%)`;
//             videos[current].play();
//         }

//         leftButton.addEventListener("click", () => {
//             videos[current].pause();
//             current = (current - 1 + videos.length) % videos.length;
//             updateVideoCarousel();
//         });

//         rightButton.addEventListener("click", () => {
//             videos[current].pause();
//             current = (current + 1) % videos.length;
//             updateVideoCarousel();
//         });

//         updateVideoCarousel();
//     }

//     initVideoCarousel();
// });


// document.addEventListener("DOMContentLoaded", function() {
//     alert('ptm')
//     const carouselElement = document.querySelector("#carouselExampleIndicators");
//     const carousel = new bootstrap.Carousel(carouselElement, {
//         wrap: false, // Desactiva el reinicio infinito
//         ride: false // No se mueve automáticamente
//     });
// });

document.addEventListener("DOMContentLoaded", function() {
    const carouselElement = document.querySelector("#carouselExampleIndicators");
    const prevButton = document.querySelector("#prevBtn");
    const nextButton = document.querySelector("#nextBtn");
    const totalSlides = document.querySelectorAll(".carousel-item").length;
    
    let currentIndex = 0;

    const carousel = new bootstrap.Carousel(carouselElement, {
        wrap: false, // Desactiva el reinicio infinito
        ride: false
    });

    // Solo ejecutar si los botones existen
    if (prevButton && nextButton) {
        // Función para actualizar los botones
        function updateButtons() {
            prevButton.disabled = currentIndex === 0;
            nextButton.disabled = currentIndex === totalSlides - 1;
        }

        // Detectar cuando cambia de slide
        carouselElement.addEventListener("slid.bs.carousel", function(event) {
            currentIndex = event.to;
            updateButtons();
        });

        // Inicializar botones
        updateButtons();
    }
});
