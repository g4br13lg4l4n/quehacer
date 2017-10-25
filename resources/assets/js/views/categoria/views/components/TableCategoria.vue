<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-qq"></i> CATEGORÍA
          </div>
          <div class="card-block">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Categoría</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <tr v-for="categoria in categorias">
                  <td>{{ categoria.id }}</td>
                  <td>{{ categoria.name}}</td>
                  <td class="with-td-btn">
                    <button type="button" class="btn btn-primary" @click="modalCategoria(categoria.id)">Editar</button>
                    <button type="button" class="btn btn-danger"  @click="modalDeleteCategoria(categoria.id)">Eliminar</button>
                  </td>
                </tr>
 
              </tbody>
            </table>
          </div>
        </div>
      </div><!--/.col-->
    </div><!--/.row-->
    <AppModalCategoria></AppModalCategoria>
  </div>
</template>
<script>
import AppModalCategoria from './ModalCategoria.vue'
import modal from 'vue-strap/src/Modal'
import AppFormCategoriaUpdate from './FormCategoriaUpdate.vue'

  export default {
  name: 'tableCategori',
  components: {
    AppModalCategoria,
    modal,
    AppFormCategoriaUpdate
  },
  data () {
    return {
      categorias: [],
    }
  },
  methods:{
    modalDeleteCategoria (id) {
      this.$bus.$emit('delete-categoria', id)
    },
    modalCategoria(id) {
      this.$bus.$emit('edit-categoria', id)
    }
  },
  created () {

    Store.getCategorias()
      .then(res => {
        this.categorias = res.data
      })  

    this.$bus.$on('update-TableCategoria', () => {
      Store.getCategorias()
      .then(res => {
        this.categorias = res.data
      })
    })

  }
}
</script>