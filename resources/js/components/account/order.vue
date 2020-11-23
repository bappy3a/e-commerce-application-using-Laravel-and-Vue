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
                                <router-link class="list-group-item list-group-item-action dropright-toggle active"  :to="{ name:'user_order'}">
                                  Order History
                                </router-link>
                                <a class="list-group-item list-group-item-action dropright-toggle" href="javascript:void(0);">
                                  Account Settings
                                </a>
                                <router-link class="list-group-item list-group-item-action dropright-toggle" to="/logout">
                                  Logout
                                </router-link>
                              </div>
                            </nav>
                        </div>
                        
                        <div class="col-lg-8 col-md-9">
                        
                            <!-- Order Items -->
                            <div class="card style-2">
                                <div class="card-header">
                                    <h4 class="mb-0">Total Order</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order No.</th>
                                                    <th scope="col">Shipping Status</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="order in orders" :key="order.id">
                                                    <td>{{ order.orders_code }}</td>
                                                    <td>{{ order.shiping_status }}</td>
                                                    <td>${{ order.price }}</td>
                                                    <td><router-link :to="{name: 'user_order_view', params:{id: order.id} }" class="btn btn-sm btn-theme">Order Details</router-link></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
        this.getOrders();
        if (!User.loggedIn()) {
            this.$router.push({ name:'home' })
        }
        },
        data() {
            return{
                orders:[],
            }
        },
        methods: {
            getOrders(){
                axios.get("/api/user/order")
                .then(response => {
                  this.orders = response.data;
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
        }
        
    }
</script>
