<template>
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <router-link :to="{ name: 'Dash' }" class="nav-link"><i class="icon-speedometer"></i> Dashboard</router-link>
        </li>

         <router-link tag="li" class="nav-item nav-dropdown" :to="{ path: '/components'}" disabled>
          <div class="nav-link nav-dropdown-toggle" @click="handleClick"><i class="fa fa-user" arial-hidden="true"></i>Clientes</div>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <router-link :to="{ name: 'All Clientes' }" class="nav-link" exact><i class="icon-puzzle"></i>Todos</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'Add Cliente' }" class="nav-link" exact><i class="icon-puzzle"></i>Agregar</router-link>
            </li>
          </ul>
        </router-link>

        <router-link tag="li" class="nav-item nav-dropdown" :to="{ path: '/components'}" disabled>
          <div class="nav-link nav-dropdown-toggle" @click="handleClick"><i class="fa fa-file-powerpoint-o"></i>Publicidad</div>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <router-link :to="{ name: 'All Publicidad' }" class="nav-link" exact><i class="icon-puzzle"></i>Todos</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'Add Publicidad' }" class="nav-link" exact><i class="icon-puzzle"></i>Agregar</router-link>
            </li>
          </ul>
        </router-link>

        <router-link tag="li" class="nav-item nav-dropdown" :to="{ path: '/components'}" disabled>
          <div class="nav-link nav-dropdown-toggle" @click="handleClick"><i class="icon-puzzle"></i>Categoría</div>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <router-link :to="{ name: 'All Categoria' }" class="nav-link" exact><i class="icon-puzzle"></i>Todos</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'Add Categoria' }" class="nav-link" exact><i class="icon-puzzle"></i>Agregar</router-link>
            </li>
          </ul>
        </router-link>

        <router-link tag="li" class="nav-item nav-dropdown" :to="{ path: '/components'}" disabled>
          <div class="nav-link nav-dropdown-toggle" @click="handleClick"><i class="icon-puzzle"></i>Slider</div>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <router-link :to="{ name: 'All Slider' }" class="nav-link" exact><i class="icon-puzzle"></i>Todos</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'Add Slider' }" class="nav-link" exact><i class="icon-puzzle"></i>Agregar</router-link>
            </li>
          </ul>
        </router-link>

        <li class="divider"></li>
        <li class="nav-item">
          <router-link :to="{ name: 'Charts' }" class="nav-link" exact><i class="icon-pie-chart"></i> Graficas </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'Sugerencia' }" class="nav-link" exact><i class="fa fa-commenting" aria-hidden="true"></i> Sugerencias </router-link>
        </li>
        
      </ul>
    </nav>
  </div>
</template>
<script>

export default {
  name: 'sidebar',
  methods: {
    handleClick (e) {
      e.preventDefault()
      e.target.parentElement.classList.toggle('open')
    }
  }
}
</script>

<style lang="css">
  .nav-link {
    cursor:pointer;
  }
</style>
