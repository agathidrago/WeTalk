/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('follow-button', require('./components/FollowButton.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);

Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('message-component', require('./components/MessagesComponent.vue').default);
Vue.component('active-chats-component', require('./components/ActiveChatComponent.vue').default);
Vue.component('stream-chat', require('./components/StreamChat.vue').default);

// For sharing data between components.
Vue.prototype.EventBus = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
