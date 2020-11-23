<template>
    <div>
        <div class="min-banner">
            <img :src="'frontend/assets/img/min/banner-6.jpg'" class="img-fluid" alt="" />
        </div>
        <div class="brd_wraps pt-2 pb-2">
            <div class="container">
                <nav aria-label="breadcrumb" class="simple_breadcrumbs">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/"><i class="ti-home"></i></router-link></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ category.name }}</li>
                  </ol>
                </nav>
            </div>
        </div>


            <section class="gray">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            
                            <!-- Shorter Toolbar -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="toolbar toolbar-products">
                                        <div class="toolbar-sorter sorter">
                                            <label class="sorter-label" for="sorter">Sort By</label>
                                            <select id="sorter" data-role="sorter" class="sorter-options">
                                                <option value="position" selected="selected">Position</option>
                                                <option value="name">Product Name</option>
                                                <option value="price">Price</option>
                                            </select>
                                            <a href="#" class="action sorter-action"><i class="ti-arrow-up"></i></a>
                                        </div>
                                                    
                                        <div class="modes">
                                            <a class="modes-mode mode-grid" title="Grid" href="#"><i class="ti-layout-grid3"></i></a>       
                                            <a class="modes-mode mode-list" title="Grid" href="#"><i class="ti-view-list"></i></a>                                                  
                                        </div>

                                        <div class="field limiter">
                                            <label class="label" for="limiter">
                                                <span>Show</span>
                                            </label>
                                            <div class="control">
                                                <select id="limiter" data-role="limiter" class="limiter-options">
                                                    <option value="5">5</option>
                                                    <option value="10" selected="selected">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- row -->
                            <div class="row">
                            
                                <div class="col-lg-3 col-md-4 col-sm-6" v-for="product in products" :key="product.id">
                                    <div class="woo_product_grid">
                                        <span v-if="product.discount > 0" class="woo_offer_sell">Save {{ product.discount }}% Off</span>
                                        <div class="woo_product_thumb">
                                            <img :src="`/${product.thumbnail_img}`" class="img-fluid" alt="" />
                                        </div>
                                        <div class="woo_product_caption center">
                                            <div class="woo_rate">
                                                <i class="fa fa-star filled"></i>
                                                <i class="fa fa-star filled"></i>
                                                <i class="fa fa-star filled"></i>
                                                <i class="fa fa-star filled"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="woo_title">
                                                <h4 class="woo_pro_title"><a href="#">{{ product.name }}</a></h4>
                                            </div>
                                            <div class="woo_price">
                                                <h6 v-if="product.discount > 0">
                                                    ${{ product.unit_price - (product.unit_price / 100 * product.discount) | formatNumber}}
                                                    
                                                    <span v-if="product.discount > 0" class="less_price">${{ product.unit_price }}</span>
                                                </h6>
                                                <h6 v-else >
                                                    ${{ product.unit_price }}
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="woo_product_cart hover">
                                            <ul>
                                                <li>
                                                    <router-link :to="{name: 'product_detail', params:{id: product.id} }" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></router-link>
                                                </li>
                                                <li><a @click="addToCart(product)" href="javascript:void(0);" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
                                                
                                            </ul>
                                        </div>                              
                                    </div>
                                </div>
                                <div v-show="!products.length" class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <h1 class="text-danger text-center">No product found</h1> <br>
                                    <router-link class="btn btn-primary mt-3 mr-3" to="/">Go back shopping</router-link>
                                </div>
                                
                            </div>
                            <!-- row -->
                            
                        </div>
                        
                    </div>
                </div>
            </section>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.$Progress.start();
            this.getProducts();
            this.$Progress.finish();
        },
        data() {
            return{
                products:[],
                category:[],
            }
        },
        methods: {
            addToCart(product){
                this.$Progress.start();
                axios.post('/app/cart/to/cart',product)
                .then(response => {
                  this.$store.dispatch("allproducts")
                  this.$Progress.finish();
                  this.$snotify.success('Successfully product add to Cart','success');
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
            getProducts(){
                let id = this.$route.params.id
                axios.get("/api/product/category/"+id)
                .then(response => {
                    console.log(response.data);
                  this.products = response.data.products;
                  this.category = response.data.category;
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            }

        }
    }
</script>
