<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <strong>Datos de la Publicidad</strong>
          </div>
          <div class="card-block">
            <form @submit.prevent="CreatePublicidad(publicidad)">
              <div class="row">

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
                <label for="Ubicacion">Ubicación</label>
                <input type="text" class="form-control" id="Ubicacion" v-model="publicidad.ubicacion" placeholder="Ubicacion">
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

              <div class="form-group row">
                <label class="col-md-3 form-control-label">Servicios adicionales</label>
                <div class="col-md-9">
                  <div class="checkbox">
                    <label for="AA">
                      <input type="checkbox" v-model="publicidad.aireAcondicionado" value="Aire Acondicionado"> Aire Acondicionado
                    </label>
                  </div>
                  <div class="checkbox">
                    <label for="checkbox2">
                      <input type="checkbox" v-model="publicidad.estacionamiento" value="Estacionamiento"> Estacionamiento
                    </label>
                  </div>
                  <div class="checkbox">
                    <label for="checkbox3">
                      <input type="checkbox" v-model="publicidad.servicioDomicilio" value="Servicio a domicilio"> Servicio a domicilio
                    </label>
                  </div>
                </div>
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
  name: 'forms',
  data () {
    return {
      clientes: [],
      categorias: [],
      publicidad: {
        empresa: '',
        categoria: '',
        rEstablecimento: '',
        ubicacion: '',
        precios: '',
        horarios: '',
        telefono: '',
        correo: '',
        aireAcondicionado: '0',
        estacionamiento: '0',
        servicioDomicilio:'0'
      }
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
    CreatePublicidad(publicidad){
      Store.CreatePublicidad(this.publicidad)
      .then(res => {
        this.$toaster.success(res.data.respuesta)
        this.publicidad = {};
      })
      .catch(error => {
          this.$toaster.error('Hubo un error al ingresar la Publicidad')
        })
    }
  }, 
}
</script>
