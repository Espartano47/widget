// Función para obtener el nombre del mes
function obtenerNombreMes(mes) {
  const nombresMeses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  return nombresMeses[mes];
}

// Función para obtener el número de días en un mes
function obtenerDiasEnMes(año, mes) {
  return new Date(año, mes + 1, 0).getDate();
}

// Función para actualizar el calendario
function actualizarCalendario(año, mes) {
  const diasMesElemento = document.getElementById("calendario-dias");
  diasMesElemento.innerHTML = "";

  const hoy = new Date(); // Obtener la fecha actual
  const diaHoy = hoy.getDate(); // Obtener el día actual
  const mesHoy = hoy.getMonth(); // Obtener el mes actual
  const añoHoy = hoy.getFullYear(); // Obtener el año actual

  const primerDiaMes = new Date(año, mes, 1).getDay();
  const totalDiasMes = obtenerDiasEnMes(año, mes);

  // Agregar espacios en blanco para los días previos al primer día del mes
  for (let i = 0; i < primerDiaMes; i++) {
    const li = document.createElement("li");
    diasMesElemento.appendChild(li);
  }

  // Obtener los datos de los turnos del mes actual mediante AJAX
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const turnos = JSON.parse(xhr.responseText);

      // Agregar los días del mes
      for (let dia = 1; dia <= totalDiasMes; dia++) {
        const li = document.createElement("li");
        li.textContent = dia;

        // Obtener el turno del día actual
        const fecha = new Date(año, mes, dia);
        const fechaFormateada = fecha.toISOString().split('T')[0];
        const turnoDia = turnos[fechaFormateada];

        // Aplicar el color de fondo según el turno
        if (turnoDia === 'A/C' || turnoDia === 'C') {
          li.style.backgroundColor = 'orange';
          li.style.color = 'black' // Turno A/C, color naranja
        } else if (dia === diaHoy && mes === mesHoy && año === añoHoy) {
          li.classList.add('hoy');
        } else if (turnoDia === 'B/D') {
          li.style.backgroundColor = 'purple';
        } else if (turnoDia === undefined || turnoDia.trim() === '') {
          li.style.backgroundColor = 'white'; // Sin turno, fondo blanco
        }

        // Evento click en el día
        li.onclick = function() {
          alert("Seleccionaste el día " + dia + " de " + obtenerNombreMes(mes) + " de " + año + ". Turno: " + turnoDia);
        };

        diasMesElemento.appendChild(li);
      }
    }
  };

  // Enviar la solicitud AJAX para obtener los turnos del mes actual
  xhr.open("GET", "obtener_turnos.php?mes=" + (mes + 1) + "&año=" + año, true);
  xhr.send();
}

// Variables para el mes y el año actuales
let hoy = new Date();
let mesActual = hoy.getMonth();
let añoActual = hoy.getFullYear();

// Función para ir al mes anterior
function anteriorMes() {
  mesActual--;
  if (mesActual < 0) {
    mesActual = 11;
    añoActual--;
  }
  actualizarCalendario(añoActual, mesActual);
  actualizarTituloMes();
}

// Función para ir al siguiente mes
function siguienteMes() {
  mesActual++;
  if (mesActual > 11) {
    mesActual = 0;
    añoActual++;
  }
  actualizarCalendario(añoActual, mesActual);
  actualizarTituloMes();
}

// Función para actualizar el título del mes
function actualizarTituloMes() {
  const tituloMes = document.querySelector(".mes");
  tituloMes.textContent = obtenerNombreMes(mesActual) + " " + añoActual;
}

// Inicializar el calendario
actualizarCalendario(añoActual, mesActual);
actualizarTituloMes();