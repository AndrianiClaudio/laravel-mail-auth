require('./bootstrap');

window.Vue = require('vue');

import App from './views/App.vue';
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contact from './pages/Contact.vue';
import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
    routes:[
        {
            path:'/',
            name: 'home',
            component: Home
        },
        {
            path:'/about',
            name: 'about',
            component: About
        },
        {
            path:'/contact',
            name: 'contact',
            component: Contact
        }
    ]
});


const app = new Vue({
    el: '#app',
    render: h=>h(App),
    router,
});
