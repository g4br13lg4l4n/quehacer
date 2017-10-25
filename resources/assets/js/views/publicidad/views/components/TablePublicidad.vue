<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-qq"></i> PUBLICIDAD
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

                <tr v-for="publicidad in publicidads">
                  <td>{{ publicidad.cliente.empresa }}</td>
                  <td>{{ publicidad.categoria.name}}</td>
                  <td>{{ publicidad.resena }}</td> 
                  <td>{{ publicidad.telefono }}</td> 
                  <td>{{ publicidad.correo }}</td>
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
      publicidads: [],
    }
  },
  methods:{

    modalDelete (id) {
      this.$bus.$emit('delete-publicidad', id)
    },
    modalPublicidad(id) {
      this.$bus.$emit('edit-publicidad', id)
    }
    
  },
  created () {
    Store.getPublicidads()
      .then(res => {
        this.publicidads = res.data
      })   

    this.$bus.$on('update-TablePublicidad', () => {
      Store.getPublicidads()
      .then(res => {
        this.publicidads = res.data
      })
    })

  }
}
</script>
<style>
  .table-bordered th, .table-bordered td {
    text-align: center;
  }
  .with-td-btn{
    width: 200px;
  }
</style>
