<template>
  <div>
    <modal title="Modal title" class="modal-primary" large :show.sync="largeModal" effect="fade/zoom">
      <div slot="modal-header" class="modal-header">
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div slot="modal-body" class="modal-body">
        <AppForm></AppForm>
      </div>
      <footer slot="modal-footer">
        <div class="modal-footer">
          <div class="col-xs-6">
              <button type="button" class="btn btn-primary" @click="largeModal = false">Cerrar</button>
          </div>
        </div>
      </footer>
    </modal>
    <modal title="Modal title" class="modal-danger" :show.sync="dangerModal" effect="fade/zoom">
      <div slot="modal-header" class="modal-header">
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div slot="modal-body" class="modal-body">
          Esta seguro de <strong> ELMINAR </strong> los datos de este cliente, 
          <strong> los datos no podrán ser recuperados </strong>
      </div>
      <footer slot="modal-footer">
        <div class="modal-footer">
          <div class="col-xs-6">
              <button type="button" class="btn btn-primary" @click="dangerModal = false">Cancelar</button>
          </div>
          <div class="col-xs-6">
            <button type="button" class="btn btn-danger"  @click="eliminarCliente(id)">Eliminar</button>
          </div>
        </div>
      </footer>
    </modal>
  </div>
</template>
<script>
import modal from 'vue-strap/src/Modal'
import AppForm from './Forms.vue'
import AppTable from './Tables.vue'
export default {
  components: {
    modal,
    AppTable,
    AppForm
  },
  data () {
    return {
      dangerModal: false,
      largeModal: false,
      dangerActive: false,
    }
  },
  created () {
    /*
    this.$bus.$on('deleteCliente', (msg) => {
      console.log('entra')
    })
    */
    /*
    this.$bus.$on('id-selected', function (id) {
      console.log(id+'holaaa')
    })
    */

    this.$bus.$on('set-track', (id) => {
      console.log(id)
    })
  },
  methods:{
    editCliente(id){
      this.id = id
      this.largeModal = true
    },
    deleteCliente(id){

      

      console.log('entra 3')
      this.id = id
      this.dangerModal = true
    },
    eliminarCliente(id){
      Store.deleteCliente(id)
        .then(res => {
          this.$toaster.success(res.data.respuesta)
          this.dangerModal = false
          this.dangerActive = true
        })
        .catch(error => {
          this.$toaster.error('Hubo un error al eliminar el cliente')
        })
    }
  },
}
</script>