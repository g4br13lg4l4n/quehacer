<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <strong>Subir Imágenes para Slider principal</strong>
          </div>
          <div class="card-block">
            <form @submit.prevent="CreateSlider()" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-sm-2">
                  <label class="col-md-1 form-control-label" for="file-multiple-input">Imagenes: </label>
                </div>
                <div class="col-md-4">
                  <input type="file" id="files" multiple ref="file_input" v-on:change="uploadFiles">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" :disabled="status" class="btn btn-primary">Guardar</button> 
              </div>
            </form>  
          </div>
        </div>
      </div>
    </div>
  </div>        
</template>

<script>
  export default { 
    name: 'formSlider',
    data () {
      return {
        data: {
          imagesSlider: []
        },
        status: false
      }
    },
    methods: {
      uploadFiles(e) {
        let fileReader
        const files = e.target;
        const imgCant = e.target.files.length;
        let file;
      
        for (let i = 0; i < imgCant; i++) {
          file = files.files[i]
          fileReader = new FileReader()
          fileReader.readAsDataURL(file)
          fileReader.onload = ((e) => {
            this.data.imagesSlider.push(e.target.result) 
          })
        } 
      },

      CreateSlider() {
        this.status = true 
        Store.createSlider(this.data)
          .then( res => {
            this.$toaster.success(res.data.respuesta)
            this.imagesSlider = []
            this.status = false 
          })
          .catch(err => {
            this.$toaster.error('Hubo un error al guardar las imágenes')
            this.status = false
          })
      }
    }
  }
</script>
