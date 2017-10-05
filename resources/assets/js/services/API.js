const API = {
  register: '/api/register',
  login : '/api/login',
  admin: {
    addCliente: '/api/user/createClient',
    getClientes:'/api/user/getClientes',
    deleteCliente: '/api/user/deleteCliente',
    searchCliente: '/api/user/searchCliente',
    editCliente: '/api/user/editCliente',
    
    addPublicidad: '/api/user/createPublicidad',
    getPublicidads:'/api/user/getPublicidads',
    searchPublicidad:'/api/user/searchPublicidad',
    editPublicidad:'/api/user/editPublicidad',
    deletePublicidad:'/api/user/deletePublicidad',


    addCategoria: '/api/user/createCategoria',
    getCategoria: '/api/user/getCategorias',
    searchCategoria: '/api/user/searchCategoria',
    editCategoria: 'api/user/editCategoria',
    deleteCategoria: '/api/user/deleteCategoria'
  }
}
export default API

