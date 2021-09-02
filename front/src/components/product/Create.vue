<template>
  <div class="row align-items-center">
      <div class="col-md-8">
        <div class="card">
          <img src="" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Create Product</h5>
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
            <button @click="insertProduct" class="btn btn-success float-right" v-show="product.name && product.description && product.price">Create</button>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  name: "Create",
  data(){
    return{
      product:{
        name: '',
        price: '',
        description: ''
      }
    }
  },
  methods:{
    insertProduct(){
      this.$http.post('api/products' , this.product)
      .then(res=>{
        this.$router.push('/feed');
      }).catch(err=>{
        console.log(err);
      });
    }
  }
}
</script>

<style scoped>

</style>
