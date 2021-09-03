<template>
  <div class="row align-items-center">
      <div class="col-md-8">
        <div class="card">
          <img src="" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Create Product</h5>
            <form @submit.prevent="insertProduct">
              <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" v-model="product.name" id="name" class="form-control"
                       v-validate="'required'"
                >
                <div class="alert alert-danger" v-show="errors.has('name')">{{ errors.first('name') }}</div>
              </div>
              <div class="form-group">
                <label for="file">File :</label>
                <input type="file" @change="uploadImage" name="name"  id="file" class="form-control">

              </div>
              <div class="form-group">
                <label for="Number">Number :</label>
                <input type="text" name="price" v-model="product.price" id="number" class="form-control"
                       v-validate="'max_value:30|min_value:0'"
                >
                <div class="alert alert-danger" v-show="errors.has('price')">{{ errors.first('price') }}</div>
              </div>
              <div class="form-group">
                <label for="description">Number :</label>
                <textarea name="description" v-model="product.description" id="description" cols="30" rows="10"
                v-validate="'required'"
                ></textarea>
                <div class="alert alert-danger" v-show="errors.has('description')">{{ errors.first('description') }}</div>
              </div>
              <input type="submit" class="btn btn-success float-right" value="Create"/>
            </form>
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
        description: '',
        img: ''
      }
    }
  },
  methods:{
    uploadImage(e){
      console.log(e.target.files[0]);
      let fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = (e)=>{
        this.product.img = e.target.result
      }
      //console.log(this.product);
    },
    insertProduct(){
      this.$validator.validateAll()
      .then(()=>{
        this.$http.post('api/products' , this.product)
          .then(res=>{
            console.log(res);
            this.$router.push('/feed');
          }).catch(err=>{
          console.log(err);
        });
      });

    }
  }
}
</script>

<style scoped>

</style>
