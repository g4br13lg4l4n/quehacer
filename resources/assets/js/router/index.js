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
import EditCliente from '../views/clientes/views/EditCliente'
import DeleteCliente from '../views/clientes/views/DeleteCliente'

// Publicidad
import Publicidad from '../views/publicidad/Publicidad'
import AllPublicidad from '../views/publicidad/views/AllPublicidades'
import AddPublicidad from '../views/publicidad/views/AddPublicidad'
import EditPublicidad from '../views/publicidad/views/EditPublicidad'
import DeletePublicidad from '../views/publicidad/views/DeletePublicidad'


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
            },
            {
              path: 'edit-Publicidad',
              name: 'Edit Publicidad',
              component: EditPublicidad
            },
            {
              path: 'delete-Publicidad',
              name: 'Delete Publicidad',
              component: DeletePublicidad
            },
          ]
        },

        {
          path: 'charts',
          name: 'Charts',
          component: Charts
        },
        {
          path: 'widgets',
          name: 'Widgets',
          component: Widgets
        },
        {
          path: 'forms',
          name: 'Forms',
          component: Forms
        },
        {
          path: 'tables',
          name: 'Tables',
          component: Tables
        }
      ]
    },
    /*
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        },
        {
          path: 'charts',
          name: 'Charts',
          component: Charts
        },
        {
          path: 'widgets',
          name: 'Widgets',
          component: Widgets
        },
        {
          path: 'components',
          redirect: '/components/buttons',
          name: 'Components',
          component: {
            render (c) { return c('router-view'); }
          },
          children: [
            {
              path: 'buttons',
              name: 'Buttons',
              component: Buttons
            },
            {
              path: 'social-buttons',
              name: 'Social Buttons',
              component: SocialButtons
            },
            {
              path: 'cards',
              name: 'Cards',
              component: Cards
            },
            {
              path: 'forms',
              name: 'Forms',
              component: Forms
            },
            {
              path: 'modals',
              name: 'Modals',
              component: Modals
            },
            {
              path: 'switches',
              name: 'Switches',
              component: Switches
            },
            {
              path: 'tables',
              name: 'Tables',
              component: Tables
            }
          ]
        },
        {
          path: 'icons',
          redirect: '/icons/font-awesome',
          name: 'Icons',
          component: {
            render (c) { return c('router-view'); }
          },
          children: [
            {
              path: 'font-awesome',
              name: 'Font Awesome',
              component: FontAwesome
            },
            {
              path: 'simple-line-icons',
              name: 'Simple Line Icons',
              component: SimpleLineIcons
            }
          ]
        }
      ]
    },
    */
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
