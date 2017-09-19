<template>
  <navbar>
    <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button" @click="mobileSidebarToggle">&#9776;</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav hidden-md-down">
      <li class="nav-item">
        <a class="nav-link navbar-toggler sidebar-toggler" href="#" @click="sidebarToggle">&#9776;</a>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="#">Dashboard</a>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="#">Users</a>
      </li>
      <li class="nav-item px-1">
        <a class="nav-link" href="#">Settings</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto mr-3">
       <span slot="button">
        <span class="hidden-md-down">{{ this.$route.params.data.user.name }}</span>
      </span>
    </ul>
  </navbar>
</template>
<script>

import navbar from './Navbar'
import { dropdown } from 'vue-strap'

export default {
  name: 'header',
  components: {
    navbar,
    dropdown
  },
  data () {
    return {
      datas: { }
    }
  },
  created () {
    this.$on('data', (datas) => {
      this.datas = datas
    })
  },
  methods: {
    click () {
      // do nothing
    },
    sidebarToggle (e) {
      e.preventDefault()
      document.body.classList.toggle('sidebar-hidden')
    },
    mobileSidebarToggle (e) {
      e.preventDefault()
      document.body.classList.toggle('sidebar-mobile-show')
    },
    asideToggle (e) {
      e.preventDefault()
      document.body.classList.toggle('aside-menu-hidden')
    }
  }
}
</script>

<style lang="css" scoped>

.mr-3{
  margin-left: 3em;
}
.dropdown-toggle::after {
  /*display: none !important;*/
}
</style>
