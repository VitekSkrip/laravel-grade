import $ from 'jquery'
import 'slick-carousel'
import Vue from 'vue';
import Dropdown from 'vue-2-dropdown'
import 'vue-2-dropdown/dist/vue-2-dropdown.css';
import SsrCarousel from 'vue-ssr-carousel'
import 'vue-ssr-carousel/index.css'

window.jQuery = window.$ = $;

require('./script')

Vue.component('test-drive-edit', require('./Components/ManagerTestdriveFormFields.vue').default);
Vue.component('test-drive-create-fields', require('./Components/TestdriveSelectsFields.vue').default);
Vue.component('homepage-slider', require('./Components/HomepageSlider.vue').default);
Vue.component('modal', require('./Components/Modal.vue').default);

Vue.use(Dropdown, SsrCarousel)

new Vue({
    el: '#app',
    data: {
        exampleModalShowing: false,
    },
});
