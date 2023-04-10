require('bootstrap');

import $ from 'jquery'
import 'slick-carousel'

window.jQuery = window.$ = $;

require('./script')

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app'
})
