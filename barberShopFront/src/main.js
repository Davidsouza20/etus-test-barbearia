import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import routes from './routes'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import SweetAlertIcons from 'vue-sweetalert-icons'


Vue.config.productionTip = false;
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(SweetAlertIcons);
Vue.use(VueRouter);

const router = new VueRouter({mode: 'history', routes});

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('employee_id') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath },
                
            })
        }     
    }else {
        next() 
    }
})

export default router

new Vue({
    created: function () {
        (function (d, s, id) {
            var js;
            var fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return 
            js = d.createElement(s) 
            js.id - id;
            js.src = '//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9';
            fjs.parentNode.insertBefore(js, fjs)
        } (document, 'script', 'facebook-jssdk')) 
    },
    router, 
    render: h => h(App),
}).$mount('#app')
