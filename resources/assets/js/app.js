/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require('vue');
window.axios = require('axios');
import VueRouter from 'vue-router';
import routes from './routers.js';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';
import NProgress from 'nprogress'; // Progress 进度条
import 'nprogress/nprogress.css'; // Progress 进度条 样式
import Vuex from 'vuex';
import plugins from './plugins.js';
Vue.use(VueRouter);
Vue.use(ElementUI);
Vue.use(Vuex);
Vue.use(plugins);
const store = new Vuex.Store({
    state: {
        submitLoading: false
    },
});
const router = new VueRouter({
    routes
});
router.beforeEach((to, from, next) => {
    NProgress.start(); // 开启Progress
    if (!sessionStorage.getItem('admin') && to.path != '/login') {
        next({
            path: '/login'
        });
        NProgress.done();
    } else {
        if (to.path == '/login') {
            sessionStorage.removeItem('adminData');
        }
        next();
    }
});
router.afterEach(() => {
    NProgress.done(); // 结束Progress
});
axios.interceptors.request.use(function(config) {
    NProgress.start();
    return config;
}, function(error) {
    return Promise.reject(error);
});
axios.interceptors.response.use(function(response) {
    NProgress.done();
    return response;
}, function(error) {
    return Promise.reject(error);
});
const app = new Vue({
    router,
    store
}).$mount('#app');