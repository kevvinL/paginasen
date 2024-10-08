let toggle = document.getElementById("toggle");
let label_toggle = document.getElementById("label_toggle");

toggle.addEventListener("change", (event) => {
    let checked = event.target.checked; // Cambiado a 'checked'
    document.body.classList.toggle("dark"); // Asegúrate de que tengas la clase 'dark' en tu CSS
    if (checked === true) {
        label_toggle.innerHTML = `<i class="fa-solid fa-sun"></i>`;
    } else {
        label_toggle.innerHTML = `<i class="fa-solid fa-moon"></i>`;
    }
});

// Slider de imágenes
const slider = document.querySelector('.slider');
const sliderItems = document.querySelectorAll('.slider li');
let currentIndex = 0;

function showNextImage() {
    currentIndex++;
    if (currentIndex >= sliderItems.length) {
        currentIndex = 0; // Reinicia el índice al inicio
    }
    updateSliderPosition();
}

function updateSliderPosition() {
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Cambiar imagen automáticamente cada 3 segundos
setInterval(showNextImage, 3000);
