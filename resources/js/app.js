import Vue from 'vue';
import locale from 'element-ui/lib/locale/lang/ar';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
// import CKEditor from '@ckeditor/ckeditor5-vue2';
import { TableComponent, TableColumn } from 'vue-table-component';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);
Vue.component('table-component', TableComponent);
Vue.component('table-column', TableColumn);
// Vue.use( CKEditor );

Vue.use(ElementUI, {locale});

window.Vue = require('vue');

require('./bootstrap');
window.axios = require('axios');
require('alpinejs');

// require('./components/products/create').default;
Vue.component('team-create-form', require('./components/teamCreateForm.vue').default);
Vue.component('team-table', require('./components/teamTable.vue').default);
Vue.component('league-create-form', require('./components/leagueCreateForm.vue').default);
Vue.component('league-table', require('./components/leagueTable.vue').default);
Vue.component('match-create-form', require('./components/matchCreateForm.vue').default);
Vue.component('match-table', require('./components/matchTable.vue').default);

const app = new Vue({
    el: '#vue-app',
});

