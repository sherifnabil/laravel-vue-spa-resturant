/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import Turbolinks from 'turbolinks';
import VModal from 'vue-js-modal';
import TurbolinksAdapter from 'vue-turbolinks';

window.Vue = require('vue');

Turbolinks.start();
Vue.use(TurbolinksAdapter)

Vue.use(VModal);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('menue-container', require('./components/modules/menues/MenueContainer.vue').default);
Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('resto-group', require('./components/modules/restos/RestoGroup.vue').default);
Vue.component('order-group', require('./components/modules/orders/OrderGroup.vue').default);
Vue.component('manage-orderes', require('./components/modules/orders/ManageOrderes.vue').default);

window.bus = new Vue({});

document.addEventListener('turbolinks:load', () => {
    const app = new Vue({
        el: '#app',
    });
});

