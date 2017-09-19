const metodosMixin = {
  methods: {
     editCliente(id){

       this.$emit('editCliente', this.dangerModal)
      
    },
    deleteCliente(id){
      console.log('entra 2')
      this.id = id
      this.dangerModal = true
    },
  }
}

export default metodosMixin
