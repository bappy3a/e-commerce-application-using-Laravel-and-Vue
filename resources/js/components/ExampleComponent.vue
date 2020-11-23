<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <example2></example2>
            </div>
            <div class="col-md-8" style="">
                <div class="card">
                    
                    <div class="card-body">
                        <p v-for="product in getallProduct" >{{ product.id }} <span style="font-size:11px;">{{ product.name }}</span></p>
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
            getallProduct(){
                return this.$store.getters.getAllProduct
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
