import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
const Store = {}

Store.login = function (user) {

		const data = {
				name: 'authClient',
				email: user.email,
				password: user.password,
		}
		return new Promise((resolve, reject) => {
			axios.post(API.login, data)
				.then(res => {
					resolve(res)
				})
				.catch(error => {
					reject(error)
				})
		})	
}

/*
*  Metodos para clientes 
*/

Store.CreateClient = function (cliente) {

	const data = {
		name: 'authClient',
		empresa: cliente.empresa,
		responsable: cliente.responsable,
		rfc: cliente.rfc,
		telefono: cliente.telefono,
		correo: cliente.correo,
		estado: cliente.estado,
		colonia: cliente.colonia,
		direccion: cliente.direccion,
		establecimiento: cliente.establecimiento
	}
	return new Promise((resolve, reject) => {
		axios.post(API.admin.addCliente, data)
		.then(res => {
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	})

}

Store.getClientes = function (){
	return new Promise ((resolve, reject) => {

		axios.get(API.admin.getClientes)
		.then(res => {
				resolve(res)
			})
		.catch(error => {
			reject(error)
		})

	})
}

Store.searchCliente = function (id){
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject)=> {
		axios.get(API.admin.searchCliente+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})

	})  
}

Store.editCliente = function (cliente){

	const id = cliente.id

	return new Promise( (resolve, reject)=> {
		axios.put(API.admin.editCliente+'/'+id+'', cliente)
			.then(res => {
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	})
}

Store.deleteCliente = function(id) {
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject) => {
		axios.delete(API.admin.deleteCliente+ '/'+id+'', data)
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	}) 
}

/*
*  Metodos para la publicidad
*/


Store.CreatePublicidad = function(publicidad){
	return new Promise((resolve, reject) => {
		axios.post(API.admin.addPublicidad, publicidad)
		.then(res => {
			resolve(res)
		})
		.catch(error => {
			reject(error)
		})
	})
}

Store.getPublicidads = function() {
	return new Promise((resolve, reject) => {
		axios.get(API.admin.getPublicidads)
		.then(res => {
			resolve(res)
		})
		.catch(error => {
			reject(error)
		})
	})
}


Store.searchPublicidad = function (id){
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject)=> {
		axios.get(API.admin.searchPublicidad+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})

	})  
}


Store.deletePublicidad = function(id) {
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject) => {
		axios.delete(API.admin.deletePublicidad+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	}) 
}


/*
*  Metodos para categorias
*/



Store.getCategorias = function () {
	return new Promise ((resolve, reject) => {
		axios.get(API.admin.getCategoria)
		.then(res => {
			resolve(res)
		})
		.catch(error => {
			reject(error)
		})
	})
}

Store.CreateCategoria = function (categoria) {
	return new Promise ((resolve, reject) => {
		axios.post(API.admin.addCategoria, categoria)
		.then(res => {
			resolve(res)
		})
		.catch(error => {
			reject(error)
		})
	})
}

Store.deleteCategoria = function(id) {
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject) => {
		axios.delete(API.admin.deleteCategoria+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	}) 
}


export default Store

