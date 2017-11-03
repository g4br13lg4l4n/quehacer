import Vue from 'vue';
import Router from 'vue-router';

// Containers
import Full from '../containers/Full';

// Views
import Dashboard from '../views/Dashboard';
import Charts from '../views/graficas/Charts';


// Views - Pages
import Page404 from '../views/pages/Page404';
import Login from '../views/pages/Login';

// Clientes
import Clientes from '../views/clientes/Clientes'
import AddCliente from '../views/clientes/views/AddCliente'
import AllClientes from '../views/clientes/views/AllClientes'
import Forms from '../views/clientes/views/components/Forms';
import Tables from '../views/clientes/views/components/Tables';



// Publicidad
import Publicidad from '../views/publicidad/Publicidad'
import AllPublicidad from '../views/publicidad/views/AllPublicidades'
import AddPublicidad from '../views/publicidad/views/AddPublicidad'

// Categoria
import Categoria from '../views/categoria/Categoria'
import AllCategoria from '../views/categoria/views/AllCategoria'
import AddCategoria from '../views/categoria/views/AddCategoria'

import Sugerecia from '../views/sugerencia/Sugerencia'


Vue.use(Router);

export default new Router({
   mode: 'history',
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login,
      children: [
        {
          path: '*',
          name: '404',
          component: Page404
        },
      ]
    },
    {
      path: '/dashboard/',
      name: 'Home',
      component: Full,
      children: [
        {
          path: 'dash',
          name: 'Dash',
          component: Dashboard
        },
        {
          path: 'clientes',
          name: 'Clientes',
          component: Clientes,
          children: [
            {
              path: 'all-Clientes',
              name: 'All Clientes',
              component: AllClientes
            },
            {
              path: 'addCliente',
              name:'Add Cliente',
              component: AddCliente
            }
          ]
        },
        {
          path: 'publicidad',
          name: 'Publicidad',
          component: Publicidad,
          children:[ 
            {
              path: 'all-Publicidad',
              name: 'All Publicidad',
              component: AllPublicidad
            },
            {
              path: 'add-Publicidad',
              name: 'Add Publicidad',
              component: AddPublicidad
            }
          ]
        },
        {
          path: 'categoria',
          name: 'Categoria',
          component: Categoria,
          children:[
            {
              path: 'all-Categoria',
              name: 'All Categoria',
              component: AllCategoria
            },
            {
              path: 'add-Categoria',
              name: 'Add Categoria',
              component: AddCategoria 
            }
          ]
        },
        {
          path: 'charts',
          name: 'Charts',
          component: Charts,
        },
        {
          path: 'sugerencia',
          name: 'Sugerencia',
          component: Sugerecia
        },
      ]
    },
    {
      path: '/pages',
      redirect: '/pages/p404',
      name: 'Pages',
      component: {
        render (c) { return c('router-view'); }
      },
      children: [
        {
          path: '404',
          name: 'Page404',
          component: Page404
        },
      ]
    }
  ]
});
