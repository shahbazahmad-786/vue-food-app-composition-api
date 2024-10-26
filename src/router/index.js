import { createWebHistory, createRouter } from 'vue-router'

import Layout from '@/views/inc/Layout.vue';
import Home from '@/views/Home.vue';
import Categories from '@/views/Categories.vue';
import Foods from '@/views/Foods.vue';
import Order from '@/views/Order.vue';
import CategoriesFoods from '@/views/CategoriesFoods.vue';
import FoodSearch from '@/views/FoodSearch.vue';
import NotFound from '@/views/NotFound.vue';
import Register from '@/views/auth/Register.vue';
import Login from '@/views/auth/Login.vue';
import Test from '@/views/Test.vue';
import store from '@/store';

const routes = [
    {
        path:'/',
        component:Layout,
        meta:{
            auth:true
        },
        children:[
            { 
                path: '/',
                name:'Home',
                component: Home
            },
            { 
                path: '/categories',
                name:'Categories',
                component: Categories
            },
            { 
                path: '/foods',
                name:'Foods',
                component: Foods
            },
            { 
                path: '/order/:id',
                name:'Order',
                component: Order
            },
            { 
                path: '/categories-foods/:slug',
                name:'CategoriesFoods',
                component: CategoriesFoods
            },
            { 
                path: '/food-search/:search',
                name:'FoodSearch',
                component: FoodSearch
            },
            {
                path: "/:pathMatch(.*)",
                name: "notfound",
                component: NotFound,
            },
            {
                path: "/test",
                component: Test,
            },
        ]
    },
    { 
        path: '/register',
        name:'Register',
        component: Register,
        meta:{
            guest:true
        }
    },
    { 
        path: '/login',
        name:'Login',
        component: Login,
        meta:{
            guest:true
        }
    },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to,from,next)=>{
    if (to.meta.auth && !store.state.user.token) {
        next({name:"Login"});
    } else if (to.meta.guest && store.state.user.token){
        next({name:"Home"});
    } else {
        next();
    }
});

export default router;