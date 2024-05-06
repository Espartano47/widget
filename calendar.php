<style>
    /* Estilo personalizado */
    .calendario {
      margin-top: 20px;
    }

    .mes {
      text-align: center;
      font-weight: bold;
    }

    .dias-semana {
      list-style-type: none;
      display: flex;
      justify-content: space-around;
      padding: 0;
    }

    .dias-semana li {
      flex-basis: calc(100% / 7);
      text-align: center;
      /* border: 1px solid #ccc; */
    }

    .dias-mes {
      list-style-type: none;
      display: flex;
      flex-wrap: wrap;
      padding: 0;
      border: 1px solid #ccc;
      background-color: white;
      color: white;
    }

    .dias-mes li {
      flex-basis: calc(100% / 7);
      text-align: center;
      padding: 10px 0;
      cursor: pointer;
      border: 1px solid #ccc;
    }

    .hoy {
  background-color: #E74C3C ; /* Fondo amarillo */
  color: #FDFEFE; /* Texto negro */
  font-weight: bold; /* Texto en negrita */
  border: 1px solid #000000; /* Borde negro */
}
  </style>
        <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h2 class="mes">Abril 2024</h2>
          </div>
          <div class="card-body">
            <ul class="dias-semana">
              <li>Dom</li>
              <li>Lun</li>
              <li>Mar</li>
              <li>Mié</li>
              <li>Jue</li>
              <li>Vie</li>
              <li>Sáb</li>
              
            </ul>
            <ul class="dias-mes" id="calendario-dias">
              <!-- Espacios en blanco para empezar el mes -->
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <!-- Días del mes -->
              <!-- Aquí se generan dinámicamente los días del mes con JavaScript -->
            </ul>
          </div>
          <div class="card-footer text-center">
            <button class="btn btn-primary mr-2" onclick="anteriorMes()">Anterior</button>
            <button class="btn btn-primary" onclick="siguienteMes()">Siguiente</button>
          </div>
        </div>
      </div>
    </div>
  </div>