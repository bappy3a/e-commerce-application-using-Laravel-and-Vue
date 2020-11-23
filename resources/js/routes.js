
let demo = require('./components/ExampleComponent.vue').default;
//Auth Route Start
let home = require('./components/home/index.vue').default;
let product_detail = require('./components/home/product_detail.vue').default;
let login = require('./components/auth/login.vue').default;
let logout = require('./components/auth/logout.vue').default;
//user profile
let user_order = require('./components/account/order.vue').default;
let user_order_view = require('./components/account/order_view.vue').default;
//cart
let cart = require('./components/home/cart.vue').default;
let billing = require('./components/home/billing.vue').default;
let order_complete = require('./components/home/order_complete.vue').default;
//
let category_products = require('./components/home/category_products.vue').default;


export const routes = [
  { path: '/', component: home, name:'home' },
  { path: '/product/detail/:id', component: product_detail, name:'product_detail' },
  { path: '/user/login', component: login, name:'login' },
  { path: '/logout', component: logout, name:'logout'  },
  //User Dashboard
  { path: '/user/order', component: user_order, name:'user_order' },
  { path: '/user/order/:id', component: user_order_view, name:'user_order_view' },
  { path: '/demo', component: demo, name:'demo' },
  //cart
  { path: '/cart', component: cart, name:'cart' },
  { path: '/billing', component: billing, name:'billing' },
  { path: '/order/complete', component: order_complete, name:'order_complete' },

  { path: '/product/category/:id', component: category_products, name:'category_products' },

]