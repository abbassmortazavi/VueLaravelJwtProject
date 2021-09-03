<template>
  <div class="col-md-4">
    <div class="thumbnail">
      <img :src= product.img class="img-fluid">
      <div class="caption">
        <h3>{{ product.name }}</h3>
        <p>{{ product.price }}</p>
        <hr>
        <p>
          <a href="" class="btn btn-default">Wish list</a>
          <a href="" class="btn btn-success">Buy</a>
          <a @click="$emit('deleteProduct')" v-if="product.user_id == authenticatedUser.id" class="btn btn-danger">Delete</a>
          <router-link :to="'/update/' + product.id + '/edit'">Edit</router-link>
        </p>
      </div>
    </div>
    {{ product.name }}||{{ product.price }}
  </div>
</template>
<script>
export default {
  props:['product' , 'authenticatedUser'],
  methods:{
    getAllProducts(){
      this.$http.get('api/products')
        .then(res=>{
          this.products = res.body;
        });
    }
  }
}
</script>
