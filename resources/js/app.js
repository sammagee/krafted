import { InertiaApp } from "@inertiajs/inertia-vue";
import Vue from 'vue';
require('./bootstrap');

Vue.use(InertiaApp);
Vue.prototype.$route = (...args) => route(...args).url();
Vue.prototype.$current = (...args) => route().current(...args);
Vue.prototype.$flash = function (message, type = 'info') {
    window.events.$emit('flash', message, type)
};

const app = document.getElementById('app');

new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default
        }
    })
}).$mount(app);
