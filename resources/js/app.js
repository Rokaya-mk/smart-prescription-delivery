/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueI18n from 'vue-i18n';
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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('appc', require('./components/Calender.vue').default);
Vue.component('find-doctor', require('./components/FindDoctor.vue').default);
Vue.component('add-btn', require('./components/AddBtn.vue').default);





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// 1. Install VueI18n plugin
Vue.use(VueI18n);

// 2. Prepare translations
const messages = {
  en: {
    find_doctors: 'Find Doctors',
    doctors: 'Doctors',
    photo: 'Photo',
    name: 'Name',
    expertise: 'Expertise',
    booking: 'Booking',
    book_appointment: 'Book Appointment',
    no_doctor_available: 'No doctor available on'
  },
  ar: {
    find_doctors: 'ابحث عن أطباء',
    doctors: 'الأطباء',
    photo: 'صورة',
    name: 'الاسم',
    expertise: 'التخصص',
    booking: 'الحجز',
    book_appointment: 'حجز موعد',
    no_doctor_available: 'لا يوجد طبيب متاح في'
  }
};

// 3. Create i18n instance
const i18n = new VueI18n({
  locale: 'en', // default language
  fallbackLocale: 'en', // fallback language
  messages
});

const app = new Vue({
    el: '#app',
    i18n,
});
