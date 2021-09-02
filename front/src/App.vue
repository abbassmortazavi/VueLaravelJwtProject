<template>
  <div id="app" class="container">
    <NavBar/>
    <router-view></router-view>
  </div>
</template>

<script>
import NavBar from './components/Navbar.vue';
export default {
  name: 'app',
  components:{
    NavBar
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>

<style lang="scss">


</style>
