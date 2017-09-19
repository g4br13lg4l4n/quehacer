<template>
  <div class="app">
    <AppHeader/>
    <div class="app-body">
      <Sidebar/>
      <main class="main">
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </main>
      <AppAside/>
    </div>
    <AppFooter/>
  </div>
</template>

<script>
import AppHeader from '../components/Header'
import Sidebar from '../components/Sidebar'
import AppAside from '../components/Aside'
import AppFooter from '../components/Footer'
import Breadcrumb from '../components/Breadcrumb'

export default {
  name: 'full',
  components: {
    AppHeader,
    Sidebar,
    AppAside,
    AppFooter
  },
  data () {
    return {
      getUser: false
    } 
  },
  created () {
    if(this.$route.params.data){
      this.getUser = true
    }
  },
  methods: {
    alerta(){

    }
  },
  watch: {
    getUser() {
       this.datas = this.$route.params.data
       this.$emit('datas', this.datas)
    }
  }
}
</script>
