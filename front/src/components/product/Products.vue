<template>
    <div>
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
        axios.get('api/products')
        .then(res=>{
            this.products = res.data;
        });
    },
    mounted() {
        //this.getProducts();
    },
}
</script>