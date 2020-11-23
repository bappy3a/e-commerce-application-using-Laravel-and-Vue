require('./bootstrap');
import Vue from 'vue'
import moment from 'moment'
var numeral = require("numeral");
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'
import { Form, HasError, AlertError } from 'vform'
import Snotify, { SnotifyPosition } from 'vue-snotify'

// Vue Router
Vue.use(VueRouter)
import {routes} from './routes';

//VueX 
import store from './store';

// Vue VueProgressBar
const VueProgressBarOptions = {
  color: '#1ca301',
  failedColor: '#FF0000',
  thickness: '3px',
  transition: {
    speed: '0.9s',
    opacity: '0.9s',
    termination: 600
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}
Vue.use(VueProgressBar, VueProgressBarOptions)

// Snotify Use
const SnotifyOptions = {
  toast: {
    position: SnotifyPosition.centerTop
  }
}

Vue.use(Snotify, SnotifyOptions)

/*VForm*/
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

/*Import User*/
import User from './Helpers/User';
window.User = User


  
Vue.component('header-components', require('./components/inc/header.vue').default);
Vue.component('cart-components', require('./components/inc/cart.vue').default);










//Helper Call
//Peice Formation
Vue.filter("formatNumber", function (value) {
  return numeral(value).format("0,0");
});

Vue.filter('sortlength',function (text,length,suffix) {
    return text.substring(0,length)+suffix;
})

Vue.filter('formatDate', function(value) {
  return moment(String(value)).format('DD MMM YYYY')
});



const router = new VueRouter({
  scrollBehavior() {
    return { x: 0, y: 0 };
  },
  routes,
  mode: 'history'
})

const app = new Vue({
    el: '#app',
    router,
    store
});