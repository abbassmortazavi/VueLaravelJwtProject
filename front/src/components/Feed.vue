<template>
    <div>
        <h1>Feed Page...</h1>
        <ul>
            <li v-for="(product , index) in products" :key="product.id">
                {{ product.name }}|| {{ product.price }}
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            products : []
        }
    },
    methods: {
        getProducts(){
            axios.get('/api/products')
            .then(res=>{
                console.log(res);
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