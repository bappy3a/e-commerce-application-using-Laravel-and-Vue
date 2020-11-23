<template>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li v-for="(slider,index) in sliders"  :key="slider.id" data-target="#carouselExampleIndicators" :data-slide-to="index" :class="{'active' : (index==0) }"></li>
            </ol>
            <div class="carousel-inner">
                <div :class="{'active' : (index==0) }" class="carousel-item" v-for="(slider,index) in sliders"  :key="slider.id">
                    <img class="d-block w-100" :src="slider.image" alt="First slide">
                    <div class="carousel-caption banner_caption light">
                        <h4>Get <span class="theme-cl">Free Deliver</span> Your Order At Home</h4>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.</p>
                        <a href="javascript:void(0);" class="btn btn-theme">Order Now</a>
                    </div>
                </div>
                
            </div>
            
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> 

        <section class="pt-5 pb-5 gray">
            <div class="container">
            
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="sec-heading center">
                            <span class="theme-cl">Choose Categories</span>
                            <h2>Explore Categories</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="owl-carousels category-slider owl-theme">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2380px;">

                                    <div class="owl-item active" style="width: 178.333px; margin-right: 20px;" v-for="(category,index) in categoryes" :key="category.id">
                                        <div class="item">
                                            <div class="woo_category_box border_style rounded">
                                                <div class="woo_cat_thumb">
                                                    <router-link :to="{name: 'category_products', params:{id: category.id} }"><img :src="category.image" class="img-fluid" alt="" /></router-link>
                                                </div>
                                                <div class="woo_cat_caption">
                                                    <h4><router-link :to="{name: 'category_products', params:{id: category.id} }">{{ category.name }}</router-link></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>

        <!-- Product -->

        <section class="cen-mid">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="sec-heading center">
                            <span class="theme-cl">Deals of The Month</span>
                            <h2>Fresh Vegetables</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                        
                    <!-- Single Item -->
                    <div class="col-lg-3 col-md-4 col-sm-6" v-for="product in products" :key="product.id">
                        <div class="woo_product_grid">
                            <span v-if="product.discount > 0" class="woo_offer_sell">Save {{ product.discount }}% Off</span>
                            <div class="woo_product_thumb">
                                <img :src="product.thumbnail_img" class="img-fluid" alt="" />
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
                    
                    

                </div>
            </div>
        </section>
        <div class="clearfix"></div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.$Progress.start();
            this.getSliders();
            this.getCategorys();
            this.getProducts();
            this.$Progress.finish();
        },
        data() {
            return{
                sliders:[],
                categoryes:[],
                products:[],
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
            getSliders(){
                axios.get("/api/sliders")
                .then(response => {
                  this.sliders = response.data;
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
            getCategorys(){
                axios.get("/api/categoryes")
                .then(response => {
                  this.categoryes = response.data;
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
            getProducts(){
                axios.get("/api/products")
                .then(response => {
                  this.products = response.data;
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            }

        }
    }
</script>
