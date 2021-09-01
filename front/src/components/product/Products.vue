<template>
    <div class="row">
        <Product v-for="product in products" :product="product"/>
    </div>
</template>
<script>
import Product from "./product.vue";
export default {
  components:{Product},
    data() {
        return {
            products : []
        }
    },
    methods: {
        getProducts(){
            axios.get('/api/products')
            .then(res=>{
              this.products = res.data;
            }).catch(err=>{
                console.log(err);
            });
        }
    },
    created() {
        this.$http.get('api/products')
        .then(res=>{
            this.products = res.body;
        });
    },
    mounted() {
        //this.getProducts();
    },
}
</script>
