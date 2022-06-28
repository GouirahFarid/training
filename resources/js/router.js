import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);
import Etudiants from "./components/Etudiants";
import Formation from "./components/Formation";

const routes = [
    {
        path: "/etudiants",
        component: Etudiants
    },
    {
        path: "/",
        component: Formation
    },
];

export default new vueRouter({
    mode: "history",
    routes
});
