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
            <sex-chart v-if="mArrayAge.length"
            :mDetailsUsers="mDetailsUsers"
            :fDetailsUsers="fDetailsUsers"
            ></sex-chart>
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
              :data="numberUsers" >
              </users-chart>
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
            <gender-chart
            v-if="genUsers[0]"
            :genero="genUsers"></gender-chart>
          </div>
        </div>
      </div>
    
    </div>
  </div>
</template>

<script>
import SexChart from './views/SexChart'
import GenderChart from './views/GenderChart'
import StateChart from './views/StateChart'
import UsersChart from './views/UsersChart'
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
      stateUsers: '',
      sexUsers: '',
      genUsers:[],
      fGender: 0,
      mGender: 0,
      mArrayAge: [],
      fArrayAge:[],
      mDetailsUsers: [],
      mMaxAgeUsers: 0,
      mMinAgeUsers: 0,
      mMeddAgeUsers: 0,
      fDetailsUsers: [],
      fMaxAgeUsers: 0,
      fMinAgeUsers: 0,
      fMeddAgeUsers: 0,
      ArrayState: [],
      state: {
        datasets: [
          {
            label: "",
            backgroundColor: "#5ad9fa",
            data: [],
          },
        ]
      },
    }
  },
  methods: {
    CreateChart(){
      if(this.publicidad){
        Store.getPublicidadChart(this.publicidad)
          .then(res => {
            this.dataCharts = res.data
            this.createChart(res.data)
            this.genUsers.push(this.mGender, this.fGender)

            this.mMaxAgeUsers = Math.max.apply(null, this.mArrayAge)
            this.mMinAgeUsers = Math.min.apply(null, this.mArrayAge)
            let vmAge = this.mArrayAge
            let vmAgeSuma = vmAge.reduce((a , b) =>{
              return parseInt(a)+ parseInt(b)
            })
            this.mMeddAgeUsers = parseInt(vmAgeSuma) / vmAge.length
            this.mDetailsUsers.push(this.mMaxAgeUsers, this.mMinAgeUsers, this.mMeddAgeUsers)


            this.fMaxAgeUsers = Math.max.apply(null, this.fArrayAge)
            this.fMinAgeUsers = Math.min.apply(null, this.fArrayAge)
            let vfAge = this.fArrayAge
            let vfAgeSuma = vfAge.reduce( (a, b) =>{
              return parseInt(a) + parseInt(b)
            })
            this.fMeddAgeUsers = parseInt(vfAgeSuma) / vfAge.length
            this.fDetailsUsers.push(this.fMaxAgeUsers, this.fMinAgeUsers, this.fMeddAgeUsers)
            
            /*
            const arr = ['Tabasco', 'Tabasco', 'Tabasco', 'Tabasco', 'Teapa', 'Teapa', 'Teapa', 'Jalapa']
            let location = arr.slice().sort()

            */

            console.log(this.ArrayState)

          })
      }else{
        this.$toaster.warning('Seleccionar una publicidad')
      }
    },
    createChart(a){
      this.numberUsers = a.user_aplications.length
      const users = a.user_aplications

      users.forEach(function(el) {
        if(el.locations){
         this.ArrayState.push(el.locations)
        }
        if(el.gender === 'male') {
           this.mArrayAge.push(el.age) 
          this.mGender += 1
        } else {
          this.fArrayAge.push(el.age)
          this.fGender += 1
        }
      }, this);
      
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


