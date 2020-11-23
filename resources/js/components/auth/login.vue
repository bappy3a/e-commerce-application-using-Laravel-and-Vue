<template>
    <div>

            <div class="breadcrumbs_wrap dark">
                <div class="container">
                    <div class="row align-items-center">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="text-center">
                                <h2 class="breadcrumbs_title">Login/Register</h2>
                                <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">My Account</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Login-register</li>
                                  </ol>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- =========================== Breadcrumbs =================================== -->
            
            
            <!-- =========================== Login/Signup =================================== -->
            <section>
                <div class="container">
                    
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="login_signup">
                                <h3 class="login_sec_title">Sign In</h3>
                                <form @submit.prevent="singIn()" @keydown="form.onKeydown($event)"> 
                                
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" v-model="login.email">
                                        <small class="text-danger" v-if="errors.email" >{{ errors.email[0] }}</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" v-model="login.password">
                                        <small class="text-danger" v-if="errors.password" >{{ errors.password[0] }}</small>
                                    </div>
                                    
                                    <div class="login_flex">
                                        <div class="login_flex_1">
                                            <a href="#" class="text-bold">Forget Password?</a>
                                        </div>
                                        <div class="login_flex_2">
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-md btn-theme">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="login_signup">
                                <h3 class="login_sec_title">Create An Account</h3>
                                <form @submit.prevent="sungUp() " @keydown="form.onKeydown($event)">
                                    
                                    <div class="row">
                                    
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name">
                                                <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email">
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password">
                                                <has-error :form="form" field="password"></has-error>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" v-model="form.password_confirmation" >
                                                <has-error :form="form" field="password_confirmation"></has-error>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="login_flex">
                                                <div class="login_flex_1">
                                                    <input id="news" class="checkbox-custom" name="news" type="checkbox">
                                                    <label for="news" class="checkbox-custom-label">Sign Up for Newsletter</label>
                                                </div>
                                                <div class="login_flex_2">
                                                    <div class="form-group mb-0">
                                                        <button type="submit" class="btn btn-md btn-theme">Sign Up</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                        
                                
                                </form>
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
            if (User.loggedIn()) {
                this.$router.push({ name:'user_order' })
              }
            this.$Progress.finish();
        },
        data() {
            return{
                form :new Form({
                  name: '',
                  email: '',
                  password: '',
                  password_confirmation: '',
                }),
                login:{
                  email: null,
                  password: null
                },
                errors:{},
            }
        },
        methods: {
            sungUp(){
              this.$Progress.start();
              this.form.busy = true;
              this.form.post('/api/auth/singup',this.form)
                .then(response => {
                  if (this.form.successful) {
                    this.$Progress.finish();
                    this.$snotify.success('Data Successfully Save','success')
                  }else{
                    this.$Progress.fail()
                    this.$snotify.error('Sumthing went Worong try again later.','Error')
                  }
                })
                .catch(e => {
                  console.log(e);
                  this.$Progress.fail();
                })
            },
            singIn(){
              this.$Progress.start();
              axios.post('/api/auth/login',this.login)
                .then(response => {
                    User.responseAfterLogin(response)
                    this.$Progress.finish();
                    this.$snotify.success('Signed in successfully','success');
                    this.$router.push({ name:'user_order' });
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
