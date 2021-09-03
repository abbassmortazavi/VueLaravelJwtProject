<template>
    <div class="row">
        <Product v-for="product in products" :product="product" :authenticatedUser="authenticatedUser" @deleteProduct="deleteProduct(product)"/>
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
  computed:{
    authenticatedUser(){
      return this.$auth.getAuthenticatedUser();
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
        },
      deleteProduct(product){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
          .then((willDelete) => {
            if (willDelete) {
              this.$http.post('api/deleteProduct' , {id:product.id})
                .then(res=>{
                  let index = this.products.indexOf(product);
                  this.products.splice(index , 1);
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
                }).catch(err=>{
                console.log(err);
              });
            } else {
              swal("Your imaginary file is safe!");
            }
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
