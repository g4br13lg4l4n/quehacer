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
                  <th>Empresa</th>
                  <th>Categoría</th>
                  <th>Reseña</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <tr v-for="cliente in clientes">
                  <td>{{ cliente.cliente_id }}</td>
                  <td>Categoría a agregar</td>
                  <td>{{ cliente.correo }}</td>
                  <td>{{ cliente.telefono }}</td> 
                  <td>{{ cliente.ubicacion }}</td> 
                  <td>
                    <button type="button" class="btn btn-primary" @click="modalCliente(cliente.id)">Editar</button>
                    <button type="button" class="btn btn-danger"  @click="modalDelete(cliente.id)">Eliminar</button>
                  </td>
                </tr>
 
              </tbody>
            </table>
          </div>
        </div>
      </div><!--/.col-->
    </div><!--/.row-->
    <AppModalPublicidad></AppModalPublicidad>
      
  </div>

</template>

<script>
import AppModalPublicidad from './ModalPublicidad.vue'
import modal from 'vue-strap/src/Modal'
import AppFormPublicidadUpdate from './FormPublicidadUpdate.vue'

export default {
  name: 'tables',
  components: {
    AppModalPublicidad,
    modal,
    AppFormPublicidadUpdate
  },
  data () {
    return {
      clientes: [],
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
    Store.getPublicidad()
      .then(res => {
        this.clientes = res.data
      })   

    this.$bus.$on('update-Table', () => {
      Store.getClientes()
      .then(res => {
        this.clientes = res.data
      })
    })
  }
}
</script>
<style>
  .table-bordered th, .table-bordered td {
    text-align: center;
  }
</style>
