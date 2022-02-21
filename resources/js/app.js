/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('notifications-list', require('./components/NotificationsList.vue').default);
Vue.component('notifications-counter', require('./components/NotificationsCounter.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);
Vue.component('tag-search-input', require('./components/TagSearchInput.vue').default);
Vue.component('create-restaurant-page-step-one', require('./components/CreateRestaurantPageStepOne.vue').default);
Vue.component('create-restaurant-page-step-two', require('./components/CreateRestaurantPageStepTwo.vue').default);
Vue.component('contact-number-input', require('./components/ContactNumberInput.vue').default);
Vue.component('add-restaurant-outlet-modal', require('./components/AddRestaurantOutletModal.vue').default);
Vue.component('mapbox-map', require('./components/MapBoxMap.vue').default);
Vue.component('opening-hours-form', require('./components/OpeningHoursForm.vue').default);
Vue.component('edit-restaurant-outlet-modal', require('./components/EditRestaurantOutletModal.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            restaurantOutlets: [],
            loadingRestaurantOutletData: false,
            addingRestaurantOutletData: false
        }
    },
    methods: {
        fetchSessionData: function() {
            this.loadingRestaurantOutletData = true;
            axios
                .get("/register/restaurant/session")
                .then((response) => {

                    if (response.data.sessionData.stepTwoData) {
                        this.restaurantOutlets =
                            response.data.sessionData.stepTwoData.restaurantOutlets;
                    }
                    this.loadingRestaurantOutletData = false;
                })
                .catch((err) => console.log(err.response));

        },
    },
    mounted() {
        this.fetchSessionData()
    }
});