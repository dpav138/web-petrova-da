document.addEventListener("DOMContentLoaded", () => {
    const button = document.getElementById("toggleButton");
    const image = document.getElementById("image");

    button.addEventListener("click", () => {
        if (image.classList.contains("hidden")) {
            image.classList.remove("hidden");
            button.textContent = "Скрыть картинку";
        } else {
            image.classList.add("hidden");
            button.textContent = "Показать картинку";
        }
    });
});