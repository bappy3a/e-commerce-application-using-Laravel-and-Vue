<template>
    <div>

        <section>
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="sp-loadings"><img :src="`/${product.thumbnail_img}`" alt=""></div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="woo_pr_detail">
                            
                            <div class="woo_cats_wrps">
                                <a href="#" class="woo_pr_cats">{{ product.category.name }}</a>
                            </div>
                            <h2 class="woo_pr_title">{{ product.name }}</h2>
                            
                            <div class="woo_pr_reviews">
                                <div class="woo_pr_rating">
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="woo_ave_rat">4.8</span>
                                </div>
                                <div class="woo_pr_total_reviews">
                                    <a href="#">(124 Reviews)</a>
                                </div>
                            </div>
                            
                            <div class="woo_pr_short_desc">
                                <p>{{ product.description | sortlength(120,"...") }}</p>
                            </div>
                            
                            <div class="woo_pr_price">
                                <div v-if="product.discount > 0" class="woo_pr_offer_price" >
                                    <h3>${{ product.unit_price - (product.unit_price / 100 * product.discount) | formatNumber}}<span class="org_price">${{ product.unit_price }}</span></h3>
                                </div>
                                <div v-else class="woo_pr_offer_price">
                                    <h3>${{ product.unit_price }}</h3>
                                </div>
                                <div class="woo_offer_box" v-if="product.discount > 0">
                                    <div class="woo_off_text">
                                        <h4>{{ product.discount }}%<span>Off</span></h4>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Short Info -->
                            <div class="pr_info_prefix grocery_style mb-3">
                                
                                <!-- First -->
                                <div class="cart_sku_preflix">
                                    <div class="sku_preflix_first">
                                        <strong>Stock:</strong>
                                    </div>
                                    <div class="sku_preflix_last" v-if="product.current_stock > 0">
                                        <span class="text-success">In Stock</span>
                                    </div>
                                    <div class="sku_preflix_last" v-else>
                                        <span class="text-danger">Stock Out</span>
                                    </div>
                                </div>
                                
                                <!-- First -->
                                <div class="cart_sku_preflix">
                                    <div class="sku_preflix_first">
                                        <strong>Categories:</strong>
                                    </div>
                                    <div class="sku_preflix_last">
                                        {{ product.category.name }}
                                    </div>
                                </div>
                                
                                <!-- First -->
                                <div class="cart_sku_preflix">
                                    <div class="sku_preflix_first">
                                        <strong>Freshness:</strong>
                                    </div>
                                    <div class="sku_preflix_last">
                                        10 hour Old
                                    </div>
                                </div>
                                
                                <!-- First -->
                                <div class="cart_sku_preflix">
                                    <div class="sku_preflix_first">
                                        <strong>Buy by:</strong>
                                    </div>
                                    <div class="sku_preflix_last">
                                        pcs
                                    </div>
                                </div>
                                
                                <!-- First -->
                                <div class="cart_sku_preflix">
                                    <div class="sku_preflix_first">
                                        <strong>Delivery:</strong>
                                    </div>
                                    <div class="sku_preflix_last">
                                        in 1 days
                                    </div>
                                </div>
                                
                                <!-- First -->
                                <div class="cart_sku_preflix">
                                    <div class="sku_preflix_first">
                                        <strong>Delivery area:</strong>
                                    </div>
                                    <div class="sku_preflix_last">
                                        Czick Montreal
                                    </div>
                                </div>

                            </div>
                            <form @submit.prevent="addToCartQty()" @keydown="form.onKeydown($event)"> 
                                <div class="woo_btn_action">
                                    <div class="col-12 col-lg-auto">
                                        <input v-model="form.quantity" type="number" class="form-control qua_pr mb-2" :class="{ 'is-invalid': form.errors.has('quantity') }"  />
                                        <has-error :form="form" field="quantity"></has-error>
                                    </div>
                                    <div class="col-12 col-lg-auto">
                                        <button type="submit" class="btn btn-block btn-dark mb-2">Add to Cart <i class="ti-shopping-cart-full ml-2"></i></button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
                
                <!-- Product Description -->
                <div class="row mt-5">
                    <div class="col-lg-12 col-md-12">
                        <div class="custom-tab style-1">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true" aria-expanded="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false" aria-expanded="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab" aria-expanded="true">
                                    <p>{{ product.description }}</p>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" aria-expanded="false">
                                    <div class="review-wrapper">
                                        <div class="review-wrapper-header">
                                            <h4>24 Reviews</h4> 
                                        </div>
                                        <div class="review-wrapper-body">
                                            <ul class="review-list">
                                                <li>
                                                    <div class="reviews-box">
                                                        <div class="review-body">
                                                            <div class="review-avatar">
                                                                <img alt="" src="assets/img/user-3.jpg" class="avatar avatar-140 photo">
                                                            </div>
                                                            <div class="review-content">
                                                                <div class="review-info">
                                                                    <div class="review-comment">
                                                                        <div class="review-author">
                                                                            Cole Harris                                                                         
                                                                        </div>
                                                                        <div class="review-comment-stars">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star empty"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="review-comment-date">
                                                                        <div class="review-date">
                                                                            <span>4 weeks ago</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p>At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                                <li>
                                                    <div class="reviews-box">
                                                        <div class="review-body">
                                                            <div class="review-avatar">
                                                                <img alt="" src="assets/img/user-4.jpg" class="avatar avatar-140 photo">
                                                            </div>
                                                            <div class="review-content">
                                                                <div class="review-info">
                                                                    <div class="review-comment">
                                                                        <div class="review-author">
                                                                            Mariya Merry                                                                            
                                                                        </div>
                                                                        <div class="review-comment-stars">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star empty"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="review-comment-date">
                                                                        <div class="review-date">
                                                                            <span>3 weeks ago</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p>At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                                <li>
                                                    <div class="reviews-box">
                                                        <div class="review-body">
                                                            <div class="review-avatar">
                                                                <img alt="" src="assets/img/user-5.jpg" class="avatar avatar-140 photo">
                                                            </div>
                                                            <div class="review-content">
                                                                <div class="review-info">
                                                                    <div class="review-comment">
                                                                        <div class="review-author">
                                                                            Wadden Will                                                                 
                                                                        </div>
                                                                        <div class="review-comment-stars">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star empty"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="review-comment-date">
                                                                        <div class="review-date">
                                                                            <span>5 weeks ago</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p>At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="review-wrapper">
                                        <div class="review-wrapper-header">
                                            <h4>Rate &amp; Write Reviews</h4>
                                        </div>
                                        <div class="review-wrapper-body">
                                        
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="rating-opt">
                                                        <div class="jr-ratenode jr-nomal"></div>
                                                        <div class="jr-ratenode jr-nomal "></div>
                                                        <div class="jr-ratenode jr-nomal "></div>
                                                        <div class="jr-ratenode jr-nomal "></div>
                                                        <div class="jr-ratenode jr-nomal "></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <input type="text" class="form-control" placeholder="Your Name*">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <input type="email" class="form-control" placeholder="Email Address*">
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <textarea class="form-control height-110" placeholder="Tell us your experience..."></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-primary">Submit your review</button>
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

    </div>
</template>

<script>
    export default {
        mounted() {
            this.$Progress.start();
            this.getProduct();
            this.$Progress.finish();
        },
        data() {
            return{
                product:[],
                form :new Form({
                  product_id: this.$route.params.id,
                  quantity: '1',
                }),
            }
        },
        methods: {
            getProduct(){
                let id = this.$route.params.id
                axios.get('/api/product/'+id)
                .then(response => {
                  this.product = response.data;
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
                
            },
            addToCartQty(){
              this.$Progress.start();
              this.form.busy = true;
              this.form.post('/app/cart/cart/qty',this.form)
                .then(response => {
                  if (this.form.successful) {
                    this.$Progress.finish();
                    this.$store.dispatch("allproducts")
                    this.$snotify.success('Data Successfully Save','success')
                  }else{
                    this.$Progress.fail()
                    this.$snotify.error('Sumthing went Worong try again later.','Error')
                  }
                })
                .catch(e => {
                  this.$snotify.error('Sumthing went Worong try again later.','Error')
                  this.$Progress.fail();
                })
            },

        }
    }
</script>
