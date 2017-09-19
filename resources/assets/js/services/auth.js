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

Store.deleteCliente = function(id) {

	const data = {
		name: 'authClient',
		id: id
	}

	return new Promise( (resolve, reject)=> {
		axios.delete(API.admin.deleteCliente+ '/'+id+'', data)
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})

	})  
}


export default Store

