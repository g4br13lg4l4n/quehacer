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
              <select class="form-control col-md-4" id="Empresa" v-model="publicidad">
                  <option disabled value="">Seleccione una Publicidad</option>
                  <option v-for="publicidad in publicidads" v-bind:value="publicidad.id">
                    {{ publicidad.name}} - {{ publicidad.cliente.empresa }}
                  </option>
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
  },
  data () {
    return {
      publicidad: '',
      publicidads: [],
    }
  },
  created () {
    Store.getPublicidads()
      .then(res => {
        this.publicidads = res.data
      })
  }
}
</script>

