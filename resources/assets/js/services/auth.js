import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
const Store = {}

Store.login = (user) => {

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

Store.CreateClient = (cliente) => {

	const data = {
		name: 'authClient',
		empresa: cliente.empresa,
		responsable: cliente.responsable,
		rfc: cliente.rfc,
		municipio: cliente.municipio,
		telefono: cliente.telefono,
		correo: cliente.correo,
		estado: cliente.estado,
		colonia: cliente.colonia,
		direccion: cliente.direccion,
		establecimiento: cliente.establecimiento,
		image: cliente.image
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

Store.getClientes = () => {
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

Store.searchCliente = (id) => {
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject) => {
		axios.get(API.admin.searchCliente+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})

	})  
}

Store.editCliente = (cliente) => {

	const id = cliente.id

	return new Promise( (resolve, reject) => {
		axios.put(API.admin.editCliente+'/'+id+'', cliente)
			.then(res => {
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	})
}

Store.deleteCliente = (id) => {
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


Store.CreatePublicidad = (publicidad) => {
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

Store.getPublicidads = () => {
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

Store.getPublicidadChart = (id) => {
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject) => {
		axios.get(API.admin.getPublicidadChart+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})

	})
}

Store.searchPublicidad = (id) => {
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject) => {
		axios.get(API.admin.searchPublicidad+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})

	})  
}

Store.editPublicidad = (publicidad) => {
	const id = publicidad.id

	return new Promise( (resolve, reject) => {
		axios.put(API.admin.editPublicidad+'/'+id+'', publicidad)
			.then(res => {
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	})
}

Store.deletePublicidad = (id) => {
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



Store.getCategorias = () => {
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

Store.CreateCategoria = (categoria) => {
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


Store.searchCategoria = (id) => {
	const data = {
		name: 'authClient',
		id: id
	}
	return new Promise( (resolve, reject) => {
		axios.get(API.admin.searchCategoria+ '/'+id+'')
			.then(res =>{
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	})  
}

Store.deleteCategoria = (id) => {
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

Store.editCategoria = (categoria) => {
	const id = categoria.id

	return new Promise( (resolve, reject) => {
		axios.put(API.admin.editCategoria+'/'+id+'', categoria)
			.then(res => {
				resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	})	
}


Store.facebook = () => {
	return new Promise((resolve, reject) => {
		axios.get(API.loginUsers.facebook)
		.then(res => {
			resolve(res)
		})
		.catch(error => {
			reject(error)
		})
	})
}

/**
 * 	Sugerencias 
 */
Store.getSugerencias = () => {
	return new Promise ((resolve, reject) =>{
		axios.get(API.admin.getSugerencias)
			.then(res => {
					resolve(res)
			})
			.catch(error => {
				reject(error)
			})
	})
}

Store.deleteSugerencia = (id) => {
	return new Promise ((resolve, reject) => {
			axios.delete(API.admin.deleteSugerencia + '/'+ id)
				.then(res => {
					resolve(res)
				})
				.catch(error => {
					reject(error)
				})
	})
}


/**
 * Slider 
 */

Store.createSlider =  (data) => {
	return new Promise ((resolve, reject) => {
		axios.post(API.admin.createSlider, data)
			.then(res => {
				resolve(res)
			})
			.catch( error => {
				reject(error)
			})
	})
}

Store.getSlider = () => {
	return new Promise ((resolve, reject) => {
		axios.get(API.admin.getSliders)
			.then(res => {
				resolve (res)
			})
			.catch(error => {
				reject(error)
			})
	})
}

Store.deleteSlider = (id) => {
	console.log(id)
	return new Promise((resolve, reject ) => {
	axios.delete(API.admin.deleteSlider+ '/'+id+'')	
		.then( res => {
			resolve(res)
		})
	})
}



export default Store

