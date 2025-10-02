// ==== Abrir Modal ====
function abrirModal() {
  const modal = document.getElementById("modalMenu");
  modal.style.display = "block";
  setTimeout(() => {
    modal.classList.add("show");
  }, 10); 
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
  }, 400); 
}

// ==== Cerrar modal al hacer click fuera del contenido ====
window.addEventListener("click", (e) => {
  const modal = document.getElementById("modalMenu");
  if (e.target === modal) {
    cerrarModal();
  }
});



