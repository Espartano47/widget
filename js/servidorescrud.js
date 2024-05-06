
function showTab(tabIndex) {
  // Obtener todos los elementos de la clase tab-menu-item
  var tabItems = document.querySelectorAll('.tab-menu-item');

  // Obtener todos los elementos de la clase tab-content
  var tabContents = document.querySelectorAll('.tab-content');

  // Iterar sobre todos los elementos tab-menu-item
  tabItems.forEach(function(tabItem, index) {
      // Remover la clase 'active' de todos los elementos tab-menu-item
      tabItem.classList.remove('active');

      // Ocultar todos los elementos tab-content
      tabContents[index].style.display = 'none';
  });

  // Agregar la clase 'active' al elemento tab-menu-item correspondiente al índice
  tabItems[tabIndex].classList.add('active');

  // Mostrar el contenido correspondiente al índice
  tabContents[tabIndex].style.display = 'block';
}
function Vapor_Dashboard(datos1) {

  var vapor1 = Number(datos1[0].valor).toLocaleString("en-US");
  var vapor1_p = Number(datos1[0].porcentaje).toLocaleString("en-US");
  var vapor2 = Number(datos1[1].valor).toLocaleString("en-US");
  var vapor2_p = Number(datos1[1].porcentaje).toLocaleString("en-US");

  var vapor1 =
    // Actualizar el valor de vapor
    $('#vapor_secadoras').text(Number(vapor1).toLocaleString("en-US"));
  $('#vapor_bleach').text(vapor2);

  //porcentaje vapor 1 guardarlo en un div y mostrarlo en el front
  vapor1porcentaje = vapor1_p;
  if (vapor1porcentaje < 0) {
    var texto_html1 = '<span class="description-percentage text-danger" style="font-size: 16px; display: inline-block;"><i class="fas fa-caret-down"></i> ' + vapor1porcentaje +'%</span>';
  } else {
    var texto_html1 = '<span class="description-percentage text-success" style="font-size: 16px; display: inline-block;"><i class="fas fa-caret-up"></i> ' + vapor1porcentaje +'%</span>';
  }

  vapor2porcentaje = vapor2_p;
  if (vapor2porcentaje < 0) {
    var texto_html2 = '<span class="description-percentage text-danger" style="font-size: 16px; display: inline-block;"><i class="fas fa-caret-down"></i> ' + vapor2porcentaje +'%</span>';
  } else {
    var texto_html2 = '<span class="description-percentage text-success" style="font-size: 16px; display: inline-block;"><i class="fas fa-caret-up"></i> ' + vapor2porcentaje +'%</span>';
  }

  $('#vapor1porcentaje').html(texto_html1);
  $('#vapor2porcentaje').html(texto_html2);
  // Si tienes otros valores para mostrar, puedes actualizarlos de manera similar aquí
}
function actualizarDashboard_semana(datos3,datos4) {
  var valoresDia = datos3.map(function(registro) {
    return registro.valor;
  });

  var valoresNoche = datos4.map(function(registro) {
    return registro.valor;
  });
  console.log(valoresDia);
  console.log(valoresNoche);

// Convertir el array de valores a una cadena JSON
  var valoresJSON = JSON.stringify(valoresDia);
  var valoresNocheJSON = JSON.stringify(valoresNoche);
  var valoresLineal = [2, 3, 5, 6, 4, 7, 2];
  
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      datasets: [
          {
              label: 'Turno Día',
              backgroundColor: 'rgba(60,141,188,0.9)',
              borderColor: 'rgba(60,141,188,0.8)',
              borderWidth: 1,
              data: valoresDia,
              type: 'bar'
          },
          {
              label: 'Turno Noche',
              backgroundColor: 'rgba(210, 214, 222, 1)',
              borderColor: 'rgba(210, 214, 222, 1)',
              borderWidth: 1,
              data: valoresNoche,
              type: 'bar'
          }
      ]
  };
    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,

    }

    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })

    var barChartCanvas1 = $('#barChart2').get(0).getContext('2d')

    var barChartOption1s = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: true,
  }

    new Chart(barChartCanvas1, {
        type: 'line',
        data: barChartData,
        options: barChartOption1s
    })
}
function actualizarDashboard(datos2) {
  // Limpiar el contenido actual de la tabla
  $('#tablaDatos').empty();


  // Asocia el evento de clic a las filas de la tabla
  $('#tablaDatos').on('click', 'tr', function () {
    // Obtiene los datos del registro de la fila clicada
    var departamento = $(this).find('td:eq(0)').text(); // Obtener el texto de la primera celda (DEPARTAMENTO)
    var lbsAct = $(this).find('td:eq(1)').text(); // Obtener el texto de la segunda celda (LBS ACT)
    var pyc = $(this).find('td:eq(2)').text(); // Obtener el texto de la tercera celda (PYC)
    //filtrar el dato cuando sea igual a departamento
    var dato = datos2.filter(function (item) {
      return item.descripcion === departamento;
    });

    var AW = Number(dato[0].AW_VALUE).toLocaleString("en-US");
    var AS = Number(dato[0].AS_VALUE).toLocaleString("en-US");
    var UW = Number(dato[0].UW_VALUE).toLocaleString("en-US");
    var PASTDUE = Number(dato[0].pastdue).toLocaleString("en-US");


    // Actualiza el contenido del modal con los datos del registro
    $('#exampleModalCenter').find('.card-header').text(departamento); // Actualiza el título del modal
    $('#librasvalor').val(lbsAct.trim());
    $('#pytsvalor').val(pyc.trim());
    $('#AWvalor').val(AW.trim());
    $('#ASvalor').val(AS.trim());
    $('#uwvalor').val(UW.trim());
    $('#pastdue').val(PASTDUE + " " + " lotes con mas de 7 dias de past due".trim());


    // Abre el modal
    $('#exampleModalCenter').modal('show');
  });

  // Iterar sobre los datos y construir los registros <tr>
  datos2.forEach(function (dato2) {
    var tr = $('<tr>');


    var icono = $('<i>').addClass('far fa-circle fa-lg text-danger me-3');
    var span = $('<span>').addClass('fw-medium').text(dato2.descripcion);
    var td1 = $('<td>').append(span);

    var div1 = $('<div>').attr('id', dato2.id).text(Number(dato2.valor).toLocaleString("en-US"));
    var td2 = $('<td style="text-align: center;"> ').append(div1);

    var div2 = $('<div>').attr('id',dato2.id).text(Number(dato2.porcentaje).toLocaleString("en-US")).css('text-align', 'right');
    var td3 = $('<td>').append(div2);

    tr.append(td1, td2, td3);

    // Agregar el registro <tr> a la tabla
    $('#tablaDatos').append(tr);

    // Llamar a una función para cargar los datos específicos en los divs
    cargarDatos(dato2.id, dato2.id + '_p', Number(dato2.valor).toLocaleString("en-US"), Number(dato2.porcentaje).toLocaleString("en-US"));
  });
  function cargarDatos(id, id_p, valor, porcentaje) {


// Ahora asignamos ese valor a los divs correspondientes
$('#' + id).text(valor); // Asigna el valor aleatorio al div con el ID id
$('#' + id_p).text(porcentaje); // Asigna el valor aleatorio seguido de '%' al div con el ID id_p
}
}

function solicitarDatos() {
  $.ajax({
    url: 'backquend.php',
    type: 'GET',
    dataType: 'json',
    success: function (datos) {
      // Filtrar datos por categoría
      var datos_vapor = datos.filter(function (item) {
        return item.categoria === 'Vapor';
      });
      var datos2 = datos.filter(function (item) {
        return item.categoria === 'Libras';
      });
      var datos3 = datos.filter(function (item) {
        return item.categoria === 'Produccion dia';
      });
      var datos4 = datos.filter(function (item) {
        return item.categoria === 'Produccion noche';
      });

      // Llamar a la función para actualizar el dashboard con los datos recibidos del servidor
      actualizarDashboard(datos2);
      Vapor_Dashboard(datos_vapor);
      // actualizarDashboard_semana(datos3,datos4);


      // También puedes pasar los datos filtrados a la función actualizarDashboard si es necesario
      // actualizarDashboard({ datos1: datos1, datos2: datos2 });
    },
    error: function (xhr, status, error) {
      console.error('Error al obtener datos del servidor:', error);
    }
  });
}

function solicitarDatos2() {
  $.ajax({
    url: 'backquend.php',
    type: 'GET',
    dataType: 'json',
    success: function (datos) {

      var datos3 = datos.filter(function (item) {
        return item.categoria === 'Produccion dia';
      });
      var datos4 = datos.filter(function (item) {
        return item.categoria === 'Produccion noche';
      });

      actualizarDashboard_semana(datos3,datos4);

    },
    error: function (xhr, status, error) {
      console.error('Error al obtener datos del servidor:', error);
    }
  });
}
solicitarDatos2();
solicitarDatos();
setInterval(solicitarDatos, 1 * 60 * 100); // Actualizar cada 5 minutos
setInterval(solicitarDatos2, 200 * 60 * 100);
console.log("hola");