<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-2">
            <div class="card-block p-2">
              <h3>Registrar</h3>
            </div>
            <div class="card-footer p-2">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block btn-facebook" @click="facebook()" type="button"><span>facebook</span></button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block btn-twitter" type="button"><span>twitter</span></button>
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
  name: 'Register',
  data (){
    return {
      
    }
  },
  methods: {
    facebook () {
      Store.facebook()
        .then(res => {
          console.log(res)
        })
        .catch(error => {
          console.log(error)
        })
    }
  }
}
</script>
