import Vue from 'vue';
import http from './services/http';
import './bootstrap';




Vue.component('index-posts', require('./app/posts/Index.vue').default);

Vue.prototype.$http = http;

const app = new Vue({
    el: '#app',
});
