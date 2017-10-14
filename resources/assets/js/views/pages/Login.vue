<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <router-link :to="{ name: 'Register' }">Crear Cuenta</router-link>
      
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group mb-0">
            <div class="card p-2">
              <div class="card-block">
                <h1>Login</h1>
                <p class="text-muted">Ingrese su cuenta</p>
                <p v-if="errorAut == 'error'">Su usuario o contraseña son incorrectos</p>
                <form @submit.prevent="login(user)">
                  <div class="input-group mb-1">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input type="text" v-model="user.email" v-bind:class="{ 'has-error': errors.hasError }" class="form-control" placeholder="Username">
                  </div>
                  <div class="input-group mb-2">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input type="password" v-model="user.password" v-bind:class="{ 'has-error': errors.hasError }" class="form-control" placeholder="Password">
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <input type="submit" class="btn btn-primary px-2"/>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
              <div class="card-block text-center">
                <div>
                  <h2>Que hacer en Tabasco</h2>
                  <p>Sistema de administración de la aplicación "Que hacer en Tabasco". Si usted no cuenta con los permisos para estar en esta página favor de cerrar esta pestaña del navegador.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data () {
    return {
      errorAut:'', 
      resData: '',
      errors:{
        hasError: false
      },
      user: {
        email: null,
        password: null,
      },
    }
  },
  methods: {
    login(user) {
      if(!this.user.email && !this.user.email){ 
          this.errors.hasError = true
        return 
      }
      Store.login(this.user)
        .then(res => {
          if (res.data.success) {
            this.$router.push({name:'Home', params: res })
           }else{
            this.errorAut = 'error'
           } 
        })
        .catch(error => {
          this.errors.hasError = true
          this.errorAut = 'error'
        })
    }
  },
  watch: {

  }
}
</script>
<style>
    .has-error{
      border: 1px solid red;
    }
</style>

