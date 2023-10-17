const switchElement = document.getElementById("modo-switch");

switchElement.addEventListener("change", function () {
  if (switchElement.checked) {
    // Si el interruptor está activado, cambia a Modo Noche
    document.body.classList.remove("modo-dia");
    document.body.classList.add("modo-noche");
  } else {
    // Si el interruptor está desactivado, cambia a Modo Día
    document.body.classList.remove("modo-noche");
    document.body.classList.add("modo-dia");
  }
});