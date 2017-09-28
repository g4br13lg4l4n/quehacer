<template>
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <router-link :to="{ name: 'Dash' }" class="nav-link"><i class="icon-speedometer"></i> Dashboard</router-link>
        </li>

         <router-link tag="li" class="nav-item nav-dropdown" :to="{ path: '/components'}" disabled>
          <div class="nav-link nav-dropdown-toggle" @click="handleClick"><i class="icon-puzzle"></i>Clientes</div>
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
          <div class="nav-link nav-dropdown-toggle" @click="handleClick"><i class="icon-puzzle"></i>Publicidad</div>
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




        <li class="divider"></li>
        <li class="nav-title">
          Extras
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
