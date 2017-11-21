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
                  <th>Imágenes</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="imagen in images">
                  <td>{{ imagen.id }}</td>
                  <td><img :src="imagen.imagen" /></td>
                  <td class="with-td-btn">
                    <button type="button" class="btn btn-danger"  @click="DeleteImagen(imagen.id)">Eliminar</button>
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
    name: 'tableSlider',
    data () {
      return {
        images: []
      }
    },
    methods: {
      DeleteImagen (id) {
        Store.deleteSlider(id)
          .then(res => {
            this.$toaster.success(res.data.respuesta)
            Store.getSlider()
            .then(res => {
              this.images = res.data
            })
          })
      }
    },
    created () {
      Store.getSlider()
        .then(res => {
          this.images = res.data
        })
    }
  }
</script>
