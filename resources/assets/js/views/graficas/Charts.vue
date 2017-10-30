<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Crear Estadisticas
          </div>
          <div class="margins">
            <form @submit.prevent="CreateChart(publicidad)" enctype="multipart/form-data">
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Generar grafica de: </button>
                </span>
                <select class="form-control col-md-4" id="Empresa" v-model="publicidad">
                    <option disabled value="">Seleccione una Publicidad</option>
                    <option v-for="publicidad in publicidads" v-bind:value="publicidad.id">
                      {{ publicidad.name}} - {{ publicidad.cliente.empresa }}
                    </option>
                  </select>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card-columns cols-2">
      <div class="card">
        <div class="card-header">
          Estaditica de uso por sexo mas detallada
          <div class="card-actions">
          </div>
        </div>
        <div class="card-block">
          <div class="chart-wrapper">
            <sex-chart></sex-chart>
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
          Estaditica de uso por Sexo
          <div class="card-actions">
          </div>
        </div>
        <div class="card-block">
          <div class="chart-wrapper">
            <gender-chart></gender-chart>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          Estaditica de cantidad de usuarios
          <div class="card-actions">
          </div>
        </div>
        <div class="card-block">
          <div class="chart-wrapper">
          
            <users-chart v-if="numberUsers"
              v-bind:data="numberUsers">
              </users-chart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SexChart from './charts/SexChart'
import GenderChart from './charts/GenderChart'
import StateChart from './charts/StateChart'
import UsersChart from './charts/UsersChart'
export default {
  name: 'Charts',
  components: {
    SexChart,
    GenderChart,
    StateChart,
    UsersChart
  },
  data () {
    return {
      publicidad: '',
      publicidads: [],
      dataCharts: '',
      numberUsers: '',
    }
  },
  methods: {
    CreateChart(){
      if(this.publicidad){
        Store.getPublicidadChart(this.publicidad)
          .then(res => {
            this.dataCharts = res.data
            this.userChartResult(res.data)
          })
      }else{
        this.$toaster.warning('Seleccionar una publicidad')
      }
    },
    userChartResult(a){
      this.numberUsers = a.user_aplications.length
    },
  },
  created () {
    Store.getPublicidads()
      .then(res => {
        this.publicidads = res.data
      })
  }
}
</script>
<style scoped>
  .margins{
    margin: 20px 10px;
  }
</style>


