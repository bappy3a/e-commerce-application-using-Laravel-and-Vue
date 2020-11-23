<template>
    <div>


        <div class="rightMenu-scroll">
            <h4 class="cart_heading">Your cart</h4>
            <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
            <div class="right-ch-sideBar" id="side-scroll">
                
                <div class="cart_select_items">
                    <!-- Single Item -->
                    <div class="cart_selected_single" v-for="product in carts.carts" >
                        <div class="cart_selected_single_thumb">
                            <a href="javascript:void(0);"><img :src="`/${product.attributes.image}`" class="img-fluid" alt="" /></a>
                        </div>
                        <div class="cart_selected_single_caption">
                            <h4 class="product_title">{{ product.name }}</h4>
                            <span class="numberof_item">${{ product.price }}x{{ product.quantity }}</span>
                            <a @click="RemoveToCart(product)" href="javascript:void(0);" class="text-danger">Remove</a>
                        </div>
                    </div>
                </div>
                
                <div class="cart_subtotal">
                    <h6>Subtotal<span class="theme-cl">${{ carts.cart_total }}</span></h6>
                </div>
                
                <div class="cart_action">
                    <ul>
                        <li><router-link to="/cart" class="btn btn-go-cart btn-theme">View/Edit Cart</router-link></li>
                        <li><router-link to="/billing" class="btn btn-checkout">Checkout Now</router-link></li>
                    </ul>
                </div>
                
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch("allproducts")
        },
        computed:{
            carts(){
                return this.$store.getters.getAllProduct
            }
        },
        methods:{
            RemoveToCart(product){
                this.$Progress.start();
                axios.post('/app/cart/remove',product)
                .then(response => {
                  this.$store.dispatch("allproducts")
                  this.$Progress.finish();
                  this.$snotify.success('Product Successfully Remove ','success');
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
        }
    }
</script>
