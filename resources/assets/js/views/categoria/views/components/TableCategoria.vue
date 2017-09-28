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
                    <button type="button" class="btn btn-primary" @click="modalPublicidad(publicidad.id)">Editar</button>
                    <button type="button" class="btn btn-danger"  @click="modalDelete(publicidad.id)">Eliminar</button>
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
import modal from 'vue-strap/src/Modal'

  export default {
  name: 'tables',
  components: {
    modal,
  },
  data () {
    return {
      categorias: [],
    }
  },
  methods:{

  },
  created () {
    Store.getCategorias()
      .then(res => {
        this.categorias = res.data
      })   
  }
}
</script>