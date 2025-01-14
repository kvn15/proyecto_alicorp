
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


//modal 
// Seleccionar elementos
const openButton = document.querySelector('.btn-open');
const modal = document.getElementById('customModal');
const closeButton = modal.querySelector('.btn-close');

// Abrir el modal
openButton.addEventListener('click', () => {
    modal.classList.add('show');
});

// Cerrar el modal
closeButton.addEventListener('click', () => {
    modal.classList.remove('show');
});

// Cerrar el modal al hacer clic fuera del contenido
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('show');
    }
});

//carusel 05/01/2024
const track = document.querySelector('.carousel-track');
const items = Array.from(track.children);
const leftButton = document.querySelector('.arrow.left');
const rightButton = document.querySelector('.arrow.right');
let currentIndex = 2; // Empieza con el tercer elemento centrado

// Duplicar el primer y último elemento para el efecto infinito
const firstClone = items[0].cloneNode(true);
const lastClone = items[items.length - 1].cloneNode(true);
track.appendChild(firstClone);
track.insertBefore(lastClone, items[0]);

// Reproduce solo el video central
function updateVideos() {
    items.forEach((item, index) => {
        const video = item.querySelector('video');
        if (index === currentIndex) {
            video.play(); // Reproduce el video central
        } else {
            video.pause(); // Pausa los demás videos
            video.currentTime = 0; // Reinicia el video pausado
        }
    });
}

// Actualiza el carrusel
function updateCarousel(instant = false) {
    items.forEach((item, index) => {
        item.classList.remove('center');
        if (index === currentIndex) {
            item.classList.add('center');
        }
    });

    const itemWidth = items[0].getBoundingClientRect().width + 10; // Ancho del elemento con espacio
    const centerOffset = (track.offsetWidth / 2) - (itemWidth / 2); // Centra el elemento principal
    track.style.transition = instant ? 'none' : 'transform 0.5s ease-in-out';
    track.style.transform = `translateX(${centerOffset - (itemWidth * currentIndex)}px)`;

    updateVideos(); // Reproduce o pausa los videos según corresponda
}

// Manejo de carrusel infinito
function handleInfiniteScroll() {
    if (currentIndex === 0) {
        currentIndex = items.length - 2; // Salta al penúltimo elemento (último real)
        updateCarousel(true); // Actualización instantánea
    }
    if (currentIndex === items.length - 1) {
        currentIndex = 1; // Salta al primer elemento real
        updateCarousel(true); // Actualización instantánea
    }
}

// Botones de navegación
rightButton.addEventListener('click', () => {
    currentIndex++;
    updateCarousel();
    setTimeout(handleInfiniteScroll, 500); // Ajusta después de la transición
});

leftButton.addEventListener('click', () => {
    currentIndex--;
    updateCarousel();
    setTimeout(handleInfiniteScroll, 500); // Ajusta después de la transición
});

// Inicializa el carrusel
updateCarousel();
