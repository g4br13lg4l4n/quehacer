<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-qq"></i> SUGERENCIAS
          </div>
          <div class="card-block">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Asunto</th>
                  <th>Mensaje</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <tr v-for="sugerencia in sugerencias">
                  <td> {{ sugerencia.id }} </td>
                  <td> {{ sugerencia.asunto }} </td>
                  <td> {{ sugerencia.mensaje }}</td>
                  <td class="with-td-btn">
                    <button type="button" class="btn btn-danger"  @click="ModalDelete(sugerencia.id)">Eliminar</button>
                  </td>
                </tr>
 
              </tbody>
            </table>
          </div>
        </div>
      </div><!--/.col-->
    </div><!--/.row-->
  </div>
</template>

<script>
  export default {
    name:'sugerencia',
    data () {
      return {
        sugerencias: []
      }
    },
    methods: {
      ModalDelete(id) {
        Store.deleteSugerencia(id)
          .then(res => {
            this.$toaster.success(res.data.respuesta)
            this.Update()
          })
          .catch(error =>{
            this.$toaster.error('hubo un error al eliminar' + error)
          })
      },
      Update() {
        Store.getSugerencias()
        .then( res =>{
          this.sugerencias = res.data
        })
        .catch(error => {
          this.$toaster.error('Hubo un error : ' + error)
        })
      }
    },
    created () {
      Store.getSugerencias()
        .then( res =>{
          this.sugerencias = res.data
        })
        .catch(error => {
          this.$toaster.error('Hubo un error : ' + error)
        })
    }
  }
</script> 