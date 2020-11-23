<template>
    <div>

            <div class="breadcrumbs_wrap gray">
                <div class="container">
                    <div class="row align-items-center">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-center">
                                <h2 class="breadcrumbs_title">Checkout Complete</h2>
                                <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout Complete</li>
                                  </ol>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- =========================== Breadcrumbs =================================== -->
            
            <!-- =========================== Add To Cart =================================== -->
            <section>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 col-sm-12">
                        
                            <div class="card py-3 mt-sm-3">
                              <div class="card-body text-center">
                                <h2 class="pb-2">Thank you for your order!</h2>
                                <p class="font-size-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
                                <p class="font-size-sm mb-2">Make sure you make note of your order number, which is <span class="font-weight-medium">857DFR5478124.</span></p>
                                <p class="font-size-sm">You will be receiving an email shortly with confirmation of your order. <u>You can now:</u></p>
                                <router-link class="btn btn-secondary mt-3 mr-3" to="/">Go back shopping</router-link>
                                <router-link class="btn btn-primary mt-3" :to="{ name:'user_order'}"><i class="czi-location"></i>&nbsp;Your Dashboard</router-link>
                              </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </section>

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
            cartMinus(product){
                this.$Progress.start();
                axios.post('/app/cart/minus',product)
                .then(response => {
                  this.$store.dispatch("allproducts")
                  this.$Progress.finish();
                  this.$snotify.success('Product Successfully Update ','success');
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
            cartPlus(product){
                this.$Progress.start();
                axios.post('/app/cart/plus',product)
                .then(response => {
                  this.$store.dispatch("allproducts")
                  this.$Progress.finish();
                  this.$snotify.success('Product Successfully Update ','success');
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
        }
    }
</script>
