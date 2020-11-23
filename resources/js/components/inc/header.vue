<template>
    <div>
        <div class="header_topbar light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-4">
                        <ul class="tp-list nbr ml-2">
                            <li class="dropdown dropdown-currency hidden-xs hidden-sm">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eng<i class="ml-1 fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu mlix-wrap">
                                    <li><a href="javascript:void(0);">English</a></li>
                                    <li><a href="javascript:void(0);">French</a></li>
                                    <li><a href="javascript:void(0);">Spainish</a></li>
                                    <li><a href="javascript:void(0);">Italy</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-currency hidden-xs hidden-sm">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="ml-1 fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu mlix-wrap">
                                    <li><a href="javascript:void(0);">EUR</a></li>
                                    <li><a href="javascript:void(0);">AUD</a></li>
                                    <li><a href="javascript:void(0);">GBP</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                        <div class="topbar_menu">
                            <ul>
                                <li><router-link to="/user/login"><i class="ti-bag"></i>Account</router-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main header -->
        <div class="main_header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <router-link to="/" class="nav-brand"><img :src="'/frontend/assets/img/grocery-logo.png'" class="logo" alt="Logo" /></router-link>
                        
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <!-- Show on Mobile & iPad -->
                        <div class="blocks shop_cart d-xl-none d-lg-none">
                            <div class="single_shop_cart">
                                <div class="ss_cart_left">
                                    <a class="cart_box" data-toggle="collapse" href="#mySearch" role="button" aria-expanded="false" aria-controls="mySearch"><i class="ti-search"></i></a>
                                </div>
                            </div>
                            <div class="single_shop_cart">
                                <div class="ss_cart_left">
                                    <a href="#"  onclick="openRightMenu()" class="cart_box"><span class="qut_counter">{{ carts.cart_count }}</span><i class="ti-shopping-cart"></i></a>
                                </div>
                                <div class="ss_cart_content">
                                    <strong>My Cart</strong>
                                    <span>${{ carts.cart_total}}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Show on Desktop -->
                        <div class="blocks shop_cart d-none d-xl-block d-lg-block">
                            <div class="single_shop_cart">
                                <div class="ss_cart_left">
                                    <a href="javascript:void(0)" class="cart_box"><i class="lni lni-phone"></i></a>
                                </div>
                                <div class="ss_cart_content">
                                    <strong>Call Us:</strong>
                                    <span>+8801721209595</span>
                                </div>
                            </div>
                            <div class="single_shop_cart">
                                <div class="ss_cart_left">
                                    <a href="javascript:void(0);" onclick="openRightMenu()" class="cart_box"><span class="qut_counter">{{ carts.cart_count }}</span><i class="ti-shopping-cart"></i></a>
                                </div>
                                <div class="ss_cart_content">
                                    <strong>My Cart</strong>
                                    <span>${{ carts.cart_total}}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="blocks search_blocks d-none d-xl-block d-lg-block">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search entire store here...">
                                <div class="input-group-append">
                                <button class="btn search_btn" type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="mySearch">
                <div class="blocks search_blocks">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search entire store here...">
                        <div class="input-group-append">
                        <button class="btn search_btn" type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
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
         data() {
            return{
                login:'',
            }
        },
        methods:{
            addCart(){
               axios.get('/cart')
                   .then(()=>{
                        this.$store.dispatch("allproducts")
                   })
                   .catch(()=>{
                   })
            }
        }
    }
</script>
