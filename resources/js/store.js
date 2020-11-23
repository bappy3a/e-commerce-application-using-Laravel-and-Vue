import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
   state : {
        products:[],
    },

    getters: {
        getAllProduct(state){
            return state.products
        },
    },

    actions :{
        allproducts(context){
            axios.get("/app/cart/show")
                .then((response)=>{
                    context.commit('allproducts',response.data)
                })
            
        },
    },

    mutations: {
        allproducts(state,data){
            return state.products = data
        },
    },


})