import Home from './views/Home'
import Service from './views/Service'
import Client from './views/Client'
import Report from './views/Report'
import EmployeeLogin from './views/EmployeeLogin'


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
    
    { path: '/login',  component: EmployeeLogin },


];

export default routes;