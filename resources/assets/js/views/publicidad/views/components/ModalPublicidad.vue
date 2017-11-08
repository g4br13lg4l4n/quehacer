<template>
  <div>
    <modal title="Modal title" class="modal-primary" large :show.sync="largeModal" effect="fade/zoom">
      <div slot="modal-header" class="modal-header">
        <h4 class="modal-title">Editar Publicidad</h4>
      </div>
      <div slot="modal-body" class="modal-body">
        
          <div class="card">
            <div class="card-header">
              <strong>Editar Publicidad</strong>
            </div>
            <div class="card-block">

              <form @submit.prevent="editPublicidad(publicidad)">

                <div class="row">

                  <div class="form-group col-sm-6">
                    <label for="Empresa">Empresa</label>
                    <select class="form-control" id="Empresa" v-model="publicidad.empresa">
                      <option disabled v-bind:value="publicidad.empresa_id"> {{ empresa }} </option>

                      <option v-for="cliente in clientes" v-bind:value="cliente.id">
                        {{ cliente.empresa }}
                      </option>
                    </select>

                  </div>
                  <div class="form-group col-sm-6">
                  <label for="Categoria">Categoría</label>  
                    <select class="form-control" id="Categoria" v-model="publicidad.categoria">
                      <option disabled v-bind:value="publicidad.categoria_id"> {{ categoria }} </option>

                      <option v-for="categoria in categorias" v-bind:value="categoria.id">
                        {{ categoria.name }}
                      </option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="REstablecimento">Reseña del establecimiento</label>
                  <input type="text" class="form-control"  id="REstablecimento" v-model="publicidad.resena" placeholder="Reseña del establecimiento">
                </div>

                <div class="form-group">
                  <label for="Ubicacion">Ubicación</label>
                  <input type="text" class="form-control" id="Ubicacion" v-model="publicidad.ubicacion" placeholder="Ubicacion">
                </div>


                <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="Precios">Precios</label>
                    <input type="text" class="form-control" id="Precios" v-model="publicidad.costo" placeholder="Precios">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="Horarios">Horarios</label>
                    <input type="text" class="form-control"  id="Horarios" v-model="publicidad.horario" placeholder="Horarios">
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
                        <input type="checkbox" v-model="publicidad.clima" value="Aire Acondicionado"> Aire Acondicionado
                      </label>
                    </div>
                    <div class="checkbox">
                      <label for="checkbox2">
                        <input type="checkbox" v-model="publicidad.estacionamiento" value="Estacionamiento"> Estacionamiento
                      </label>
                    </div>
                    <div class="checkbox">
                      <label for="checkbox3">
                        <input type="checkbox" v-model="publicidad.domicilio" value="Servicio a domicilio"> Servicio a domicilio
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
        <h4 class="modal-title">Eliminar Publicidad</h4>
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
            <button type="button" class="btn btn-danger"  @click="eliminarPublicidad(id)">Eliminar</button>
          </div>
        </div>
      </footer>
    </modal>
  </div>
</template>
<script>
import modal from 'vue-strap/src/Modal'
import AppFormEdit from './FormPublicidadUpdate.vue'
import AppTablePublicidad from './TablePublicidad.vue'

export default {
  components: {
    modal,
    AppFormEdit, 
    AppTablePublicidad
  },
  data () {
    return {
      dangerModal: false,
      largeModal: false,
      id: '',
      empresa: '',
      empresaId: '',
      categoria: '',
      categoriaId: '',
      clientes: [],
      publicidad: [],
      categorias: [],
    }
  },
  created () {
    Store.getClientes()
      .then(res => {
        this.clientes = res.data
      }) 

    Store.getCategorias()
      .then(res => {
        this.categorias = res.data
      }) 


    this.$bus.$on('delete-publicidad', (id) => {
      this.id = id
      this.dangerModal = true
    })

    this.$bus.$on('edit-publicidad', (id) => {
      if (id) {
        this.largeModal = true 
        Store.searchPublicidad(id)
          .then(res => {
            this.publicidad = res.data
            this.categoria = this.publicidad.categoria.name
            this.empresa = this.publicidad.cliente.empresa

            this.categoriaId = this.publicidad.categoria.id
            this.empresaId = this.publicidad.cliente.id
          })
      }
    })

  },
  methods : {
    editPublicidad(publicidad){
      Store.editPublicidad(publicidad)
       .then(res =>{
          this.$toaster.success(res.data.respuesta)
          this.largeModal = false
          this.$bus.$emit('update-TablePublicidad')
        }) 

    },
    eliminarPublicidad(id){
      Store.deletePublicidad(id)
        .then(res => {
          this.$toaster.success(res.data.respuesta)
          this.dangerModal = false
          this.$bus.$emit('update-TablePublicidad')
        })
        .catch(error => {
          this.$toaster.error('Hubo un error al eliminar la publicidad')
        })
    }
  },
}
</script>