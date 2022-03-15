require('./bootstrap');

window.Vue = require('vue');

import VueRouter from "vue-router";
Vue.use(VueRouter);

// pages import
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contact from './pages/Contact.vue';
import Projects from './pages/Projects.vue';

const router = new VueRouter({
    mode: 'history',
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
        },
        {
            path:'/projects',
            name: 'projects',
            component: Projects
        }
    ]
});

import App from './views/App.vue';

const app = new Vue({
    el: '#app',
    render: h=>h(App),
    router,
});
