<template>
  <div class="row align-items-center">
      <div class="col-md-8">
        <div class="card">
          <img src="" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Update Product</h5>
            <div class="form-group">
              <label for="name">Name :</label>
              <input type="text" name="name" v-model="product.name" id="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="Number">Number :</label>
              <input type="text" name="price" v-model="product.price" id="number" class="form-control">
            </div>
            <div class="form-group">
              <label for="description">Number :</label>
              <textarea name="description" v-model="product.description" id="description" cols="30" rows="10"></textarea>
            </div>
            <button @click="update" class="btn btn-success float-right" v-show="product.name && product.description && product.price">Update</button>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  name: "Update",
  data(){
    return{
      product:{}
    }
  },
  methods:{
    update(){
      this.$http.put('api/products/' + this.$route.params.product , this.product)
      .then(res=>{
        this.$router.push('/feed');
      }).catch(err=>{
        console.log(err);
      });
    },
   getProduct(){
      this.$http.get('api/products/' + this.$route.params.product)
     .then(res=>{
       this.product = res.body;
     }).catch(err=>{
       console.log(err);
      });
   }
  },
  mounted() {
    this.getProduct();
  }
}
</script>

<style scoped>

</style>
