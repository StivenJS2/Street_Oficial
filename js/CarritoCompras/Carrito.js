// ==== Abrir Modal ====
function abrirModal() {
  const modal = document.getElementById("modalMenu");
  modal.style.display = "block";
  setTimeout(() => {
    modal.classList.add("show");
  }, 10); // pequeña pausa para animación
}

// ==== Cerrar Modal ====
document.getElementById("cerrarMenu").addEventListener("click", () => {
  cerrarModal();
});

function cerrarModal() {
  const modal = document.getElementById("modalMenu");
  modal.classList.remove("show");
  setTimeout(() => {
    modal.style.display = "none";
  }, 400); // espera a que termine animación
}

// ==== Cerrar modal al hacer click fuera del contenido ====
window.addEventListener("click", (e) => {
  const modal = document.getElementById("modalMenu");
  if (e.target === modal) {
    cerrarModal();
  }
});
