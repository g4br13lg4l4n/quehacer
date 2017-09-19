<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> CLIENTES
          </div>
          <div class="card-block">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>RFC</th>
                  <th>Correo</th>
                  <th>Teléfono</th>
                  <th>Responsable</th>
                  <th>No. Publicaciones</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <tr v-for="cliente in clientes">
                  <td>{{ cliente.empresa }}</td>
                  <td>{{ cliente.rfc }}</td>
                  <td>{{ cliente.correo }}</td>
                  <td>{{ cliente.phone }}</td> 
                  <td>{{ cliente.responsable }}</td>
                  <td>
                    <button type="button" class="btn btn-info"> 0 </button>
                  </td> 
                  <td>
                    <button type="button" class="btn btn-primary" v-on:click="editCliente(cliente.id)">Editar</button>
                    <button type="button" class="btn btn-danger" v-on:click="deleteCliente(cliente.id)">Eliminar</button>
                  </td>
                </tr>
 
              </tbody>
            </table>
            <nav>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div><!--/.col-->
    </div><!--/.row-->
    <AppModal></AppModal>
      
  </div>

</template>

<script>
import AppModal from './Modal.vue'
import modal from 'vue-strap/src/Modal'
import AppForm from './Forms.vue'
import metodosMixin from '../mixis/metodos.js'
export default {
  mixins: [metodosMixin],
  name: 'tables',
  props: ['clientes'],
  components: {
    modal,
    AppForm,
    AppModal
  },
  data () {
    return {
      clientes: [],
      dangerModal: false,
      largeModal: false,
      dangerActive: false,
      id: ''
    }
  },
  methods:{
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
  created () {
    Store.getClientes()
      .then(res => {
        this.clientes = res.data
      })   
  },
  updated: function () {
    if(this.dangerActive === true){
      this.dangerActive = false; 
        Store.getClientes()
        .then(res => {
          this.clientes = res.data
        })
    }
  }
}
</script>
<style>
  .table-bordered th, .table-bordered td {
    text-align: center;
  }
</style>
