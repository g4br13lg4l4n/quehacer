<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <strong>Datos de la Categoría</strong>
          </div>
          <div class="card-block">
            <form @submit.prevent="CreateCategoria(categoria)">
              
              <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control"  id="categoria" v-model="categoria.categoria" placeholder="Categoría">
              </div>
              <div class="form-group">
                <label for="categoria">Descripción de la categoría</label>
                <input type="text" class="form-control"  id="categoria" v-model="categoria.descripcion" placeholder="Descripción de la categoría">
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar</button> 
              </div>
            </form><!-- /Form -->
          </div>
        </div>
      </div><!--/.col-->
    </div><!--/.row-->
  </div>
</template>

<script>

export default {
  data () {
    return {
      categoria: {
        categoria: '',
        descripcion: ''
      }
    }
  },
  methods: {
    CreateCategoria(categoria){

      Store.CreateCategoria(this.categoria)
      .then(res => {
        this.$toaster.success(res.data.respuesta)
        this.categoria = {};
      })
      .catch(error => {
          this.$toaster.error('Hubo un error al ingresar la Publicidad')
        })
    }

  }, 
}
</script>
