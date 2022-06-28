
require('./bootstrap');
window.Vue = require('vue').default;
import router from "./router";
Vue.component('v-aside', require('./components/Aside.vue').default);
const app = new Vue({
    el: '#app',
    router:router,
});

/*const app = new Vue({
    router,
    /!*render: h => h(App)*!/
}).$mount('#app')*/
