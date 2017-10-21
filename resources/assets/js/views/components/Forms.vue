<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <strong>Datos del Cliente</strong>
          </div>
          <div class="card-block">
            <form @submit.prevent="CreateClient(cliente)" enctype="multipart/form-data">
              <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" class="form-control" v-model="cliente.empresa" id="empresa" placeholder="Nombre de la empresa o establecimiento">
              </div>

              <div class="form-group">
                <label class="col-md-3 form-control-label" for="file-input">Imágen</label>
                <div class="col-md-9">
                  <input type="file" id="file-input" v-on:change="upImages" name="file-input">
                </div>
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
                  <input type="text" class="form-control" v-model="cliente.telefono" id="telefono" placeholder="Teléfono">
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
      </div><!--/.col-->
    </div><!--/.row-->
  </div>
</template>

<script>

export default {
  name: 'forms',
  data () {
    return {
      cliente: {
        empresa: '',
        responsable: '',
        rfc: '',
        telefono: '',
        correo: '',
        estado: '',
        colonia: '',
        direccion: '',
        establecimiento: '',
        image: ''
      }
    }
  },
  methods: {
    upImages(e) {
      var fileReader =  new FileReader()
      
      fileReader.readAsDataURL(e.target.files[0])
      fileReader.onload = (e) => {
        this.cliente.image = e.target.result
      }
    },
    CreateClient(cliente) {
      if(!this.cliente.empresa && !this.cliente.responsable){ 
          this.errors.hasError = true
        return 
      }
      console.log(this.cliente)
      Store.CreateClient(this.cliente)
        .then(res => {
          console.log(res.data.respuesta)
          this.$toaster.success(res.data.respuesta)
          this.cliente = {};
        })
        .catch(error => {
          this.$toaster.error('Hubo un error al ingresar el cliente'+ this.empresa)
        })
    }
  },
}
</script>
