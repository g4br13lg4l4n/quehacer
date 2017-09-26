<template>
  <div></div>
</template>
<script>
export default {
  created () {
    this.$bus.$on('delete-cliente', (id) => {
      if (id) {
        this.dangerModal = true
        this.id = id
      }
    })
    this.$bus.$on('edit-cliente', (id) => {
      if (id) {
        this.largeModal = true 
        Store.searchCliente(id)
          .then(res => {
            this.cliente = res.data
          })
      }
    })
  },
}
</script>