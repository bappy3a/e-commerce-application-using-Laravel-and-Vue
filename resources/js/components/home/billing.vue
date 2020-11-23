<template>
    <div>

            <div class="breadcrumbs_wrap gray">
                <div class="container">
                    <div class="row align-items-center">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-center">
                                <h2 class="breadcrumbs_title">Billing & Payment Page</h2>
                                <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Payment Page</li>
                                  </ol>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- =========================== Breadcrumbs =================================== -->
            
            <!-- =========================== Billing Section =================================== -->
            <section>
                <div class="container">
                    <div class="row">
                            <div class="col-lg-8 col-md-8">
                                

                                    <!-- Heading -->
                                    <h4 class="mb-5">Billing Details</h4>

                                    <!-- Billing details -->
                                    <div class="row mb-5">
                                        
                                        <div class="col-12 col-md-6">
                                            <!-- Last Name -->
                                            <div class="form-group">
                                            <label for="checkoutBillingLastName">Full Name *</label>
                                            <input class="form-control form-control-sm" type="text" placeholder="Full Name" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name">
                                            <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-6">
                                            <!-- Email -->
                                            <div class="form-group">
                                            <label for="checkoutBillingEmail">Email *</label>
                                            <input class="form-control form-control-sm" id="checkoutBillingEmail" type="email" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email">
                                            <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12">
                                            <!-- Address Line 1 -->
                                            <div class="form-group">
                                            <label for="checkoutBillingAddress">Address *</label>
                                            <input class="form-control form-control-sm" id="checkoutBillingAddress" type="text" placeholder="Address Line 1" :class="{ 'is-invalid': form.errors.has('address') }" v-model="form.address">
                                            <has-error :form="form" field="address"></has-error>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-6">
                                            <!-- Town / City -->
                                            <div class="form-group">
                                            <label for="checkoutBillingTown">Town / City *</label>
                                            <input class="form-control form-control-sm" id="checkoutBillingTown" type="text" placeholder="Town / City" :class="{ 'is-invalid': form.errors.has('city') }" v-model="form.city">
                                            <has-error :form="form" field="city"></has-error>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 col-md-6">
                                            <!-- ZIP / Postcode -->
                                            <div class="form-group mb-0">
                                            <label for="checkoutBillingPhone">Mobile Phone *</label>
                                            <input class="form-control form-control-sm" id="checkoutBillingPhone" type="tel" placeholder="Mobile Phone" :class="{ 'is-invalid': form.errors.has('number') }" v-model="form.number">
                                            <has-error :form="form" field="number"></has-error>
                                            </div>
                                        </div>
                                    
                                    </div>

                                    <!-- Heading -->
                                    <h4 class="mb-3">Payment</h4>

                                    <!-- List group -->
                                    <div class="list-group list-group-sm mb-5">

                                        <div class="list-group-item">
                                            <!-- Radio -->
                                            <div class="custom-control custom-radio">
                                                <!-- Input -->
                                                <input class="custom-control-input" id="checkoutPaymentCase" name="payment" type="radio" value="case" :class="{ 'is-invalid': form.errors.has('payment') }" v-model="form.payment">
                                                <!-- Label -->
                                                <label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentCase">Cash on delivery</label>
                                                <has-error :form="form" field="payment"></has-error>
                                            </div>
                                        </div>
                                    
                                        <div class="list-group-item">
                                            <!-- Radio -->
                                            <div class="custom-control custom-radio">
                                                <!-- Input -->
                                                <input class="custom-control-input" id="checkoutPaymentPaypal" name="payment" value="paypal" type="radio" :class="{ 'is-invalid': form.errors.has('payment') }" v-model="form.payment">
                                                <!-- Label -->
                                                <label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentPaypal"><img :src="'/frontend/assets/img/paypal.png'" alt="..."></label>
                                                <has-error :form="form" field="payment"></has-error>
                                            </div>
                                        </div>
                                        
                                    </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4">
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
                                <a @click="Order()" class="btn btn-block btn-dark mb-2" href="javascript:void(0);">Proceed to Order</a>
                                <router-link class="px-0 text-body" to="/"><i class="ti-back-left mr-2"></i> Continue Shopping</router-link>
                            </div>
                    </div>
                </div>
            </section>


    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="add-payment" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="view-product">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h5 class="modal-title text-danger">Please Login Or Sign up </h5>
                    <form  @submit.prevent="modelSingin()">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="login.email">
                        <small class="text-danger" v-if="errors.email" >{{ errors.email[0] }}</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="login.password">
                        <small class="text-danger" v-if="errors.password" >{{ errors.password[0] }}</small>
                      </div>
                      <button type="submit" class="btn btn-primary">Login</button>
                      <router-link :to="{ name : 'login'}" class="btn btn-info float-right" data-dismiss="modal">Sing Up</router-link>
                    </form>
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
                form :new Form({
                  name: '',
                  email: '',
                  address: '',
                  city: '',
                  number: '',
                  payment: '',
                }),
                login:{
                  email: 'bappy@dev.local',
                  password: 'password'
                },
                errors:{},
            }
        },
        methods:{
            Order(){
                if (!User.loggedIn()) {
                    $('#login').modal('show');
                }
                else{
                    this.$Progress.start();
                    this.form.busy = true;
                    this.form.post('/api/app/order',this.form)
                    .then(response => {
                      if (this.form.successful) {
                        this.$Progress.finish();
                        this.$store.dispatch("allproducts")
                        this.$snotify.success('Order Successfully Sending','success');
                        this.$router.push({ name:'order_complete' });
                      }else{
                        this.$Progress.fail()
                        this.$snotify.error('Sumthing went Worong try again later.','Error')
                      }
                    })
                    .catch(e => {
                      console.log(e);
                      this.$Progress.fail();
                    })
                }
            },

            modelSingin(){
              this.$Progress.start();
              axios.post('/api/auth/login',this.login)
                .then(response => {
                    User.responseAfterLogin(response)
                    this.$Progress.finish();
                    this.$snotify.success('Signed in successfully','success');
                    $('#login').modal('hide');
                })
                .catch(e =>  {
                    this.errors = e.response.data.errors;
                    this.$snotify.error('Sumthing went Worong try again later.','Error');
                    this.$Progress.fail();
                })
            },
        }
    }
</script>
