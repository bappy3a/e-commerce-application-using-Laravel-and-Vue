<template>
    <div>

            <div class="breadcrumbs_wrap dark">
                <div class="container">
                    <div class="row align-items-center">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="text-center">
                                <h2 class="breadcrumbs_title">My All Orders</h2>
                                <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">My Account</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                                  </ol>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- =========================== Breadcrumbs =================================== -->
            
            
            <!-- =========================== My All Orders =================================== -->
            <section class="gray">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-4 col-md-3">
                            <nav class="dashboard-nav mb-10 mb-md-0">
                              <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                                <router-link class="list-group-item list-group-item-action dropright-toggle active" :to="{ name:'user_order'}">
                                  My Order
                                </router-link>
                                <a class="list-group-item list-group-item-action dropright-toggle" href="account-info.html">
                                  Account Settings
                                </a>
                                <router-link class="list-group-item list-group-item-action dropright-toggle" to="/logout">
                                  Logout
                                </router-link>
                              </div>
                            </nav>
                        </div>
                        
                        <div class="col-lg-8 col-md-9">
                        
                            <div class="card-body bg-white mb-4">
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <!-- Heading -->
                                        <h6 class="text-muted mb-1">Order No:</h6>
                                        <!-- Text -->
                                        <p class="mb-lg-0 font-size-sm font-weight-bold">{{ order.orders_code }}</p>
                                    </div>
                                    
                                    <div class="col-6 col-lg-3">
                                        <!-- Heading -->
                                        <h6 class="text-muted mb-1">Shipped date:</h6>
                                        <!-- Text -->
                                        <p class="mb-lg-0 font-size-sm font-weight-bold">
                                            <span>{{ order.created_at | formatDate }}</span>
                                        </p>
                                    </div>
                                    
                                    <div class="col-6 col-lg-3">
                                        <!-- Heading -->
                                        <h6 class="text-muted mb-1">Shiping Status:</h6>
                                        <!-- Text -->
                                        <p class="mb-0 font-size-sm font-weight-bold">{{ order.shiping_status }}</p>
                                    </div>
                                    
                                    <div class="col-6 col-lg-3">
                                        <!-- Heading -->
                                        <h6 class="text-muted mb-1">Order Amount:</h6>
                                        <!-- Text -->
                                        <p class="mb-0 font-size-sm font-weight-bold">${{ order.price }}</p>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!-- Order Items -->
                            <div class="card style-2 mb-4">
                                <div class="card-header">
                                    <h4 class="mb-0">Order Item {{ order_details.length }}</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="item-groups">
                                    
                                        <!-- Single Items -->
                                        <li  v-for="order in order_details" :key="order.id">
                                            <div class="row align-items-center">
                                                <div class="col-4 col-md-3 col-xl-2">
                                                    <a href="#"><img :src="`/${order.product.thumbnail_img}`" alt="..." class="img-fluid"></a>
                                                </div>
                                                
                                                <div class="col">
                                                    <!-- Title -->
                                                    <p class="mb-2 font-size-sm font-weight-bold">
                                                        <a class="text-body" href="product.html">{{ order.product.name }}</a> <br>
                                                        <span class="theme-cl">${{ order.price }}</span>
                                                    </p>

                                                    <!-- Text -->
                                                    <div class="font-size-sm text-muted">
                                                        Quantity: {{ order.quantity }} <br>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Total Items -->
                            <div class="card style-2 mb-4">
                                <div class="card-header">
                                    <h4 class="mb-0">Total Order</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                        
                                        <li class="list-group-item d-flex font-size-lg font-weight-bold">
                                            <span>Total</span>
                                            <span class="ml-auto">${{ order.price }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Shipping & Billing -->
                            <div class="card style-2">
                                <div class="card-header">
                                    <h4 class="mb-0">Shipping & Billing  Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                      
                                        <div class="col-12">
                                            <!-- Heading -->
                                            <p class="mb-2 font-weight-bold">
                                              Shipping Address:
                                            </p>

                                            <p class="mb-7 mb-md-0">
                                              <b>Name</b> : {{ order_shiping.name }}, <br>
                                              <b>Email</b> : {{ order_shiping.email }}, <br>
                                              <b>Mobile Number</b> : {{ order_shiping.number }}, <br>
                                              <b>Address</b> : {{ order_shiping.address }}, <br>
                                               {{ order_shiping.city }}, <br>
                                            </p>
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
        mounted(){
        this.getorder();
        if (!User.loggedIn()) {
            this.$router.push({ name:'home' })
        }
        },
        data() {
            return{
                order:[],
                order_shiping:[],
                order_details:[],
            }
        },
        methods: {
            getorder(){
                let id = this.$route.params.id
                axios.get('/api/user/order/'+id)
                .then(response => {
                  this.order = response.data.order;
                  this.order_shiping = response.data.order_shiping;
                  this.order_details = response.data.order_details;
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
                
            },
        }
        
    }
</script>
