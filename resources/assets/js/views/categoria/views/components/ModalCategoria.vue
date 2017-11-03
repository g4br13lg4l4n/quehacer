<template>
  <div>
    <modal title="Modal title" class="modal-primary" large :show.sync="largeModal" effect="fade/zoom">
      <div slot="modal-header" class="modal-header">
        <h4 class="modal-title">Editar Categoría</h4>
      </div>

      <div slot="modal-body" class="modal-body">
          <div class="card">
            <div class="card-header">
              <strong>Editar Categoría</strong>
            </div>
            <div class="card-block">
              <form @submit.prevent="editCategoria(categoria)">
                <div class="form-group">
                  <label for="categoria">Categoría</label>
                  <input type="text" class="form-control" v-model="categoria.name"  id="categoria" placeholder="Categoría">
                </div>
                <div class="form-group">
                  <label for="categoria">Descripción de la categoría</label>
                  <input type="text" class="form-control" v-model="categoria.descripcion"  id="categoria" placeholder="Descripción de la categoría">
                </div>
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
      cliente: [],
      categoria: []
    }
  },
  created () {

    this.$bus.$on('delete-categoria', (id) => {
      if (id) {
        this.dangerModal = true
        this.id = id
      }
    })

    this.$bus.$on('edit-categoria', (id) => {
      
      if(id) {
        this.largeModal = true 

        Store.searchCategoria(id)
          .then(res => {
            this.categoria = res.data 
          })
      }
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
    },
    editCategoria (categoria) {
      Store.editCategoria (categoria)
        .then (res => {
          this.largeModal = false
          this.$toaster.success(res.data.respuesta)
          this.$bus.$emit('update-TableCategoria')
        })
        .catch(error => {
          this.$toaster.error('Hubo un error al editar la categoría')
        })    
    }

  },
}
</script>