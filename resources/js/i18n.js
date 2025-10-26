import Vue from 'vue'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n)

const i18n = new VueI18n({
  locale: localStorage.getItem('lang') || 'en',
  fallbackLocale: 'en',
  messages: {
    en: require('./locales/en.json'),
    ar: require('./locales/ar.json')
  }
})

new Vue({
  i18n,
  // ... rest of your Vue initialization
}).$mount('#app')