import Vue from 'vue';
import Router from 'vue-router';
import Dashboard from './view/Dashboard.vue';
import Categories from './view/Categories.vue';

Vue.use(Router);

const routes = [{
        path: '/',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/categories',
        name: 'Categories',
        component: Categories
    }
];

const router = new Router({
    routes: routes,
    linkActiveClass: 'active',
});

export default router;