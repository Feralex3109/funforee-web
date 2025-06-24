<<<<<<< HEAD
// script.js - FUNFOREE (manejo universal de formularios)
document.addEventListener("DOMContentLoaded", () => {
  // Selecciona todos los formularios con data-action (para múltiples formularios en la web)
  document.querySelectorAll("form[data-action]").forEach((form) => {
    const submitBtn = form.querySelector("button[type='submit']");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = "Enviando…";
      }

      try {
        // Usa el atributo data-action como endpoint (ej: php/guardar-datos.php)
        const action = form.getAttribute("data-action");
        const response = await fetch(action, {
          method: "POST",
          body: new FormData(form),
        });

        if (response && response.ok) {
          const resultado = await response.text();
          alert(resultado);
          form.reset(); // Limpia el formulario después de éxito
        } else if (response) {
          const errorTxt = await response.text();
          alert(`❌ Error al guardar: ${response.status} - ${errorTxt}`);
        } else {
          alert("❌ No se recibió respuesta del servidor.");
        }
      } catch (err) {
        console.error("Error al guardar los datos:", err);
        alert("❌ Error de conexión o inesperado: " + err.message);
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = "Enviar";
        }
      }
    });
=======
// Espera a que todo el DOM esté cargado
document.addEventListener("DOMContentLoaded", () => {
  // Captura el <form> dentro de .contacto-container
  const form = document.querySelector(".contacto-container form");
  if (!form) return;

  // Captura el botón de tipo submit dentro de ese <form>
  const submitBtn = form.querySelector("button[type='submit']");

  // Maneja el evento submit
  form.addEventListener("submit", async (e) => {
    e.preventDefault(); // evita envío tradicional
    submitBtn.disabled = true; // deshabilita botón
    submitBtn.textContent = "Enviando…";

    try {
      // Envía el formulario por fetch
      const response = await fetch("php/guardar-datos.php", {
        method: "POST",
        body: new FormData(form),
      });

      if (!response.ok) {
        throw new Error(`HTTP ${response.status}`);
      }

      const resultado = await response.text();
      alert(resultado); // muestra respuesta del servidor
      form.reset(); // limpia el formulario si quieres
    } catch (err) {
      console.error("Error al guardar los datos:", err);
      alert("Error al guardar: " + err.message);
    } finally {
      submitBtn.disabled = false; // vuelve a habilitar
      submitBtn.textContent = "Enviar";
    }
>>>>>>> f744de1 (funforee)
  });
});
