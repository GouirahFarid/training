/*import Vue from "vue";*/

require('./bootstrap');

window.Vue = require('vue').default;
import  VueRouter from 'vue-router'
Vue.use(VueRouter)
import Etudiants from "./components/Etudiants";
import Formation from "./components/Formation";
const routers=[
    {
        path:"/etudiants",
        component:Etudiants
    },
    {
        path:"/formations",
        component:Formation
    },
]
const router=new VueRouter({routers})
/*const app = new Vue({
    el: '#app',
    router:router
});*/

const app = new Vue({
    router
}).$mount('#app')
