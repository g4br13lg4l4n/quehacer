<template>
  <div>
    <modal title="Modal title" class="modal-primary" large :show.sync="largeModal" effect="fade/zoom">
      <div slot="modal-header" class="modal-header">
        <h4 class="modal-title">Editar Cliente</h4>
      </div>
      <div slot="modal-body" class="modal-body">
        
          <div class="card">
            <div class="card-header">
              <strong>Editar Clientes</strong>
            </div>
            <div class="card-block">
              <form @submit.prevent="editCliente(cliente)">
                <div class="form-group">
                  <label for="empresa">Empresa</label>
                  <input type="text" class="form-control" v-model="cliente.empresa"  id="empresa" placeholder="Nombre de la empresa o establecimiento">
                </div>

                <div class="form-group">
                  <label for="responsable">Responsable</label>
                  <input type="text" class="form-control" v-model="cliente.responsable" id="responsable" placeholder="Nombre del responsable de la empresa">
                </div>

                <div class="form-group">
                  <label for="rfc">RFC</label>
                  <input type="text" class="form-control" v-model="cliente.rfc" id="rfc" placeholder="RFC">
                </div>

                <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" v-model="cliente.phone" id="telefono" placeholder="Teléfono">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" v-model="cliente.correo" id="correo" placeholder="Correo">
                  </div>
                </div><!--/.row-->

                <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" v-model="cliente.estado" id="estado" placeholder="Estado">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="colonia">Colonia</label>
                    <input type="text" class="form-control" v-model="cliente.colonia" id="colonia" placeholder="Colonia">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" v-model="cliente.direccion" id="direccion" placeholder="Dirección">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="establecimento">Número</label>
                    <input type="text" class="form-control" v-model="cliente.establecimiento" id="establecimento" placeholder="No. establecimento">
                  </div>
                </div><!--/.row-->

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Guardar</button> 
                </div>
              </form><!-- /Form -->
            </div>
          </div>
       
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
        <h4 class="modal-title">Eliminar Categoría</h4>
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
            <button type="button" class="btn btn-danger"  @click="eliminarCategoria(id)">Eliminar Categoria</button>
          </div>
        </div>
      </footer>
    </modal>
  </div>
</template>
<script>
import modal from 'vue-strap/src/Modal'
import AppFormEdit from './FormCategoriaUpdate.vue'
import AppTableCategoria from './TableCategoria'
export default {
  components: {
      modal,
      AppFormEdit,
      AppTableCategoria
  },
  data () {
    return {
      dangerModal: false,
      largeModal: false,
      id: '',
      cliente: []
    }
  },
  created () {
    this.bus.$emit('id-selected', 1)

    this.$bus.$on('delete-categoria', (id) => {
    //  console.log('on  delete categoria')
    /*  if (id) {
        this.dangerModal = true
        this.id = id
      }*/
    })

    this.$bus.$on('edit-categoria', (id) => {
      console.log('on edit categoria')
    })
  
  },
  methods:{
    eliminarCategoria(id){
      Store.deleteCategoria(id)
        .then(res => {
          this.$toaster.success(res.data.respuesta)
          this.dangerModal = false
          this.$bus.$emit('update-TableCategoria')
        })
        .catch(error => {
          this.$toaster.error('Hubo un error al eliminar la Categoría')
        })
    }
  },
}
</script>