/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

    
import 'fullcalendar/dist/fullcalendar.css';

window.Vue = require('vue');

import FullCalendar from 'vue-full-calendar'; //Import Full-calendar
Vue.use(FullCalendar);

import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"

const store = new Vuex.Store(
   storeData
)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

//const files = require.context('./', true, /\.vue$/i)
//files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('dashboard-config-component', require('./components/DashboardConfigComponent.vue').default);
Vue.component('dashboard-component', require('./components/DashboardComponent.vue').default);

Vue.component('room-metrics-component', require('./components/RoomMetricsComponent.vue').default);

Vue.component('temperature-chart', require('./components/TemperatureChart.vue').default);
Vue.component('temperature-chart-container', require('./components/TemperatureChartContainer.vue').default);
Vue.component('humidity-chart', require('./components/HumidityChart.vue').default);
Vue.component('humidity-chart-container', require('./components/HumidityChartContainer.vue').default);
Vue.component('presence-bar-chart', require('./components/PresenceBarChart.vue').default);
Vue.component('presence-pie-chart', require('./components/PresencePieChart.vue').default);
Vue.component('presence-chart-container', require('./components/PresenceChartContainer.vue').default);
Vue.component('state-chart', require('./components/StateChart.vue').default);
Vue.component('state-chart-container', require('./components/StateChartContainer.vue').default);
Vue.component('lux-chart', require('./components/LuxChart.vue').default);
Vue.component('lux-chart-container', require('./components/LuxChartContainer.vue').default);

Vue.component('show-event-modal-component', require('./components/ShowEventModalComponent.vue').default);
Vue.component('fullcalendar-component', require('./components/FullCalendarComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
});
