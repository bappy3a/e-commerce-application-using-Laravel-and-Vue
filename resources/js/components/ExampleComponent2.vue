<template>
    <div>
        <div class="row justify-content-center">
            
            <div class="col-md-8" style="">
                <div class="card">
                    <div class="card-header"><button @click="addCart" class="btn btn-info">Add</button></div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            
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
