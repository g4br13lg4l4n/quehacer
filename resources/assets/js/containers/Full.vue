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
    </div>
    <AppFooter/>
  </div>
</template>

<script>
import AppHeader from '../components/Header'
import Sidebar from '../components/Sidebar'
import AppFooter from '../components/Footer'

export default {
  name: 'full',
  components: {
    AppHeader,
    Sidebar,
    AppFooter
  },
  data () {
    return {
      getUser: false,
      datas: ''
    } 
  },
  created () {
    if(this.$route.params.data){
      this.getUser = true
    }else{
      this.$router.push({ name: 'Page404' })
    }
  },
  watch: {
    getUser() {
       this.datas = this.$route.params.data.user.name
       this.$bus.$emit('datas', this.datas)
    }
  }
}
</script>
