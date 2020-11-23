<template>
    <div>

        <div class="breadcrumbs_wrap gray">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-center">
                            <h2 class="breadcrumbs_title">Add To Cart</h2>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add To cart</li>
                              </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <section>
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr  v-for="product in carts.carts" >
                                        <td>
                                            <div class="tbl_cart_product">
                                                <div class="tbl_cart_product_thumb">
                                                    <img :src="`/${product.attributes.image}`" class="img-fluid" alt="" />
                                                </div>
                                                <div class="tbl_cart_product_caption">
                                                    <h5 class="tbl_pr_title">{{ product.name }}</h5>
                                                    <span class="tbl_pr_quality theme-cl">Shop</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><h4 class="tbl_org_price">${{ product.price }}</h4></td>
                                        <td>
                                            <div class="tbl_pr_action">
                                                <a @click="cartMinus(product)" href="javascript:void(0);"><i class="lni lni-minus"></i></a>

                                                <input @change="cartUpdate(product.id, product.quantity)" type="number" v-on:input="process(product.quantity)" class="form-control tbl_quan" :value="product.quantity"  readonly />

                                                <a @click="cartPlus(product)" href="javascript:void(0);"><i class="lni lni-plus"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="tbl_pr_action">
                                                <h5 class="tbl_total_price">${{ product.price * product.quantity }}</h5>
                                                <a @click="RemoveToCart(product)" href="javascript:void(0);" class="tbl_remove"><i class="ti-close"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="cart_detail_box mb-4">
                            <div class="card-body">
                                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                    <li class="list-group-item d-flex">
                                        <h5 class="mb-0">Order Summary</h5>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span>Subtotal</span> <span class="ml-auto font-size-sm">${{ carts.cart_total}}</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span>Shipping</span> <span class="ml-auto font-size-sm">$0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex font-size-lg font-weight-bold">
                                        <span>Total</span> <span class="ml-auto font-size-sm">${{ carts.cart_total}}</span>
                                    </li>
                                    <li class="list-group-item font-size-sm text-center text-gray-500">
                                        Shipping cost calculated at Checkout *
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <router-link class="btn btn-block btn-dark mb-2" to="/billing">Proceed to Checkout</router-link>
                        <router-link class="px-0 text-body" to="/"><i class="ti-back-left mr-2"></i> Continue Shopping</router-link>
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
