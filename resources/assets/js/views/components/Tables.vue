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
                  <th>Imagen</th>
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
                    <td> <img class="img" v-bind:src="cliente.imagen" > </td> 
                    <td>
                      <button type="button" class="btn btn-info"> 0 </button>
                    </td> 
                    <td class="with-td-btn">
                      <button type="button" class="btn btn-primary" @click="modalCliente(cliente.id)">Editar</button>
                      <button type="button" class="btn btn-danger"  @click="modalDelete(cliente.id)">Eliminar</button>
                    </td>
                  </tr>
                <tr v-if="this.clienteVacio === false">
                  <td class='no-datas'> {{ ClientesMessage }} </td>
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

export default {
  name: 'tables',
  components: {
    modal,
    AppForm,
    AppModal,
  },
  data () {
    return {
      clientes: [],
      clienteVacio: false
    }
  },
  computed: {
    ClientesMessage () {
      return `No encontramos Clientes`
    }
  },
  methods:{
    modalDelete (id) {
      this.$bus.$emit('delete-cliente', id)
    },
    modalCliente(id) {
      this.$bus.$emit('edit-cliente', id)
    }
  },
  created () {
    Store.getClientes()
      .then(res => {
        this.clientes = res.data
        this.clienteVacio =  typeof( this.clientes[0]) === 'object'
      })   

    this.$bus.$on('update-Table', () => {
      Store.getClientes()
      .then(res => {
        this.clientes = res.data
        this.clienteVacio =  typeof( this.clientes[0]) === 'object'
      })
    })
  }
}
</script>
<style scoped>
  .table-bordered th, .table-bordered td {
    text-align: center;
  }
  .with-td-btn{
    width: 200px;
  }
  .img{
    width: 80px;
  }
  td{
    max-width: 150px;
    word-break: break-all;
  }
  .no-datas{
    text-align: center;
  }
</style>
