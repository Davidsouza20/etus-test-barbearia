import Home from './views/Home'
import Service from './views/Service'
import Client from './views/Client'
import Report from './views/Report'
import EmployeeLogin from './views/EmployeeLogin'
import ManagerLogin from './views/ManagerLogin'
import ManagerReport from './views/ManagerReport'


const routes = [
    //Public Routes
    { path: '/', component: Home},

    { 
        path: '/servico',  
        component: Service,
       
    },

    { 
        path: '/cliente',  
        component: Client,
        
    },

    { 
        path: '/relatorio',  
        component: Report,
        
    },

    { 
        path: '/relatorio-gestor',  
        component: ManagerReport,
        
    },
    
    { path: '/login',  component: EmployeeLogin },

    { path: '/login-manager',  component: ManagerLogin },


];

export default routes;