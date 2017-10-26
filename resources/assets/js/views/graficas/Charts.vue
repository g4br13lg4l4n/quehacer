<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Crear Estadisticas
          </div>
          <div>

            <div class="input-group">
              <span class="input-group-btn">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Generar grafica de: </button>
              </span>
                <select class="form-control col-sm-4">
                  <option disabled="disabled" value="">1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                </select>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="card-columns cols-2">
      <div class="card">
        <div class="card-header">
          Estaditica de uso en Hombres
          <div class="card-actions">
          </div>
        </div>
        <div class="card-block">
          <div class="chart-wrapper">
            <man-chart></man-chart>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          Estaditica de uso por Estados
          <div class="card-actions">
          </div>
        </div>
        <div class="card-block">
          <div class="chart-wrapper">
            <state-chart></state-chart>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          Estaditica de uso en Mujeres
          <div class="card-actions">
          </div>
        </div>
        <div class="card-block">
          <div class="chart-wrapper">
            <woman-chart></woman-chart>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          Estaditica de uso por Genero
          <div class="card-actions">
          </div>
        </div>
        <div class="card-block">
          <div class="chart-wrapper">
            <gender-chart></gender-chart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import WomanChart from './charts/WomanChart'
import ManChart from './charts/ManChart'
import GenderChart from './charts/GenderChart'
import StateChart from './charts/StateChart'
export default {
  name: 'Charts',
  components: {
    WomanChart,
    ManChart,
    GenderChart,
    StateChart
  }
}
</script>

