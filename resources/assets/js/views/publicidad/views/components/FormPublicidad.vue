<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <strong>Datos de la Publicidad</strong>
          </div>
          <div class="card-block">
            <form @submit.prevent="CreatePublicidad(publicidad)" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-sm-8">
                  <label for="NamePub">Nombre de la publicidad</label>
                  <input type="text" class="form-control"  id="NamePub" v-model="publicidad.name" placeholder="Nombre de la publicidad">
              </div>
              
              <div class="form-group col-sm-4">
                  <label for="Idioma">Idioma</label>
                  <select class="form-control" id="Idioma" v-model="publicidad.idioma">
                    <option disabled value="">Seleccione un Idioma</option>
                    <option value="1">Español</option>
                    <option value="2">Ingles</option>
                  </select>
                </div>

                <div class="form-group col-sm-6">
                  <label for="Empresa">Empresa</label>
                  <select class="form-control" id="Empresa" v-model="publicidad.empresa">
                    <option disabled value="">Seleccione una empresa</option>
                    <option v-for="cliente in clientes" v-bind:value="cliente.id">
                      {{ cliente.empresa }}
                    </option>
                  </select>
                </div>

                <div class="form-group col-sm-6">
                  <label for="Categoria">Categoría</label>  
                  <select class="form-control" id="Categoria" v-model="publicidad.categoria">
                    <option disabled value="">Seleccione una categoría</option>
                    <option v-for="categoria in categorias" v-bind:value="categoria.id">
                      {{ categoria.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="REstablecimento">Reseña del establecimiento</label>
                <input type="text" class="form-control"  id="REstablecimento" v-model="publicidad.rEstablecimento" placeholder="Reseña del establecimiento">
              </div>

              <div class="form-group">
                <label for="oferta">Oferta</label>
                <input type="text" class="form-control"  id="oferta" v-model="publicidad.oferta" placeholder="Oferta">
              </div>

              <div class="row">
                <div class="form-group col-sm-4">
                  <label for="Ubicacion">Ubicación</label>
                  <input type="text" class="form-control" id="Ubicacion" v-model="publicidad.ubicacion" placeholder="Ubicacion">
                </div>

                <div class="form-group col-sm-4">
                  <label for="mapaLat">Latitud Mapa</label>
                  <input type="text" class="form-control" id="mapaLat" v-model="publicidad.mapaLat" placeholder="Latitud Mapa">
                </div>

                <div class="form-group col-sm-4">
                  <label for="mapaLng">Longitud Mapa</label>
                  <input type="text" class="form-control" id="mapaLng" v-model="publicidad.mapaLng" placeholder="Longitud Mapa">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="Precios">Precios</label>
                  <input type="text" class="form-control" id="Precios" v-model="publicidad.precios" placeholder="Precios">
                </div>
                <div class="form-group col-sm-6">
                  <label for="Horarios">Horarios</label>
                  <input type="text" class="form-control"  id="Horarios" v-model="publicidad.horarios" placeholder="Horarios">
                </div>
              </div><!--/.row-->

              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="telefono">No. Teléfono</label>
                  <input type="text" class="form-control" id="telefono" v-model="publicidad.telefono" placeholder="Teléfono">
                </div>
                <div class="form-group col-sm-6">
                  <label for="Correo">Correo</label>
                  <input type="text" class="form-control" id="Correo" v-model="publicidad.correo" placeholder="Correo">
                </div>
              </div><!--/.row-->
              <br>
              <div class="form-group row">
                <label class="col-md-1 form-control-label" for="file-multiple-input">Imagenes: </label>
                <div class="col-md-9">
                  <input type="file" id="files" multiple ref="file_input" v-on:change="uploadFiles">
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label class="col-md-2 form-control-label">Servicios adicionales: </label>

                <div class="col-md-2">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" v-model="publicidad.aireAcondicionado" value="Aire Acondicionado"> Aire Acondicionado
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" v-model="publicidad.estacionamiento" value="Estacionamiento"> Estacionamiento
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" v-model="publicidad.servicioDomicilio" value="Servicio a domicilio"> Servicio a domicilio
                    </label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" v-model="publicidad.wifi" value="Aire Acondicionado"> Wi-Fi
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" v-model="publicidad.bar" value="Estacionamiento"> Bar
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" v-model="publicidad.musica" value="Servicio a domicilio"> Música en vivo
                    </label>
                  </div>
                </div>

              </div>
              
              <div class="form-actions">
                <button type="submit" :disabled="status" class="btn btn-primary">Guardar</button> 
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
      clientes: [],
      categorias: [],
      publicidad: {
        idioma:'',
        name: '',
        empresa: '',
        categoria: '',
        rEstablecimento: '',
        oferta: '',
        ubicacion: '',
        mapaLat: '',
        mapaLng: '',
        precios: '',
        horarios: '',
        telefono: '',
        correo: '',
        aireAcondicionado: '',
        estacionamiento: '',
        servicioDomicilio:'',
        wifi:'',
        bar:'',
        musica:'',
        images: []
      },
      status: false
    }
  },
  created (){
    Store.getClientes()
      .then(res => {
        this.clientes = res.data
      }) 
    Store.getCategorias()
      .then(res => {
        this.categorias = res.data
      }) 
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
          this.publicidad.images.push(e.target.result) 
        })
      } 
    },
    CreatePublicidad(publicidad){
      document.getElementById('files').value = ''
      this.status = true
      Store.CreatePublicidad(this.publicidad)
      .then(res => {
        this.status = false
        this.$toaster.success(res.data.respuesta)
        this.publicidad = {};
        this.publicidad.images = [];
      })
      .catch(error => {
          this.status = false
          this.$toaster.error('Hubo un error al ingresar la Publicidad')
        })
    
    }
  }, 
}
</script>
