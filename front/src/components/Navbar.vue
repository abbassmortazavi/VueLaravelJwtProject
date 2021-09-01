<template>

       <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar scroll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item" v-if="! isAuth">
                      <a class="nav-link active" aria-current="page" href="#">
                        <router-link to="/login">
                        Login
                      </router-link>
                      </a>
                    </li>
                  <li class="nav-item" v-if="isAuth">
                    <a class="nav-link active" aria-current="page" href="#">
                      <router-link to="/feed">
                        Feed
                      </router-link>
                    </a>
                  </li>
                  <li class="nav-item" v-if="isAuth">
                    <a class="nav-link active" aria-current="page" href="#">
                      <router-link to="/logout">
                        Logout
                      </router-link>
                    </a>
                  </li>
                  <li class="nav-item" v-if="! isAuth">
                      <a class="nav-link active" aria-current="page" href="#">
                        <router-link to="/register">
                          Register
                        </router-link>
                      </a>
                  </li>


                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>


</template>
<script>
export default {
  data(){
    return{
      isAuth: false
    }
  },
  created() {
    this.isAuth = this.$auth.isAuthenticated();
  }
}
</script>
<style scoped>
  .router-link-active{
    background-color: #d2a2a266;
    padding: 3px;
    border-radius: 50%;
    color: #2a90ea;
  }
</style>
