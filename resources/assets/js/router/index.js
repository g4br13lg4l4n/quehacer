import Vue from 'vue';
import Router from 'vue-router';

// Containers
import Full from '../containers/Full';

// Views
import Dashboard from '../views/Dashboard';
import Charts from '../views/Charts';
import Widgets from '../views/Widgets';

// Views - Components
import Buttons from '../views/components/Buttons';
import SocialButtons from '../views/components/SocialButtons';
import Cards from '../views/components/Cards';
import Forms from '../views/components/Forms';
import Modals from '../views/components/Modals';
import Switches from '../views/components/Switches';
import Tables from '../views/components/Tables';

// Views - Icons
import FontAwesome from '../views/icons/FontAwesome';
import SimpleLineIcons from '../views/icons/SimpleLineIcons';

// Views - Pages
import Page404 from '../views/pages/Page404';
import Page500 from '../views/pages/Page500';
import Login from '../views/pages/Login';
import Register from '../views/pages/Register';


// Clientes
import Clientes from '../views/clientes/Clientes'
import AddCliente from '../views/clientes/views/AddCliente'
import AllClientes from '../views/clientes/views/AllClientes'


// Publicidad
import Publicidad from '../views/publicidad/Publicidad'
import AllPublicidad from '../views/publicidad/views/AllPublicidades'
import AddPublicidad from '../views/publicidad/views/AddPublicidad'



Vue.use(Router);

export default new Router({
  mode: 'history',
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
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
        {
          path: '500',
          name: 'Page500',
          component: Page500
        },
        {
          path: 'register',
          name: 'Register',
          component: Register
        }
      ]
    }
  ]
});
