
document.querySelector('.dropdown-btn').addEventListener('click', function () {
    this.classList.toggle("active");
    const dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('expanded');

});

// window.onclick = function(event) {
//     if (!event.target.matches('.dropdown-btn')) {
//         var dropdowns = document.getElementsByClassName("dropdown");
//         for (var i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.style.display === "block") {
//                 openDropdown.style.display = "none";
//             }
//         }
//         document.getElementById("dropdown-btn").classList.remove("active");
//     }
// };


document.querySelector('.dropdown1-btn').addEventListener('click', function () {
    this.classList.toggle("active");
    const dropdown = document.querySelector('.dropdown1');
    dropdown.classList.toggle('expanded');
});


//modal pho
// Seleccionar elementos
// const openButton = document.querySelector('.btn-open');
// const modal = document.getElementById('customModal');
// const closeButton = modal.querySelector('.btn-close');

// // Abrir el modal
// openButton.addEventListener('click', () => {
//     modal.classList.add('show');
// });

// // Cerrar el modal
// closeButton.addEventListener('click', () => {
//     modal.classList.remove('show');
// });

// // Cerrar el modal al hacer clic fuera del contenido
// modal.addEventListener('click', (e) => {
//     if (e.target === modal) {
//         modal.classList.remove('show');
//     }
// });

// //carusel 05/01/2024
// const track = document.querySelector('.carousel-track');
// const items = Array.from(track.children);
// const leftButton = document.querySelector('.arrow.left');
// const rightButton = document.querySelector('.arrow.right');
// let currentIndex = 2; // Empieza con el tercer elemento centrado

// // Duplicar el primer y último elemento para el efecto infinito
// const firstClone = items[0].cloneNode(true);
// const lastClone = items[items.length - 1].cloneNode(true);
// track.appendChild(firstClone);
// track.insertBefore(lastClone, items[0]);

// // Reproduce solo el video central
// function updateVideos() {
//     items.forEach((item, index) => {
//         const video = item.querySelector('video');
//         if (index === currentIndex) {
//             video.play(); // Reproduce el video central
//         } else {
//             video.pause(); // Pausa los demás videos
//             video.currentTime = 0; // Reinicia el video pausado
//         }
//     });
// }

// // Actualiza el carrusel
// function updateCarousel(instant = false) {
//     items.forEach((item, index) => {
//         item.classList.remove('center');
//         if (index === currentIndex) {
//             item.classList.add('center');
//         }
//     });

//     const itemWidth = items[0].getBoundingClientRect().width + 10; // Ancho del elemento con espacio
//     const centerOffset = (track.offsetWidth / 2) - (itemWidth / 2); // Centra el elemento principal
//     track.style.transition = instant ? 'none' : 'transform 0.5s ease-in-out';
//     track.style.transform = `translateX(${centerOffset - (itemWidth * currentIndex)}px)`;

//     updateVideos(); // Reproduce o pausa los videos según corresponda
// }

// // Manejo de carrusel infinito
// function handleInfiniteScroll() {
//     if (currentIndex === 0) {
//         currentIndex = items.length - 2; // Salta al penúltimo elemento (último real)
//         updateCarousel(true); // Actualización instantánea
//     }
//     if (currentIndex === items.length - 1) {
//         currentIndex = 1; // Salta al primer elemento real
//         updateCarousel(true); // Actualización instantánea
//     }
// }

// // Botones de navegación
// rightButton.addEventListener('click', () => {
//     currentIndex++;
//     updateCarousel();
//     setTimeout(handleInfiniteScroll, 500); // Ajusta después de la transición
// });

// leftButton.addEventListener('click', () => {
//     currentIndex--;
//     updateCarousel();
//     setTimeout(handleInfiniteScroll, 500); // Ajusta después de la transición
// });

// // Inicializa el carrusel
// updateCarousel();

// document.addEventListener('DOMContentLoaded', () => {
//     let currentIndex = 0;

//     function updateCarousel() {
//         const items = document.querySelectorAll('.carousel-item');

//         // Elimina la clase active de todos los items
//         items.forEach(item => item.classList.remove('active'));

//         // Añade la clase active al elemento actual
//         items[currentIndex].classList.add('active');

//         // Mueve el carrusel usando transform
//         const inner = document.querySelector('.carousel-inner');
//         //inner.style.transform = `translateX(-${currentIndex * 100}%)`;
//     }

//     function nextSlide() {
//         const items = document.querySelectorAll('.carousel-item');
//         currentIndex = (currentIndex + 1) % items.length; // Avanza al siguiente slide (circular)
//         updateCarousel();
//     }

//     function prevSlide() {
//         const items = document.querySelectorAll('.carousel-item');
//         currentIndex = (currentIndex - 1 + items.length) % items.length; // Retrocede al anterior (circular)
//         updateCarousel();
//     }

//     // Añadir eventos a los botones
//     document.querySelector('.next').addEventListener('click', nextSlide);
//     document.querySelector('.prev').addEventListener('click', prevSlide);

//     // Inicializa el carrusel correctamente
//     updateCarousel();
// });

document.addEventListener('DOMContentLoaded', () => {
    let currentIndex = 0; // Índice del slide actual
    let autoSlideInterval; // Variable para almacenar el intervalo automático

    function updateCarousel() {
        const items = document.querySelectorAll('.carousel-item');

        // Elimina la clase active de todos los items
        items.forEach(item => item.classList.remove('active'));

        // Añade la clase active al elemento actual
        items[currentIndex].classList.add('active');
    }

    function nextSlide() {
        const items = document.querySelectorAll('.carousel-item');
        currentIndex = (currentIndex + 1) % items.length; // Avanza al siguiente slide
        updateCarousel();
    }

    function prevSlide() {
        const items = document.querySelectorAll('.carousel-item');
        currentIndex = (currentIndex - 1 + items.length) % items.length; // Retrocede al slide anterior
        updateCarousel();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 3000); // Cambia cada 3 segundos
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval); // Detiene el cambio automático
    }

    // Añadir eventos a los botones para cambiar manualmente
    document.querySelector('.next').addEventListener('click', () => {
        stopAutoSlide(); // Detiene el automático al hacer clic
        nextSlide();
        startAutoSlide(); // Reinicia el automático
    });

    document.querySelector('.prev').addEventListener('click', () => {
        stopAutoSlide(); // Detiene el automático al hacer clic
        prevSlide();
        startAutoSlide(); // Reinicia el automático
    });

    // Inicia el carrusel automáticamente al cargar
    startAutoSlide();
});



// document.addEventListener('DOMContentLoaded', () => {
//     const openModalBtn = document.querySelector('.btn-open'); // Botón para abrir el modal
//     const closeModalBtn = document.querySelector('.btn-close'); // Botón para cerrar el modal
//     const modal = document.getElementById('customModal'); // Contenedor del modal

//     // Abrir el modal
//     openModalBtn.addEventListener('click', () => {
//         modal.classList.add('show'); // Agrega la clase .show para mostrar el modal
//         document.body.style.overflow = 'hidden'; // Desactiva el scroll del fondo
//     });

//     // Cerrar el modal
//     closeModalBtn.addEventListener('click', () => {
//         modal.classList.remove('show'); // Elimina la clase .show para ocultar el modal
//         document.body.style.overflow = ''; // Reactiva el scroll
//     });

//     // Cerrar el modal al hacer clic fuera del contenido
//     modal.addEventListener('click', (event) => {
//         if (event.target === modal) {
//             modal.classList.remove('show');
//             document.body.style.overflow = '';
//         }
//     });
// });

document.addEventListener("DOMContentLoaded", () => {
    // Seleccionar todos los botones "VER MÁS"
    const openButtons = document.querySelectorAll(".btn-open");

    openButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal");
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.visibility = "visible";
                modal.style.opacity = "1";
            } else {
                console.error(`Modal con ID "${modalId}" no encontrado.`);
            }
        });
    });

    // Seleccionar todos los botones "Cerrar" de los modales
    const closeButtons = document.querySelectorAll(".btn-close");

    closeButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const modal = this.closest(".modal");
            if (modal) {
                modal.style.visibility = "hidden";
                modal.style.opacity = "0";
            }
        });
    });

    // Cerrar el modal al hacer clic fuera del contenido
    window.addEventListener("click", function (event) {
        const modals = document.querySelectorAll(".modal");
        modals.forEach((modal) => {
            if (event.target === modal) {
                modal.style.visibility = "hidden";
                modal.style.opacity = "0";
            }
        });
    });
});


//caruel para los videos
const videos = document.querySelectorAll('.carousel-video video');
const videoContainer = document.querySelector('.carousel-videos');
const leftButton = document.querySelector('.carousel-button.left');
const rightButton = document.querySelector('.carousel-button.right');
let current = 2;

function updateCarousel() {
  // Pausa todos los videos antes de actualizar
  videos.forEach((video, index) => {
    if (index !== current) {
      video.pause();
    }
  });

  // Actualiza las clases para resaltar el video principal
  document.querySelectorAll('.carousel-video').forEach((video, index) => {
    video.classList.remove('main');
    if (index === current) {
      video.classList.add('main');
    }
  });

  // Ajusta el contenedor al video principal
  const offset = -(current - 1) * 33.33;
  videoContainer.style.transform = `translateX(${offset}%)`;

  // Opcional: inicia automáticamente el video principal
  videos[current].play();
}

// Botón izquierdo: ir al video anterior
leftButton.addEventListener('click', () => {
  videos[current].pause(); // Pausa el video actual
  current = (current - 1 + videos.length) % videos.length;
  updateCarousel();
});

// Botón derecho: ir al siguiente video
rightButton.addEventListener('click', () => {
  videos[current].pause(); // Pausa el video actual
  current = (current + 1) % videos.length;
  updateCarousel();
});

// Inicializa el carrusel
updateCarousel();
